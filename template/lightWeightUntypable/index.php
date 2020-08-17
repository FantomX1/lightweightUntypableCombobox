<?php


// @TODOL add repository restrictor in php loaded js to prohibit, pro something, cascade down across all the libraries,
        // not to declare for 3 libraries accrossed nested, or maybe independenatly to avodi in each of them

        // @TODO: add jquery dependency and do via jquery, but how to there make sure the script was loaded from outside and executed in context,
// in jquery it was problematic as below

        // var script = document.createElement('script');
            //script.onload = function () {
            //    //do stuff with the script
            //};
            //script.src = something;
            //
            //document.head.appendChild(script);


?>

<script type="text/javascript">

    document.addEventListener('DOMContentLoaded', function () {
        /* ... */
    //});

    //$(document).ready(function () {



            $.getScript('<?php echo  (new \fantomx1\PackagesAssetsSupport())->getAssetsDir("", '')
                .'/assets/js/helpers.js' ?>', function () {
                    //  alert('xzx');
                    if (typeof regSelectComboWidgetHandlers != "undefined") {
                        // regSelectComboWidgetHandlers();

                        var handler = new regSelectComboWidgetHandlers();
                    } else {
                        // alert('none')
                    };
                }
            );

            // @TODO: doesn't seem to work here outside yet
            // var handler = new regSelectComboWidgetHandlers();




            //window.myFunction();
            //myFunction();
        }
    );


</script>

<?php

/* <input type="text" readonly data-column="<?php echo $groupId; ?>" class="filter" name="<?php echo $name ?>[values][<?php echo $groupId; ?>]"> */
/* <input type="text" readonly data-column="<?php echo $groupId; ?>" class="filterHidden disabled" name="<?php echo $name ?>[ids][<?php echo $groupId; ?>]" size=10 */
?>

<input
        type="text"
        readonly
        data-column="<?php echo $groupId; ?>"
        class="filter"
        name="<?php echo $name ?>[v][<?php echo $groupId; ?>]"
        value="<?php echo $prefilled['values'] ?>"
>
<!--<input type="text" readonly data-column="--><?php //echo $columnName; ?><!--" class="filterHidden disabled" name="filter[ids][--><?php //echo $columnName; ?><!--]" size=10-->

<input
        type="text"
        readonly
        data-column="<?php echo $groupId; ?>"
        class="filterHidden disabled"
        name="<?php echo $name ?>[i][<?php echo $groupId; ?>]"
        size=10
        style="visibility: hidden"
        value="<?php echo $prefilled['ids'] ?>"
>

<br>

<div style="position: relative">
    <div class="filterSelect" data-column="<?php echo $groupId; ?>"
         style="visibility:hidden; position: absolute; top: 0px"
         class="filterSelect"
    >
    <select size=4" multiple=1
            class="filterSelect"
            name="selectSubmenu"
            data-column="<?php echo $groupId; ?>"

    >

        <?php

            $ids = explode(',', $prefilled['ids']);


            foreach ($data as $index => $value) {

                $selected = in_array($index, $ids) ? 'selected':'';
                ?>
                <option <?php echo $selected ?> value="<?php echo $index ?>"><?php echo $value ?></option>
                <?php
            }
        ?>
    </select>
<br>


    <?php


    echo $customHtml;


    ?>
    </div>
</div>

<input type="hidden" name="filter" class="select">
