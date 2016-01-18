<?php

/*
  <lezaz:for/>
  Attribute	Description        Default
  --------------------------------------------
  id         referance for this syntax use like lezaz#id             Null
  condition  condition for syntax you can use $i as primary          $i<=to
  from       start count for from                                    1
  to         end count for                                           10
  step       number of step jump                                     0
  print        print result attr if value = any pass like 1,true,yes 0

  inside code you can use lezaz#id to print for value repete

  Example
  --------
  <lezaz:for id='idfor' from="5" to="100" step="5"/>

  <lezaz:for id="idfor" from='3' condition='$i<lezaz:set(bass)' to='27' step='1' print='false'>
  lezaz#idfor <br>
  </lezaz:for>
  the result syntax is lezaz#idfor as last value for this variable


 */

function lezaz_for($vars, $html) {
// defult values     
    if (!isset($vars['from']))
        $vars['from'] = '1';
    if (!isset($vars['to']))
        $vars['to'] = '10';
    if (!isset($vars['step']))
        $vars['step'] = '0';
    if (!isset($vars['condition']))
        $vars['condition'] = '$i<=' . $vars['to'];


    if (strtolower($vars['print']) == 'no' || strtolower($vars['print']) == 'false')
        $vars['print'] = 0;
    $vars['print'] = (bool) $vars['print'];

    if ($vars['print'] == true)
        $return2 = "\n" . 'echo $lezaz_' . $vars[id] . ";\n";

    return "<?php
for (\$i = $vars[from]; $vars[condition]; \$i++) {    
    \$i=\$i+$vars[step];
    \$lezaz_$vars[id]=\$i;    
?>
 $html
<?php
}
$return2
?>
  
";
}
