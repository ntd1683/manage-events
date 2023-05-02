import './bootstrap';
import './main'
import TranslationPlugin from './plugins/Translation'

window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js');
require('bootstrap');
require('main')

app.use(TranslationPlugin)
