<?php

/**
 * 02 Dec 2015. version 1.0
 * 
 * Template engine for PHP,
 * 
 * License: http://creativecommons.org/licenses/LGPL/2.1/
 * 
 * ----------------------------------------------------------------------
 * 
 * examples of usage :
 *   $syntaxcode = new __SYNTAX( );
 *   $arrthis = $syntaxcode->openfile('template/sfhati/mobile.inc');
 * 
 * 
 * 
 * The __SYNTAX( ) method return output php code, as a string.
 * 
 * see http://sfhati.com/engein/ for more information.
 * 
 * Notes :
 * # need PHP 5+
 * @author Bassam al-essawi <bassam.a.a.r@gmail.com>
 * @package sfhati
 * @subpackage fw
 * 
 */

/**
 * translate template code to php file and store it in cache folder to use as php files
 *
 * @param string $cache_path defult __DIR__ , full path for cache store php files output
 * @param boolean $write_source defult true , write template code in export php file as commant
 * @return string php code  
 */
class __LEZAZ {

    private $ALL_SYNTAX = '';
    public $cache_path = '';
    public $filename = '';
    public $plugin_dir = '';
    public $element = '';
    public $topcode='';
    
    public function __construct($cache_path = '', $plugin_dir = '') {
        if ($cache_path)
            $this->cache_path = $cache_path;
        else
            $this->cache_path = CACHE_PATH;
        if ($plugin_dir)
            $this->plugin_dir = $plugin_dir;
        else
            $this->plugin_dir = PLUGIN_PATH . 'lezaz/plugin/';
        // include all plugin
        if ($dh = opendir($this->plugin_dir)) {

            while (($file = readdir($dh)) !== false) {
                $ext = explode('.', $file);
                if ($file != '.' && $file != '..' && (filetype($this->plugin_dir . $file) != 'dir') && $ext[1] == 'php') {
                    $this->element[] = $ext[0];
                    include($this->plugin_dir . $file);
                }
            }
            closedir($dh);
        }
    }

    public function include_tpl($template_name) {
        global $lezaz;
        if (strpos($template_name, '}') || strpos($template_name, '/')) {
            $template_name = str_replace('{plugin}', PLUGIN_PATH, $template_name);
            $template_name = str_replace('{template}', TEMPLATE_PATH, $template_name);
            $template_name = str_replace('{tmp}', TMP_PATH, $template_name);
            $template_name = str_replace('{cache}', CACHE_PATH, $template_name);
            $template_name = str_replace('{uploaded}', UPLOADED_PATH, $template_name);
            $template_name = str_replace('{theme}', THEME_PATH, $template_name);
            $template_name = str_replace('//', '/', $template_name);
        } else {
            $template_name = THEME_PATH . $template_name;
        }
        $template_name = str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, $template_name);
        if (end(explode('.', $template_name)) != 'inc')
            $template_name = $template_name . '.inc';

        if (!file_exists($template_name)) {
            $_SESSION[error_template] = $template_name;
            $tempf = $lezaz->string->after_last(DIRECTORY_SEPARATOR, $template_name);
            if ($tempf)
                $template_name = str_replace($tempf, '404.inc', $template_name);
            else
                $template_name = '404.inc';
            if (!file_exists($template_name)) {
                $template_name = THEME_PATH . '404.inc';
            }
            if (!file_exists($template_name)) {
                return '[Template file not found]';
            }
        }

        $export_filename = $this->openfile($template_name);

