<?php

/*
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id                        Null
function     function for filter string like echo ,htmlspecialchars,md5,..,     Null
print        on/off                                                             on

Example
--------
<lezaz:filter function="htmlspecialchars">
    <lexax:if condition="lexax:set(b)==\$lezaz_b">        
        Yes lexax:set(b) = 2        
    </lexax:if>  
</lezaz:filter>


 */
function lezaz_filter($vars, $html) {
    global $lezaz;
    if (!$vars['id']) {
        $vars['id'] = 'id_' . time() . '_' . rand(1552, 4899996);
    }
    $return = '<?php $varx = <<<END
' . $html . '
END;
$lezaz_' . $vars['id'] . '= ' . $vars['function'] . '($varx);
';
    if ($vars['print'] != 'off') {
        $return.='echo $lezaz_' . $vars['id'] . ';';
    }
    $return.=' ?>';
// defult values     

    return $return;
}
