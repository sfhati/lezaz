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






/* * ******************** Menu ------------------------------------- */
$menu_array[1] = 'Scope';

$menu_array[2] = 'Normative references';
$menu_array[3] = 'Terms and definition';
$menu_array[4][0] = 'Context of the organization';
$menu_array[4][1] = 'Organization context';
$menu_array[4][2] = 'needs & expectations';
$menu_array[4][3] = 'Scope of the OH&S';
$menu_array[4][4] = 'Oh&S management system';

$menu_array[5][0] = 'Leadership';
$menu_array[5][1] = 'Leadership & commitment';
$menu_array[5][2] = 'Policy';
$menu_array[5][3] = 'Roles & authorities';

$menu_array[6][0] = 'Planning';
$menu_array[6][1][0] = 'Action & opportunities';
$menu_array[6][1][1] = 'General';
$menu_array[6][1][2] = 'Hazard identification';
$menu_array[6][1][3] = 'Determination of legal';
$menu_array[6][1][4] = 'Assessment of risks';
$menu_array[6][1][5] = 'Planning for change';
$menu_array[6][1][6] = 'Planning to take action';
$menu_array[6][2] = 'OH&S objectives';

$menu_array[7][0] = 'Support';
$menu_array[7][1] = 'Resources';
$menu_array[7][2] = 'Competence';
$menu_array[7][3] = 'Awareness';
$menu_array[7][4] = 'Information & consultation';
$menu_array[7][5] = 'Documented';

$menu_array[8][0] = 'Operations';
$menu_array[8][1][0] = 'Operational planning & control';
$menu_array[8][1][1] = 'General';
$menu_array[8][1][2] = 'Hierarchy of control';
$menu_array[8][2] = 'Management of change';
$menu_array[8][3] = 'Outsourcing';
$menu_array[8][4] = 'Procurement';
$menu_array[8][5] = 'Contractors';
$menu_array[8][6] = 'Emergency & response';

$menu_array[9][0] = 'Performance evaluation';
$menu_array[9][1][0] = 'Monitoring';
$menu_array[9][1][1] = 'General';
$menu_array[9][1][2] = 'Evaluation of compliance';
$menu_array[9][2][0] = 'Internal audit';
$menu_array[9][2][1] = 'Objective';
$menu_array[9][2][2] = 'Process';
$menu_array[9][3] = 'Management review';

$menu_array[10][0] = 'Improvement';
$menu_array[10][1] = 'Incident & corrective action';
$menu_array[10][2] = 'Continual improvement';
$test='<lezaz:menu text="Improvement" under="root" url="/h/y/t" icon="trash-o" text-icon="1.1"/>';
$lezaz->set('Main_Menu', menu_make($menu_array));

// echo menu_make($menu_array);


function menu_make($arr, $key = '') {
    foreach ($arr as $k => $v) {
        $KK = '';
        if (is_array($v)) {
            if ($key)
                $KK = "$key.$k";
            else
                $KK = $k;
            $return.='					<li class="lezaz:set(4_m) lezaz:set(4_1_m) lezaz:set(4_2_m)">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa">' . $KK . '</i>
							<span class="menu-text"> ' . $v[0] . ' </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">

';

            $return.= menu_make($v, $KK);
            $return.='						</ul>
					</li>
';
        }else {
            if ($key && $k)
                $KK = "$key.$k";
            else if ($key)
                $KK = "$key";
            else if ($k)
                $KK = "$k";
            if ($k) {
                $return.=
                        '							<li class="lezaz:set(' . $KK . ')">
								<a href="/4_1">
									<i class="menu-icon fa fa">' . $KK . '</i>
									' . $v . '
								</a>
								<b class="arrow"></b>
							</li>
';
            }
        }
    }
    return $return;
}
