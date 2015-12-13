make secure variables using sfhati->var('id'); call by __VAR('id','s'); s=str;i=int;b=bool;sc=spsioal char;e=email;
make all functions in one class 
compress css & js files inside library


-------------------index.php------------------------
execute conf.php
include all php files from classes folder except afterclassload.php
include afterclassload.php
include init.php files from plugin folders 
include index.php files from plugin folders 
set default template file if not set to /template/theme/index.inc 
include footer.php files from plugin folders 
translate template code in $my_simple_tmplt variable
include term.php files from plugin folders 
print $my_simple_tmplt as html page 

------------------conf.php--------------------------
constant db confiner
SITE_DOMAIN		 : domain site (site.com)
SITE_PATH   	 : path for root folder in server 
SITE_IP     	 : IP server
QUERY_STRING	 : QUERY_STRING
SITE_LINK    	 : full url starting with http:// and end with / 
TEMPLATE_FOLDER  : name template folder defult template
UPLOADED_FOLDER  : name uploaded folder defult uploaded
CLASSES_FOLDER	 : name classes folder defult classes
TMP_FOLDER 		 : name tmp folder defult tmp
PLUGIN_FOLDER	 : name plugin folder defult plugin
THEME_FOLDER	 : name theme folder defult sfhati
CACHE_FOLDER	 : name cache folder defult cache
 
TEMPLATE_PATH    : full path root template folder end with / (/home/site/www/template/)
UPLOADED_PATH
CLASSES_PATH
CACHE_PATH
TMP_PATH
PLUGIN_PATH
THEME_PATH

