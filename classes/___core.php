<?php

/**
 * LEZAZ - a Nice & portable PHP 5 framework
 *
 * @author      bassam alessawi <bassam.a.a.r@gmail.com|fb.com/bassam.essa>
 * @copyright   2015 LEZAZ
 * @link        http://lezaz.org
 * @license     MIT LICENSE
 * @version     1.0.0
 * @package     Lezaz
 */
// ------------------------------------------

/**
 * __CORE
 * @package  Lezaz
 * @author   bassam alessawi
 * @since    1.0.0
 */
Class __CORE {

    public $plugin;
    public $events = array();
    protected $output = null;
    public $main_template = 'index';
    private $valriables = array();
    private $router_vars = array(
        '@num' => '([0-9\.,]+)',
        '@alpha' => '([a-zA-Z]+)',
        '@alnum' => '([a-zA-Z0-9\.\w]+)',
        '@str' => '([a-zA-Z0-9-_\.\w]+)',
        '@sstr' => '([a-zA-Z0-9-_\.\w\s]+)',
        '@*' => '(.*)',
        '@date' => '(([0-9]{1,2})\/([0-9]{1,2})\/(([0-9]{2})(.{0}|.{2})))',
        '@null' => '^');

    public function __construct() {
        // get all plugin active inside $plugin
        $dir = PLUGIN_PATH;
        if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..' && filetype($dir . $file) == 'dir') {
                    if (!file_exists($dir . $file . '/RJCT'))
                        $this->plugin[] = $file;
                }
            }
            closedir($dh);
        }
    }

    public function language($set = '') {
        if ($set) {
            $_SESSION['language'] = $set;
        } else {
            if ($_SESSION['language'])
                return $_SESSION['language'];
            $_SESSION['language'] = LANGUAGE;
            return $_SESSION['language'];
        }
    }

    public function add_router($key, $regex) {
        $this->router_vars[$key] = $regex;
    }

    public function __add($class, $name) {
        $this->$name = new $class;
    }

    public function set_tpl($tpl) {
        $this->main_template = $tpl;
    }

    public function __call($method, $args) {
        if (method_exists($this, $method)) {
            $reflection = new ReflectionMethod($this, $method);
            if (!$reflection->isPublic()) {
                throw new RuntimeException("Call to not public method " . get_class($this) . "::$method()");
            }

            return call_user_func_array(array($this, $method), $args);
        } else {
            throw new RuntimeException("Call to undefined method " . get_class($this) . "::$method()");
        }
    }

    public function encrypt($string) {
        if (!CRYPT_CACHE)
            return $string;
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_128, SALT, $string, MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"));
    }

    public function decrypt($string) {
        if (!CRYPT_CACHE)
            return $string;
        return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_128, SALT, base64_decode($string), MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0"));
    }

    public function include_plugin($file) {
        global $lezaz;
        if (is_array($this->plugin)) {
            foreach ($this->plugin as $plg) {
                if (file_exists(PLUGIN_PATH . $plg . "/{$file}.php")) {
                    $this->trigger('before.load.' . $file . '.' . $plg, 'arg_1');
                    include(PLUGIN_PATH . $plg . "/{$file}.php");
                    //echo PLUGIN_PATH . $plg . "/{$file}.php";
                }
            }
        }
    }

    /*     * ******************************** Events/Hooks *********************************** */

    /**
     * Listen an event
     * @param   string      $tag
     * @param   callback    $callback
     * @param   integer     $prority
     * @return  void
     */
    public function listen($tag, $callback, $prority = 0) {
        if (is_array($tag)) {
            foreach ($tag as $tags) {
                $this->events[$tags][$prority][] = $callback;
                ksort($this->events[$tags]);
            }
        } else {
            $this->events[$tag][$prority][] = $callback;
            ksort($this->events[$tag]);
        }
        
    }

    /**
     * Trigger event(s)
     * @param   string  $tag
     * @param   mixed   $params
     * @return  mixed
     */
    public function trigger($tag, $params = null, $default = null) {
        if (isset($this->events[$tag])) {
            $filtered = null;

            foreach (new ArrayIterator($this->events[$tag]) as $p => $callbacks) {
                foreach ($callbacks as $id => &$callback)
                    if (is_callable($callback))
                        $filtered = call_user_func_array($callback, array_merge((array) $params, array($filtered)));
            }

            return empty($filtered) ? $default : $filtered;
        }

        return $default;
    }

    /*     * ******************************* END/Events/Hooks/ ************************ */

    public function go($to = '', $using = 302) {
        $scheme = parse_url($to, PHP_URL_SCHEME);
        if (!$scheme) {
            $to = SITE_LINK . ( trim($to, '/'));
        }
        if (headers_sent())
            return call_user_func_array(__FUNCTION__, array($to, 'html'));

        @list($using, $after) = (array) explode(':', $using);

        switch (strtolower($using)):
            case 'html':
                echo('<meta http-equiv="refresh" content="' . (int) $after . '; URL=' . $to . '">');
                break;
            case 'js':
                echo('<script type="text/javascript">setTimeout(function(){window.location="' . $to . '";}, ' . (((int) $after) * 1000) . ');</script>');
                break;
            default:
                exit(header("Location: {$to}", true, $using));
        endswitch;
    }

    /**
     * Returns some statics
     * @return  object[float]
     */
    public function statics() {
        $statics = array();
        $statics['time'] = (float) round(microtime(1) - LEZAZ_START_TIME, 4);
        $statics['memory'] = (float) (memory_get_usage(1) / 1024);
        $statics['memory-peak'] = (float) (memory_get_peak_usage(1) - LEZAZ_START_PEAK_MEM);

        if (function_exists('sys_getloadavg')) {
            $sys_load = sys_getloadavg();
            $statics['cpu'] = $sys_load[0];
        }

        return $statics;
    }

    public function router($path, $callback) {
        if (is_array($path)) {
            foreach ($path as $pathx) {
                if ($this->router($pathx, $callback) != 'x') {
                    return '';
                }
            }
            return '';
        }
        $filtered = null;

        $trimed_path = strtolower(rtrim(ltrim($path, '/'), '/'));
        $trimed_xpath = strtolower(rtrim(ltrim($_GET['directory_lezaz'], '/'), '/'));
        $pattern = str_replace('\\\\', '\\', addcslashes(str_ireplace(array_keys($this->router_vars), array_values($this->router_vars), $trimed_path), '/'));
        $pattern = "/^{$pattern}$/";

        if (preg_match($pattern, $trimed_xpath, $args)) {
            if (is_callable($callback)) {
                array_shift($args);
                $filtered = call_user_func_array($callback, $args);
                return $filtered;
            } else {
                $this->main_template = $callback;
            }
        }
        return 'x';
    }

    public function set($k, $v = '') {
        if ($v)
            $this->valriables[$k] = &$v;
        else
            return $this->valriables[$k];
        return false;
    }

    public function get($k, $validate = '') {
        if (!isset($_GET[$k]))
            return false;
        if (!$validate) {
            if ($this->setting('VALIDATION__' . $k)) {
                $validate = $this->setting('VALIDATION__' . $k);
            }
        }
        if ($validate) {
            $option = $this->set('VALIDATION__OPTION__' . $k);
            if ($this->validaition($validate, $_POST[$k], $option)) {
                return $_GET[$k];
            }
            $this->set("_MSG_" . $k, 'error');
            return false;
        }
        return $_GET[$k];
    }

    public function post($k, $validate = '') {

        if (!isset($_POST[$k]))
            return false;
        if (!$validate) {
            if ($this->setting('VALIDATION__' . $k)) {
                $validate = $this->setting('VALIDATION__' . $k);
            }
        }
        if ($validate) {
            $option = $this->set('VALIDATION__OPTION__' . $k);
            if ($this->validaition($validate, $_POST[$k], $option)) {
                return $_POST[$k];
            }
            $this->set("_MSG_" . $k, 'error');
            return false;
        }
        return $_POST[$k];
    }

    public function sess($k, $i = '') {
        if (isset($_SESSION[$k]) && $i)
            return $_SESSION[$k][$i];
        if (isset($_SESSION[$k]))
            return $_SESSION[$k];
        return '';
    }

    public function cons($k, $i = '') {
        if (defined($k) && $i)
            return eval("echo {$k}[$i];");
        if (defined($k))
            return eval("echo {$k};");
        return '';
    }

    public function setsetting($parametr, $value = '') {
        $content = null;
        $settin_file = THEME_PATH . 'setting.ini';
        if (file_exists($settin_file)) {
            $settings = file_get_contents($settin_file);
            $settings = explode('{%$$$%}', $settings);
            foreach ($settings as $sett) {
                $settkv = explode('^^^', $sett);
                if (trim($settkv[0]) && trim($settkv[1])) {
                    $content[$settkv[0]] = $settkv[1];
                }
            }
        }

        $settkey = $this->encrypt($parametr);
        $settval = $this->encrypt($value);
        $content[$settkey] = $settval . "{%$$$%}";
        if (!$value)
            unset($content[$settkey]);
        foreach ($content as $k => $v) {
            $contentx.="$k^^^$v{%$$$%}";
        }
        $this->file->write($settin_file, $contentx);
        return '';
    }

    public function setting($key, $defult = '') {
        $settin_file = THEME_PATH . 'setting.ini';
        if (file_exists($settin_file)) {
            $settings = file_get_contents($settin_file);
            $settings = explode('{%$$$%}', $settings);

            foreach ($settings as $sett) {
                $settkv = explode('^^^', $sett);
                if (trim($this->decrypt($settkv[0])) == trim($key)) {
                    return $this->decrypt($settkv[1]);
                }
            }
        }
        return $defult;
    }

    function address() {
        /*         * * check for https ** */
        $protocol = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
        /*         * * return the full address ** */
        $return = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if (strpos($return, "?")) {
            $return = rtrim($return, '&');
            if (substr($return, -1) != '?')
                $return.="&";
        }else {
            $return.="?";
        }
        return $return;
    }

    function lezaz_path($template_name, $link = 0) {
        $arr_path = array(PLUGIN_PATH, TEMPLATE_PATH, TMP_PATH, CACHE_PATH, UPLOADED_PATH, THEME_PATH);
        $arr_link = array(PLUGIN_LINK, TEMPLATE_LINK, TMP_LINK, CACHE_LINK, UPLOADED_LINK, THEME_LINK);
        $arr_tbl = array('{plugin}', '{template}', '{tmp}', '{cache}', '{uploaded}', '{theme}');

        if (strpos($template_name, '}')) {
            if ($link) {
                $template_name = str_replace($arr_tbl, $arr_link, $template_name);
            } else {
                $template_name = str_replace($arr_tbl, $arr_path, $template_name);
            }
        } else {
            if ($link) {
                $template_name = THEME_LINK . $template_name;
            } else {
                $template_name = THEME_PATH . $template_name;
            }
        }


        return $template_name;
    }

    function convert_path($template_name, $link = 0) {
        $arr_path = array(PLUGIN_PATH, TEMPLATE_PATH, TMP_PATH, CACHE_PATH, UPLOADED_PATH, THEME_PATH);
        $arr_link = array(PLUGIN_LINK, TEMPLATE_LINK, TMP_LINK, CACHE_LINK, UPLOADED_LINK, THEME_LINK);
        if ($link) {
            $template_name = str_replace($arr_link, $arr_path, $template_name);
        } else {
            $template_name = str_replace($arr_path, $arr_link, $template_name);
        }
        return $template_name;
    }

    public function set_msg($msg, $type) {
        $_SESSION['lezaz_msseges'][$type].=$msg;
    }

    public function msg() {
        $alert['danger'] = 'times';
        $alert['success'] = 'check';
        $alert['warning'] = 'ban';
        $alert['info'] = 'exclamation';
        if (is_array($_SESSION['lezaz_msseges'])) {
            foreach ($_SESSION['lezaz_msseges'] as $type => $msg) {
                $m.='<div class="alert alert-' . $type . '">
                        <button type="button" class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                        </button>

                        <strong>
                                <i class="ace-icon fa fa-' . $alert[$type] . '"></i>
                                [' . $type . ']
                        </strong>

                        ' . $msg . '
                        <br>
                </div>';
            }
        }
        return $m;
    }

    public function validaition($syntax, $str, $options = '') {
        global $lezaz;
        foreach (explode(';', $syntax) as $valid) {
            $varchek = explode(':', $valid);
            $varchek1 = strtolower(trim($varchek[0]));
            $varchek2 = strtolower(trim($varchek[1]));

            switch ($varchek1) {
                case 'optional':
                case 'o':
                    if (!$str)
                        return true;

                case 'required':
                case 'r':
                    if (!$str) {
                        $lezaz->set_msg('[ERR_required]', 'warning');
                        return FALSE;
                    }
                    break;
                case 'length':
                case 'l':
                    if (strlen($str) != $varchek2) {
                        $lezaz->set_msg('[ERR_length]', 'warning');
                        return FALSE;
                    }
                    break;
                case 'min':
                case 'm':
                    if (strlen($str) < $varchek2) {
                        $lezaz->set_msg('[ERR_min]' . $varchek2, 'warning');
                        return FALSE;
                    }
                    break;
                case 'max':
                case 'x':
                    if (strlen($str) > $varchek2) {
                        $lezaz->set_msg('[ERR_max]' . $varchek2, 'warning');
                        return FALSE;
                    }
                    break;
                case 'email':
                case 'e':
                    if (!preg_match("/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i", $str)) {
                        $lezaz->set_msg('[ERR_email]', 'warning');
                        return FALSE;
                    }
                    break;
                case 'url':
                case 'u':
                    if (!preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $str)) {
                        $lezaz->set_msg('[ERR_url]', 'warning');
                        return FALSE;
                    }
                    break;

                case 'date':
                case 'd':
                    $split = explode('-', $str);
                    if (!preg_match("/\d{2}\-\d{2}-\d{4}/", $str) && !checkdate($split[1], $split[2], $split[0])) {
                        $lezaz->set_msg('[ERR_date]', 'warning');
                        return FALSE; // format dd-mm-yyyy
                    }
                    break;


                case 'number':
                case 'n':
                    if (!is_numeric($str)) {
                        $lezaz->set_msg('[ERR_number]', 'warning');
                        return FALSE;
                    }
                    if ($varchek2) {
                        $mnmx = explode(',', $varchek2);
                        if (is_numeric($mnmx[0]) && $str <= $mnmx[0]) {
                            $lezaz->set_msg($str . '[ERR_numberMin]' . $mnmx[0], 'warning');
                            return FALSE;
                        }
                        if (is_numeric($mnmx[1]) && $str >= $mnmx[1]) {
                            $lezaz->set_msg($str . '[ERR_numberMax]' . $mnmx[1], 'warning');
                            return FALSE;
                        }
                    }
                    break;

                case 'tablein':
                case 'ti':
                    $feild = explode(',', $varchek2);
                    //  $lezaz->set_msg($lezaz->db->row($feild[0], "`$feild[1]`='$str' $options", $feild[1]),'warning');
                    if ($lezaz->db->row($feild[0], "`$feild[1]`='$str' $options", $feild[1])) {
                        $lezaz->set_msg('[ERR_tableIn]', 'warning');
                        return FALSE;
                    }
                    break;
                case 'tableout':
                case 'to':
                    $feild = explode(',', $varchek2);
                    if (!$lezaz->db->row($feild[0], "`$feild[1]`='$str' $options", $feild[1])) {
                        $lezaz->set_msg('[ERR_tableOut]', 'warning');
                        return FALSE;
                    }
                    break;
            }
        }

        return true;
    }

    public function run() {
        $this->trigger('layer.init.start');
        $this->include_plugin('init');
        $this->trigger('layer.init.done');
        if ($_SESSION['LEZAZ_start'] == 'gr9fk4fdd') {
            $_SESSION['LEZAZ_start'] = 'gr9fk4fdd1';
            $this->trigger('new.guset');
        }

        if ($_SESSION['LEZAZ_start'] != 'gr9fk4fdd' && $_SESSION['LEZAZ_start'] != 'gr9fk4fdd1') {
            $_SESSION['LEZAZ_start'] = 'gr9fk4fdd';
            $this->trigger('session.guset');
        }

        if ($_SESSION['LEZAZ_start'] == 'gr9fk4fdd1')
            $this->trigger('requset.guset');


        $this->trigger('layer.index.start');
        $this->include_plugin('index');
        $this->trigger('layer.index.done');
        $this->trigger('layer.footer.start');
        $this->include_plugin('footer');
        $this->trigger('layer.footer.done');




        $print = $this->lezaz->include_tpl($this->main_template);
        $print = $this->trigger('output.filter', $print, $print);
        $this->trigger('requset.end', '');

        $this->trigger('layer.term.start');
        $this->include_plugin('term');
        $this->trigger('layer.term.done');
        // clear all messages!
        $_SESSION['lezaz_msseges'] = '';
        unset($_SESSION['lezaz_msseges']);

        return $print;
    }

}
