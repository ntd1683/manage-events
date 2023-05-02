import './bootstrap';
import TranslationPlugin from './plugins/Translation'

window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js');
require('bootstrap');

app.use(TranslationPlugin)
