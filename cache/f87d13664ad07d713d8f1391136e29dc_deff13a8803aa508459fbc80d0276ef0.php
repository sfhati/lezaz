<?php global $lezaz;?>
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [members]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add member]
        </small>
    </h1>
</div><!-- /.page-header -->     
<div class="row">
    <div class="col-xs-12">        
        
         <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_member")) {
    $memp = $lezaz->db->row("members", " `id`=".$lezaz->get("UPDATE_submit_member"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_member")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_member")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_member");
                $ty = 1;                
            }
                  


                  
                     $data_insert["username"] = $lezaz->post("username");
                          
                     $data_insert["userpassword"] = $lezaz->post("userpassword");
                          
                     $data_insert["useremail"] = $lezaz->post("useremail");
                           
                                  if($_FILES["icon"]["name"]){
                        $x= $lezaz->file->save($_FILES["icon"], "member", "img");
                            $data_insert["icon"] = "member/".$x;
                            }
                          
                     $data_insert["user_type"] = $lezaz->post("user_type");
                          
                     $data_insert["age"] = $lezaz->post("age");
                          
                     $data_insert["sub_type"] = $lezaz->post("sub_type");
                           
if(!$lezaz->msg() && $lezaz->db->save("members",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_username", $_POST["username"]);$lezaz->set("_VAL_userpassword", $_POST["userpassword"]);$lezaz->set("_VAL_useremail", $_POST["useremail"]);$lezaz->set("_VAL_icon", $_POST["icon"]);$lezaz->set("_VAL_user_type", $_POST["user_type"]);$lezaz->set("_VAL_age", $_POST["age"]);$lezaz->set("_VAL_sub_type", $_POST["sub_type"]);}}?>  
        <form id="member_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_member")) { echo "<input type=\"hidden\" name=\"EDIT_submit_member\" value=\"".$lezaz->get("UPDATE_submit_member")."\"/>";} ?>  
            
                       
			<div id="input-username" class="form-group<?php if($lezaz->set("_MSG_username")){echo " has-".$lezaz->set("_MSG_username");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="username"> [user name] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="username" id="username" value="<?php if($lezaz->set("_VAL_username")){echo $lezaz->set("_VAL_username");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="member_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="Enter user name"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
            
                       
			<div id="input-userpassword" class="form-group<?php if($lezaz->set("_MSG_userpassword")){echo " has-".$lezaz->set("_MSG_userpassword");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="userpassword"> [password] </label> 
    
				<div class="col-sm-10">
                                   
<input type="password" name="userpassword" id="userpassword" value="<?php if($lezaz->set("_VAL_userpassword")){echo $lezaz->set("_VAL_userpassword");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="member_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="Enter password"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
            
                       
			<div id="input-useremail" class="form-group<?php if($lezaz->set("_MSG_useremail")){echo " has-".$lezaz->set("_MSG_useremail");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="useremail"> [email] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="useremail" id="useremail" value="<?php if($lezaz->set("_VAL_useremail")){echo $lezaz->set("_VAL_useremail");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="member_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="Enter email"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
            
                       
			<div id="input-icon" class="form-group<?php if($lezaz->set("_MSG_icon")){echo " has-".$lezaz->set("_MSG_icon");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="icon"> [site_icon] </label> 
    
				<div class="col-sm-10">
                                   
<input type="file" name="icon" id="icon"  data-no_file="bassam" class="col-sm-12 imagefile "   use ="member_form"  field-type ="VARCHAR(250) NOT NULL" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
          
            
                       
			<div id="input-user_type" class="form-group<?php if($lezaz->set("_MSG_user_type")){echo " has-".$lezaz->set("_MSG_user_type");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="user_type"> [user_type] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="user_type" name="user_type"  data-placeholder=""   use ="member_form"  field-type ="int(11)" >
    
<option <?php if($lezaz->set("_VAL_user_type")){ if($lezaz->set("_VAL_user_type")=="1") echo "selected ";}else{if(""=="1") echo "selected ";} ?> value="1">admin</option>
<option <?php if($lezaz->set("_VAL_user_type")){ if($lezaz->set("_VAL_user_type")=="2") echo "selected ";}else{if(""=="2") echo "selected ";} ?> value="2">oditer</option>
<option <?php if($lezaz->set("_VAL_user_type")){ if($lezaz->set("_VAL_user_type")=="3") echo "selected ";}else{if(""=="3") echo "selected ";} ?> value="3">department</option> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                      
                        
                       
			<div id="input-age" class="form-group<?php if($lezaz->set("_MSG_age")){echo " has-".$lezaz->set("_MSG_age");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="age"> [age] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="age" id="age" value="<?php if($lezaz->set("_VAL_age")){echo $lezaz->set("_VAL_age");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="member_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="Enter email"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              

           
                       
			<div id="input-sub_type" class="form-group<?php if($lezaz->set("_MSG_sub_type")){echo " has-".$lezaz->set("_MSG_sub_type");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="sub_type"> [department] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="sub_type" name="sub_type"  data-placeholder=""   use ="member_form"  sql ="select id,department_name from department"  field-type ="int(6)" >
    <?php 
        $rows = $lezaz->db->query("select id,department_name from department");
         if (is_array($rows))
        foreach ($rows as $row) {
        $row=array_values($row);
        $selectted="";
        if($lezaz->set("_VAL_sub_type")){ if($lezaz->set("_VAL_sub_type")==$row[0]) $selectted= "selected ";}else{if(""==$row[0]) echo $selectted="selected ";}
            echo "<option  value=\"$row[0]\" $selectted>$row[1]</option> \n";
        }
        ?> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                                                     
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_member"  value="yes"  id="submit_member" class="btn  btn-info btn-sm    "  use ="member_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_8714"  value="[reset]"  id="reset_8714" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
                
<?php echo $lezaz->msg( "" ); ?>
 

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->
<script>
$( document ).ready(function() {
    $('#user_type').on('change',function(){
        if($(this).val()=='3'){
            $('#input-sub_type').show();
        }else{
            $('#input-sub_type').hide();
        }
    });

        if($('#user_type').val()=='3'){
            $('#input-sub_type').show();
        }else{
            $('#input-sub_type').hide();
        }                

});

</script>
<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


