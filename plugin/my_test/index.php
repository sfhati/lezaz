<?php
/* سيتم إستدعاء القالب     
/template/my_template/test.inc
عند كتابة العنوان التالي 
http://your_domain.com/test or http://your_domain.com/test/any_thing
*/
$lezaz->router(array('/test/@*', 'test'), function() use ($lezaz) {    
 $lezaz->main_template = '{template}my_template/test';    
});

// تم تعريف متغير لإستخدامه في القالب بإسم 
// my_var 
$lezaz->set('my_var','this is me :)');