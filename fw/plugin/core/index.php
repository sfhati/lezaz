<?php
/*------------Access template file useing url --------------------------
/t/folder/path/filename
/t/folder/path/filename/
using param 
/t/folder/path/filename/&pram=value&pram=value
/t/folder/path/filename&pram=value&pram=value

Ex. http://wiki.cms/t/Ace1.3.3/html/ajax/bassam&fdgfds=gfds&hgfdhgfd=hgfdh
*/
if($chng_tplt){
$chng_tplt=  trim($chng_tplt,'/');
    $chng_tpl =  $chng_tplt . '.inc'; // main page  
}

if($_GET['set_language']){
    
    if(strlen($_GET['set_language'])==2){
        set_cache('language',$_GET['set_language']);
        redirect(SITE_LINK.$_GET['link']);
    }
}