        ob_start();
        include($export_filename);
        return ob_get_clean();
    }

    /**
     * open template file 
     *
     * @param string $templatefile full path for template file
     * @return string php code  
     */
    public function openfile($templatefile) {
        $_SESSION[topsyntax] = '';
        //check if exist file template
        if (!file_exists($templatefile))
            return 'File not found!';

        $export_php_file = $this->cache_path . md5($templatefile) . '_' . md5_file($templatefile) . '.php';
        //check if already translate 
        if (file_exists($export_php_file))
            return $export_php_file;

        $this->filename = $templatefile;

        //open file & get content to ALL_SYNTAX        
        $this->ALL_SYNTAX = implode(file($templatefile), '');

        // if there is php code will show as content in output
        $this->ALL_SYNTAX = str_replace(array('<?', '?>'), array('&lt;?', '?&gt;'), $this->ALL_SYNTAX);
        //start translate template code
        $this->topcode='';
        $t = $this->Syntax($this->ALL_SYNTAX);
        //check for all none html lezaz syntax with echo parameter

        $t = $this->GetSyantax($t);


        //delete old php files from cache folder
        $this->clearcache(md5($templatefile));
        //
        $t = '<?php global $lezaz;' . $this->topcode . '?>' . $this->GetSyantax($t);
        //write php file       
        $this->filewrite($export_php_file, $t);
        return $export_php_file;
    }

    /**
     * Clear php file from cache folder 
     * 
     *
     * @param string $file full path and file name     
     * @return none!  
     */
    private function clearcache($templatefile) {
        $dir = $this->cache_path;
        if ($dh = opendir($dir)) {

            while (($file = readdir($dh)) !== false) {
                $pathtemplate = explode('_', $file);
                if ($pathtemplate[0] == $templatefile) {
                    @unlink($dir . $file);
                }
            }
            closedir($dh);
        }
    }

    /**
     * translate syntax form template code      
     *
     * @param string $t syntax code
     * @return string php code  
     */
    private function Syntax($str) {
        if (!$str)
            return '';
        if (!is_array($this->element))
            return $str;
        $html = str_get_html($str);
        $elemant = '';
        foreach ($this->element as $elemnt) {
            if ($elemant)
                $elemant.=',lezaz:' . $elemnt;
            else
                $elemant = 'lezaz:' . $elemnt;
        }
        $e = $html->find($elemant, 0);
        if (!$e) {
            return $str;
        }
        $func = str_replace(':', "_", $e->tag);
        if (is_callable($func)) {
            foreach ($e->attr as $k => $v) {
                $attr[$k] = $this->GetSyantax($v, 1);
            }
            $e->outertext = $func($attr, $this->Syntax($e->innertext));
        } else
            $e->outertext = $e->innertext;

        $html->save();
        return $this->Syntax($html->outertext);
    }

    /**
     * pares first syntac form template code 
     *
     * @param string $t template code
     * @param bool $c print result or not!
     * @return array first syntax code , command
     * 
      lezaz~func(parm1,parm2) // for function call and echo result  its mean  func(parm1,parm2) <br>
      lezaz#id // echo value for lezaz syntax use id  its mean $lezaz_id<br>
      lezaz#id(parm) // echo value for lezaz syntax use id parameter  its mean  $lezaz_id_parm<br>
      lezaz$parm // echo $parm from php files  its mean $parm <br>
      lezaz$parm[item] // echo array item from $parm using in php files  its mean $parm[item] <br>
      lezaz:func(parm) // echo result from lezaz class its mean $lezaz->func(parm)<br>
     */
    private function GetSyantax($t, $c = 0) {

//lezaz#id(parm) /lezaz#([^\W]*[\(][^\)]*\))/igm
//lezaz#id      lezaz#([^\W]*)
//lezaz$parm lezaz$parm[item]              lezaz\$([\[|\]]?[^\W][\[|\]]?)*  
//lezaz:func(parm)            lezaz:([^\W]*[\(][^\)]*\))
        $t = $this->syntax_dolar($t, $c);
        $t = $this->syntax_hash($t, $c);
        $t = $this->syntax_func($t, $c);
        $t = $this->syntax_lezfunc($t, $c);



        return $t;
    }

    // find parameters array syntax like lezaz$id(parm)
    private function syntax_dolar($t, $c = 0) {
        if (!preg_match("/lezaz\\$([\[|\]]?[^\W][\[|\]]?)*/im", $t, $out, PREG_OFFSET_CAPTURE))
            return $t;
        $word = $out[0][0];
        $offset = $out[0][1];
        $code = str_replace('lezaz$', '$', $word);
        $this->topcode.="\n global $code; \n";
        if ($c) // come form html lezaz code as parameter
            $code = $code;
        else // need to print result , its form template as text 
            $code = '<?php echo ' . $code . '; ?>';
        $t = substr_replace($t, $code, $offset, strlen($word));
        return $this->syntax_dolar($t, $c);
    }

    // find function syntax like lezaz:get(key) 
    private function syntax_lezfunc($t, $c = 0) {
        if (!preg_match("/lezaz:([^\)]*\))/im", $t, $out, PREG_OFFSET_CAPTURE))
            return $t;
        $word = $out[0][0];
        $offset = $out[0][1];
        $code = str_replace('lezaz:', '$lezaz->', $word);
        preg_match('/\((.*)\)/', $word, $matches); // get parameter
        $code = str_replace($matches[0], '', $code);
        $param = explode(',', $matches[1]);
        if ($c) // come form html lezaz code as parameter
            $code = $code . '( "' . implode('","', $param) . '" )';
        else // need to print result , its form template as text 
            $code = '<?php echo ' . $code . '( "' . implode('","', $param) . '" ); ?>';
        $t = substr_replace($t, $code, $offset, strlen($word));
        return $this->syntax_lezfunc($t, $c);
    }

    // find parameters array syntax like lezaz$id(parm)
    private function syntax_hash($t, $c = 0) {
        if (!preg_match("/lezaz\#([\[|\]]?[^\W][\[|\]]?)*/im", $t, $out, PREG_OFFSET_CAPTURE))
            return $t;
        $word = $out[0][0];
        $offset = $out[0][1];
        $code = str_replace('lezaz#', '$lezaz_', $word);
        if ($c) // come form html lezaz code as parameter
            $code = $code;
        else // need to print result , its form template as text 
            $code = '<?php echo ' . $code . '; ?>';
        $t = substr_replace($t, $code, $offset, strlen($word));
        return $this->syntax_hash($t, $c);
    }

    // find function syntax like lezaz~get(key) 
    private function syntax_func($t, $c = 0) {
        if (!preg_match("/lezaz~([^\)]*\))/im", $t, $out, PREG_OFFSET_CAPTURE))
            return $t;
        $word = $out[0][0];
        $offset = $out[0][1];
        $code = str_replace('lezaz~', '', $word);
        preg_match('/\((.*)\)/', $word, $matches); // get parameter
        $code = str_replace($matches[0], '', $code);
        $param = explode(',', $matches[1]);

        if ($c) // come form html lezaz code as parameter
            $code = $code . '( "' . implode('","', $param) . '" )';
        else // need to print result , its form template as text 
            $code = '<?php echo ' . $code . '( "' . implode('","', $param) . '" ); ?>';

        $t = substr_replace($t, $code, $offset, strlen($word));
        return $this->syntax_func($t, $c);
    }

    /**
     * write output file php 
     * 
     *
     * @param string $file full path and file name
     * @param string $content php code content
     * @return none!  
     */
    private function filewrite($file, $content) {
        @unlink($file);
        $fp = fopen($file, 'w');
        $content = str_replace('{{this}}', str_replace(SITE_PATH, '/', dirname($this->filename)) . '/', $content);
        $content = str_replace('{{upload}}', UPLOADED_LINK, $content);
        $content = str_replace('{{plugin}}', PLUGIN_LINK, $content);
        $content = str_replace('{{template}}', TEMPLATE_LINK, $content);
        $content = str_replace('{{tmp}}', TMP_LINK, $content);
        $content = str_replace('{{theme}}', THEME_LINK, $content);
        if ($_SESSION[topsyntax])
            $content = '<?php ' . $_SESSION[topsyntax] . '?>' . $content;
        $_SESSION[topsyntax] = '';
        if (flock($fp, LOCK_EX | LOCK_NB)) {
            fwrite($fp, $content);
            fflush($fp);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

}
