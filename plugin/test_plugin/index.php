<?php
// this router for show str & number value in index.inc 
$lezaz->router('/@str/@num/', function($str,$num) use ($lezaz){   
    $lezaz->set('str',$str);
    $lezaz->set('num',$num);     
});

// to include doc.inc template ! 
$lezaz->router('documentation', function() use ($lezaz) {  
    $lezaz->main_template='doc';   
});

$lezaz->set('b',2);