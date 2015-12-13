<?php

/*
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
<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1" print="true"/>

<lezaz:sql id='myid' sql="select * from table where id=lezaz$parm" limit="1">
the value of field name = lezaz#myid[name] <br>
</lezaz:sql>



 */

/*
 * [input:"text","name5","bassam","Enter Your Name","7","r","your name","class1","fa-folder-o blue","there is error in this feild!"end input] 
  use like [input:"0-type","1-id","2-value","3-label","4-size","5-validation","6-placeholder-type","7-class","8-icon color","9-help","10-other code for input element"end input]
 * 
 * [for:"lop","4","10","this is %lop% , so can use as a var like %lop-var% "end for] 
  //result
 <?php for($lop=4;$lop<10;$lop++){ ?>
    this is <?php echo "$lop"; ?> , so can use as a var like $lop   
 <?php }?>  
 * 
 * 
 */

function input_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $vars[$v] = $syntaxcode->Syntax($var);
    }
    if(!$vars[0]) $vars[0]='text';
 
    if(!$vars[1]) $vars[1]=$vars[0].rand(3000,90000).time();
    if(!$vars[3]) $vars[3]=$vars[0];
 if($vars[5]){
    $validate = explode(';', $vars[5]);
    foreach($validate as $valid){
        $validation.='<?php validation_register("'.$vars[1].'","'.$valid.'") ?>'."\n";
    }
 }   
 if($vars[4]){
      $size_input=$vars[4];
     $size_lable=12-$size_input;    
 }   else {
     $size_input=9;
     $size_lable=3;
 }
 
 if($vars[9]){
     $help='<div class="help-block col-xs-12 col-sm-reset inline">'.$vars[9].'</div>';
 }
 if($vars[8]){  // icon
     $icon='<span class="input-group-addon iconleftx"><i class="ace-icon fa '.$vars[8].'"></i></span>';   
 }
 switch ($vars[0]) {
    case 'text':
    case 'password':
        $input_code = '
			<div id="input-'.$vars[1].'" class="form-group<?php if(global_var("_SUBMIT_'.$vars[1].'")){echo " has-error";} ?>">
				<label class="col-sm-2 control-label no-padding-right" for="'.$vars[1].'"> '.$vars[3].' </label>
				
				<div class="col-sm-9">
                                   '.$icon.'
					<input type="'.$vars[0].'" name="'.$vars[1].'" id="'.$vars[1].'" value="<?php if(global_var("_VAL_'.$vars[1].'")){echo global_var("_VAL_'.$vars[1].'");}else{ echo "'.$vars[2].'"; } ?>" placeholder="'.$vars[6].'" class="col-xs-'.$size_input.'" />
                                      &nbsp; &nbsp;  '.$help.'
					
				</div>
			</div>
                        <div class="space-4"></div>
            
             ';
        break;
    case 'textarea':
        $input_code = '
			<div id="input-'.$vars[1].'" class="form-group<?php if(global_var("_SUBMIT_'.$vars[1].'")){echo " has-error";} ?>">
				<label class="col-sm-2 control-label no-padding-right" for="'.$vars[1].'"> '.$vars[3].' </label>
				
				<div class="col-sm-9">
                                   '.$icon.'
					<textarea name="'.$vars[1].'" id="'.$vars[1].'" placeholder="'.$vars[6].'" class="col-xs-'.$size_input.'"  ><?php if(global_var("_VAL_'.$vars[1].'")){echo global_var("_VAL_'.$vars[1].'");}else{ echo "'.$vars[2].'"; } ?></textarea>
                                      &nbsp; &nbsp;  '.$help.'
					
				</div>
			</div>
                        <div class="space-4"></div>
            
             ';
        break;
    case 'hidden':
 	$input_code = '<input type="'.$vars[0].'" name="'.$vars[1].'" id="'.$vars[1].'" value="<?php if(global_var("_VAL_'.$vars[1].'")){echo global_var("_VAL_'.$vars[1].'");}else{ echo "'.$vars[2].'"; } ?>" placeholder="'.$vars[6].'" class="col-xs-'.$size_input.'" />';
        break;
    
    case 'date':
 	$input_code = '
<div id="input-'.$vars[1].'" class="form-group<?php if(global_var("_SUBMIT_'.$vars[1].'")){echo " has-error";} ?>">
<label class="col-sm-2 control-label no-padding-right" for="'.$vars[1].'">'.$vars[3].'</label>
    <div class="col-sm-9">               
        <div class="input-group">
            <input data-date-format="'.$vars[6].'" class="form-control date-picker" type="text" name="'.$vars[1].'" id="'.$vars[1].'" value="<?php if(global_var("_VAL_'.$vars[1].'")){echo global_var("_VAL_'.$vars[1].'");}else{ echo "'.$vars[2].'"; } ?>" />                    
            <span class="input-group-addon">
                <i class="fa fa-calendar bigger-110"></i>
            </span>
        </div>
    </div>
</div>
<div class="space-4"></div>
';
        break;
    
    case 'image':
    case 'file':
        if($vars[2] == 'multiple'){
            $multiple='multiple="multiple"';
            $namearray='[]';
        }
        $input_code = '     
            <div class="form-group">
                <label class="col-sm-2 control-label" for="'.$vars[1].'">'.$vars[3].'</label>
                <div  class="col-sm-9" > <div  class="col-sm-'.$size_input.'" >
                    <input '.$multiple.' name="'.$vars[1].$namearray.'" class="'.$vars[1].'file" type="file" id="'.$vars[1].'" />
                </div> </div>   
            </div> 
            
            <div class="space-4"></div>
';
        break;
    
    case 'button':
    case 'submit':
    case 'reset':
        $input_code = ' 
            <button type="'.$vars[0].'" name="'.$vars[1].'" id="'.$vars[1].'" value="'.$vars[2].'" class="btn '.$vars[3].'">
                <i class="ace-icon fa '.$vars[4].' bigger-110"></i>
                '.$vars[2].'
            </button>            
             ';
        
        break;

}   
    
 

    return $validation.$input_code;
}
