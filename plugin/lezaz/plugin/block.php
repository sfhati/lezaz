<?php

/*
<lezaz:if/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id             Null
file         template file                                           null
parameters   any parameter you wont send to this template            null




Example
--------
<lezaz:block id='myid' file="{template}folder/template.inc"/>


 */

function lezaz_block($vars, $html) {
    global $lezaz;
// defult values     
    if (!isset($vars['file']))
        return '';
    foreach($vars as $k=> $param){
        if( strtolower($k) != 'id' &&  strtolower($k) != 'file'){           
            $code.="\$GLOBALS['{$k}'] = '$param';";
        }
    }
    return "
   <?php $code
echo \$lezaz->lezaz->include_tpl('$vars[file]') ;
 $html    
 ?>
";
}
