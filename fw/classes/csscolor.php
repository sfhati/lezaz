<?php
class CSS_Color
{
  var $bg = array();
  var $fg = array();
  var $minBrightDiff = 126;
  var $minColorDiff = 500;
  function CSS_Color($bgHex, $fgHex='')
  {
     $this->setPalette($bgHex, $fgHex);
  }
  function setPalette($bgHex, $fgHex = '')
  {
    if (!$fgHex) {
      $fgHex = $bgHex;
    }
    $this->bg = array();
    $this->fg = array();
    if (!$this->isHex($bgHex)) {
    }
    $this->bg[0] = $bgHex;
    $this->bg['+1'] = $this->lighten($bgHex, .85);
    $this->bg['+2'] = $this->lighten($bgHex, .75);
    $this->bg['+3'] = $this->lighten($bgHex, .5);
    $this->bg['+4'] = $this->lighten($bgHex, .25);
    $this->bg['+5'] = $this->lighten($bgHex, .1);
    $this->bg['-1'] = $this->darken($bgHex, .85);
    $this->bg['-2'] = $this->darken($bgHex, .75);
    $this->bg['-3'] = $this->darken($bgHex, .5);
    $this->bg['-4'] = $this->darken($bgHex, .25);
    $this->bg['-5'] = $this->darken($bgHex, .1);
    if (!$this->isHex($fgHex)) {
    }

    $this->fg[0]    = $this->calcFG( $this->bg[0], $fgHex);
    $this->fg['+1'] = $this->calcFG( $this->bg['+1'], $fgHex);
    $this->fg['+2'] = $this->calcFG( $this->bg['+2'], $fgHex);
    $this->fg['+3'] = $this->calcFG( $this->bg['+3'], $fgHex);
    $this->fg['+4'] = $this->calcFG( $this->bg['+4'], $fgHex);
    $this->fg['+5'] = $this->calcFG( $this->bg['+5'], $fgHex);
    $this->fg['-1'] = $this->calcFG( $this->bg['-1'], $fgHex);
    $this->fg['-2'] = $this->calcFG( $this->bg['-2'], $fgHex);
    $this->fg['-3'] = $this->calcFG( $this->bg['-3'], $fgHex);
    $this->fg['-4'] = $this->calcFG( $this->bg['-4'], $fgHex);
    $this->fg['-5'] = $this->calcFG( $this->bg['-5'], $fgHex);
  }
  function lighten($hex, $percent)
  {
    return $this->mix($hex, $percent, 255);
  }
  function darken($hex, $percent)
  {
    return $this->mix($hex, $percent, 0);
  }
  function mix($hex, $percent, $mask)
  {
    if (!is_numeric($percent) || $percent < 0 || $percent > 1) {
    }

    if (!is_int($mask) || $mask < 0 || $mask > 255) {
    }

    $rgb = $this->hex2RGB($hex);
    if (!is_array($rgb)) {
      return false;
    }

    for ($i=0; $i<3; $i++) {
      $rgb[$i] = round($rgb[$i] * $percent) + round($mask * (1-$percent));
      if ($rgb[$i] > 255) {
	$rgb[$i] = 255;
      }

    }
    return $this->RGB2Hex($rgb);
  }

  //--------------------------------------------------
  function hex2RGB($hex)
  {
    $d = '[a-fA-F0-9]';
    if (preg_match("/^($d$d)($d$d)($d$d)\$/", $hex, $rgb)) {
      
      return array(
		   hexdec($rgb[1]),
		   hexdec($rgb[2]),
		   hexdec($rgb[3])
		   );
    }
    if (preg_match("/^($d)($d)($d)$/", $hex, $rgb)) {
      
      return array(
		   hexdec($rgb[1] . $rgb[1]),
		   hexdec($rgb[2] . $rgb[2]),
		   hexdec($rgb[3] . $rgb[3])
		   );
    }
  }
  function RGB2Hex($rgb)
  {
    if(!$this->isRGB($rgb)) {
      $this->raiseError("RGB value is not valid", __FUNCTION__, __LINE__);
      return false;
    }
    $hex = "";
    for($i=0; $i < 3; $i++) {
      $hexDigit = dechex($rgb[$i]);
      if(strlen($hexDigit) == 1) {
	$hexDigit = "0" . $hexDigit;
      }
      $hex .= $hexDigit;
    }
    return $hex;
  }
  function isHex($hex)
  {
    $d = '[a-fA-F0-9]';
    if (preg_match("/^#?$d$d$d$d$d$d\$/", $hex) ||
	preg_match("/^#?$d$d$d\$/", $hex)) {
      return true;
    }
    return false;
  }
  function isRGB($rgb)
  {
    if (!is_array($rgb) || count($rgb) != 3) {
      return false;
    }
    for($i=0; $i < 3; $i++) {
      $dec = intval($rgb[$i]);
      if (!is_int($dec) || $dec < 0 || $dec > 255) {
	return false;
      }
    }
    return true;
  }

