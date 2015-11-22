<?php

# [menu:"template.inc","class current","id root page , 0 if all root","this for this id , parent for parant page, root for root page"end menu]

function menu_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $vars[$v] = $syntaxcode->Syntax($var);
    }


    $TEMPLATE_link = THEME_PATH;
    $template = $vars[0];
    $pag_id = 0;
    if ($vars[1]) {
        $mnu_clss = $vars[1];
    } else {
        $mnu_clss = 'current active';
    }
    if ($vars[2]) {
        $pag_id = $vars[2];
    }
    if ($vars[3]) {
        if ($vars[3] == 'parent') {
            if ($pag_id == get_root_page_id($pag_id))
                return ''; // its not slave page , its parent!
            $pag_id = get_parent_page_id($pag_id);
        }
        if ($vars[3] == 'root') {
            $pag_id = get_root_page_id($pag_id);
        }
    }
    return "<?php get_pages_under_Tpage_id('$vars[0]', '$pag_id', \"page_place like '%$vars[0]%' and \", '$mnu_clss'); ?>";
}

function is_root_slave($id) {
    $row = @end(getResults("Select id,slave From pages where slave='$id'"));
    if ($row[id])
        return true;
    else
        return false;
}

function get_root_page_id($id) {
    $row = @end(getResults("Select id,slave From pages where id='$id'"));
    if ($row[slave] == 0) {
        return $row[id];
    } else {
        $row1 = @end(getResults("Select id From pages where id='$row[slave]'"));
        return get_root_page_id($row1[id]);
    }
}

function get_parent_page_id($id) {
    $row = @end(getResults("Select id,slave From pages where id='$id'"));
    return $row[slave];
}

function get_pages_under_Tpage_id($tem, $id = 0, $opt = '', $mnu_clss = 'current active') {
    $COLUMNS_ON_PAGES[] = 'id';
    $COLUMNS_ON_PAGES[] = 'page_name';
    $COLUMNS_ON_PAGES[] = 'page_cont';
    $COLUMNS_ON_PAGES[] = 'page_sort';
    $COLUMNS_ON_PAGES[] = 'page_place';
    $COLUMNS_ON_PAGES[] = 'page_active';
    $COLUMNS_ON_PAGES[] = 'last_update';
    $COLUMNS_ON_PAGES[] = 'linklabel';
    $COLUMNS_ON_PAGES[] = 'powers';
    $COLUMNS_ON_PAGES[] = 'template';
    $COLUMNS_ON_PAGES[] = 'description';
    $COLUMNS_ON_PAGES[] = 'image';
    $COLUMNS_ON_PAGES[] = 'image_name';
    $COLUMNS_ON_PAGES[] = 'url';
    $COLUMNS_ON_PAGES[] = 'slave';

    $ROOT_PATH_TEMPLATE = include_file_template($tem . "_root");
    $SUB_PATH_TEMPLATE = include_file_template($tem);
    $result = getResults("Select * From pages where $opt slave='$id' and page_active=1 $_SESSION[memarea] ORDER BY page_sort  ASC");
    if (is_array($result))
        foreach ($result as $row) {
            unset($old_var);
            unset($new_var);
            if ($row[id] == $_GET[id] || $row[id] == get_root_page_id($_GET[id]))
                $new_var[0] = $mnu_clss;
            else
                $new_var[0] = '';
            $old_var[0] = "%current%";
            foreach ($COLUMNS_ON_PAGES as $field) {
                if ($field == "image")
                    $row[$field] = SITE_LINK . "?image_thump=" . $row[id];
                if ($field == "url" && !$row[$field])
                    $row[$field] = SITE_LINK . "?id=" . $row[id];
                $old_var[] = '%' . $field . '%';
                $new_var[] = $row[$field];
            }
            if (is_root_slave($row[id]) && $ROOT_PATH_TEMPLATE) {
                $MENU_TEXT = str_replace($old_var, $new_var, $ROOT_PATH_TEMPLATE);
                $ALL_MENU_TEXT.= str_replace("%sub_here%", get_pages_under_Tpage_id($tem, $row[id]), $MENU_TEXT);
            } else
                $ALL_MENU_TEXT.= str_replace($old_var, $new_var, $SUB_PATH_TEMPLATE);
        }
    return $ALL_MENU_TEXT;
}
