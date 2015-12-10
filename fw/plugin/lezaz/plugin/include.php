<?php

/*
  use like [include:"template_file_without.inc"end include]
  [include:"temp"end include] //get content from template file name temp.inc in same folder of template source
  [include:"../temp"end include]
  [include:"../temp.inc"end include]
  [include:"{template}temp"end include] // this value {template} use in sfhati framework to get template folder
  [include:"{plugin}temp"end include] // this value {template} use in sfhati framework to get plugin folder
  [include:"{tmp}temp"end include] // this value {template} use in sfhati framework to get tmp folder
  [include:"{cache}temp"end include] // this value {template} use in sfhati framework to get cache folder
  [include:"{uploaded}temp"end include] // this value {template} use in sfhati framework to get uploaded folder
 */

function lezaz_include($vars,$html) {
        return "<?php echo  \$lezaz->include_tpl(\"$vars[file]\"); ?>";
   // }
   // return "<br> Worning File path : $path Not Found!<br>";
   // $vars = md5_file($vars) . '.php';
}