  //--------------------------------------------------
  function calcFG($bgHex, $fgHex)
  {
    foreach (array(1, 0.75, 0.5, 0.25, 0) as $percent) {
      $darker = $this->darken($fgHex, $percent);
      $lighter = $this->lighten($fgHex, $percent);
      $darkerBrightDiff  = $this->brightnessDiff($bgHex, $darker);
      $lighterBrightDiff = $this->brightnessDiff($bgHex, $lighter);
      if ($lighterBrightDiff > $darkerBrightDiff) {
	$newFG = $lighter;
	$newFGBrightDiff = $lighterBrightDiff;
      } else {
	$newFG = $darker;
	$newFGBrightDiff = $darkerBrightDiff;
      }
      $newFGColorDiff = $this->colorDiff($bgHex, $newFG);

      if ($newFGBrightDiff >= $this->minBrightDiff &&
	  $newFGColorDiff >= $this->minColorDiff) {
	break;
      }
    }
    return $newFG;
  }
  function getMinBrightDiff()
  {
    return $this->minBrightDiff;
  }
  function setMinBrightDiff($b, $resetPalette = true)
  {
    $this->minBrightDiff = $b;
    if ($resetPalette) {
      $this->setPalette($this->bg[0],$this->fg[0]);
    }
  }
  function getMinColorDiff()
  {
    return $this->minColorDiff;
  }
  function setMinColorDiff($d, $resetPalette = true)
  {
    $this->minColorDiff = $d;
    if ($resetPalette) {
      $this->setPalette($this->bg[0],$this->fg[0]);
    }
  }

  function brightness($hex)
  {
    $rgb = $this->hex2RGB($hex);
    if (!is_array($rgb)) {
      return false;
    }

    return( (($rgb[0] * 299) + ($rgb[1] * 587) + ($rgb[2] * 114)) / 1000 );
  }

  function brightnessDiff($hex1, $hex2)
  {
    $b1 = $this->brightness($hex1);
    $b2 = $this->brightness($hex2);
    if (is_bool($b1) || is_bool($b2)) {
      return false;
    }
    return abs($b1 - $b2);
  }

  function colorDiff($hex1, $hex2)
  {
    $rgb1 = $this->hex2RGB($hex1);
    $rgb2 = $this->hex2RGB($hex2);
    if (!is_array($rgb1) || !is_array($rgb2)) {
      return -1;
    }
    $r1 = $rgb1[0];
    $g1 = $rgb1[1];
    $b1 = $rgb1[2];
    $r2 = $rgb2[0];
    $g2 = $rgb2[1];
    $b2 = $rgb2[2];
    return(abs($r1-$r2) + abs($g1-$g2) + abs($b1-$b2));
  }
}

function rgb2hex($r,$g,$b) {
   $hex = "";
   $hex .= str_pad(dechex($r), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($g), 2, "0", STR_PAD_LEFT);
   $hex .= str_pad(dechex($b), 2, "0", STR_PAD_LEFT);

   return $hex; // returns the hex value including the number sign (#)
}

