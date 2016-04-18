<?php

class __search {

  private function createPattern($string) {
        $string = preg_replace("/([\.\/\*\+\-\?\^\|\$\(\)\[\]\{\}\"\'\\\\])/s", "\\\\\\1", $string);
        $pattern = array( "/\s+/s");
        $replace = array("\s*");
        return preg_replace($pattern, $replace, addslashes($string));
    }

    function search($search, $exact_search = 1) {
        global $lezaz;

        $dir = CACHE_PATH . 'search/';
        $lezaz->file->mkdir($dir);
        $results_per_page = 10;
        $result[total_searched] = 0;
        $start = $this->getMicrotime();
        if ($exact_search && strlen($search) > 3) {
            $search_pattern = $this->createPattern($search);
        } else {
            $search_words = array();
            foreach (explode(" ", $search) as $word) {
                if (strlen($word) < 3) {
                    continue;
                }

                $search_words[] = $this->createPattern($word);
            }

            $search_pattern = implode("|", $search_words);
            unset($search_words);
        }

        if ($search_pattern == "") {
            $lezaz->set_msg("[Search words must have at least 3 caracteres.]","warning");                        
            return false;
        }

        if (($dh = opendir($dir)) === false) {            
             $lezaz->set_msg("[Could not open search directory!]","warning");
            return false;
        }

        while (($file = readdir($dh)) !== false) {
            $file_path = $dir . $file;
            


/*
            if (!preg_match("/inc/i", $file)) {
                continue;
            }
*/

            $result[total_searched] ++;

            $file_content = @file_get_contents($file_path);
            $file_content = html_entity_decode($this->clearSpaces($this->stripScriptTags($file_content)));

            if (preg_match("'" . $search_pattern . "'si", $file_content, $matches, PREG_OFFSET_CAPTURE) ||
                    preg_match("'" . $search_pattern . "'i", $file)) {
                
                $result[total_found] ++;
                $result[url][] = $lezaz->string->between('<url>', '<url>', $file_content);
                $position = isset($matches[0][1]) ? $matches[0][1] : 0;
                $title = $lezaz->string->between('<title>', '<title>', $file_content);
                if ($title == "")
                    $title = $path;
                $result[title][] = $title;

                $file_content = $this->clearSpaces(strip_tags($file_content));
                if ($position < 120) {
                    $description = substr($file_content, 0, 350);
                } else {
                    $description = substr($file_content, ($position - 120), ($position + 120));

                    if (strlen($description) > 350) {
                        $description = substr($description, 0, 350);
                    }
                }

                $description = preg_replace("'^([^\s]*\s.*?)\s[^\s]*$'i", "\\1", $description);
                $description = preg_replace("'(" . $search_pattern . ")'i", "<strong><span class=\"highlight\">\\1</span></strong>", $description);

                if ($description == "")
                    $description = "No description.";

                else if (strlen($description) < strlen($file_content))
                    $description .= " ...";
                $result[description][] = $description;
            }
        }

        @closedir($dh);




        $result[search_time] = number_format(($this->getMicrotime() - $start), 2, ".", ",");
        $result[page] = ceil($result[total_found] / $results_per_page);

        return $result;
    }

  private  function getMicrotime() {
        list($usec, $sec) = explode(" ", microtime());
        return ((float) $usec + (float) $sec);
    }

   private function getTitle($html) {
    global $lezaz;

        
        return strip_tags($title);
    }

  private  function stripScriptTags($string) {
        $pattern = array("'\/\*.*\*\/'si", "'<\?.*?\?>'si", "'<%.*?%>'si", "'<script[^>]*?>.*?</script>'si");
        $replace = array("", "", "", "");
        return preg_replace($pattern, $replace, $string);
    }

    private function clearSpaces($string, $clear_enters = true) {
        $pattern = ($clear_enters == true) ? ("/\s+/") : ("/[ \t]+/");
        return preg_replace($pattern, " ", trim($string));
    }  
    
    function get_search($str){
        global $lezaz;

        $title=$lezaz->string->between('<!--search_title_start-->', '<!--search_title_end-->', $str);
        $body=$lezaz->string->between('<!--search_body_start-->', '<!--search_body_end-->', $str);
        $url= md5(  $lezaz->address());
        $urltag= '<url>'.   $lezaz->address().'<url>';
        if($title && $body){
        $title='<title>'.$title.'<title>';
        $body='<body>'.$body.'<body>';
            
        $lezaz->file->write(CACHE_PATH. 'search/'.$url.'.txt',"$title\n $body \n $urltag");
        }
        return '' ;
    }
}





$lezaz->listen('output.filter', function($output, $filtered) use ($lezaz){
    $output = empty($filtered) ? $output : $filtered;
    $search = new __search();
    //return $output;
    $search->get_search($output);
    return $output;
});


