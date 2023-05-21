window.addEventListener('load', () => {
    $('#button_how_to_use').click();

    let select_event = $('#select_event');

    function disabledButton() {
        if(select_event.val() == -1){
            $('#button_submit').prop('disabled', true);
        } else {
            $('#button_submit').prop('disabled', false);
        }
    }

    disabledButton();
    select_event.on('change', () => {
        disabledButton();
    })

    $('#button_submit').on('click', () => {
        let url = $('#form').attr('action');

        $.ajax({
            method: 'GET',
            url: url,
            data: $("#form").serialize(),
            success: function (data) {
                let error;

                $.each(data.data, (index, value) => {
                    error += `<p>${value}</p>`;
                })

                $('#modal_error').find('.modal-body').html(error);
                $('#button_error').click();

                $('.message-success').text('Import successfully');
                $('.toast-success').toast('show');
            },
            error: function (data) {
                $('.message-error').text(data.message + ' ' + data.responseJSON.message);
                $('.toast-error').toast('show');
            }
        });
    })
});
