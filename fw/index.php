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

echo $lezaz->run();


