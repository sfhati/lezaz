<?php

/* language file create */

function createlangfile() {
    $dhash = '';
    if (!is_root())
        return '';

    foreach (get_plugin() as $plug) {
        $plug=trim($plug);
        if (file_exists(PLUGIN_PATH .$plug. "/lang/" . $_SESSION['lng_CH'])) {
            $dhash.=hash_file('md5', PLUGIN_PATH .$plug. "/lang/" . $_SESSION['lng_CH']);
        }
    }

    $tmp_lang = TMP_PATH . 'LANGUAGE_' . $_SESSION['lng_CH'] . '.txt';
    if (get_cache('langhash') == md5($dhash) && file_exists($tmp_lang)) {
        return '';
    }

    foreach (get_plugin() as $plug) {
        $plug=trim($plug);
        if (file_exists(PLUGIN_PATH .$plug. "/lang/" . $_SESSION['lng_CH'])) {
            $_LANGUAGE_X.= "\n" . file_get_contents(PLUGIN_PATH .$plug. "/lang/" . $_SESSION['lng_CH']);
        }
    }
    filewrite($tmp_lang, $_LANGUAGE_X);
    set_cache('langhash', md5($dhash));
    return 'done';
}

/* Translate function */

function CHNG_LANGUAGE($text_TR) {
    $lin_rpl_frm[] = "\n";
    $lin_rpl_frm[] = "\r";
    $_LANGUAGE_X = array();
    $tmp_lang = TMP_PATH . 'LANGUAGE_' . $_SESSION['lng_CH'] . '.txt';
    if (file_exists($tmp_lang)) {
        $_LANGUAGE_X = file($tmp_lang);
        foreach ($_LANGUAGE_X as $_LANGUAGE_V) {
            
            $_LANGUAGE_K = explode("=", $_LANGUAGE_V);
            if(trim($_LANGUAGE_K[0]) && trim($_LANGUAGE_K[1])){
            $_LANGUAGE_V = str_replace($_LANGUAGE_K[0] . '=', '', $_LANGUAGE_V);
            $text_TR = str_replace('[' . $_LANGUAGE_K[0] . ']', str_replace($lin_rpl_frm, '', $_LANGUAGE_V), $text_TR);
            }
        }
    }
    return $text_TR;
}

