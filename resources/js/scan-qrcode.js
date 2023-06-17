// To use Html5QrcodeScanner (more info below)
import {Html5QrcodeScanner} from "html5-qrcode";

// To use Html5Qrcode (more info below)
import {Html5Qrcode} from "html5-qrcode";

function getBaseURL () {
    return window.location.origin;
}

const qrcode = new QRCode("qrcode");

const urlBase = getBaseURL();
let urlQrCode = urlBase;

let selectEvent = $('#select_event');
let code;

function onScanSuccess(decodedText, decodedResult) {
    let url = $('#form').attr('action');
    $.ajax({
        method: 'POST',
        url: url,
        data: {
            "_token": $("input[name='_token']").val(),
            "event_id": selectEvent.val(),
            "qrcode": decodedText,
        },
        success: function () {
            $('#button_success').click();
        },
        error: function (data) {
            $('#text_error').text(data.responseJSON.message);
            $('#button_error').click();
            $('.toast-error').toast('show');
        }
    });
    // handle the scanned code as you like, for example:
}

function disabledCamera() {
    let reader = $('#reader');
    if (selectEvent.val() === "-1") {
        reader.addClass("d-none");
        if(reader.hasClass("d-block")){
            reader.removeClass("d-block");
        }
    } else {
        reader.addClass("d-block");
        if(reader.hasClass("d-none")){
            reader.removeClass("d-none");
        }
    }
}

selectEvent.change(() => {
    $.ajax({
        method: 'GET',
        url: $('#getCode').val(),
        data: {
            "event_id": selectEvent.val(),
        },
        success: function (response) {
            code = response.data.code;
            urlQrCode += 'events/register-events/' + selectEvent.val() + '?code=' + code;
            qrcode.makeCode(urlQrCode);
        }
    });
    disabledCamera();
})

$('#button_error').click(() => {
    // $('#text_error').text(data.responseJSON.message);
})

window.addEventListener('load', () => {

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        {fps: 10, qrbox: {width: 250, height: 250}},
        /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess, () => {});
    Html5Qrcode.getCameras().then(devices => {
        /**
         * devices would be an array of objects of type:
         * { id: "id", label: "label" }
         */
        if (devices && devices.length) {
            var cameraId = devices[0].id;
            // .. use this to start scanning.
        }
    }).catch(err => {
        $('.message-error').text('Get Camera Failed');
        $('.toast-error').toast('show');
    });


    let button_scan_qr = $('#html5-qrcode-button-camera-permission');
    let button_select_image = $('#html5-qrcode-button-file-selection');
    button_scan_qr.addClass('my-button');
    button_select_image.addClass('my-button');

    disabledCamera();
})
