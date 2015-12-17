<?php

/* Translate function */

function ___($text_TR){
    global $lezaz;
    $_LANGUAGE_X=array();
    foreach ($lezaz->plugin as $plg){
        $file=PLUGIN_PATH .$plg. "/lang/" . $lezaz->language();
        if (file_exists($file)) {
            $_LANGUAGE_X=  array_merge(file($file),$_LANGUAGE_X);
        }
    }
  //print_r($_LANGUAGE_X);exit();
        foreach ($_LANGUAGE_X as $_LANGUAGE_V) {            
            $_LANGUAGE_K = explode("=", $_LANGUAGE_V);
            if(trim($_LANGUAGE_K[0]) && trim($_LANGUAGE_K[1])){
            $_LANGUAGE_V = str_replace($_LANGUAGE_K[0] . '=', '', $_LANGUAGE_V);
            $text_TR = str_replace('[' . $_LANGUAGE_K[0] . ']', trim($_LANGUAGE_V), $text_TR);
            }
        }
        
        return $text_TR;
    }
    


$lezaz->listen('output.filter', function($output, $filtered){
        $output = empty($filtered) ? $output : $filtered;
        return ___($output);
});
