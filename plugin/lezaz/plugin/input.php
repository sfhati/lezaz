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


  button
  ======
  color : info2,purple,pink,light,yellow,grey,white | grey
  size  : xlg,mini,minier,sm | sm width-auto
  border: true,false or 1,0 | 1
  hover : true,false or 1,0 | 1
  option : bold,round,app | Null
  icon : {fontawsome fa-check} like check,trash-o,bigger-160 | Null
  icon-right : {fontawsome fa-check} like check,trash-o,bigger-160 | Null , left if not null
  <lezaz:input type="button" color="info2" size="xlg"/>
 */

function lezaz_input($vars, $html) {
    // General code
    if (!isset($vars['type']))
        $vars['type'] = 'text';
    if (!isset($vars['id']))
        $vars['id'] = $vars['type'] . '_' . rand(44, 44444);
    if (!isset($vars['name']))
        $vars['name'] = $vars['id'];
    if (!isset($vars['value']))
        $vars['value'] = $html;
    if (!isset($vars['sizelabel']))
        $vars['sizelabel'] = '3';
    if (isset($vars['label']))
        $label_text = ' 
       <label class="col-sm-' . $vars['sizelabel'] . ' control-label no-padding-right" for="' . $vars['id'] . '"> ' . $vars['label'] . ' </label> 
    ';
    if (isset($vars['icon'])) {
        //$vars['icon'] = add_str_prefix($vars['icon'], 'fa-');
        //$vars['icon'] = str_replace('fa-bigger', 'bigger', $vars['icon']);
        $icon_html = '<i class="ace-icon fa ' . $vars['icon'] . '"></i>';
    }
    if (isset($vars['icon-right'])) {
        //$vars['icon-right'] = add_str_prefix($vars['icon-right'], 'fa-');
        //$vars['icon-right'] = str_replace('fa-bigger', 'bigger', $vars['icon-right']);
        $icon_right_html = '<i class="ace-icon fa ' . $vars['icon-right'] . '"></i>';
    }



    if ($vars['type'] == 'button' || $vars['type'] == 'submit' || $vars['type'] == 'reset') {
        if ($icon_right_html)
            $icon_right_html = str_replace('"></i>', '', $icon_right_html) . ' icon-on-right"></i>';
        $vars['color'] = add_str_prefix($vars['color'], 'btn-', 'grey');
        $vars['size'] = add_str_prefix($vars['size'], 'btn-', 'sm');
        $vars['option'] = add_str_prefix($vars['option'], 'btn-');
        if (!$vars['border'] && isset($vars['border']))
            $vars['border'] = 'no-border';
        if (!$vars['hover'] && isset($vars['hover']))
            $vars['hover'] = 'no-hover';

        if (!isset($vars['label']))
            $vars['label'] = $html;
        if (!trim($vars['label']))
            $vars['icon'].=' icon-only ';
        $button_html = ' 
<button type="' . $vars['type'] . '" class="btn  ' . $vars['color'] . ' ' . $vars['size'] . ' ' . $vars['option'] . ' ' . $vars['border'] . ' ' . $vars['hover'] . '">' .
                " 
    $icon_html  $vars[label] $icon_right_html
 " . '</button>        
            ';
        return $button_html;
    }



    if ($vars['type'] == 'text' || $vars['type'] == 'password') {
        if ($icon_html)
            $icon_span = ' <span class="input-icon">';
        if ($icon_right_html)
            $icon_span = ' <span class="input-icon input-icon-right">';
        if ($icon_span)
            $close_span = '</span>';
        if ($vars['placeholder'])
            $placeholder = 'placeholder="' . $vars['placeholder'] . '"';
        if (!$vars['size'])
            $vars['size'] = '9';
        if ($vars['valudation']) {
            $validation = '<?php $_SESSION[\'lezaz-validation\'][\'' . $vars['id'] . '\']=' . $vars['valudation'] . '; ?>';
        }
        $input_html = '
                       
			<div id="input-' . $vars['id'] . '" class="form-group<?php if($lezaz->get("_MSG_' . $vars['id'] . '")){echo " has-".$lezaz->get("_MSG_' . $vars['id'] . '");} ?>">
				' . $label_text . '
				<div class="col-sm-' . $vars['size'] . '">
                                   ' . $icon_span . '
<input type="' . $vars['type'] . '" name="' . $vars['name'] . '" id="' . $vars['id'] . '" value="<?php if($lezaz->get("_VAL_' . $vars['id'] . '")){echo $lezaz->get("_VAL_' . $vars['id'] . '");}else{ echo "' . $vars['value'] . '"; } ?>" ' . $placeholder . ' class="col-sm-12" />
' . $icon_right_html . $icon_html . $close_span . '
					
				</div>
			</div>
                        <div class="space-4"></div>
            
             ';
        return $input_html;
    }

    
    
    
    
    
    
    
     if ($vars['type'] == 'checkbox') {

        if (!$vars['size'])
            $vars['size'] = '9';
if($vars['skin']=='1') $class='ace';
elseif($vars['skin']=='2') $class='ace ace-checkbox-2';
elseif($vars['skin']=='3') $class='ace ace-switch';
elseif($vars['skin']=='4') $class='ace ace-switch ace-switch-2';
elseif($vars['skin']=='5') $class='ace ace-switch ace-switch-3';
elseif($vars['skin']=='6') $class='ace ace-switch ace-switch-4';
elseif($vars['skin']=='7') $class='ace ace-switch ace-switch-5';
elseif($vars['skin']=='8') $class='ace ace-switch ace-switch-6';
elseif($vars['skin']=='9') $class='ace ace-switch ace-switch-7';
elseif($vars['skin']=='9') $class='ace ace-switch ace-switch-8';
else $class='';

        $input_html = '
<?php if($lezaz->get("_VAL_' . $vars['name'] . '")){ $_VAL_'.$vars['name'].'_chk = "checked";} ?>            
<div class="checkbox col-sm-' . $vars['size'] . '">
    <label>
            <input id="' . $vars['id'] . '"  name="' . $vars['name'] . '"  value="' . $vars['value'] . '" class="'.$class.'" type="' . $vars['type'] . '" {{lezaz_php}} echo $_VAL_'.$vars['name'].'_chk; {{/lezaz_php}} >
            <span class="lbl"> ' . $vars['label'] . '</span>
    </label>
</div>          
<div class="space-4"></div>            
             ';
        return $input_html;
    } 
  
    
    
    
    
    
    
    
    return '';
}

