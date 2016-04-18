<?php

/*
  id  : difine for this element
  src : source of image file (png,jpg,gif)
  save: save output image to folder defualt inside uploaded you can type save="myimg" to save new image into /uploaded/myimg/
  type:
  cut :
    width: Number Destination image width
    height: Number Destination image height
    h-align : horizontal position (left,center,right) defualt center
    v-align : vertical position (top,middle,bottom) defualt top
  flip :
    direction: (horizontal,vertical,both)
  rotate :
    angle: number
    backcolor : red,green,blue  // 23,45,11
  resize:
    width: Destination width
    height: Destination height
    ratio: (false,width,height,both)
  stamp:
    file:  image file Absolute stamp image path
    x: Position in pixels from the left
    y: Position in pixels from the top


 * ***** u can use inside template code ****** 
  lezaz#id[new] return new image link
  lezaz#id[status] return status of operation 1 mean done and success, 0 mean fail
  lezaz#id[orginal] return orginal image link
  lezaz#id[orginal_w] return orginal image width
  lezaz#id[orginal_h] return orginal image height





  <lezaz:img id="myimage" src="{uploaded}1458470027.png" savein='cache/test' >
  <lezaz:option_img type="resize"  width="150" height="120" ratio="H"/>
  <lezaz:option_img type="cut" width="150" height="150" v-align="middle" h-align="center"/>
  <lezaz:option_img type="flip" direction="b" />
  </lezaz:img>




 */

function lezaz_img($vars, $html) {
    global $lezaz;
    $align_array['left'] = 'L';
    $align_array['center'] = 'C';
    $align_array['right'] = 'R';
    $align_array['top'] = 'T';
    $align_array['middle'] = 'M';
    $align_array['bottom'] = 'B';

    $direction_array['horizontal'] = 'H';
    $direction_array['vertical'] = 'V';
    $direction_array['both'] = 'B';
    $direction_array['h'] = 'H';
    $direction_array['v'] = 'V';
    $direction_array['b'] = 'B';

    if (!$vars['id'])
        return ' ';
    if (!$vars['src'])
        return ' ';
    if ($vars['savein'])
        $vars['savein'] = trim($vars['savein'], '/') . '/';
    $declear = $lezaz->lezaz->declear['img_' . $vars['id']];
    /*

     */


    $code = '$file_image=$lezaz->lezaz_path( "' . $vars['src'] . '");
$file_info = pathinfo($file_image);
$file_myimage ="' . $vars['savein'] . '".md5("myimage_' . $vars['src'] . '"). \'.\' . $file_info[\'extension\'];
$lezaz->file->mkdir(UPLOADED_PATH."' . $vars['savein'] . '");

if(file_exists(UPLOADED_PATH . $file_myimage )){
    echo "<img src=\'".UPLOADED_LINK ."$file_myimage\'>";
}else{
   $myimage = new Ace_Media_Image( $file_image) ; ';


    if (is_array($declear))
        foreach ($declear as $attrs) {
            if ($attrs['type'] == 'cut') {
                if ($attrs['width'] && $attrs['height']) {
                    $p_code.='->cut("' . $attrs['width'] . '", "' . $attrs['height'] . '","' . $align_array[$attrs['h-align']] . '","' . $align_array[$attrs['v-align']] . '")';
                }
            }
            if ($attrs['type'] == 'resize') {
                if (!$attrs['ratio'])
                    $attrs['ratio'] = 'false';
                if ($attrs['width'] && $attrs['height']) {
                    $p_code.='->resize("' . $attrs['width'] . '", "' . $attrs['height'] . '","' . $attrs['ratio'] . '")';
                }
            }
            if ($attrs['type'] == 'flip') {
                if (!$attrs['direction'])
                    $attrs['direction'] = 'b';
                $attrs['direction'] = strtolower($attrs['direction']);
                $p_code.='->flip("' . $direction_array[$attrs['direction']] . '")';
            }
            if ($attrs['type'] == 'rotate') {
                if (!$attrs['angle'])
                    $attrs['angle'] = '30';
                $p_code.='->rotate("' . $attrs['angle'] . '","' . $attrs['backcolor'] . '")';
            }
            if ($attrs['type'] == 'stamp') {
                if ($attrs['file']){
                   if (!$attrs['x'])                    $attrs['x'] = '0';
                   if (!$attrs['y'])                    $attrs['y'] = '0';
                  // echo '->stamp("' . $lezaz->lezaz_path(  $attrs['file'] ) . '","' . $attrs['x'] . '","' . $attrs['y'] . '")';exit();
                $p_code.='->stamp("' . $lezaz->lezaz_path(  $attrs['file'] ) . '","' . $attrs['x'] . '","' . $attrs['y'] . '")';
                }
            }
        }


    $code.= '$myimage' . $p_code . '->save(UPLOADED_PATH . $file_myimage);';
    $code.= '
 echo "<img src=\'".UPLOADED_LINK."$file_myimage\'"; 
            }';

    return "\n<?php $code ?>\n";
}

function lezaz_option_img($vars, $html) {
    return " ";
}
