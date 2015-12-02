<?php

function this_SYNTAX($vars) {
    global $syntaxcode;
    $vars = $syntaxcode->Syntax($vars[0]);
    $return = "<?php echo \$_THIS['$vars']; ?>";
    return $return;
}
