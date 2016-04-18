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

    function save($file, $saveto = '', $validation = '') {
        global $lezaz;
         $ext = end(explode('.', $file['name']));

if(is_array($validation)){
        if (is_array($validation['whitelist']))
            if (!in_array($ext, $validation['whitelist'])) {
                $lezaz->set_msg('[ERR_TYPE]' . $file['name'] . '<br>', 'danger');
                return FALSE;
            }
        if (is_array($validation['blacklist']))
            if (in_array($ext, $validation['blacklist'])) {
                $lezaz->set_msg('[ERR_TYPE]' . $file['name'] . '<br>', 'danger');
                return FALSE;
            }
            $file_size=$file['size'] / 1000;
        if (is_array($validation['size']))
            if ($file_size < $validation['size'][0] || $file_size > $validation['size'][1]) {
                $lezaz->set_msg('[ERR_SIZE]' . $file['name']. ':' .  $file_size . 'KB<br>', 'danger');
                return FALSE;
            }
}
        if (!$ext) {
            $lezaz->set_msg('[ERR_FILENAME]: ' . $file['name'] . '<br>', 'danger');
            return FALSE;
        }
        $saveto = UPLOADED_PATH . $saveto . '/';
        if (!$this->mkdir($saveto)) {
            $lezaz->set_msg('[ERR_PERMITIONFOLDER]', 'danger');
            return FALSE;
        }
        $fn = time() . '.' . $ext;
        copy($file['tmp_name'], $saveto . $fn);
        return $fn;
    }

    function mkdir($path) {
        $path = str_replace('\\', '/', $path);
        if (is_dir($path))
            return true;
        $prev_path = substr($path, 0, strrpos($path, '/', -2) + 1);
        $return = $this->mkdir($prev_path);
        return ($return && is_writable($prev_path)) ? @mkdir($path) : false;
    }

    function write($file, $content) {
        if(!$file) return false;
        @unlink($file);
        $this->mkdir(dirname($file));
        if(!is_dir(dirname($file))) return false;
        $fp = fopen($file, 'w');
        if (flock($fp, LOCK_EX | LOCK_NB)) {
            fwrite($fp, $content);
            fflush($fp);
            flock($fp, LOCK_UN);
        }
        fclose($fp);
    }

    function listfile($dir, $ext = '', $sub = 0) {
        $listDir = array();
        if (!is_dir($dir))
            return $listDir;
        if ($handler = opendir($dir)) {
            while (($file = readdir($handler)) !== FALSE) {
                if ($file != "." && $file != "..") {
                    if (is_file($dir . $file)) {
                        if ($ext) {
                            if (end(explode('.', $file)) == $ext)
                                $listDir[$dir][] = $file;
                        }else {
                            $listDir[$dir][] = $file;
                        }
                    } else if (is_dir($dir . $file . '/')) {
                        if (!$sub)
                            $listDir = array_merge_recursive($listDir, $this->listfile($dir . $file . '/', $ext));
                    }
                }
            }
            closedir($handler);
        }
        return $listDir;
    }

    function view($cachefile) {
        if (file_exists($cachefile)) {
            header('Content-Type: text/html; charset=UTF-8');
            echo implode(file($cachefile), '');
            exit();
        }
    }

}
