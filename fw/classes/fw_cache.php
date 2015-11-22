<?php

// plugin cache loop and set
function get_plugin(){
    $fp=TMP_PATH.'plugin.tmp';
    if(file_exists($fp))
            return file($fp);
    $dir = PLUGIN_PATH;
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if ($file != '.' && $file != '..' && filetype($dir . $file) == 'dir') {                   
                if (!file_exists($dir . $file . '/RJCT'))
                    $return[]=$file;
                    $content.=$file."\n";
            }
        }
        closedir($dh);
    }  
    filewrite($fp, $content);
    return $return;
}

//open cache file 
function echocachefile($cachefile) {
    if (file_exists($cachefile)) {
        header('Content-Type: text/html; charset=UTF-8');
        echo implode(file($cachefile), '');
        exit();
    }
}

