معنى لزاز
تاج العروس - (ج 1 / ص 3800)
لِزازٌ : فرَسٌ للنبيِّ صلّى الله تعالى عليه وسلَّم سُمِّي به لشِدَّةِ تَلَزُّزِه واجتماعِ خَلْقِه وهي التي أَهْدَاها المُقَوْقِسُ مَلِكُ الإسكَندرِيَّة مع مارِيَةَ القِبْطِيَّة . 

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
$lezaz->setting('bassamxz','defult value') // get setting , if not exist then print defult value.
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

inside code you can use <lezaz_else/> 

Example
--------
<lezaz:if id='myid' condition="lezaz$parm==1" pass="yes" fail="no" print="false"/>

<lezaz:if id='myid' condition="lezaz$parm==1" pass="yes" fail="no" print="false">
the value for $parm = lezaz$parm and its 1 <br>
<lezaz_else/> 
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

  <lezaz:import/>
  Attribute	Description        Default
  ----------------------------------------------------------------------
  dir    import all files from this dir                           Null
  type         css/js                                             Null
  compress     to compress all files in one                       Null
 * 1   >> without compress 
 * 2   >> with compress                  
  sort        fort import files ASC DESC                          ASC

  inside code you can use list of file to import link like
 * {theme}js/jquery.js ; //inside theme folder use js folder then file 
 * js/jquery.js; //same apove coz defult directory is theme 
 * {template}admin/js/file.js; // inside template folder use admin folder then js file
  TODO: * url:http://sdn.com/file.js -> {theme}js/file.js ;//check if url valid and return 200 then import else import from your server

  Example
  --------
  <lezaz:import dir='js' type="css"/>
  <lezaz:import dir='js' type="css">
  {template}admin/css/file.css
  url:http://sdn.com/file.css -> css/file2.css
  </lezaz:import>
----------------------------------------------------------------------------------

 <lezaz:input/>
  Attribute	Description        Default
  --------------------------------------------
  type        text,password,select,check,radio,button,submit,reset,textarea,date,                             text
  id          referance for this input use like lezaz#id, if there is no attr name we wll use id as name      null
  value       its a value!
  label       label text if no attr label we wll not add label element!
  size        number from 1:12 defult is 9 , this is size of this element
  sizegroup   number from 1:12 defult is 12 , this is size of groub form for this element
  validation >>
  optional or o: Only validate when the field is not empty
  required or r: Field is required
  length[100] or l : Between x and y characters allowed
  Max:7 or M: Set the maximum chr
  min:7 : Set the minimum chr
  confirm[fieldID] c: Match the other field (ie:confirm[password] or c[password])
  telephone or t: Match telephone regEx rule.
  email or e: Match email regEx rule.
  number or n: Numbers only
  nospecialcaracters or s: No special characters allowed
  letter : Letters only
  exemptString : Will not validate if the string match
  date or d:  date format Ex. d[yy,dd,mm:datehere]
  regx : regular expression use like rege:^[a-z\ \']+
  placeholder   normal
  icon          icon for element from awsomefont
  help          show button for help , when press this attr value wll show          Null
  msgvalidation if fail validation this msg wll show                                Null


  Example
  --------
  <lezaz:input id='myid' type="text" label="text" value="x" size="9" validation="r"/>



  button
  ======
  color : info2,purple,pink,light,yellow,grey,white | grey
  size  : xlg,mini,minier,sm | sm width-auto
  border: true,false or 1,0 | 1
  hover : true,false or 1,0 | 1
  option : bold,round,app | Null
  icon : {fontawsome fa-check} like check,trash-o,bigger-160 | Null , left if not null
  icon-right : {fontawsome fa-check} like check,trash-o,bigger-160 | Null , left if not null
 <lezaz:input type="button" color="info2" size="xlg"/>