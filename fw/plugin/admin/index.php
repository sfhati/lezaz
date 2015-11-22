<?php
createlangfile(); 

if(get_cache('use_ajax')){
$useajax=1; 
$ajxURL='#'; 
}else{ 
$ajxURL='';
$useajax=0;    
}

$skin=get_cache ('skinchoose');

if ($chng_tpl == 'login') {
    if (is_member()) {
        $chng_tpl =  '{template}admin/index.inc'; // main page         
        if ($template_folder) { // sub page 
             
            $vars_array = explode('/', $template_folder);
            if ($vars_array[0] == 'page') {
                
                if ($vars_array[1] == 'ajax') {                      // admin/page/ajax/subpage
                    $vars_array[0] = 'content/' . $vars_array[2];    // admin/content/subpage
                     $chng_tpl =  '{template}admin/' . $vars_array[0] . '.inc';
                     $_SESSION['noajaxpage']=$vars_array[2];
                     $thispage=$vars_array[2];
                } else {                                             // admin/page/subpage        
                    $_SESSION['noajaxpage'] =  $vars_array[1]; 
                    
                    if(!$_SESSION['noajaxpage']) $_SESSION['noajaxpage']='index';
                    $vars_array[0] = 'content/' . $vars_array[1];    // admin/content/subpage
                    $thispage=$vars_array[1];
                }
               
            }
            
            parse_str(str_replace('page/ajax', 'page', $template_folder));
        }
    } else {
        $chng_tpl =  '{template}admin/login.inc';
    }
}
//echo "<br>Page = $page<br>";
//echo $chng_tpl . '<br>';
