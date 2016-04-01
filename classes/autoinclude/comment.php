<?php

$lezaz->listen('output.filter', function($output, $filtered){
        $output = empty($filtered) ? $output : $filtered;
        $search=array('lexax:','lexax~','lexax#','lexax$');
        $replace=array('lezaz:','lezaz~','lezaz#','lezaz$');
        return str_replace($search,$replace, $output);
});
