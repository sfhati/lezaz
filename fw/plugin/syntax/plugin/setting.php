<?php

function setting_SYNTAX($vars) {
    global $syntaxcode;
    $vars = $syntaxcode->Syntax($vars[0]);
    $return = "<?php get_cache('$vars'); ?>";
    return $return;
}
