<?php


echo '>>>'.$lezaz->get('bass');
/* * *********************************************************** /\
  /\* sfhati frame work                                         /\/\
  \/* Author : bassam essawi [bastr3]                          /\/\/\
  /\* @sfhati.com[at]gmail                                    /\/\/\/\
  \/* Site : sfhati.com                                      /\BASTR3/\
  /\* Date : 16-02-2011                                     /\/\/\/\/\/\
  \/* Virsion : 1.2                                        /\/\/\/\/\/\/\
  \****************************************************** */
if (!defined('YOUCANINCLUDE'))
    exit('No direct script access allowed');
global $_DB;
$rs = $lezaz->db->query("$sql");
$rows =$_DB->rowcount() ;
      $sql="SELECT * FROM `pages`";
        $_pagination = page_counter($_REQUEST[$page], $rows, $count_nu, getAddress(), 'sqlid', var_export($style, true)  );
        
        $limit = " LIMIT $page_number , $count_nu ";    
          $sql_id = getResults("$sql $limit");
   if (is_array($sql_id))
        foreach ($sql_id as $row) {
            $counter++;
        }
/*
[element:"type","name","lable","rules","msg rules","filter","style","more option"end element]

---Type---
group,hidden,reset,checkbox,file,color,image,password,
radio,button,submit,select,text,textarea,link,date,static,
header,html,autocomplete,

---rules---
required,maxlength,minlength,rangelength,email,regex,
lettersonly,alphanumeric,numeric,nopunctuation,
nonzero,compare,callback[function name]

---filter---
trim , lowercase,hgircase,callback[function name]

 *  */