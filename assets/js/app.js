import bootstrap from 'bootstrap';
import $ from 'jquery'
import select2 from 'select2/dist/js/select2.min'
import "../css/app.scss";


$(document).ready(function() {
    $('.genre-select').select2();
});

$('#template_choice_template > input').click(function () {
   $('.no-template').hide(400);
});