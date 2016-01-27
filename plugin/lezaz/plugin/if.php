<?php

/*
<lezaz:if/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id             Null
condition    condition if syntax                                     1==1
pass         return this value if pass                               1
fail         return this value if fail                               0
print        print result attr if value = any pass like 1,true,yes   0

inside code you can use <lezaz_else/> 

Example
--------
<lezaz:if id='myid' condition="lezaz$parm==1" pass="yes" fail="no" print="false"/>

<lezaz:if id='myid' condition="lezaz$parm==1" pass="yes" fail="no" print="false">
the value for $parm = lezaz$parm and its 1 <br>
<lezaz_else/> 
the value for $parm = lezaz$parm and its not 1
</lezaz:if>
the result for if syntax is lezaz#myid


 */

function lezaz_if($vars, $html) {
// defult values     
    if (!isset($vars['print']))
        $vars['print'] = '0';
    if (!isset($vars['condition']))
        $vars['condition'] = '1==1';
    if (!isset($vars['pass']))
        $vars['pass'] = '1';
    if (!isset($vars['fail']))
        $vars['fail'] = '0';


    if (strtolower($vars['print']) == 'no' || strtolower($vars['print']) == 'false')
        $vars['print'] = 0;
    $vars['print'] = (bool) $vars['print'];

    $html = str_replace('<lezaz_else/>', "<?php }else{ ?>", $html);

    if ($vars[id]) {       
        $return = "\n" . '$lezaz_' . $vars[id] . '="' . $vars['fail'] . "\";\n";
        if ($vars['print'] == true)
            $return2 = "\n" . 'echo $lezaz_' . $vars[id] . ";\n";
    }
    return "
   <?php $return if ($vars[condition]) { 
\n" . '$lezaz_' . $vars[id] . '="' . $vars['pass'] . "\";\n ?>      
 $html    
<?php } $return2 ?>
";
}
