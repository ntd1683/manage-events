window.addEventListener('load', () => {
    let eventId;
    let buttonRegister = $('.button-register');
    let buttonSubmit = $('#submit_form');
    let url = $('#form').attr('action');
    buttonRegister.click((e) => {
        eventId = e.target.dataset.eventId;
    });

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
