window.$ = window.jQuery = require('jquery')

import 'bootstrap-datepicker'
import 'summernote/dist/summernote-lite'

$("#happened_at").datepicker({
    startDate: new Date(),
    autoclose: true,
    format: 'dd-mm-yyyy',
});
$('.summernote').summernote({
    height: 300
});
