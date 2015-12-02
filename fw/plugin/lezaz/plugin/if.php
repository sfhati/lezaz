<?php
/*
  use like [if:"expr","statement"end if]
  or like [if:"expr","statement [else] statement"end if]
 */

function lezaz_if($vars,$html) {   

    $html = str_replace('<lezaz:else/>', "<?php }else{ ?>", $html);
    return "
   <?php if ($vars[condetion]) { ?>
 $html    
<?php } ?>
";
}
