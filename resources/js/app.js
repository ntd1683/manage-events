import './bootstrap'
import './main'

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
