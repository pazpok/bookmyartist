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

// var $collectionHolder;
//
// // setup an "add a tag" link
// var $addFormuleButton = $('<button type="button" class="add_formule_link">Ajouter une formule</button>');
// var $newLinkLi = $('<li></li>').append($addFormuleButton);
//
// jQuery(document).ready(function() {
//     // Get the ul that holds the collection of tags
//     $collectionHolder = $('ul.formule');
//
//     // add the "add a tag" anchor and li to the tags ul
//     $collectionHolder.append($newLinkLi);
//
//     // count the current form inputs we have (e.g. 2), use that as the new
//     // index when inserting a new item (e.g. 2)
//     $collectionHolder.data('index', $collectionHolder.find(':input').length);
//
//     $addFormuleButton.on('click', function(e) {
//         // add a new tag form (see next code block)
//         addFormuleForm($collectionHolder, $newLinkLi);
//     });
// });