TEMPLATE_LINK	 : full url for template folder end with / (http://www.site.com/template/)
UPLOADED_LINK
CLASSES_LINK
CACHE_LINK
TMP_LINK
PLUGIN_LINK
THEME_LINK

SITE_EMAIL		: defult info@domain
Main_Domain		: server cloud files 
Version			: sfhati version
_CONVERT_PATH	: path for imagic app 
SQL_CACHE		: int value in second for cache result db query
CRYPT_CACHE		: boolean value for crypt cache 
SALT			: salt use for encrypt 

IS_POST			: boolean request 
IS_ADMIN                : admin login or not (true / false)

-------------------Functions.php----------------------
redirect($url) //==== Redirect... Try PHP header redirect, then Java redirect, then try http redirect.:
AddPluginTemplate($plugin_name, $template_file, $sethavecontrol = 0, $template_name = '', $cant_delete = 1)
getAddress() //get url with var`s and return it with ? or & in last to set other var`s
filter_vars($var)  // var check
filter_output($var) // resive filter
filewrite($file, $content)
sett_site($word, $vlu = 0, $tim = 0)
set_cache($var, $val, $time = 0)
get_cache($var)
downloadFile($fullPath, $file_name = '')
LIST_DIR($dir, $listDir = '') //return array key is folder path and value is an array files
Array
(
    [C:\xampp\htdocs\wiki.cms\] => Array
        (
            [0] => .htaccess
            [1] => cache

LIST_Filse($dir) // return array contian all files
Array
(
    [0] => C:\xampp\htdocs\wiki.cms\.htaccess
    [1] => C:\xampp\htdocs\wiki.cms\cache/cachePage_0f6720b85c691ab01a1c3516aebcde09

make_path($path) // create full path folder 
cut_str($inputstr, $delimeterLeft, $delimeterRight) // cut string from x to x 
objectToArray($object) // convert object to array	
rmdir_empty($dir) //remove dir if empty from files
convert_mb($size) //Convert bite to any unit

__MSG($msg,$type=0); return true 
$type = 0 // success
$type = 1 // error
$type = 2 // info
$type = 3 // worning

--------------afterclassload.php--------------------
filter variable
connect to BD by variable $_DB



------------cache plugin----------------------------
use function get_plugin() to create file plugin.tmp
plugin.tmp == all plugin must include 
delete this file when you wont refresh plugin folder 
add file with name RJCT to make plugin not execute 
use function echocachefile($cachefile) to print html page


------------Access template file useing url --------------------------
/t/folder/path/filename
/t/folder/path/filename/
using param 
/t/folder/path/filename/&pram=value&pram=value
/t/folder/path/filename&pram=value&pram=value

Ex. http://wiki.cms/t/Ace1.3.3/html/ajax/bassam&fdgfds=gfds&hgfdhgfd=hgfdh

---------template concept-----------------
{{this}} = path of template file


-------------install-----------------
install folder contain 
install.php
install.sql 
install.zip 


------------lezaz----------------------
lezaz~func(parm1,parm2) // for function call and echo result  its mean  func(parm1,parm2) 
lezaz#id // echo value for lezaz syntax use id  its mean $lezaz_id
lezaz#id[parm] // echo value for lezaz syntax use id parameter  its mean  $lezaz_id[parm]
lezaz$parm // echo $parm from php files  its mean $parm 
lezaz$parm[item] // echo array item from $parm using in php files  its mean $parm[item] 
lezaz:func(parm) // echo result from lezaz class its mean $lezaz->func(parm)
    lezaz:get(param) = $_GET[param]
    lezaz:post(param) = $_POST[param]
    lezaz:cons(param) = param
    lezaz:sess(param) = $_SESSION[param]
    lezaz:sess(param,key) = $_SESSION[param][key]

*********************************************************

>>>setting file in theme folder with name setting.ini
$lezaz->setting('bassamxz') // get setting
$lezaz->setting('bassamxz','defult value') // get setting , if not exeist then print defult value.
$lezaz->setsetting('bassamxz','xxcc'); // add setting
$lezaz->setsetting('bassamxz'); // remove setting
    
*********************************************************




 
<<lezaz:if/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id             Null
condition    condition if syntax                                     1==1
pass         return this value if pass                               1
fail         return this value if fail                               0
print        print result attr if value = any pass like 1,true,yes   0

inside code you can use <lezaz:else/> 

Example
--------
<lezaz:if id='myid' condition="lezaz$parm==1" pass="yes" fail="no" print="false"/>

<lezaz:if id='myid' condition="lezaz$parm==1" pass="yes" fail="no" print="false">
the value for $parm = lezaz$parm and its 1 <br>
<lezaz:else/> 
the value for $parm = lezaz$parm and its not 1
</lezaz:if>
the result for if syntax is lezaz#myid

----------------------------------------------------------------------------------
  <lezaz:for/>
  Attribute	Description        Default
  --------------------------------------------
  id         referance for this syntax use like lezaz#id             Null
  condition  condition for syntax you can use $i as primary          $i<=to
  from       start count for from                                    1
  to         end count for                                           10
  step       number of step jump                                     0
  print        print result attr if value = any pass like 1,true,yes 0

  inside code you can use lezaz#id to print for value repete

  Example
  --------
  <lezaz:for id='idfor' from="5" to="100" step="5"/>

  <lezaz:for id="idfor" from='3' condition='$i<lezaz:get(bass)' to='27' step='1' print='false'>
  lezaz#idfor <br>
  </lezaz:for>
  the result syntax is lezaz#idfor as last value for this variable

----------------------------------------------------------------------------------
  <lezaz:block/>
  Attribute	Description        Default
  --------------------------------------------
  id         referance for this syntax use like lezaz#id             Null
  file       template file to include                                Null
  param1     you can use parameter to set before including file      Null

  Example
  --------
    <lezaz:block file="header_en" param1="bassam" param2="ahmad"/>
    <lezaz:block id='myid' file="{template}folder/template.inc"/>


----------------------------------------------------------------------------------

<lezaz:sql/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id                   Null
sql          SQL syntax                                                    null
limit        number of rows to show                                        null
style1 
multipage    for using pagination value = true                             false      
print        print result attr if value = any pass like 1,true,yes         0
counter      initial value for counter parameter                           1

inside code you can use lezaz#id[field] >> print field value
                        lezaz#id_num >> print number of rows 
                        lezaz#id_counter >> print counter for this row or last counter if use after colse sql
                        lezaz#id_multipage >> show paginition

Example
--------
<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1" print="true"/>

<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1">
the value of field name = lezaz#myid[name] <br>
</lezaz:sql>

----------------------------------------------------------------------------------

 <lezaz:each/>
  Attribute	Description        Default
  --------------------------------------------
  id         referance for this syntax use like lezaz#id             Null
  array      array parameter without $ or $_SESSION                  Null
  type       type of array use session for $_SESSION['array']        variable  you can use session,server,get,post,cookie,request,variable
  counter    initial value for counter parameter                     1

  inside code you can use
  lezaz#id_key to print key item
  lezaz#id_value to print value item
  lezaz#id_counter to print counter item

  Example
  --------
  <lezaz:each id='ideach' array="variable1" type="session" counter="5" />

  <lezaz:each id='ideach' array="variable1" type="session" counter="5">
  lezaz#ideach_counter: lezaz#ideach_key =>  lezaz#ideach_value <br>
  </lezaz:each>
  the result syntax for lezaz#ideach is true if there is at least 1 item in array

----------------------------------------------------------------------------------
