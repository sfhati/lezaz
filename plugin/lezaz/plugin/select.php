<?php

//  [select:"id:name","caption","rows or data:table(condetion)
//  value:text:selected
//  
//  field_value:field_text
//  
//  ","class","validation"end select]

/*
 * [input:"text","name5","bassam","Enter Your Name","7","r","your name","class1","fa-folder-o blue","there is error in this feild!"end input] 
  use like [input:"0-type","1-id","2-value","3-label","4-size","5-validation","6-placeholder-type","7-class","8-icon color","9-help","10-other code for input element"end input]
 * type : text,password,select,check,radio,button,submit,reset,textarea,date,
 * id : id and name for element , u can use id:name if is deferant 
 * class : chosen-select or multiple="multiple"
 * label : label text
 * size : number from 1:12 defult is 9
 * validation >>
  optional or o: Only validate when the field is not empty
  required or r: Field is required
  data-placeholder="Choose a State..."
  field * = language like name_* = name_ar or name_en
 */

function select_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $vars[$v] = $syntaxcode->Syntax($var);
    }
    if (!$vars[0])
        $vars[0] = 'select_' . rand(3000, 90000) . time();
    if ($vars[4]) {
        $validate = explode(';', $vars[4]);
        foreach ($validate as $valid) {
            $validation.='<?php validation_register("' . $vars[0] . '","' . $valid . '") ?>' . "\n";
        }
    }

    $class = 'xxx ' . strtolower($vars[3]);
    if (strpos($class, 'chosen'))
        $add_class = 'chosen-select';
    if (strpos($class, 'multiple')){
        $add_option = 'multiple="multiple"';
        $ddtoname='[]';
    }

    $data = explode("\n", $vars[2]);
    if (trim($data[0]) == 'rows') {
        array_shift($data);
        foreach ($data as $rows) {
            $rows = trim($rows);
            if ($rows) {
                $row = explode(":", $rows);
                $row = array_map('trim', $row);
                $selected = 'if(global_var("_VAL_'.$vars[0].'")){ if(!is_array(global_var("_VAL_'.$vars[0].'"))) $_VALARRAY_'.$vars[0].'[]=global_var("_VAL_'.$vars[0].'"); if(in_array("'.$row[0].'", $_VALARRAY_'.$vars[0].'))';
                
                if ($row[1] && $row[1] != 'selected') {
                    $selected = '<?php '.$selected.' {echo " selected";}}else{ echo "'.$row[2].'"; } ?>';
                    $input_code.= '<option value="' . $row[0] . '" ' . $selected . '>' . $row[1] . '</option>';
                } else {
                    $selected = '<?php '.$selected.' {echo " selected";}}else{ echo "'.$row[1].'"; } ?>';
                    $input_code.= '<option ' . $selected . '>' . $row[0] . '</option>';
                }
            }
        }
    }else{
   $datat = explode(":", $data[0]); 
    $datat = array_map('trim', $datat);
   if($datat[0]=='data') {
   $tabel = explode("(", $datat[1]);  
   $tabel = array_map('trim', $tabel);  
   if($tabel[1]) //condetion here 
     $condetion = 'where '.  str_replace (')', '', $tabel[1]);
   $tabel=$tabel[0];
   $datasql = explode(":", $data[1]); 
   
 $datasql = array_map('trim', $datasql);  
  if ($datasql[1]) $fields = $datasql[0].'  , '.$datasql[1];
  else{
      $fields =  $datasql[0];
      $datasql[1]=$datasql[0];
  }
 if ($datasql[0]) {
$selected = 'if(global_var("_VAL_'.$vars[0].'")){ if(!is_array(global_var("_VAL_'.$vars[0].'"))) $_VALARRAY_'.$vars[0].'[]=global_var("_VAL_'.$vars[0].'"); else $_VALARRAY_'.$vars[0].'=&global_var("_VAL_'.$vars[0].'"); if(in_array($v[$fld1_' . $vars[0] . '], $_VALARRAY_'.$vars[0].'))';
 
     $input_code1 =  ' 
$fld1_' . $vars[0] . '=  str_replace("*", $_SESSION[lng_CH], "'.$datasql[0].'") ;
$fld2_' . $vars[0] . '=  str_replace("*", $_SESSION[lng_CH], "'.$datasql[1].'") ;         
$flds_' . $vars[0] . '=  str_replace("*", $_SESSION[lng_CH], "'.$fields.'") ;         
$sql_' . $vars[0] . '="";   
$sql_' . $vars[0] . ' = getResults("select $flds_' . $vars[0] . ' from '.$tabel.' '.$condetion.'" );    
  if(is_array($sql_' . $vars[0] . '))  foreach($sql_' . $vars[0] . ' as $k=>$v){
        $selectedin="";
        '.$selected.' $selectedin = " selected";}
        $opt_' . $vars[0] . '.="<option value=\"$v[$fld1_' . $vars[0] . ']\" $selectedin>$v[$fld2_' . $vars[0] . ']</option>";}';
    
  /*   $selected = '<?php if(global_var("_VAL_'.$vars[0].'")=="'.$row[0].'"){echo " selected";}}else{ echo "'.$row[2].'"; } ?>';
//<option value="' . $row[0] . '" ' . $selected . '>' . $row[1] . '</option>';
          */     
 }
//        data:city()
//id:city_name
    }
    }
if($vars[1]){
    $input_code = '<?php '.$input_code1.' ?>
			<div id="input-' . $vars[0] . '" class="form-group<?php if(global_var("_SUBMIT_' . $vars[0] . '")){echo " has-error";} ?>">
				<label class="col-sm-2 control-label no-padding-right" for="' . $vars[0] . '"> ' . $vars[1] . ' </label>
				
				<div class="col-sm-9">
                                    <select ' . $add_option . '  class="' . $add_class . ' form-control" id="' . $vars[0] . '" name="' . $vars[0] . $ddtoname . '" data-placeholder="Choose">
                                        <?php echo $opt_' . $vars[0] . ';?>
                                        '.$input_code.'    
                                    </select>					
				</div>
			</div>
                        <div class="space-4"></div>
            
             ';
}else{
    $input_code = '<?php '.$input_code1.' ?>
			           <select ' . $add_option . '  class="' . $add_class . ' form-control" id="' . $vars[0] . '"  name="' . $vars[0] . $ddtoname . '" data-placeholder="Choose">
                                        <?php echo $opt_' . $vars[0] . ';?>
                                        '.$input_code.'    
                                    </select>									            
             ';
    
}

    return $validation . $input_code;
}
