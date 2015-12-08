<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of __file
 *
 * @author bassam
 */
class __file {

    function _save($file, $saveto = '', $validation = '') {
        if ($validation[type] == 'img') {
            if ($file[type] != "image/gif" && $file[type] != "image/png" && $file[type] != "image/jpg" && $file[type] != "image/jpeg") {
                set_msg('[ERR_TYPE]', 1);
                return FALSE;
            }
        }
        if ($validation[size]) {
            $validation[size] = $validation[size] * 1000;
            if ($file[size] > $validation[size]) {
                set_msg('[ERR_SIZE]', 1);
                return FALSE;
            }
        }
        $ext = end(explode('.', $file[name]));
        if (!$ext) {
            set_msg('[ERR_FILENAME]', 1);
            return FALSE;
        }
        $saveto = UPLOADED_PATH . $saveto . '/';
        if (!$this->make_path($saveto)) {
            //set_msg('[ERR_PERMITIONFOLDER]', 1);
            return FALSE;
        }
        $fn = time() . '.' . $ext;
        copy($file[tmp_name], $saveto . $fn);
        return $fn;
    }

    function _mkdir($path) {
        $path = str_replace('\\', '/', $path);
        if (is_dir($path))
            return true;
        $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
        $return = $this->make_path($prev_path);
        return ($return && is_writable($prev_path)) ? mkdir($path) : false;
    }

    function _write($file, $content) {
        @unlink($file);
        $fp = fopen($file, 'w');
        if (flock($fp, LOCK_EX | LOCK_NB)) {
            fwrite($fp, $content);
            fflush($fp);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

    function _list($dir) {
        $listDir = array();
        if ($handler = opendir($dir)) {
            while (($sub = readdir($handler)) !== FALSE) {
                if ($sub != "." && $sub != ".." && $sub != '.svn') {
                    if (is_file($dir . $sub)) {
                        $listDir[$sub] = $dir . $sub;
                    } else if (is_dir($dir . $sub . '/')) {
                        $listDir = array_merge_recursive($listDir, $this->file_list($dir . $sub . '/'));
                    }
                }
            }
            closedir($handler);
        }
        return $listDir;
    }

    function _print($cachefile) {
        if (file_exists($cachefile)) {
            header('Content-Type: text/html; charset=UTF-8');
            echo implode(file($cachefile), '');
            exit();
        }
    }

}
