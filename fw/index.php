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

/* * *************include init.php plugin**************** */

$plugin_rowx = get_plugin();

//print_r($plugin_rowx);

    foreach ($plugin_rowx as $plugin_row) {
        $plugin_row=trim($plugin_row);
        $file_plugin[$plugin_row] = $plugin_row;
        //echo "$plugin_row : ";
        if (file_exists(PLUGIN_PATH . $plugin_row . "/init.php") && trim($plugin_row)) {
            //echo "[-]";
            include( PLUGIN_PATH . $plugin_row . "/init.php");
        }
        //echo "<br>";
    }


    /* * *************include index.php plugin**************** */
if (is_array($file_plugin)) {
    foreach ($file_plugin as $kplugin) {
        if (file_exists(PLUGIN_PATH . $kplugin . "/index.php")) {
            include(PLUGIN_PATH . $kplugin . "/index.php");
        }
    }
}

/* * ************(if)set template file to [chng_tpl]***************** */
if (isset($chng_tpl) && $chng_tpl)
    $my_simple_tmplt = $chng_tpl;
else
    $my_simple_tmplt = 'index';
/* * ********** Get content PAGE form id ****************** */


/* * *************include footer.php plugin**************** */
if (is_array($file_plugin))
    foreach ($file_plugin as $kplugin)
        if (file_exists(PLUGIN_PATH . $kplugin . "/footer.php")) {
            include( PLUGIN_PATH . $kplugin . "/footer.php");
        }

/* * *****************process html code ******************** */
$my_simple_tmplt = include_file_template($my_simple_tmplt);
$my_simple_tmplt = str_replace($_SESSION['SYNTAX_VAR']['OLD'], $_SESSION['SYNTAX_VAR']['NEW'], $my_simple_tmplt);
$my_simple_tmplt = CHNG_LANGUAGE($my_simple_tmplt);
/* * *************include term.php plugin**************** */

if (is_array($file_plugin))
    foreach ($file_plugin as $kplugin)
        if (file_exists(PLUGIN_PATH . $kplugin . "/term.php")) {
            include( PLUGIN_PATH . $kplugin . "/term.php");
        }

/* * ****echo html code***** */
echo $my_simple_tmplt;


?>