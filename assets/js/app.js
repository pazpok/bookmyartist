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



document.addEventListener('DOMContentLoaded', () => {
    var calendarEl = document.getElementById('calendar-holder');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        defaultView: 'dayGridMonth',
        editable: true,
        eventSources: [
            {
                url: "/fc-load-events",
                type: "POST",
                data: {
                    filters: {},
                },
                error: () => {
                    // alert("There was an error while fetching FullCalendar!");
                },
            },
        ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
        },
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ], // https://fullcalendar.io/docs/plugin-index
        timeZone: 'UTC',
        aspectRatio: 1,

    });

    calendar.render();
});

$('#artist_spotifyId_help').on('click', () => {
    $('#artist_spotifyId_help').html('<span>Aller sur votre page artiste dans l\'application PC, puis clique droit et copier l\'URI.</span>')
});


$('#artist_soundcloudId_help').on('click', () => {
    $('#artist_soundcloudId_help').html('<span>Aller sur votre page artiste dans l\'application PC, puis clique droit et copier l\'URI.</span>')
});

$('#artist_youtubeId_help').on('click', () => {
    $('#artist_youtubeId_help').html('<span>Aller sur votre page artiste dans l\'application PC, puis clique droit et copier l\'URI.</span>')
});

// ------------------ NumScroller  ------------------ \\

(function($){
    $(window).on("load",function(){
        $(document).scrollzipInit();
        $(document).rollerInit();
    });
    $(window).on("load scroll resize", function(){
        $('.numscroller').scrollzip({
            showFunction    :   function() {
                numberRoller($(this).attr('data-slno'));
            },
            wholeVisible    :     false,
        });
    });
    $.fn.scrollzipInit=function(){
        $('body').prepend("<div style='position:fixed;top:0px;left:0px;width:0;height:0;' id='scrollzipPoint'></div>" );
    };
    $.fn.rollerInit=function(){
        var i=0;
        $('.numscroller').each(function() {
            i++;
            $(this).attr('data-slno',i);
            $(this).addClass("roller-title-number-"+i);
        });
    };
    $.fn.scrollzip = function(options){
        var settings = $.extend({
            showFunction    : null,
            hideFunction    : null,
            showShift       : 0,
            wholeVisible    : false,
            hideShift       : 0,
        }, options);
        return this.each(function(i,obj){
            $(this).addClass('scrollzip');
            if ( $.isFunction( settings.showFunction ) ){
                if(
                    !$(this).hasClass('isShown')&&
                    ($(window).outerHeight()+$('#scrollzipPoint').offset().top-settings.showShift)>($(this).offset().top+((settings.wholeVisible)?$(this).outerHeight():0))&&
                    ($('#scrollzipPoint').offset().top+((settings.wholeVisible)?$(this).outerHeight():0))<($(this).outerHeight()+$(this).offset().top-settings.showShift)
                ){
                    $(this).addClass('isShown');
                    settings.showFunction.call( this );
                }
            }
            if ( $.isFunction( settings.hideFunction ) ){
                if(
                    $(this).hasClass('isShown')&&
                    (($(window).outerHeight()+$('#scrollzipPoint').offset().top-settings.hideShift)<($(this).offset().top+((settings.wholeVisible)?$(this).outerHeight():0))||
                        ($('#scrollzipPoint').offset().top+((settings.wholeVisible)?$(this).outerHeight():0))>($(this).outerHeight()+$(this).offset().top-settings.hideShift))
                ){
                    $(this).removeClass('isShown');
                    settings.hideFunction.call( this );
                }
            }
            return this;
        });
    };
    function numberRoller(slno){
        var min=$('.roller-title-number-'+slno).attr('data-min');
        var max=$('.roller-title-number-'+slno).attr('data-max');
        var timediff=$('.roller-title-number-'+slno).attr('data-delay');
        var increment=$('.roller-title-number-'+slno).attr('data-increment');
        var numdiff=max-min;
        var timeout=(timediff*1000)/numdiff;
        //if(numinc<10){
        //increment=Math.floor((timediff*1000)/10);
        //}//alert(increment);
        numberRoll(slno,min,max,increment,timeout);

    }
    function numberRoll(slno,min,max,increment,timeout){//alert(slno+"="+min+"="+max+"="+increment+"="+timeout);
        if(min<=max){
            $('.roller-title-number-'+slno).html(min);
            min=parseInt(min)+parseInt(increment);
            setTimeout(function(){numberRoll(eval(slno),eval(min),eval(max),eval(increment),eval(timeout))},timeout);
        }else{
            $('.roller-title-number-'+slno).html(max);
        }
    }
})(jQuery);