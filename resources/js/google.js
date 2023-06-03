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
        let loading = `<div class="spinner-border text-success" style="width:1rem; height: 1rem;"></div><span>Loading...</span>`
        let submit = 'Submit';
        let url = $('#form').attr('action');

        $('#button_submit').html(loading);
        $.ajax({
            method: 'POST',
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

                $('#button_submit').html(submit);
            },
            error: function (data) {
                $('.message-error').text(data.message + ' ' + data.responseJSON.message);
                $('.toast-error').toast('show');

                $('#button_submit').html(submit);
            }
        });
    })
});
