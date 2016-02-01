<?php

/*
<lezaz:sql/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id                   Null
sql          SQL syntax                                                    null
limit        number of rows to show                                        null
style1 
multipage    for using pagination value = true                             false      
print        print result attr if value = any pass like 1,true,yes         0
counter      initial value for counter parameter                           1

inside code you can use lezaz#id[field] >> print field value
                        lezaz#id_num >> print number of rows 
                        lezaz#id_counter >> print counter for this row or last counter if use after colse sql
                        lezaz#id_multipage >> show paginition

Example
--------
<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1" print="true"/>

<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1">
the value of field name = lezaz#myid[name] <br>
</lezaz:sql>



 */

function lezaz_sql($vars, $html) {
// defult values    
    $style[]='';
    if (!isset($vars['print']))
        $vars['print'] = '0';
    if (!isset($vars['sql']))
        return '';
    if (!is_numeric($vars['counter']))
       $counter=0;
    else
      $counter=$vars['counter']; 


    if (strtolower($vars['print']) == 'no' || strtolower($vars['print']) == 'false')
        $vars['print'] = 0;
    $vars['print'] = (bool) $vars['print'];
    
    if($vars[limit]) $limit = "\$limit = \" LIMIT $vars[limit] \";\n";
    if ($vars['multipage'] && $vars[limit]) { //for multy page number
        $show_pages = "page_" . $vars['id'];
       $pagination_code= "if (!\$_REQUEST[$show_pages])
            \$page_number = '0';
        else
            \$page_number = (\$_REQUEST[$show_pages] - 1) * $vars[limit];
                ";       
        $limit = "\$limit = \" LIMIT \$page_number , $vars[limit] \";\n";
        $pagination= "\$lezaz_{$vars['id']}_multipage = page_counter(\$_REQUEST[$show_pages], \$lezaz_$vars[id]_num, $vars[limit], \$lezaz->address(), '$vars[id]', " . var_export($style, true) . " );\n";
    }
    
    
//$sql= str_replace('"',"'",$vars[sql]);
$sql= $vars[sql];
    return "<?php 

\$lezaz_".$vars[id]."_x='';
$pagination_code        
\$limit = ''; 
$limit 

   \$$vars[id] = \$lezaz->db->query(\"$sql \$limit\");
  \$lezaz_$vars[id]_num =  \$lezaz->db->num_row(\"$sql\");
 $pagination
\$lezaz_".$vars[id]."_counter=$counter + \$page_number;
        if (is_array(\$$vars[id]))
        foreach (\$$vars[id] as \$lezaz_".$vars[id].") {
            if (is_array(\$lezaz_".$vars[id].")){
            \$lezaz_".$vars[id]."_x = (\$lezaz_".$vars[id]."_x == '$style[1]') ? '$style[0]' : '$style[1]';
            
?>
$html
<?php
\$lezaz_".$vars[id]."_counter++;
        }}
?>        
    
";

}


//page counter for mem_sql function *you can use it in other way
function page_counter($page, $total_pages, $limit, $path, $pn = '', $style = array()) {
    if (!$style[3])
        $style[3] = 'active';
    if (!$style[4])
        $style[4] = 'pagination';
    if (!$style[2])
        $style[2] = 'disabled';
   if (!$style[1])
        $style[1] = '';
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
            $pagination .= "<ul class='$style[4]'>";
            if ($page > 1)
                $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$prev'> &#171; </a></li>";
            else
                $pagination.= "<li class='$style[2]'><a href='javascript:'> &#171; </a></li>";

            if ($lastpage < 7 + ($adjacents * 2)) {
                for ($counter = 1; $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class='$style[3]'><a href='" . $path . "page_$pn=$counter' >$counter</a></li>";
                    else
                        $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$counter'>$counter</a></li>";
                }
            }
            elseif ($lastpage > 5 + ($adjacents * 2)) {
                if ($page < 1 + ($adjacents * 2)) {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                        if ($counter == $page)
                            $pagination.= "<li class='$style[3]'><a href='" . $path . "page_$pn=$counter' >$counter</a></li>";
                        else
                            $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$counter'>$counter</a></li>";
                    }
                    $pagination.= "<li class='$style[2]'><a href='javascript:'> ... </a></li>";
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$lpm1'>$lpm1</a>";
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$lastpage'>$lastpage</a>";
                }
                elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=1'>1</a>";
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=2'>2</a>";
                    $pagination.= "<li class='$style[2]'><a href='javascript:'> ... </a></li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<li class='$style[3]'><a href='" . $path . "page_$pn=$counter'>$counter</a></li>";
                        else
                            $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$counter'>$counter</a></li>";
                    }
                    $pagination.= "<li class='$style[2]'><a href='javascript:'> ... </a></li>";
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$lpm1'>$lpm1</a>";
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page=$lastpage'>$lastpage</a>";
                }
                else {
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=1'>1</a>";
                    $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=2'>2</a>";
                    $pagination.= "<li class='$style[2]'><a href='javascript:'> ... </a></li>";
                    for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                        if ($counter == $page)
                            $pagination.= "<li class='$style[3]'><a href='" . $path . "page_$pn=$counter'>$counter</a></li>";
                        else
                            $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1)
                $pagination.= "<li class='$style[1]'><a href='" . $path . "page_$pn=$next'> &#187; </a></li>";
            else
                $pagination.= "<li class='$style[2]'><a href='javascript:'> &#187; </a></li>";
            $pagination.= "</ul>\n";
        }
        return $pagination;
    }
}
