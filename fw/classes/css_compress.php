<?php

/************CSS TOOLS*****************************************/
function FlipCSS($css_data) {
    preg_match_all('/[\h|\n|\{|;]((float|padding|margin|background|text-align|left|right|direction|border).*):((.+)(\}|;))/i', $css_data, $css_arr);
    foreach ($css_arr[1] as $k => $x) {
        $css_new = $css_arr[0][$k];
        $css_new = str_ireplace('left', 'XXLEXFTLXX', $css_new);
        $css_new = str_ireplace('right', 'left', $css_new);
        $css_new = str_ireplace('XXLEXFTLXX', 'right', $css_new);

 
        if($css_arr[1][$k]=='direction'){        
        $css_new = str_ireplace('ltr', 'XXLEXFTLXX', $css_new);
        $css_new = str_ireplace('rtl', 'ltr', $css_new);
        $css_new = str_ireplace('XXLEXFTLXX', 'rtl', $css_new);            
        }
        $dx=  explode(' ', trim($css_arr[4][$k]));
        if(count($dx)==4){
           $css_new = str_replace($css_arr[4][$k],$dx[0].' '.$dx[3].' '.$dx[2].' '.$dx[1],$css_new);
        }
        $css_data=  str_replace($css_arr[0][$k], $css_new, $css_data);
        
    }
     return $css_data;
}


function compress_css($file_name) {
    $cssx = file_get_contents($file_name);
    $cssx = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', ' ', $cssx);
    preg_match_all('/\@import[^\;]*\;/', $cssx, $p);
    $cssx = preg_replace('/\@import[^\;]*\;/', '', $cssx);  
    $_SESSION['@import_media'].= implode("\n", $p[0]);    
    preg_match("|".addslashes(TEMPLATE_PATH)."(.*)/css|U", $file_name, $x);
    $_FCSSILE = $x[1];
$ltrrtl=get_cache('language');
/*if($ltrrtl!='ar'){
    $cssx = FlipCSS($cssx);
}*/
    
    
    return str_ireplace('imagedata', 'url(data:', str_ireplace('url('. TEMPLATE_LINK  . $_FCSSILE . '/images/http://', 'url(http://', str_ireplace('{}', '{ }', str_ireplace('url(', 'url('. TEMPLATE_LINK . $_FCSSILE .'/images/', str_ireplace('url(data:', 'imagedata', str_ireplace(array('; ', ' }', '{ ', ': ', ' {', '  '), array(';', '}', '{', ':', '{', ' '), str_ireplace(array("\r\n", "\r", "\n", "\t", '  '), ' ', $cssx)))))));
}

function createcssfile($e = 0) {
    $css = '';
    $dir = TEMPLATE_PATH;
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            if (is_dir($dir . $file . '/css/')) {
                if ($dh1 = opendir($dir . $file . '/css/')) {
                    while (($file1 = readdir($dh1)) !== false) {
                        $file_extension = strtolower(substr(strrchr($file1, "."), 1));
                        if ($file_extension == 'css') {
                            $dhash.=hash_file('md5', "{$dir}$file/css/$file1");
                            $ARRAY_CSS[$file1] = $dir . $file . '/css/' . $file1;
                            $_FCSSILE[$file1] = $file;
                        }
                    }
                    closedir($dh1);
                }
            }
        }
        closedir($dh);
    }
    ksort($ARRAY_CSS);
    if ($e == 1)
        return $ARRAY_CSS;
    $csshash = md5($dhash . get_cache('language'));
    if ($csshash == get_cache('csshash') && file_exists(CACHE_PATH . "{$csshash}.css")) {
        return '';
    }

    set_cache('csshash', $csshash);
    $_SESSION['@import_media'] = '';

    foreach ($ARRAY_CSS as $k => $v) {
        $css.=compress_css($v);
    }
/*
    preg_match_all("|(.*){[^}]+}(.*)|U", $css, $outx);
    $css = str_replace($outx[0], '', $css);

    if (is_array($outx[0]))
        foreach ($outx[0] as $k => $v) {
            preg_match_all("|{(.*)}|U", $v, $c1);
            $xsscx[trim($outx[1][$k])].=trim($c1[1][0]) . ';';
        }
    if (is_array($xsscx))
        foreach ($xsscx as $kx => $vx) {
            $cssus.= $kx . '{' . $vx . '}';
        }
*/
    $cssdone = str_ireplace(';}', '}', str_ireplace(';;', ';', $css));
    $handle = fopen(CACHE_PATH . "{$csshash}.css", 'w');
    fwrite($handle, '@charset "utf-8";' . "\n" . $_SESSION['@import_media'] . CHNG_LANGUAGE($cssdone));
    fclose($handle);
}

function getcsselements() {

    $css_compression = file_get_contents(SITE_LINK . "cache/" . get_cache('csshash') . ".css");
    preg_match_all("|(.*){[^}]+}(.*)|U", $css_compression, $outx);


    if (is_array($outx[0]))
        foreach ($outx[0] as $k => $v) {
            preg_match_all("|{(.*)}|U", $v, $c1);
            $propertiz = explode(';', $c1[1][0]);
            $echo.= $outx[1][$k] . "{\n";
            foreach ($propertiz as $kvalue) {
                $echo.= '    ' . $kvalue . "\n";
            }
            $echo.="}\n\n";
        }
    echo $echo;
}
