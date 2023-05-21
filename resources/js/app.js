import './bootstrap'
import './main'
import '@fortawesome/fontawesome-free/js/all.js';
import 'bootstrap/dist/js/bootstrap.min.js';
import './sidebar-scrollspy'

window.$ = window.jQuery = require('jquery')

window.Popper = require('popper.js')
window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js')
require('bootstrap')

window.addEventListener('click', (e) => {
    let app = $('#app');
    let elm = e.target;
    if(app.hasClass('app-sidebar-mobile-toggled')) {
        if(
            ! elm.classList.contains('app-sidebar-content')
            && ! elm.classList.contains('menu-toggler')
            && ! elm.classList.contains('bar')
        ) {
            app.removeClass('app-sidebar-mobile-toggled');
        }
    }
});

// input image
$(document).on("click", "i.del" , function() {
    $(this).parent().remove();
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;

        if (/^image/.test( files[0].type)){
            var reader = new FileReader();
            reader.readAsDataURL(files[0]);

            reader.onloadend = function(){
                uploadFile.closest(".imgUp").find('.imagePreview')[0].setAttribute('src', this.result)
            }
        }

    });
});
