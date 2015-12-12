<?php

/*
<lezaz:sql/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id             Null
sql          SQL syntax                                              null
limit        number of rows to show                                  null
style1 
multipage    for using pagination value = true                       false      
print        print result attr if value = any pass like 1,true,yes   0

inside code you can use lezaz#id[field] >> print field value
                        lezaz#id[count] >> print number of rows 
                        lezaz#id[counter] >> print counter for this row or last counter if use after colse sql
                        

Example
--------
<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1" print="true"/>

<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1">
the value of field name = lezaz#myid[name] <br>
</lezaz:sql>



 */

function lezaz_sql($vars, $html) {
// defult values     
    if (!isset($vars['print']))
        $vars['print'] = '0';
    if (!isset($vars['sql']))
        return '';
   

    if (strtolower($vars['print']) == 'no' || strtolower($vars['print']) == 'false')
        $vars['print'] = 0;
    $vars['print'] = (bool) $vars['print'];



}


function sql_SYNTAX($vars) {



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
