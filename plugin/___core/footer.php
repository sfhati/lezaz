<?php
$html = file_get_contents(TEMPLATE_PATH . 'admin/test.inc');

$xx = (get_tag($html));
//print_r($xx);
$yy = get_tag($xx['html']);
print_r($yy);

function get_tag($html) {
    $find = "/<lezaz:/";
    preg_match($find, $html, $tagpos, PREG_OFFSET_CAPTURE);
    $tagpos = $tagpos[0][1];
    if (!$tagpos)
        return '';
    $html = preg_replace($find, '<xxxxx:', $html, 1);
    $startfrom = ($tagpos + 7);
    $i = $startfrom;
    $spacechr = array(' ', "\n", "\r", "\t");
    while ($x <= 10) {

        $chr = substr($html, $i, 1);
        //echo " ($chr) ";
        if (!$tag) {
            if (in_array($chr, $spacechr)) { //get tag name
                $tag = substr($html, $startfrom, ($i - $startfrom));
                $attr_array['tag'] = $tag;
                $attrposstart = $i;
                $attr_name = 0;
                $agnore = 0;
                //return get_tag($html, $i);
            }
        }



        if ($startattrchr && $startattrchrpos) {
            $setval = 0;
            if ($startattrchr == ' ') {
                if (in_array($chr, $spacechr)) {
                    $setval = 1;
                }
            } else if ($chr == $startattrchr) {
                if (substr($html, $i - 1, 1) != "\\") {
                    $setval = 1;
                }
            }
            if ($setval == 1) {
                $attr_value = substr($html, $startattrchrpos + 1, ($i - $startattrchrpos - 1));
                $attr_array['value'][] = $attr_value;
                $attrposstart = $i + 1;
                $attr_name = '';
                $startattrvalue = 0;
                $startattrchr = 0;
                $startattrchrpos = 0;
                $chrhere = 0;
                $agnore = 0;
            }
        } else if ($attr_name && !$startattrchr) {
            if (in_array($chr, $spacechr)) {
                
            } elseif ($chr == '"' || $chr == "'") {
                $startattrchrpos = $i;
                $startattrchr = $chr;
            } else {
                $startattrchrpos = $i;
                $startattrchr = ' ';
            }
        } else if ($attrposstart && !$attr_name) {
            if ($chr == ">") { // close tag!
                if (substr($html, $i - 1, 1) == "/") { // end tag code                    
                    $htmlreplace = substr($html, ($startfrom - 7), (($i - ($startfrom - 7))) + 1);
                    $attr_array['htmltag'] = $htmlreplace;
                    $attr_array['html'] = $html;
                    return $attr_array;
                } else { // innerHTML tag 
                    preg_match_all("/<\/lezaz:" . trim($tag) . ">/", $html, $closetagpos, PREG_OFFSET_CAPTURE);
                    $findinside = 0;
                    foreach ($closetagpos[0] as $closet) {
                        $htmlreplace = substr($html, ($startfrom - 7), (($closet[1] - ($startfrom - 7))) + (strlen($closet[0])));
                        preg_match_all("/<lezaz:" . trim($tag) . "/", $htmlreplace, $opentagposx, PREG_OFFSET_CAPTURE);
                        preg_match_all("/<\/lezaz:" . trim($tag) . ">/", $htmlreplace, $closetagposx, PREG_OFFSET_CAPTURE);
                        $xopen = (1 + count($opentagposx[0])) . '|';
                        $xclose = count($closetagposx[0]);
                        if ($xopen == $xclose) {
                            $attr_array['htmltag'] = $htmlreplace;
                            $attr_array['html'] = $html;
                            return $attr_array;
                        }
                    }
                    return $attr_array;
                }
            }
            if (in_array($chr, $spacechr)) {
                if ($chrhere) {
                    $agnore++;
                } else {
                    $attrposstart = $i + 1;
                }
            } elseif ($chr == '=') {
                $attr_name = substr($html, $attrposstart, ($i - $attrposstart));
                if (trim($attr_name)) {
                    $attr_array['name'][] = $attr_name;
                }
            } else {
                $chrhere = 1;
                if ($agnore) {
                    $attr_name = substr($html, $attrposstart, ($i - $attrposstart - $agnore));
                    if (trim($attr_name)) {
                        $attr_array['name'][] = $attr_name;
                        $attr_array['value'][] = '';
                        $attrposstart = $i;
                        $attr_name = 0;
                        $chrhere = 0;
                        $agnore = 0;
                    }
                }
            }
        }



        if ($chr == Null)
            return $attr_array;
        $i++;
    }
}



echo "\n\n------------------Orginal HTML Code--------------------\n\n$html";
exit();
