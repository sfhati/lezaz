<?php
function compressjs($jsarray){
    global $lezaz;
    foreach($jsarray as $jsfile){
        $vars_dir_path = $lezaz->lezaz_path($jsfile);
        $jsau = addslashes(file_get_contents($vars_dir_path));
        $packer = new JavaScriptPacker($jsau, $compressjs, true, false);
        $jsau = $packer->pack();
        $lezaz->file->write( $file,$$jsau );
        $x.=$vars_dir_path.'<br>';
    }
    return $x;
}