function closecolor($hex,$pm,$opt=0,$value=10){
list($red, $green, $blue) = sscanf($hex, "%02x%02x%02x");
if($pm){
$r=$red+$value;
$g=$green+$value;
$b=$blue+$value;
if($r>255)$r=255;
if($g>255)$g=255;
if($b>255)$b=255;
}else{
$r=$red-$value;
$g=$green-$value;
$b=$blue-$value;
if($r<0)$r=0;
if($g<0)$g=0;
if($b<0)$b=0;    
}

if($opt==1)
$rgb=rgb2hex($red,$green,$b);    
elseif($opt==2)
$rgb=rgb2hex($red,$g,$blue);    
elseif($opt==3)
$rgb=rgb2hex($r,$green,$blue);    
else
$rgb=rgb2hex($r,$g,$b);        
return  $rgb;
    
}


//******************** export image & css files

function clearnameI($t, $o = 0) {
    $search[] = '"';
    $replace[] = '';
    $search[] = "'";
    $replace[] = '';
    $search[] = 'url(';
    $replace[] = '';
    $search[] = ')';
    $replace[] = '';
    $search[] = '@import';
    $replace[] = '';
    $search[] = ';';
    $replace[] = '';
    if ($o) { // for file name fix
        $search[] = '=';
        $replace[] = '';
        $search[] = '&';
        $replace[] = '';
        $search[] = '?';
        $replace[] = '';
    }
    return str_replace($search, $replace, $t);
}

function get_http_response_code($url) {
    $headers = get_headers($url);
    return substr($headers[0], 9, 3);
}

function getimageformcsscode($cssfilecode, $file, $FILEPATHEXPORT) {
    $infom = pathinfo($file);
    preg_match_all('/url\([^\)]*\)/', $cssfilecode, $x);
    foreach ($x[0] as $im) {
        if (!strpos($im, 'data:')) {
            $im1 = clearnameI($im);
            $info = pathinfo($im1);
            $basename = clearnameI($info[basename], 2);
            if (!file_exists($FILEPATHEXPORT . 'images/' . $basename)) {
                if (strpos($im, 'http://'))
                    $impf = $im1; else
                    $impf = $infom[dirname] . '/' . $im1;
                if (get_http_response_code($impf) != "404") {
                    $imagesource = file_get_contents($impf);
                    $echo.="<span style='color:green'>Download <a style='color:black' href='$impf'>$basename</a> File Success.</span><br>";
                    //Write image file
                    $handle = fopen($FILEPATHEXPORT . 'images/' . $basename, 'a');
                    fwrite($handle, $imagesource);
                    fclose($handle);
                } else {
                    $echo.="<span style='color:red'>File <a style='color:black' href='$impf'>$basename</a> Not Found!</span><br>";
                }
            }
            $cssfilecode = str_replace($im, "url(../images/$basename)", $cssfilecode);
        }
    }

    //Write CSS file
    $basename = clearnameI($infom[basename], 2);
    $handle = fopen($FILEPATHEXPORT . 'css/' . $basename, 'a');
    fwrite($handle, $cssfilecode);
    fclose($handle);
    return $echo;
}

function getfullhtmlpagecodeandmedia($file, $pathcss) {
    $cssfilecode = file_get_contents($file);
    $infom = pathinfo($file);
    $FILEPATHEXPORT = SITE_PATH . $pathcss . '/';
    if (!file_exists($FILEPATHEXPORT))
        mkdir($FILEPATHEXPORT);
    if (!file_exists($FILEPATHEXPORT . 'images/'))
        mkdir($FILEPATHEXPORT . 'images/');
    if (!file_exists($FILEPATHEXPORT . 'css/'))
        mkdir($FILEPATHEXPORT . 'css/');

    preg_match_all('/@import[^;]*;/', $cssfilecode, $fcssx);
    foreach ($fcssx[0] as $im) {
        $im1 = clearnameI($im);
        $info = pathinfo($im1);
        $basename = clearnameI($info[basename], 2);
        $cssfilecode = str_replace($im, "@import\"$basename\";\n", $cssfilecode);
        $echo.="<b>Download File <a style='color:black' href='$file'>$basename</a></b><br>";
        if (strpos($im, 'http://'))
            $impf = $im1; else
            $impf = $infom[dirname] . '/' . $im1;
        $echo.=getfullhtmlpagecodeandmedia($impf, $pathcss);
    }

////GET IMAGES///////
    $echo.= getimageformcsscode($cssfilecode, $file, $FILEPATHEXPORT);
    return $echo;
}
