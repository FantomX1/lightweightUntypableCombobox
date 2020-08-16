

// window.myFunction=function() {
//     alert('asdasd');
// }

function regSelectComboWidgetHandlers(){

     //alert('asdsa');

    // allow executing only once
    if( typeof regSelectComboWidgetHandlers.was == 'undefined' ) {
        regSelectComboWidgetHandlers.was = 0;
    }


    if (regSelectComboWidgetHandlers.was) {
        return;
    }

    regSelectComboWidgetHandlers.was =1;

    // hide drop down menues, name it somehow
    $('html').on('click',
        function(event){

            //var par = $(event.target).parent();
            // not throwing undefined index yet
            var par = $(event.target).parents('div.filterSelect')[0];

            // console.log(par);

            // if we clicked anywhere in html except of selector, then hide it
            if (typeof par == "undefined") {
                $('div.filterSelect').css('visibility', 'hidden');
            }
        }
    );

    // groupped by parent, and to hide later on same element save into a common property
    //$('input[type=text].filter').each(function() {
    $('input[type=text].filter').click(function(event) {

            // data could go as well as a class

            event.stopPropagation(); // not to bubble to html

            //alert( $('select[data-column='+$(this).data('column')));
            var el = $('div.filterSelect[data-column='+$(this).data('column'));

            el.css('visibility', 'visible');
        }
    );



    $('select.filterSelect').change(function() {
        //alert('dasd');

        //$(this).find(":selected").each(function(){alert($(this))});
        //$(this).find(":selected").each(function(){alert($(this))});
        //alert($(this).find(":selected").each);

        // @TODO: identify a group in context of this library and named accordingly preprend the class of this plugin
        // instead of naem attribute with non forn elements
        var allText = $(this).find(":selected").map(function(){
                return $(this).text();
            }).get(),
            allText = allText.join(',');

        var allTextHidden = $(this).find(":selected").map(function(){
                return $(this).val();
            }).get(),
            allTextHidden = allTextHidden.join(',');



        //$('select[data-column='+$(this).data('column'));
        //console.log(   $('input.filter[data-column='+$(this).data('column')+']'));
        $('input.filter[data-column='+$(this).data('column')+']').val(allText);
        $('input.filterHidden[data-column='+$(this).data('column')+']').val(allTextHidden);



    });


    // alert($(document));
}

//window.myFunction();

//myFunction();
// if (!window.myFunction) {
//     window.myFunction = function() {
//         //...
//         alert('helpers');
//     }
// }

