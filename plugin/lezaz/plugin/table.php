<?php

/*
<lezaz:if/>
Attribute	Description        Default
--------------------------------------------
id           referance for this syntax use like lezaz#id             Null
file         template file                                           null
parameters   any parameter you wont send to this template            null




Example
--------
<lezaz:table id="table_name">
    <lezaz:field name="row1" type="varchar" length="15" option="not null" unique="true" comment="this is comment!"/>
    <lezaz:field name="row2" type="int" length="6" default="0"/>
    <lezaz:field name="row3" type="longtext"/>    
</lezaz:table>

 */

function lezaz_table($vars, $html) {
    global $lezaz;

    $declear =$lezaz->lezaz->declear['table_'.$vars['id']];
        
   
        foreach ($declear as $attrs) {
            if($attrs['name']) {
              if(!$attrs['type']) $attrs['type']= 'VARCHAR';
              if($attrs['length']) $attrs['length']='('.$attrs['length'].') ';
              if($attrs['unique']) $exec_SQL[]='ALTER TABLE '.$vars['id'].' ADD UNIQUE ('.$attrs['name'].');';               
              if($attrs['default']) $attrs['option']=$attrs['option']." default '".$attrs['default']."'";
              if($attrs['comment']) $attrs['option']=$attrs['option']." comment '".$attrs['comment']."'";
              $field[$attrs['name']]=$attrs['type'].$attrs['length'].$attrs['option'];
            }
        }
        
$lezaz->db->create_table($vars['id'],  $field);

if($lezaz->db->tableExists($vars['id'])){
$ece=$lezaz->db->query('SHOW INDEX FROM `'.$vars['id'].'` where Column_name !="id"',1);
if(is_array($ece)) foreach($ece as $v){
    $lezaz->db->execute('ALTER TABLE '.$vars['id'].' DROP  INDEX `'.$v['Key_name'].'`;');
}
 
if(is_array($exec_SQL))
    foreach($exec_SQL as $sql){
        $lezaz->db->execute($sql);        
    }
}
 return '';
   
}


function lezaz_field($vars, $html) {
    return '';
}