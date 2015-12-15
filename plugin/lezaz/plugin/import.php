<?php

/*
  <lezaz:js/>
  Attribute	Description        Default
  ----------------------------------------------------------------------
  dir    import all files from this dir                           Null
  type         css/js                                             Null
TODO:  compress         to compress all files in one                   Null
  sort        fort import files ASC DESC                          ASC

  inside code you can use list of file to import link like
 * {theme}js/jquery.js ; //inside theme folder use js folder then file 
 * js/jquery.js; //same apove coz defult directory is theme 
 * {template}admin/js/file.js; // inside template folder use admin folder then js file
 TODO: * url:http://sdn.com/file.js -> {theme}js/file.js ;//check if url valid and return 200 then import else import from your server 

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
        $vars['dir'] = rtrim(rtrim($vars['dir'], '/'), '\\') . '/';
        $vars_dir_path = $lezaz->lezaz_path($vars['dir']);
        $vars_dir_link = $lezaz->lezaz_path($vars['dir'], 1);

        $files = $lezaz->file->listfile($vars_dir_path, $vars['type'], 1);

        $files = &$files[$vars_dir_path];
        if (strtolower($vars['sort']) == 'asc')
            asort($files);
        if (strtolower($vars['sort']) == 'desc')
            arsort($files);

        if (is_array($files)) {
            if ($vars['type'] == 'css')
                array_walk($files, create_function('&$it', '$it = "<link rel=\"stylesheet\" type=\"text/css\" href=\"' . $vars_dir_link . '$it\"/>";'));
            if ($vars['type'] == 'js'){
                if($vars['compress']){
                array_walk($files, create_function('&$it', '$it = "' . $vars['dir'] . '$it";'));  
                $files='<?php 
                    $jsarray='.var_export($files,TRUE).';
                    echo compressjs($jsarray);
                        ?>';
                }else
                array_walk($files, create_function('&$it', '$it = "<script type=\"text/javascript\" src=\"' . $vars_dir_link . '$it\"></script>";'));
            }
            if(is_array($files))
            $files = implode("\n", $files);
        }
    }
    if ($html) {
        $html = explode(";", $html);
        foreach ($html as $line) {
            $line_path = $lezaz->lezaz_path(trim($line));
            $line_link = $lezaz->lezaz_path(trim($line), 1);
            if (strpos($line, '.' . $vars['type']) && file_exists($line_path)) {
                if ($vars['type'] == 'css')
                    $files.= "\n<link rel=\"stylesheet\" type=\"text/css\" href=\"$line_link\"/>\n";
                if ($vars['type'] == 'js')
                    $files.= "\n<script type=\"text/javascript\" src=\"$line_link\"></script>\n";
            }
        }
    }
    if(!$files || is_array($files) ) return '';
    return $files;


/*
    $url = 'http://sfhati.com/x.css';
    list($status) = @get_headers($url);
    if (strpos($status, '200') && strpos($status, 'OK')) {
        echo "yes ";
    }
 * */
 
}
