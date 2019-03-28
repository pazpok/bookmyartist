import bootstrap from 'bootstrap';
import $ from 'jquery'
import select2 from 'select2'


import "../css/app.scss";


$(document).ready(function() {
    $('.genre-select').select2();
    $('#user_isArtist').change(function () {
        if (!this.checked)
            $('#user div').slice(8,17).fadeOut('fast');
        else
            $('#user div').slice(8,17).fadeIn('fast');
    })
});