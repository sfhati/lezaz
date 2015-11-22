<?php

/* * *********************************************************** /\
  /\* sfhati frame work                                         /\/\
  \/* Author : bassam essawi [bastr3]                          /\/\/\
  /\* @sfhati.com[at]gmail                                    /\/\/\/\
  \/* Site : sfhati.com                                      /\BASTR3/\
  /\* Date : 16-02-2011                                     /\/\/\/\/\/\
  \/* Virsion : 1.2                                        /\/\/\/\/\/\/\
  \****************************************************** */
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

// include all plugin
$dir = dirname(realpath(__FILE__)) . DIRECTORY_SEPARATOR . 'plugin' . DIRECTORY_SEPARATOR;
if ($dh = opendir($dir)) {

    while (($file = readdir($dh)) !== false) {
        if ($file != '.' && $file != '..' && filetype($dir . $file) != 'dir') {
            include($dir . $file);
        }
    }
    closedir($dh);
}

/* * *************include templates**************** */
function include_file_template($template_name) {
    $syntaxcode = new __SYNTAX(CACHE_PATH);
    if (strpos($template_name, '}') || strpos($template_name, '/')) {
        $template_name = str_replace('{plugin}', PLUGIN_PATH, $template_name);
        $template_name = str_replace('{template}', TEMPLATE_PATH, $template_name);
        $template_name = str_replace('{tmp}', TMP_PATH, $template_name);
        $template_name = str_replace('{cache}', CACHE_PATH, $template_name);
        $template_name = str_replace('{uploaded}', UPLOADED_PATH, $template_name);
        $template_name = str_replace('{theme}', THEME_PATH, $template_name);
        $template_name = str_replace('//', '/', $template_name);
    } else {
        $template_name = THEME_PATH . $template_name;
    }
    $template_name=  str_replace(array('/','\\'), DIRECTORY_SEPARATOR, $template_name);
    if (end(explode('.', $template_name)) != 'inc')
        $template_name = $template_name . '.inc';
    
    if(!file_exists($template_name)) {
        $_SESSION[error_template]=$template_name;
       $tempf=after_last(DIRECTORY_SEPARATOR,$template_name);
       if($tempf)$template_name=  str_replace ($tempf, '404.inc', $template_name) ;
       else $template_name='404.inc';
       if(!file_exists($template_name)) { $template_name =THEME_PATH. '404.inc';}
       if(!file_exists($template_name)) { echo CHNG_LANGUAGE('[Template file not found]');exit();}
    }
    $export_filename = $syntaxcode->openfile($template_name);

    ob_start();   
    include($export_filename);
    return ob_get_clean();
}

$syntaxcode = new __SYNTAX(CACHE_PATH);

/*
[element:"type","name","lable","rules","msg rules","filter","style","more option"end element]

---Type---
group,hidden,reset,checkbox,file,color,image,password,
radio,button,submit,select,text,textarea,link,date,static,
header,html,autocomplete,

---rules---
required,maxlength,minlength,rangelength,email,regex,
lettersonly,alphanumeric,numeric,nopunctuation,
nonzero,compare,callback[function name]

---filter---
trim , lowercase,hgircase,callback[function name]

 *  */