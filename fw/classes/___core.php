<?php

/**
 * Horus - a tiny & portable PHP 5 framework
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
class __CORE {
    public $plugin;
    
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
        $this->lezaz = new __LEZAZ;
        
    }

    public function __add($class, $name) {
        $this->$name = new $class;
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
        return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, SALT, base64_decode($string), MCRYPT_MODE_CBC, "\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0");
    }

  
}
