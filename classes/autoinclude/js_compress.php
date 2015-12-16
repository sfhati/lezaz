<?php

function compressJS($dir, $compress = 0, $sort = 0) {
    global $lezaz;
    $pattern = "*.js";
    $vars_dir_path = $lezaz->lezaz_path($dir) . '/';
    $vars_dir_link = $lezaz->lezaz_path($dir, 1) . '/';
 
    $glop = glob($vars_dir_path . $pattern);
    if ($sort)
        arsort($glop);
    else
        asort($glop);
    foreach ($glop as $filename) {
        $fn = basename($filename);
        if(strpos('XXX'.$filename,'Xall.js.'))            continue;
        if ($compress == 1 || $compress == 2) {
            $Xfile.= hash_file('md5', $filename);
        } else {
            $return.=" <script type=\"text/javascript\" src=\"{$vars_dir_link}{$fn}\"></script> \n";
        }
    }
    if (file_exists($vars_dir_path . 'all.js.' . md5($Xfile) . $compress . '.js'))
        return " <script type=\"text/javascript\" src=\"" . $vars_dir_link . 'all.js.' . md5($Xfile) . $compress . '.js' . "\"></script> \n";
    if ($return)
        return $return;



        array_map('unlink', glob($vars_dir_path . "all.js.*.js")); // delete all mini files created by lezaz

    foreach (glob($vars_dir_path . $pattern) as $filename) {
        $fn = basename($filename);
        if ($compress == '1') {
            $jsall.= "\n\n\n/*$fn*/\n========================\n".file_get_contents($filename);
        } else if ($compress == '2') {
            $jsau = addslashes(file_get_contents($filename));
            $packer = new JavaScriptPacker($jsau);
            $jsau = $packer->pack();
            $jsall.= "\n\n\n/*$fn*/\n========================\n" . $jsau;
        }
    }
    $lezaz->file->write($vars_dir_path . 'all.js.' . md5($Xfile) . $compress . '.js', $jsall);
    return " <script type=\"text/javascript\" src=\"" . $vars_dir_link . 'all.js.' . md5($Xfile) . $compress . '.js' . "\"></script> \n";
}

function compressCSS($dir, $compress = 0, $sort = 0) {
    global $lezaz;
    $pattern = "*.css";
    $vars_dir_path = $lezaz->lezaz_path($dir) . '/';
    $vars_dir_link = $lezaz->lezaz_path($dir, 1) . '/';
 
    $glop = glob($vars_dir_path . $pattern);
    if ($sort)
        arsort($glop);
    else
        asort($glop);
    foreach ($glop as $filename) {
        $fn = basename($filename);
        if(strpos('XXX'.$filename,'Xall.css.'))            continue;
        if ($compress == 1 || $compress == 2) {
            $Xfile.= hash_file('md5', $filename);
        } else {
            $return.=" <link rel=\"stylesheet\" type=\"text/css\" href=\"{$vars_dir_link}{$fn}\"/>\n";
        }
    }
    if (file_exists($vars_dir_path . 'all.css.' . md5($Xfile) . $compress . '.css'))
        return " <link rel=\"stylesheet\" type=\"text/css\" href=\"" . $vars_dir_link . 'all.css.' . md5($Xfile) . $compress . '.css' . "\"/>\n";
    if ($return)
        return $return;



        array_map('unlink', glob($vars_dir_path . "all.css.*.css")); // delete all mini files created by lezaz

    foreach (glob($vars_dir_path . $pattern) as $filename) {
        $fn = basename($filename);
        if ($compress == '1') {
            $cssall.= "\n\n\n/*$fn*/\n========================\n".file_get_contents($filename);
        } else if ($compress == '2') {                        
            $cssau = compress_css($filename);
            $cssall.= "\n\n\n/*$fn*/\n========================\n" . $cssau;
        }
    }
    $lezaz->file->write($vars_dir_path . 'all.css.' . md5($Xfile) . $compress . '.css', $cssall);
    return " <script type=\"text/javascript\" src=\"" . $vars_dir_link . 'all.css.' . md5($Xfile) . $compress . '.css' . "\"></script> \n";
    //    <link rel=\"stylesheet\" type=\"text/css\" href=\"' . $vars_dir_link . '$it\"/>";'));
    asort($files);
    arsort($files);
}


function compress_css($file_name) {
    $cssx = file_get_contents($file_name);
    $cssx = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', ' ', $cssx);           
    return  str_ireplace('{}', '{ }', str_ireplace(array('; ', ' }', '{ ', ': ', ' {', '  '), array(';', '}', '{', ':', '{', ' '), str_ireplace(array("\r\n", "\r", "\n", "\t", '  '), ' ', $cssx)));
}
