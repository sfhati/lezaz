<?php

if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');

$activeecho_0='Not Active';
$activeecho_1='Active';

if($upoladimages){ //for editor image upload 
    if ($_FILES[file][name]) {
        $filename = save_file($_FILES[file], 'files', array('type' => 'img', 'size' => '500'));
    }
   $response = new StdClass;
    $response->link = UPLOADED_LINK . 'files/' . $filename;
    echo stripslashes(json_encode($response));  
    exit();
}


 //edit inline code 
if ($posteditabletype == '1' && $t && $f && $pk && is_root()) {
    $data_insert='';
    $data_insert[$f] = $value;
    save_db($t, $data_insert, " id='$pk' ", 1);
    exit();
}



if($thispage=='setting'){
$_VAL_site_title=  get_cache('site_title');
$_VAL_site_phone=  get_cache('site_phone');
$_VAL_site_email=  get_cache('site_email');
$_VAL_facebook=  get_cache('facebook');
$_VAL_twiter=  get_cache('twiter');
$_VAL_instagram=  get_cache('instagram');
$_VAL_youtube=  get_cache('youtube');
$_VAL_map_location=  get_cache('map_location');
$_VAL_address= get_cache('address');
if(get_cache('use_ajax')) $_VAL_use_ajax= 'checked="checked"';

}

if($submit_setting){
    if($site_title) set_cache ('site_title', $site_title);
    if($site_phone) set_cache ('site_phone', $site_phone);
    if($site_email) set_cache ('site_email', $site_email);
    if($facebook) set_cache ('facebook', $facebook);
    if($twiter) set_cache ('twiter', $twiter);
    if($instagram) set_cache ('instagram', $instagram);
    if($youtube) set_cache ('youtube', $youtube);
    if($map_location) set_cache ('map_location', $map_location);
    if($address) set_cache ('address', $address);
    set_cache ('use_ajax', $use_ajax);
    set_cache ('skinchoose', $skinchoose);
    
 
    if ($_FILES[logo1][name]) {
        $filename = save_file($_FILES[logo1], 'site');
        if($filename) set_cache ('logo1', $filename);        
    }
    if ($_FILES[logo2][name]) {
        $filename = save_file($_FILES[logo2], 'site');
        if($filename) set_cache ('logo2', $filename);        
    }
    if ($_FILES[icon][name]) {
        $filename = save_file($_FILES[icon], 'site');
        if($filename) set_cache ('icon', $filename);        
    }
    
         echo CHNG_LANGUAGE("<script>window.top.window.msgsuccess('[your sitteng saved successfully]');</script>");
   
    
         redirect(SITE_LINK.'admin');
    
}

