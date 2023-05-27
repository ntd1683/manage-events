window.addEventListener('load', () => {
    let buttonRegister = $('.button-register');
    buttonRegister.click((e) => {
        let eventId = e.target.dataset.eventId;
        let url = $('#form').attr('action');

        let buttonSubmit = $('#submit_form');
        buttonSubmit.click(() => {
            $.ajax({
                method: 'GET',
                url: url,
                data: {
                    "event_id": eventId,
                },
                success: function (data) {
                    $('.message-success').text(data.message);
                    $('.toast-success').toast('show');
                    $('#button_close_modal').click();
                },
                error: function (data) {
                    $('.message-error').text(data.responseJSON.message);
                    $('.toast-error').toast('show');
                    $('#button_close_modal').click();
                }
            });
        })
    });
});
