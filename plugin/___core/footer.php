<?php
/*
function html2a ( $html ) {
  if ( !preg_match_all( '
@
\<\s*?(\w+)((?:\b(?:\'[^\']*\'|"[^"]*"|[^\>])*)?)\>
((?:(?>[^\<]*)|(?R))*)
\<\/\s*?\\1(?:\b[^\>]*)?\>
|\<\s*(\w+)(\b(?:\'[^\']*\'|"[^"]*"|[^\>])*)?\/?\>
@uxis', $html = trim($html), $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER) )
    return $html;
print_r($m);
  $i = 0;
  $ret = array();
  foreach ($m as $set) {
    if ( strlen( $val = trim( substr($html, $i, $set[0][1] - $i) ) ) )
      $ret[] = $val;
    $val = $set[1][1] < 0 
      ? array( 'tag' => strtolower($set[4][0]) )
      : array( 'tag' => strtolower($set[1][0]), 'val' => html2a($set[3][0]) );
    
   print_r($ret) ;
  
    $ret[] = $val;
    $i = $set[0][1]+strlen( $set[0][0] );
  }
  $l = strlen($html);
  if ( $i < $l )
    if ( strlen( $val = trim( substr( $html, $i, $l - $i ) ) ) )
      $ret[] = $val;
  return $ret;
}
?>

Now let's try it with this example: (there are some really nasty xhtml compliant bugs, but ... we shouldn't worry)

<?php
$html = <<<EOT
<b   ddda='1' c="5" x="5"/>
        
   bassam 
        <b d=5>coco</b>
   <c a=3>rasha</c>
   </b>
        
EOT;

$a = html2a($html);
//now we will make some neat html out of it
echo a2html($a);

function a2html ( $a, $in = "" ) {
  if ( is_array($a) ) {
    $s = "";
    foreach ($a as $t)
      if ( is_array($t) ) {
        $attrs=""; 
        if ( isset($t['attr']) )
          foreach( $t['attr'] as $k => $v )
            $attrs.=" ${k}=".( strpos( $v, '"' )!==false ? "'$v'" : "\"$v\"" );
        $s.= $in."<".$t['tag'].$attrs.( isset( $t['val'] ) ? ">\n".a2html( $t['val'], $in."  " ).$in."</".$t['tag'] : "/" ).">\n";
      } else
        $s.= $in.$t."\n";
  } else {
    $s = empty($a) ? "" : $in.$a."\n";
  }
  return $s;
}
<lezaz:block inside="div#id.class1>.class>#id>span.li"
exit();
?>
 * 
$html=">222x.form>#myform>div#id.class1>.class>#id>span.li";
foreach(explode('>', $html) as $element){
preg_match_all( '/.([^\W])+/', $element, $m) ;

    if(!strpos('XX'. $m[0][0],'#') && !strpos('XX'. $m[0][0],'.')) {
        $x='<'.$m[0][0];
                $y='</'.$m[0][0].'>';

    }else if(strpos('XX'. $m[0][0],'#')){
        $x='<div id="'. str_replace('#','',$m[0][0]).'" ';
        $y='</div>';
        }else if(strpos('XX'. $m[0][0],'.')){
            $x='<div id="'. str_replace('.','',$m[0][0]).'" ';
            $y='</div>';

    }
    array_shift($m[0]);
 foreach($m[0] as $tag){  
   if(strpos('XX'. $tag,'#')){
        $x.=' id="'. str_replace('#','',$tag).'" ';
        }else if(strpos('XX'. $tag,'.')){
            $x.=' class="'. str_replace('.','',$tag).'" ';
    
    }  
}
$x.='>';
$f[0][]=$x;
$f[1][]=$y;

}
rsort($f[1]);
echo implode("\n", $f[0]).'Bassam'.implode("\n", $f[1]);
$x='';*/


$html=  file_get_contents(TEMPLATE_PATH.'admin/content/setting.inc');
$html=get_tags($html,0);


function get_tags($html,$x){
    global $lezaz;
$element1= $lezaz->string->between('<lezaz:','/>',$html);
$element2= $lezaz->string->between('<lezaz:','</lezaz:',$html);
$posel1=(strpos($html,$element1)+strlen($element1));
$posel2=(strpos($html,$element2)+strlen($element2));
echo "$posel1 && !$posel2\n";
if($x=200) return "\n\n====================$html================\n\n";
if((strpos($html,$element1)+strlen($element1)) < (strpos($html,$element2)+strlen($element2))){
    $tag=  explode(' ', $element1);
    $tag= $tag[0];
    $element = '<lezaz:'.$element1.'/>';
}else{
    $tag=  explode(' ', $element2);
    $tag= $tag[0];
    $element = '<lezaz:'.$element2.'</lezaz:'.$tag.'>';
}
$html= str_replace ($element, $tag, $html);
$x++;

return get_tags($html,$x);

}


echo "\n\n-----------------$html---------------------\n\n";
exit();