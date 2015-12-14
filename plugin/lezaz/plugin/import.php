<?php

/*
  <lezaz:js/>
  Attribute	Description        Default
  ----------------------------------------------------------------------
  dir    import all files from this dir                           Null
  type         css/js                                             Null
  compress         to compress all files in one                   Null
  sort        fort import files ASC DESC                          ASC

  inside code you can use list of file to import link like
 * {theme}js/jquery.js //inside theme folder use js folder then file
 * js/jquery.js //same apove coz defult directory is theme
 * {template}admin/js/file.js // inside template folder use admin folder then js file 
 * url:http://sdn.com/file.js -> {theme}js/file.js //check if url valid and return 200 then import else import from your server 

  Example
  --------
  <lezaz:import dir='js' type="css"/>
  <lezaz:import dir='js' type="css">
  {template}admin/css/file.css
  url:http://sdn.com/file.css -> css/file2.css
  </lezaz:import>





 */

function lezaz_import($vars, $html) {
    global $lezaz;

    if ($vars['dir'] && $vars['type']) {
        $vars['dir']=rtrim(rtrim($vars['dir'],'/'),'\\').'/';
        $vars['dir']=$lezaz->lezaz_path($vars['dir']);

        $files = $lezaz->file->listfile($vars['dir'], $vars['type'], 1);
        
        $files = &$files[$vars['dir']];
        if($vars['type']=='css')                
        array_walk($files, create_function('&$it', '$it = "<link rel=\"stylesheet\" type=\"text/css\" href=\"$it\"/>";'));
        if($vars['type']=='js')                
        array_walk($files, create_function('&$it', '$it = "<script type=\"text/javascript\" src=\"$it\"></script>";'));
 $files=  implode("\n", $files);
    }

return $files;



    $url = 'http://sfhati.com/x.css';
    list($status) = @get_headers($url);
    if (strpos($status, '200') && strpos($status, 'OK')) {
        echo "yes ";
    }
}
