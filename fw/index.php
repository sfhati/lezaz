<?php

/**
 * Front to the Sfhati application. This is main file, loads:
 * conf.php which does and tells Sfhati to load Classes.
 * load plugins 
 * load template
 * print html
 *
 * @package Sfhati
 */


session_start();
define('YOUCANINCLUDE', 'Yes');

include "conf.php";


$lezaz->include_plugin('init');

// clean all printed result
//while(ob_get_status()) ob_end_clean();
// get the any output buffer
//ob_start();




$lezaz->include_plugin('index');
$lezaz->include_plugin('footer');
$lezaz->include_plugin('term');
//$lezaz->lezaz->set('bb', 'Yes this is page man :) ');
echo 'XXXXXXXXXXXXXXXXXXX';
$lezaz->router('/@str/',function($args) use ($lezaz){
   $lezaz->lezaz->set('bb', 'Yes this is page man :) '.$args[1]);
    //return 'cccvvv';
});

echo $lezaz->lezaz->get('bb');
echo 'XXXXXXXXXXXXXXXXXXX';

/* * ************(if)set template file to [chng_tpl]***************** */
if (isset($chng_tpl) && $chng_tpl)
    $my_simple_tmplt = $chng_tpl;
else
    $my_simple_tmplt = 'index';
/* * ********** Get content PAGE form id ****************** */


/* * *****************process html code ******************** */

$my_simple_tmplt = $lezaz->lezaz->include_tbl($my_simple_tmplt);
$my_simple_tmplt = str_replace($_SESSION['SYNTAX_VAR']['OLD'], $_SESSION['SYNTAX_VAR']['NEW'], $my_simple_tmplt);
//$my_simple_tmplt = CHNG_LANGUAGE($my_simple_tmplt);
/* * *************include term.php plugin**************** */


/* * ****echo html code***** */
echo $my_simple_tmplt;


?>