function add_str_prefix($str, $word, $defult = '') {
    if (!$str && $defult)
        $str = $defult;
    if (!$str)
        return false;
    $a = preg_split("/([\s])+/", $str);
    array_walk($a, create_function('&$it', '$it = \'' . $word . '\'.$it;'));
    return implode(' ', $a);
}

function input_SYNTAX($vars) {
    global $syntaxcode;
    foreach ($vars as $v => $var) {
        $vars[$v] = $syntaxcode->Syntax($var);
    }
    if (!$vars[0])
        $vars[0] = 'text';

    if (!$vars[1])
        $vars[1] = $vars[0] . rand(3000, 90000) . time();
    if (!$vars[3])
        $vars[3] = $vars[0];
    if ($vars[5]) {
        $validate = explode(';', $vars[5]);
        foreach ($validate as $valid) {
            $validation.='<?php validation_register("' . $vars[1] . '","' . $valid . '") ?>' . "\n";
        }
    }
    if ($vars[4]) {
        $size_input = $vars[4];
        $size_lable = 12 - $size_input;
    } else {
        $size_input = 9;
        $size_lable = 3;
    }

    if ($vars[9]) {
        $help = '<div class="help-block col-xs-12 col-sm-reset inline">' . $vars[9] . '</div>';
    }
    if ($vars[8]) {  // icon
        $icon = '<span class="input-group-addon iconleftx"><i class="ace-icon fa ' . $vars[8] . '"></i></span>';
    }
    switch ($vars[0]) {
        case 'text':
        case 'password':
            $input_code = '
			<div id="input-' . $vars[1] . '" class="form-group<?php if(global_var("_SUBMIT_' . $vars[1] . '")){echo " has-error";} ?>">
				<label class="col-sm-2 control-label no-padding-right" for="' . $vars[1] . '"> ' . $vars[3] . ' </label>
				
				<div class="col-sm-9">
                                   ' . $icon . '
					<input type="' . $vars[0] . '" name="' . $vars[1] . '" id="' . $vars[1] . '" value="<?php if(global_var("_VAL_' . $vars[1] . '")){echo global_var("_VAL_' . $vars[1] . '");}else{ echo "' . $vars[2] . '"; } ?>" placeholder="' . $vars[6] . '" class="col-xs-' . $size_input . '" />
                                      &nbsp; &nbsp;  ' . $help . '
					
				</div>
			</div>
                        <div class="space-4"></div>
            
             ';
            break;
        case 'textarea':
            $input_code = '
			<div id="input-' . $vars[1] . '" class="form-group<?php if(global_var("_SUBMIT_' . $vars[1] . '")){echo " has-error";} ?>">
				<label class="col-sm-2 control-label no-padding-right" for="' . $vars[1] . '"> ' . $vars[3] . ' </label>
				
				<div class="col-sm-9">
                                   ' . $icon . '
					<textarea name="' . $vars[1] . '" id="' . $vars[1] . '" placeholder="' . $vars[6] . '" class="col-xs-' . $size_input . '"  ><?php if(global_var("_VAL_' . $vars[1] . '")){echo global_var("_VAL_' . $vars[1] . '");}else{ echo "' . $vars[2] . '"; } ?></textarea>
                                      &nbsp; &nbsp;  ' . $help . '
					
				</div>
			</div>
                        <div class="space-4"></div>
            
             ';
            break;
        case 'hidden':
            $input_code = '<input type="' . $vars[0] . '" name="' . $vars[1] . '" id="' . $vars[1] . '" value="<?php if(global_var("_VAL_' . $vars[1] . '")){echo global_var("_VAL_' . $vars[1] . '");}else{ echo "' . $vars[2] . '"; } ?>" placeholder="' . $vars[6] . '" class="col-xs-' . $size_input . '" />';
            break;

        case 'date':
            $input_code = '
<div id="input-' . $vars[1] . '" class="form-group<?php if(global_var("_SUBMIT_' . $vars[1] . '")){echo " has-error";} ?>">
<label class="col-sm-2 control-label no-padding-right" for="' . $vars[1] . '">' . $vars[3] . '</label>
    <div class="col-sm-9">               
        <div class="input-group">
            <input data-date-format="' . $vars[6] . '" class="form-control date-picker" type="text" name="' . $vars[1] . '" id="' . $vars[1] . '" value="<?php if(global_var("_VAL_' . $vars[1] . '")){echo global_var("_VAL_' . $vars[1] . '");}else{ echo "' . $vars[2] . '"; } ?>" />                    
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
            if ($vars[2] == 'multiple') {
                $multiple = 'multiple="multiple"';
                $namearray = '[]';
            }
            $input_code = '     
            <div class="form-group">
                <label class="col-sm-2 control-label" for="' . $vars[1] . '">' . $vars[3] . '</label>
                <div  class="col-sm-9" > <div  class="col-sm-' . $size_input . '" >
                    <input ' . $multiple . ' name="' . $vars[1] . $namearray . '" class="' . $vars[1] . 'file" type="file" id="' . $vars[1] . '" />
                </div> </div>   
            </div> 
            
            <div class="space-4"></div>
';
            break;

        case 'button':
        case 'submit':
        case 'reset':
            $input_code = ' 
            <button type="' . $vars[0] . '" name="' . $vars[1] . '" id="' . $vars[1] . '" value="' . $vars[2] . '" class="btn ' . $vars[3] . '">
                <i class="ace-icon fa ' . $vars[4] . ' bigger-110"></i>
                ' . $vars[2] . '
            </button>            
             ';

            break;
    }



    return $validation . $input_code;
}
