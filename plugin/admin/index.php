<?php

$lezaz->set('ajxURL', '');
$lezaz->set('useajax', '0');
$lezaz->set('skin', 'no-skin');
$lezaz->set('user', 'admin');
if (!$_SESSION['language'])
    $_SESSION['language'] = 'en';
$lezaz->language($_SESSION['language']);

$lezaz->router(array('/admin/@*', 'admin'), function() use ($lezaz) {
    if ($_SESSION['member_permission'] != 'yes') {
        $lezaz->main_template = '{template}admin/login';
    } else {
        $lezaz->main_template = '{template}admin/index';
        $lezaz->set('noajaxpage', 'index');
        $lezaz->set('index', 'open');
        if ($lezaz->get('set_language')) {
            $_SESSION['language'] = $lezaz->get('set_language');
            $lezaz->go(SITE_LINK . 'admin/');
        }
    }
});

$lezaz->router('/admin/@str', function($b) use ($lezaz) {
    $lezaz->set('noajaxpage', $b);
    $lezaz->set('index', '');
    $lezaz->set($b . '_m', 'open');
    $lezaz->set($b, 'active');
});

$lezaz->listen('output.filter', function($output, $filtered) use($lezaz) {
    $search = array('{{ajxurl}}', '{plugin}', '{template}', '{tmp}', '{cache}', '{uploaded}', '{theme}');
    $replace = array($lezaz->get('ajxURL'), PLUGIN_LINK, TEMPLATE_LINK, TMP_LINK, CACHE_LINK, UPLOADED_LINK, THEME_LINK);


    $output = empty($filtered) ? $output : $filtered;
    return str_replace($search, $replace, $output);
});



// test input 
$lezaz->set("_MSG_text", "error");
$lezaz->set("_VAL_text", "maria al7elwa:)");
$lezaz->set("_VAL_use_ajax", "maria al7elwa:)");

