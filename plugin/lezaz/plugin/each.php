<?php

/*
  <lezaz:each/>
  Attribute	Description        Default
  --------------------------------------------
  id         referance for this syntax use like lezaz#id             Null
  array      array parameter without $ or $_SESSION                  Null
  type       type of array use session for $_SESSION['array']        variable  you can use session,server,get,post,cookie,request,variable
  counter    initial value for counter parameter                     1

  inside code you can use
  lezaz#id_key to print key item
  lezaz#id_value to print value item
  lezaz#id_counter to print counter item

  Example
  --------
  <lezaz:each id='ideach' array="variable1" type="session" counter="5" />

  <lezaz:each id='ideach' array="variable1" type="session" counter="5">
  lezaz#ideach_counter: lezaz#ideach_key =>  lezaz#ideach_value <br>
  </lezaz:each>
  the result syntax for lezaz#ideach is true if there is at least 1 item in array


 */

function lezaz_each($vars, $html) {
    $types = array('session', 'server', 'get', 'post', 'cookie', 'request');
    if (in_array(strtolower($vars[type]), $types)) {
        $code = '$_' . strtoupper($vars[type]) . '[' . $vars['array'] . ']';
    } else {
        $code =  $vars['array'] ;
    }

    if (!is_numeric($vars['counter']))
        $counter = 0;
    else
        $counter = $vars['counter'];


    return "
<?php 
\$lezaz_" . $vars[id] . " = false;
\$lezaz_" . $vars[id] . "_counter=$counter;
                      if ( is_array($code) ) 
            foreach ( $code as \$lezaz_$vars[id]_key => \$lezaz_$vars[id]_value ) {
                \$lezaz_" . $vars[id] . " = true;
?>
$html
<?php 
\$lezaz_" . $vars[id] . "_counter++;
} 
?>
";
}
