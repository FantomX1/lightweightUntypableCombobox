//function regSelectComboWidgetHandlers(){
class regSelectComboWidgetHandlers
{


    /**
     *
     */
    constructor()
    {

        // allow executing the function (=code-block wrapper) only once
        if( typeof regSelectComboWidgetHandlers.was !== 'undefined' ) {
            return
        }
        regSelectComboWidgetHandlers.was = 1;

        this.registerSlidedownMenuOnCombotextClick();
        this.registerFillComboTextOnDropdownChange()
        this.registerHideDropdownMenuesHandlerOnMouseoutclick();

    }


    /**
     *
     */
    registerHideDropdownMenuesHandlerOnMouseoutclick() {

        $('html').on('click',
            function (event) {
                //var par = $(event.target).parent();
                // not throwing undefined index yet
                var par = $(event.target).parents('div.filterSelect')[0];

                // if we clicked anywhere in html except of selector, then hide it
                if (typeof par == "undefined") {
                    $('div.filterSelect').css('visibility', 'hidden');
                }
            }
        );
    }


    /**
     *
     */
    registerSlidedownMenuOnCombotextClick()
    {
        // click drop down related dropdown element to a text field
        // groupped by parent, and to hide later on same element save into a common property
        $('input[type=text].filter').click(function(event) {
                //$('input[type=text].filter').each(function() {
                //alert($('select[data-column='+$(this).data('column')));
                // instead of a class element could be used a data-column

                event.stopPropagation(); // not to bubble to html

                //alert( $('select[data-column='+$(this).data('column')));
                var el = $('div.filterSelect[data-column='+$(this).data('column'));

                el.css('visibility', 'visible');
            }
        );
    }

    /**
     *
     */
    registerFillComboTextOnDropdownChange()
    {
        // on changing, reflect it at the specified elements, two (hidden, values), which could be passed in
        $('select.filterSelect').change(function() {

                //$(this).find(":selected").each(function(){alert($(this))});
                //alert($(this).find(":selected").each);


                var optionElements = $(this).find(":selected");

                // @TODO: identify a group in context of this library and named accordingly preprend the class of this plugin
                // instead of naem attribute with non forn elements
                // todo? entire map, wrap into closure and paste another closure as a var, var closre=function(){ return $(this).text(); }
                var allText = optionElements.map(
                    function(){ return $(this).text(); }
                )
                    .get()
                    .join(',');

                var allValues = optionElements.map(
                    function(){ return $(this).val(); }
                )
                    .get()
                    .join(',');

                $('input.filter[data-column='       + $(this).data('column'))
                    .val(allText);
                $('input.filterHidden[data-column=' + $(this).data('column')).
                val(allValues);
                // for i in ['input.filter[data-column=','input.filterHidden[data-column='+$(this).data('column')'],[allText,AllTextHidden]



            }
        );



    }

}
