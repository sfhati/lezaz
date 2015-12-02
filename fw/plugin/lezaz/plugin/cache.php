<?php
//[cache:"title-cv"end cache]
function cache_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $vars[$v] = $syntaxcode->Syntax($var);
    }
    if (strpos($vars[0], '-cv')) {
        $vars[0] = str_replace('-cv', '', $vars[0]);
        return 'get_cache("'.$vars[0].'")';
    } else {
        return "<?php echo ".'get_cache("'.$vars[0].'")'."; ?>";
    }
}
