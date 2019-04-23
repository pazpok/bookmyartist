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

var $collectionHolder;

// setup an "add a tag" link
var $addFormuleButton = $('<button type="button" class="add_formule_link">Ajouter une formule</button>');
var $newLinkLi = $('<li></li>').append($addFormuleButton);
$addFormuleButton.addClass('btn btn-outline-success');

$(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('ul.formules');

    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);


    $addFormuleButton.on('click', function(e) {
        // add a new tag form (see next code block)
        addFormuleForm($collectionHolder, $newLinkLi);
    });
});

function addFormuleForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    var newForm = prototype;
    // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // Replace '__name__label__' in the prototype's HTML to
    // instead be a number based on how many items we have
    // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<li></li>').append(newForm);
    $newLinkLi.before($newFormLi);

    addFormuleFormDeleteLink($newFormLi);
}

function addFormuleFormDeleteLink($formuleFormLi) {
    var $removeFormButton = $('<button type="button">Supprimer la formule</button>');
    $formuleFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        // remove the li for the tag form
        $formuleFormLi.remove();
    });

    $removeFormButton.addClass('btn btn btn-outline-danger')
}

$('.login-btn').on('click', () => {
    $('.modal-login').modal('show')
});
