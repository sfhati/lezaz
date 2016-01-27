<?php

if ($lezaz->post("EDIT_submit_member")) {
    $lezaz->set("VALIDATION__OPTION__username", " and id != '" . $lezaz->post("EDIT_submit_member") . "'");
}
$lezaz->set('ajxURL', '');
$lezaz->set('useajax', '0');
$lezaz->set('skin', 'no-skin');
$lezaz->set('user', 'admin');
if (!$_SESSION['language'])
    $_SESSION['language'] = 'en';
$lezaz->language('en');


$lezaz->router('/delete/@str/@num', function($tbl, $id) use ($lezaz) {
    if (is_root()) {
        echo ("$tbl, $id");
        $lezaz->db->delete($tbl, $id);
    }
    exit();
});

$lezaz->router(array('/@*', '/'), function() use ($lezaz) {
    if ($_SESSION['member_permission'] != 'yes') {
        $lezaz->main_template = 'login';
    } else {
        $lezaz->main_template = 'index';
        $lezaz->set('noajaxpage', 'index');
        $lezaz->set('index', 'open');
        if ($lezaz->set('set_language')) {
            $_SESSION['language'] = $lezaz->set('set_language');
            $lezaz->go(SITE_LINK . '/');
        }
    }
});

$lezaz->router('@str', function($b) use ($lezaz) {
    $lezaz->set('noajaxpage', $b);
    $lezaz->set('index', '');
    $lezaz->set($b . '_m', 'open');
    $lezaz->set($b, 'active');
});


$lezaz->listen('output.filter', function($output, $filtered) use($lezaz) {
    $search = array('{{ajxurl}}', '{plugin}', '{template}', '{tmp}', '{cache}', '{uploaded}', '{theme}');
    $replace = array($lezaz->set('ajxURL'), PLUGIN_LINK, TEMPLATE_LINK, TMP_LINK, CACHE_LINK, UPLOADED_LINK, THEME_LINK);

    $output = empty($filtered) ? $output : $filtered;
    return str_replace($search, $replace, $output);
});
