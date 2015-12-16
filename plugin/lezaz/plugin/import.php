<?php

/*
  <lezaz:import/>
  Attribute	Description        Default
  ----------------------------------------------------------------------
  dir    import all files from this dir                           Null
  type         css/js                                             Null
  compress     to compress all files in one                       Null
 * 1   >> without compress 
 * 2   >> with compress                  
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
    $sort = '0';
    $compress = '0';
    $files = ' ';
    if ($vars['dir'] && $vars['type']) {
        if (strtolower($vars['sort']) == 'desc')
            $sort = '1';
        if (is_numeric($vars['compress'])) $compress=$vars['compress'];

        if ($vars['type'] == 'css')
            $files = '<?php                     
                    echo compressCSS("' . $vars['dir'] . '",' . $compress . ',' . $sort . ');
                        ?>';
        if ($vars['type'] == 'js') {
            $files = '<?php                     
                    echo compressJS("' . $vars['dir'] . '",' . $compress . ',' . $sort . ');
                        ?>';
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

    return $files;


    /*
      $url = 'http://sfhati.com/x.css';
      list($status) = @get_headers($url);
      if (strpos($status, '200') && strpos($status, 'OK')) {
      echo "yes ";
      }
     * */
}
