<?php

/* Function to parse the multidimentional array into a more readable array 
 * Got help from stackoverflow with this one:
 *    http://stackoverflow.com/questions/11357981/save-json-or-multidimentional-array-to-db-flat?answertab=active#tab-top
 */

function parseJsonArray($jsonArray, $parentID = 0) {
    $return = array();
    foreach ($jsonArray as $subArray) {
        $returnSubSubArray = array();
        if (isset($subArray['children'])) {
            $returnSubSubArray = parseJsonArray($subArray['children'], $subArray['id']);
        }
        $return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
        $return = array_merge($return, $returnSubSubArray);
    }

    return $return;
}

// Dump the array to debug
//var_dump(parseJsonArray($jsonDecoded));
// Run the function above






function menu_showNested($parentID, $lng = 'en') {
    global $lezaz;
    $result = $lezaz->db->query("SELECT * FROM pages WHERE parent_id='$parentID' and menu='1' ORDER BY rang");
    $numRows = $lezaz->db->num_row("SELECT * FROM pages WHERE parent_id='$parentID' and menu='1' ORDER BY rang");

    if ($numRows > 0) {
        echo "\n";
        echo "<ol class='dd-list'>\n";

        if (is_array($result))
            foreach ($result as $row) {
                echo "\n";
                echo "<li class='dd-item' data-id='{$row['id']}'>\n";
                echo "<div class='dd-handle'>{$row['page_name_en']} | {$row['page_name_ar']}</div>\n";
                // Run this function again (it would stop running when the mysql_num_result is 0
                menu_showNested($row['id']);

                echo "</li>\n";
            }
        echo "</ol>\n";
    }
}

function menu_show($parentID, $lng = 'en') {
    global $lezaz;
    $result = $lezaz->db->query("SELECT * FROM pages WHERE parent_id='$parentID' and page_name_{$lng}!='' and menu='1' ORDER BY rang");
    $numRows = $lezaz->db->num_row("SELECT * FROM pages WHERE parent_id='$parentID'  and page_name_{$lng}!=''  and menu='1' ORDER BY rang");

    if ($numRows > 0) {
        echo "\n";
        echo "<ul>\n";

        if (is_array($result))
            foreach ($result as $row) {
            $class='';
                echo "\n";
                if ($_GET[id] == $row['id']) {
                    echo "<li>\n";
                    $class='active';
                } else {
                    echo "<li>\n";
                }
                if ($row['url_'.$lng]) {
                    echo "<a href='".$row['url_'.$lng]."' class='$class'>" . $row['page_name_' . $lng] . "</a>\n";
                } else {
                    echo "<a href='" . $row['smarturl_' . $lng] . "/'  class='$class'>" . $row['page_name_' . $lng] . "</a>\n";
                }
                menu_show($row['id'], $lng);
                echo "</li>\n";
            }
        echo "</ul>\n";
    }
}

function check_parent($id) {
    global $lezaz;
    if ($_GET[id])
        return $lezaz->db->row("pages", $_GET[id], 'parent_id');
}
