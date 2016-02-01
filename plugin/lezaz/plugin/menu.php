<?php

function lezaz_menu($vars, $html) {
    global $lezaz;
    $return = '';
    $class = '';
    $aclass = '';
    $declear = $lezaz->lezaz->declear['menu_' . $vars['id']];
    //permetion="is_root() || is_editor() ||  is_department()"
    if ($vars['permetion']) {
        $if_syntax1 = '<?php if(' . $vars['permetion'] . '){ ?>';
        $if_syntax2 = '<?php } ?>';
    }

    if (is_array($declear)) {
        foreach ($declear as $attrs) {
            $set.='lezaz:set(' . $attrs['id'] . ') ';
        }

        $class = "dropdown-toggle";
        $aclass = '<b class="arrow fa fa-angle-down"></b>';
        $return = "<ul class='submenu'>$html</ul>";
    }
    $return = $if_syntax1 . '
    <li class="lezaz:set(' . $vars['id'] . ') ' . $set . '">
        <a href="/' . $vars['url'] . '" class="' . $class . '">
            <i class="menu-icon fa ' . $vars['icon'] . '">' . $vars['text-icon'] . '</i>
            <span class="menu-text"> ' . $vars['text'] . ' </span>
            ' . $aclass . '
        </a>
        <b class="arrow"></b>
        ' . $return . '
    </li> 
' . $if_syntax2;




    return $return;
}
