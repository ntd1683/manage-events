import './password'

const CSRF_TOKEN = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
window.addEventListener('load', () => {
    // avatar
    $('#input_avatar').change(() => {
        let url = $('#form_avatar').attr('action');
        let dataFile = $('#input_avatar')[0].files;
        let formData = new FormData();
        formData.append('file', dataFile[0]);
        formData.append('_token', CSRF_TOKEN);
        // console.log(formData, dataFile)
        $.ajax({
            url: url,
            type: 'POST',
            processData: false,
            contentType: false,
            data: formData,
            success: function (data) {
                $('.message-success').text(data.message);
                $('.toast-success').toast('show');
            },
            error: function (data) {
                $('.message-error').text(data.message + ' ' + data.responseJSON.message);
                $('.toast-error').toast('show');
            }
        });
    });

    $('#button_password').click(() => {
        let form = $('#form_change_password');
        let url = form.attr('action');
        let formData = form.serializeArray();
        formData.push({ name: "_token", value: CSRF_TOKEN });
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                $('.message-success').text(data.message);
                $('.toast-success').toast('show');
            },
            error: function (data) {
                $('.message-error').text(data.message + ' ' + data.responseJSON.message);
                $('.toast-error').toast('show');
            }
        });
    })

    $('#button_verify_email').click(() => {
        let form = $('#form_verify_email');
        let url = form.attr('action');
        let formData = form.serializeArray();
        formData.push({ name: "_token", value: CSRF_TOKEN });
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            success: function (data) {
                $('#button_close_verify_email').click();
                $('.message-success').text(data.message);
                $('.toast-success').toast('show');
            },
            error: function (data) {
                $('#button_close_verify_email').click();
                $('.message-error').text(data.message + ' ' + data.responseJSON.message);
                $('.toast-error').toast('show');
            }
        });
    })
})
