<?php

// collect messageing here
//type 0=success,1=error,2=info,3=warning
function set_msg($msg, $type = 0) {
    $t[0] = 'success';
    $t[1] = 'error';
    $t[2] = 'info';
    $t[3] = 'warning';
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

function save_file($file, $saveto = '', $validation = '') {
    if ($validation[type] == 'img') {
        if ($file[type] != "image/gif" && $file[type] != "image/png" && $file[type] != "image/jpg" && $file[type] != "image/jpeg") {
            set_msg('[ERR_TYPE]', 1);
            return FALSE;
        }
    }
    if ($validation[size]) {
        $validation[size] = $validation[size] * 1000;
        if ($file[size] > $validation[size]) {
            set_msg('[ERR_SIZE]', 1);
            return FALSE;
        }
    }
    $ext = end(explode('.', $file[name]));
    if (!$ext) {
        set_msg('[ERR_FILENAME]', 1);
        return FALSE;
    }
    $saveto = UPLOADED_PATH . $saveto . '/';
    if (!make_path($saveto)) {
        set_msg('[ERR_PERMITIONFOLDER]', 1);
        return FALSE;
    }
    $fn = time() . '.' . $ext;
    copy($file[tmp_name], $saveto . $fn);
    return $fn;
}

function make_path($path) {
    $path = str_replace('\\', '/', $path);
    if (is_dir($path))
        return true;
    $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
    $return = make_path($prev_path);
    return ($return && is_writable($prev_path)) ? mkdir($path) : false;
}

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

function filewrite($file, $content) {
    @unlink($file);
    $fp = fopen($file, 'w');
    if (flock($fp, LOCK_EX | LOCK_NB)) {
        fwrite($fp, $content);
        fflush($fp);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

function LIST_Filse($dir) {
    $listDir = array();
    if ($handler = opendir($dir)) {
        while (($sub = readdir($handler)) !== FALSE) {
            if ($sub != "." && $sub != ".." && $sub != '.svn') {
                if (is_file($dir . $sub)) {
                    $listDir[$sub] = $dir . $sub;
                } else if (is_dir($dir . $sub . '/')) {                   
                    
                   $listDir = array_merge_recursive($listDir,LIST_Filse($dir . $sub . '/'));
                }
            }
        }
        closedir($handler);
    } 
    return $listDir; 
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

function check_db($table, $condetion = '1=1', $f = '') {
    $sql = getResults("select * from `$table` where $condetion limit 1 ");
    $sql = &$sql[1];
    if (!$sql[id])
        return false;
    if ($f)
        return $sql[$f];
    return $sql;
}
function get_row($table, $id , $row) {
    $sql = getResults("select $row from `$table` where id=$id limit 1 ");
    $sql = &$sql[1];
    return $sql[$row];      
}

function save_db($table, $feilds, $condetion = '', $type = 0) {
    global $_DB;
    $syntax_sql = '';
    
       foreach ($feilds as $key => $val) {   
           $val= addslashes($val);
                if ($syntax_sql)
                    $syntax_sql.=' , ';
                $syntax_sql.= "`$key` = '$val' ";            
        }    
    
  /*  $column_array = $_DB->columns($table);

    if ($column_array != false) {
        foreach ($feilds as $key => $val) {
            if (in_array($key, $column_array)) {
                if ($syntax_sql)
                    $syntax_sql.=' , ';
                $syntax_sql.= "`$key` = '$val' ";
            }
        }
    }else {
        return $_DB->getError();
    }*/
       
    if ($type)
        return $_DB->update($table, $syntax_sql, $condetion);
    return $_DB->insert($table, $syntax_sql);
}

function delete_db($table, $condetion) {
    global $_DB;
    return $_DB->delete($table, $condetion);
}

function delete_id($table, $id) {
    global $_DB;
    if (is_numeric($id)) {
        $condetion = 'id=' . $id;
        return $_DB->delete($table, $condetion);
    }
    return '';
}

function session_time() {
    if (!$_SESSION['seassion_start'])
        return 0;
    return time() - $_SESSION['seassion_start'] + 1;
}

function is_member() {
    if (is_array($_SESSION['member_permission']))
        return true;
    return false;
}

function is_moderator() {
    if (has_perm('root,moderator'))
        return true;
    return false;
}

function is_root() {
    if (in_array_r('root', $_SESSION['member_permission']))
        return true;
    return false;
}

function has_perm($f) {
    if (!is_member())
        return false;
    if (is_root())
        return true;

    $prem = explode(',', $f);
    foreach ($_SESSION['member_permission'] as $has) {
        if (in_array($has['permission'], $prem))
            $x++;
    }
    if ($x == count($prem))
        return true;
    return false;
}

function member_info($f) {
    if (is_array($_SESSION['MEMBER']))
        return $_SESSION['MEMBER'][$f];
    return false;
}

function in_array_r($needle, $haystack, $strict = false) {
    if (is_array($haystack))
        foreach ($haystack as $item) {
            if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
                return true;
            }
        }

    return false;
}


   function after ($this, $inthat)
    {
        if (!is_bool(strpos($inthat, $this)))
        return substr($inthat, strpos($inthat,$this)+strlen($this));
    };

    function after_last ($this, $inthat)
    {
        if (!is_bool(strrevpos($inthat, $this)))
        return substr($inthat, strrevpos($inthat, $this)+strlen($this));
    };

    function before ($this, $inthat)
    {
        return substr($inthat, 0, strpos($inthat, $this));
    };

    function before_last ($this, $inthat)
    {
        return substr($inthat, 0, strrevpos($inthat, $this));
    };

    function between ($this, $that, $inthat)
    {
        return before ($that, after($this, $inthat));
    };

    function between_last ($this, $that, $inthat)
    {
     return after_last($this, before_last($that, $inthat));
    };

// use strrevpos function in case your php version does not include it
function strrevpos($instr, $needle)
{
    $rev_pos = strpos (strrev($instr), strrev($needle));
    if ($rev_pos===false) return false;
    else return strlen($instr) - $rev_pos - strlen($needle);
};