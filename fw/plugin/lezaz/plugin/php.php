<?php
/*
 * [php:"function(12, '22', '221')"end php] // result <?php function(12, '22', '221'); ?>
 * [php:"function(12, '22', '221')-var"end php] // result function(12, '22', '221')
 */
function php_SYNTAX($vars) {
    global $syntaxcode;
    $vars = $syntaxcode->Syntax($vars[0]);
    if (strpos($vars, '-code')) {
        $vars = str_replace('-code', '', $vars);
        return $vars;
    } else {
        return "<?php $vars ?>";
    }    
    
}
