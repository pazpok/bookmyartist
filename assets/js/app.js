import bootstrap from 'bootstrap';
require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');
require('select2/dist/js/select2.js');


import "../css/app.scss";

const $ = require('jquery');

$(document).ready(function() {
    $('.genre-select').select2();
});