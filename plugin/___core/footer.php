<?php

   function parse_lezaz($t) {
    
    
$str=' 


       ' ;    
preg_match("/\<lezaz\:if(.*)\<\/lezaz\:if\>/im",$str,$ui);
print_r($ui); 
exit();
   }
   
     parse_lezaz($t);