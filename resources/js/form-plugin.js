window.$ = window.jQuery = require('jquery')

import 'bootstrap-datepicker'
import 'summernote/dist/summernote-lite'
import Tagify from '@yaireo/tagify'

$("#happened_at").datepicker({
    startDate: new Date(),
    autoclose: true,
    format: 'dd-mm-yyyy',
});

$('.summernote').summernote({
    height: 300
});

function generate(n = 5) {
    const characters = 'abcdefghijklmnopqrstuvwxyz';
    let result = ' ';
    const charactersLength = characters.length;
    for (let i = 0; i < n; i++) {
        result +=
            characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return "code_" + result;
}

$('#generate_code').click((e) => {
    e.preventDefault();
    let code = generate();
    $('#code').val(code);
})

let inputTagify = document.querySelector('#tagify');
let tagify = new Tagify(inputTagify);

tagify.on('add', (e) => {
    $.ajax({
        method: 'GET',
        url: $('#url_check_email').text(),
        data: {
            "email": e.detail.data.value,
        },
        error: function (data) {
            tagify.removeTags(e.detail.data.value);
        }
    });
})
