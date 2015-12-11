<?php

// collect messageing here
//type 0=success,1=error,2=info,3=warning
function set_msg($msg, $type = 0) {
    
    $t[1] = 'success';
    $t[0] = 'error';
    $t[2] = 'info';
    $t[3] = 'warning';
    if(is_numeric($type))        
    $type = $t[$type];
    $_SESSION['message'][$type].= $msg . '<br>';
    return '1';
}

/*
  [name] => MyFile.jpg
  [type] => image/jpeg
  [tmp_name] => /tmp/php/php6hst32
  [error] => UPLOAD_ERR_OK
  [size] => 98174
 *  */


function get_msg($ajax = 0) {
    if ($ajax)
        $ajax = 'window.top.window.';

    if (is_array($_SESSION['message']))
        foreach ($_SESSION['message'] as $k => $v)
            $return.=" $ajax$.gritter.add({	text: '$v',class_name: 'gritter-$k'}); ";
    return $return;
}

//==== Redirect... Try PHP header redirect, then Java redirect, then try http redirect.:
function redirect($url) {
    if (!headers_sent()) {    //If headers not sent yet... then do php redirect
        header('Location: ' . $url);
        exit();
    } else {                    //If headers are sent... do java redirect... if java disabled, do html redirect.
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
        echo '</noscript>';
        exit();
    }
}

//get url with var`s and return it with ? or & in last to set other var`s
function getAddress() {
    /*     * * check for https ** */
    $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    /*     * * return the full address ** */
    $return = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (strpos($return, "?"))
        $return.="&";
    else
        $return.="?";
    return $return;
}

// var check
function filter_vars($var) {
    if (is_root())
       return $var;
 //       return mysql_real_escape_string($var);
    $search = array('%', '[', ']', '"', "'", '\\', '<', '>');
    $replace = array('&#37;', '&#91;', '&#93;', '&quot;', '&lsquo;', '&#92;', '&#60;', '&#62;');
  //  $var = mysql_real_escape_string($var);
    $var = str_replace($search, $replace, $var);
    return $var;
}

function filter_output($var) {
    $search = array('&#37;', '&#91;', '&#93;', '&amp;#37;', '&amp;#91;', '&amp;#93;');
    $replace = array('%', '[', ']', '%', '[', ']');
    $var = str_replace($search, $replace, $var);
    $var = stripslashes($var);
    return $var;
}



//function cron($time=0,$callbackfunction){
//}

function set_cache($var, $val) {
    delete_db("setting", "var='$var'");
    save_db("setting", array (  "var"=>$var, "val"=>$val ));
    unset($_SESSION['SETTING']);
}

function get_cache($var) {
    if (is_array($_SESSION['SETTING']))
        return $_SESSION['SETTING'][$var];
    $rows = getResults('select * from setting');
    if (is_array($rows))
        foreach ($rows as $row) {
            $_SESSION['SETTING'][$row['var']] = $row['val'];
        }

    return $_SESSION['SETTING'][$var];
}
