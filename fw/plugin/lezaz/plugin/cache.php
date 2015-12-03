<?php
//[cache:"title-cv"end cache]
function lezaz_cache($vars,$html,$type) {
if($type) 1;// this come from lezaz~anything     
if(!$type) 0;// this come from <lezaz:anything     
if($vars[id]){
    //$lezaz_$vars[id]=some thing!
}
if($vars['print']) echo 'some thing ';


    if (strpos($vars[0], '-cv')) {
        $vars[0] = str_replace('-cv', '', $vars[0]);
        return 'get_cache("'.$vars[0].'")';
    } else {
        return "<?php echo ".'get_cache("'.$vars[0].'")'."; ?>";
    }
}
