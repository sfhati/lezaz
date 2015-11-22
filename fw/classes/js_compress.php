<?php

function jsUA($ua, $js_array = array(), $compressjs = 10) {    
    ksort($js_array);
    $jsau = '';

    foreach ($js_array as $createjsfile_row)
        $jsau.= addslashes(file_get_contents(TEMPLATE_PATH . $createjsfile_row));

    $jsau = CHNG_LANGUAGE(stripslashes($jsau));
    $packer = new JavaScriptPacker($jsau, $compressjs, true, false);
    $jsau = $packer->pack();


    /* create a new file */
    $handle = fopen(CACHE_PATH . $ua . get_cache('jshash' . $ua) . ".js", 'w');
    fwrite($handle, $jsau);
    fclose($handle);

    return '';
}

function createjsfile($compressjs = 0) {
    $dir = TEMPLATE_PATH;
    // javascript file for user creatore
    $qry = mysql_query("SELECT id,string1,string2 FROM `table1` where md5='jsfiles' and bool1='1'");
    while ($res = @mysql_fetch_array($qry)) {
        if (file_exists("{$dir}{$res[string1]}")) {
            $dhash2.=hash_file('md5', "{$dir}{$res[string1]}"); // hash code admin
            $js_array2[$res[string2]] = $res[string1];
        } else {
            mysql_query("delete FROM `table1` where md5='jsfiles'  and id=$res[id]");
        }
    }
    $jshash2 = md5($dhash2 . get_cache('language') . get_cache('compressjs'));
    if ($jshash2 == get_cache('jshash2') && file_exists(CACHE_PATH . "2{$jshash2}.js")) {
        $jshash2 = '';
    } else {
        @unlink(CACHE_PATH . "2" . get_cache('jshash2') . ".js");
        set_cache('jshash2', $jshash2);
        jsUA(2, $js_array2, $compressjs);
    }



    // javascript file for admin creatore
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if (is_dir($dir . $file . '/js/')) {
                if ($dh1 = opendir($dir . $file . '/js/')) {
                    while (($file1 = readdir($dh1)) !== false) {
                        $file_extension = strtolower(substr(strrchr($file1, "."), 1));
                        if ($file_extension == 'js') {
                            $dhash1.=hash_file('md5', "{$dir}$file/js/$file1"); // hash code admin
                            $js_array1[$file1] = $file . '/js/' . $file1;
                        }
                    }
                    closedir($dh1);
                }
            }
        }
    }
    closedir($dh);

    $jshash1 = md5($dhash1 . get_cache('language') . get_cache('compressjs'));
    if ($jshash1 == get_cache('jshash1') && file_exists(CACHE_PATH . "1{$jshash1}.js")) {
        $jshash1 = '';
    } else {
        @unlink(SITE_LINK . "cache/1" . get_cache('jshash1') . ".js");
        set_cache('jshash1', $jshash1);
        jsUA(1, $js_array1);
    }


    return 'your js file is created successfully ';
}