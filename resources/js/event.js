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

    let query;
    let sort;
    let perPage;
    function filter(query = null,sort = null,perPage = null) {
        $.ajax({
            method: 'GET',
            url: $('#form_filter').attr('action'),
            data: {
                "q": query,
                "filter": sort,
                "per_page": perPage,
            },
            success: function (data) {
                $('#list_events').html(data);
            },
            error: function (data) {
                $('.message-error').text(data.responseJSON.message);
                $('.toast-error').toast('show');
            }
        });
    }

    $('#search_filter').keyup(() => {
        query = $('#search_filter').val();
        filter(query,sort);
    })

    $('#select_filter').change(() => {
        sort = $('#select_filter').val();
        filter(query,sort)
    })
});
