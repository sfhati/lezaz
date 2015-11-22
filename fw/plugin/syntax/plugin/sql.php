<?php

// [sql:"id","sql","show rows number","content like : 
//      %id:% >> print style 1 or 2 
//      %id:#% >> print counter row starting from 1
//      %id:field% >> print echo $row[field];
//      %id:field-var% >> print $row[field]; used for if statment or foreach or other syntax
// ","style1:style2"end sql]
// Use [var:"id_pagination"end var] for pagination
// Use [var:"id_num_rows"end var] for print number of rows
//
/**
 [IF:"!%id:#-var%","
There is [var:"id_pagination"end var] rows !
"end IF] 
 * 
 * 
 *
 */
function sql_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $SQL_x[$v] = $syntaxcode->Syntax($var);
    }
    $sql_id = $SQL_x[0];
    $sql = $SQL_x[1];
    $count_nu = $SQL_x[2];
    $style = explode(':', $SQL_x[4]);

    $pattern = '/\%' . $sql_id . '\:[^\%]*\%/';
    preg_match_all($pattern, $SQL_x[3], $matches);
    $matches[0] = str_replace('-var', '', $matches[0]);
    $matche = array_unique($matches[0]);
    $matche = str_replace('%' . $sql_id . ':#%', '', $matche);
    $matche = str_replace('%' . $sql_id . ':', '', $matche);
    $matche = array_filter(str_replace('%', '', $matche));


    $sql = str_ireplace('select * from', 'SELECT ' . implode(',', $matche) . ' FROM', $sql);
    $sql = str_replace('"', "'", $sql);
    if (!$style[0])
        $style[0] = 0;
    if (!$style[1])
        $style[1] = 1;
    $sql_template = trim($SQL_x[3]);
    $pagination = '';
    $limit = '';
    $pagination_code='';
    if ($count_nu) { //for multy page number
        $show_pages = "page_" . $sql_id;
        $pagination_code= "if (!\$_REQUEST[$show_pages])
            \$page_number = '0';
        else
            \$page_number = (\$_REQUEST[$show_pages] - 1) * $count_nu;
                ";
        
           
        
         $pagination_code.= "global \$_DB;\n\$rs = \$_DB->query(\"$sql\");\n\${$sql_id}_num_rows =\$_DB->rowcount() ;\n";
       
        $pagination= "\${$sql_id}_pagination = page_counter(\$_REQUEST[$show_pages], \${$sql_id}_num_rows, $count_nu, getAddress(), '$sql_id', " . var_export($style, true) . " );\n";
        $limit = "\$limit = \" LIMIT \$page_number , $count_nu \";\n";
    }

    unset($old);
    unset($new);
    $old[] = "%" . $sql_id . ":%";
    $new[] = '<?php echo $row'.$sql_id.'_x; ?>';
    $old[] = "%" . $sql_id . ":-var%";
    $new[] = '$row'.$sql_id.'_x';
    $old[] = "%" . $sql_id . ":#%";
    $new[] = '<?php echo $row'.$sql_id.'_counter + $page_number; ?>';
    $old[] = "%" . $sql_id . ":#-var%";
    $new[] = '($row'.$sql_id.'_counter + $page_number)';
    
   
    foreach ($matche as $k => $v) {
        $old[] = "%" . $sql_id . ":" . $v . "%";
        $new[] = "<?php echo \$row".$sql_id."[$v]; ?>";
        $old[] = "%" . $sql_id . ":" . $v . "-var%";
        $new[] = "\$row".$sql_id."[$v]";
        //        $old[] = "" . $sql_id . "_selected_" . $v . "=\"" . $v . "\"";
        //        $new[] = ' selected="selected" ';
        //        $old[] = "" . $sql_id . "_checked_" . $k . "=\"" . $v . "\"";
        //        $new[] = ' checked="checked" ';                
    }
    $sql_template = str_replace($old, $new, $sql_template);

    return "<?php 
\$row".$sql_id."_counter='';
\$row".$sql_id."_x='';

$pagination_code        
\$limit = ''; 

$limit 
$pagination
   \$$sql_id = getResults(\"$sql \$limit\");
    if (is_array(\$$sql_id))
        foreach (\$$sql_id as \$row".$sql_id.") {
            \$row".$sql_id."_x = (\$row".$sql_id."_x == '$style[1]') ? '$style[0]' : '$style[1]';
            \$row".$sql_id."_counter++;
?>
$sql_template
<?php
        }
?>        
    
";
}





function paginate($item_per_page, $current_page, $total_records, $total_pages, $page_url)
{
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination">';
        
        $right_links    = $current_page + 3; 
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
            $previous_link = ($previous==0)?1:$previous;
            $pagination .= '<li class="first"><a href="'.$page_url.'?page=1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="'.$page_url.'?page='.$previous_link.'" title="Previous">&lt;</a></li>'; //previous link
                for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                    if($i > 0){
                        $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
                    }
                }   
            $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
                
        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="'.$page_url.'?page='.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
                $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="'.$page_url.'?page='.$next_link.'" >&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="'.$page_url.'?page='.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
    return $pagination; //return pagination links
}



//page counter for mem_sql function *you can use it in other way
function page_counter($page, $total_pages, $limit, $path, $pn = '', $style = array()) {
    if (!$style[3])
        $style[3] = 'current ui-state-default ui-state-highlight';
    if (!$style[4])
        $style[4] = 'pagination';
    if (!$style[2])
        $style[2] = 'ui-state-default';
    $pattern = '/page_' . $pn . '=(.*?)[\&]/';
    $path = preg_replace($pattern, "", $path);

    if ($total_pages >= $limit) {

        $adjacents = "2";
        if ($page)
            $start = ($page - 1) * $limit;
        else
            $start = 0;

        if ($page == 0)
            $page = 1;
        $prev = $page - 1;
        $next = $page + 1;
        $lastpage = ceil($total_pages / $limit);
        $lpm1 = $lastpage - 1;


        $pagination = "";
        if ($lastpage > 1) {
            $pagination .= "<div class='$style[4]'>";
            if ($page > 1)
                $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$prev'> &#171; </a>";
            else
                $pagination.= "<span class='disabled'> &#171; </span>";

            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                    else
                        $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                }
            }
            elseif ($lastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                        else
                            $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                    }
                    $pagination.= "...";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$lpm1'>$lpm1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$lastpage'>$lastpage</a>";
                }
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=1'>1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=2'>2</a>";
                    $pagination.= "...";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                        else
                            $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                    }
                    $pagination.= "..";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$lpm1'>$lpm1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page=$lastpage'>$lastpage</a>";
                }
                else {
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=1'>1</a>";
                    $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=2'>2</a>";
                    $pagination.= "..";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<a href='" . $path . "page_$pn=$counter' class='$style[3]'>$counter</a>";
                        else
                            $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$counter'>$counter</a>";
                    }
                }
            }

            if ($page < $counter - 1)
                $pagination.= "<a class='$style[2]' href='" . $path . "page_$pn=$next'> &#187; </a>";
            else
                $pagination.= "<span class='disabled'> &#187; </span>";
            $pagination.= "</div>\n";
        }
        return $pagination;
    }
}
