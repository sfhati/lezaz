<?php
/*
  use like [if:"expr","statement"end if]
  or like [if:"expr","statement [else] statement"end if]
 */

function lezaz_if($vars,$html) {   

    $html = str_replace('<lezaz:else/>', "<?php }else{ ?>", $html);
    if($vars[id]){
        if($vars[result]){
            $result=  explode(',', $vars[result]);
            $return="\n".'$lezaz_'.$vars[id].'="'.$result[1]."\";\n";
        }
    }
    return "
   <?php $return if ($vars[condition]) { 
\n".'$lezaz_'.$vars[id].'="'.$result[0]."\";\n ?>      
 $html    
<?php } ?>
";
}
