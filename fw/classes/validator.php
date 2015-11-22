<?php

function validation_register($var, $valid) {
    $_SESSION['validaition'][$var][$valid] = $valid;
}

/* validation_register('bassam1', 'o');
  validation_register('bassam1', 'l:5');
  validation_register('bassam1', 'm:3');
  validation_register('bassam1', 'x:10');
  validation_register('bassam1', 'email');
  validation_register('bassam1', 'url');
  validation_register('bassam1', 'n:4,10');
  validation_register('bassam1', 'n:r,10');
  validation_register('bassam1', 'ti:members,name');
  validation_register('bassam1', 'to:members,name');
  validation_register('bassam1', 'd');
  $testc = '';
 */

function validation_check($var, $str , $options='') {
            $haverr = false;
    if(is_array($_SESSION['validaition'][$var])) foreach ($_SESSION['validaition'][$var] as $valid) {
        $varchek = explode(':', $valid);
        $varchek1 = strtolower(trim($varchek[0]));
        $varchek2 = strtolower(trim($varchek[1]));

        switch ($varchek1) {
            case 'optional':
            case 'o':
                if (!$str)
                    return false;

            case 'required':
            case 'r':
                if (!$str) {
                    set_msg('[ERR_required]', 1);
                    $haverr = true;
                }
                break;
            case 'length':
            case 'l':
                if (strlen($str) != $varchek2) {
                    set_msg('[ERR_length]', 1);
                    $haverr = true;
                }
                break;
            case 'min':
            case 'm':
                if (strlen($str) < $varchek2) {
                    set_msg('[ERR_min]', 1);
                    $haverr = true;
                }
                break;
            case 'max':
            case 'x':
                if (strlen($str) > $varchek2) {
                    set_msg('[ERR_max]', 1);
                    $haverr = true;
                }
                break;
            case 'email':
            case 'e':
                if (!preg_match("/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i", $str)) {
                    set_msg('[ERR_email]', 1);
                    $haverr = true;
                }
                break;
            case 'url':
            case 'u':
                if (!preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $str)) {
                    set_msg('[ERR_url]', 1);
                    $haverr = true;
                }
                break;

            case 'date':
            case 'd':
                $split = explode('-', $str);
                if (!preg_match("/\d{2}\-\d{2}-\d{4}/", $str) && !checkdate($split[1], $split[2], $split[0])) {
                    set_msg('[ERR_date]', 1);
                    $haverr = true; // format dd-mm-yyyy
                }
                break;


            case 'number':
            case 'n':
                if (!is_numeric($str)) {
                    set_msg('[ERR_number]', 1);
                    $haverr = true;
                }
                if ($varchek2) {
                    $mnmx = explode(',', $varchek2);
                    if (is_numeric($mnmx[0]) && $str <= $mnmx[0]) {
                        set_msg('[ERR_numberMin]', 1);
                        $haverr = true;
                    }
                    if (is_numeric($mnmx[1]) && $str >= $mnmx[1]) {
                        set_msg('[ERR_numberMax]', 1);
                        $haverr = true;
                    }
                }
                break;

            case 'tablein':
            case 'ti':
                $feild = explode(',', $varchek2);               
                if (check_db($feild[0], "`$feild[1]`='$str' $options", $feild[1])) {
                    set_msg('[ERR_tableIn]', 1);
                    $haverr = true;
                }
                break;
            case 'tableout':
            case 'to':
                $feild = explode(',', $varchek2);
                if (!check_db($feild[0], "`$feild[1]`='$str' $options", $feild[1])) {
                    set_msg('[ERR_tableOut]', 1);
                    $haverr = true;
                }
                break;
        }
    }

    return $haverr;
}

/**
 * Validator class 
 * Let simplify the validation :) 
 */
class Validator {

    private static function helper($string, $exclude = "") {
        if (empty($exclude))
            return false;
        if (is_array($exclude)) {
            foreach ($exclude as $text) {
                if (strstr($string, $text))
                    return true;
            }
        } else {
            if (strstr($string, $exclude))
                return true;
        }
        return false;
    }

    private static function numberBetween($integer, $max = null, $min = 0) {
        if (is_numeric($min) && $integer <= $min)
            return false;
        if (is_numeric($max) && $integer >= $max)
            return false;
        return true;
    }

    public static function Email($string, $exclude = "") {
        if (self::helper($string, $exclude))
            return false;
        return (bool) preg_match("/^([a-z0-9])(([-a-z0-9._])*([a-z0-9]))*\@([a-z0-9])(([a-z0-9-])*([a-z0-9]))+(\.([a-z0-9])([-a-z0-9_-])?([a-z0-9])+)+$/i", $string);
    }

    public static function Url($string, $exclude = "") {
        if (self::helper($string, $exclude))
            return false;
        return (bool) preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $string);
    }

    public static function Ip($string) {
        return (bool) preg_match("/^(1?\d{1,2}|2([0-4]\d|5[0-5]))(\.(1?\d{1,2}|2([0-4]\d|5[0-5]))){3}$/", $string);
    }

    public static function Number($integer, $max = null, $min = 0) {
        if (preg_match("/^\-?\+?[0-9e1-9]+$/", $integer)) {
            if (!self::numberBetween($integer, $max, $min))
                return false;
            return true;
        }
        return false;
    }

    public static function UnsignedNumber($integer) {
        return (bool) preg_match("/^\+?[0-9]+$/", $integer);
    }

    public static function Float($string) {
        return (bool) ($string == strval(floatval($string))) ? true : false;
    }

    public static function Alpha($string) {
        return (bool) preg_match("/[a-z0-9][a-z]+/", $string);
    }

    public static function AlphaNumeric($string) {
        return (bool) preg_match("/^[0-9a-zA-Z]+$/", $string);
    }

    public static function Chars($string, $allowed = array("a-z")) {
        return (bool) preg_match("/^[" . implode("", $allowed) . "]+$/", $string);
    }

    public static function Length($string, $max = null, $min = 0) {
        $length = strlen($string);
        if (!self::numberBetween($length, $max, $min))
            return false;
        return true;
    }

    public static function FilesizeBetween($file, $max = null, $min = 0) {
        $filesize = filesize($file);
        return self::numberBetween($filesize, $max, $min);
    }

    public static function ImageSizeBetween($image, $max_width = "", $min_width = 0, $max_height = "", $min_height = 0) {
        $size = getimagesize($image);
        if (!self::numberBetween($size[0], $max_width, $min_width))
            return false;
        if (!self::numberBetween($size[1], $max_height, $min_height))
            return false;
        return true;
    }

}
