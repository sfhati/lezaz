<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function row_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $vars[$v] = $syntaxcode->Syntax($var);
    }
    if(!strpos('000'.$vars[0],'$')) $vars[0] = "$vars[0]"; else  $vars[0] = "\"$vars[0]\"";
    if(!strpos('000'.$vars[1],'$')) $vars[1] = "$vars[1]"; else  $vars[1] = "\"$vars[1]\"";
    if(!strpos('000'.$vars[2],'$')) $vars[2] = "$vars[2]"; else  $vars[2] = "\"$vars[2]\"";
    $vars[0]=str_replace('*','.$_SESSION[lng_CH]',$vars[0]);
    $vars[1]=str_replace('*','.$_SESSION[lng_CH]',$vars[1]);
    $vars[2]=str_replace('*','.$_SESSION[lng_CH]',$vars[2]);
    //  $vars = str_replace('-code', '', $vars);
    return "<?php echo get_row($vars[0], $vars[1]  ,$vars[2] ) ?>";
}
