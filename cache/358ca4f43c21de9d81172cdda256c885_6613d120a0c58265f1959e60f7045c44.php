<?php global $lezaz;?>
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [levels]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add levels]
        </small>
    </h1>
</div><!-- /.page-header -->     
<div class="row">
    <div class="col-xs-12">        

         <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_member")) {
    $memp = $lezaz->db->row("level1", " `id`=".$lezaz->get("UPDATE_submit_member"));
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
                          
                     $data_insert["user_type"] = $lezaz->post("user_type");
                          
                     $data_insert["sub_type"] = $lezaz->post("sub_type");
                           
if(!$lezaz->msg() && $lezaz->db->save("level1",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_username", $_POST["username"]);$lezaz->set("_VAL_user_type", $_POST["user_type"]);$lezaz->set("_VAL_sub_type", $_POST["sub_type"]);}}?>  
        <form id="member_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_member")) { echo "<input type=\"hidden\" name=\"EDIT_submit_member\" value=\"".$lezaz->get("UPDATE_submit_member")."\"/>";} ?>  
            
                       
			<div id="input-username" class="form-group<?php if($lezaz->set("_MSG_username")){echo " has-".$lezaz->set("_MSG_username");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="username"> [objective] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="username" id="username" value="<?php if($lezaz->set("_VAL_username")){echo $lezaz->set("_VAL_username");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="member_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="Enter objective"  />

					
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
            
                             

            
                       
			<div id="input-sub_type" class="form-group<?php if($lezaz->set("_MSG_sub_type")){echo " has-".$lezaz->set("_MSG_sub_type");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="sub_type"> [sub_type] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="sub_type" name="sub_type"  data-placeholder=""   use ="member_form"  field-type ="int(6)" >
    
<option <?php if($lezaz->set("_VAL_sub_type")){ if($lezaz->set("_VAL_sub_type")=="1") echo "selected ";}else{if(""=="1") echo "selected ";} ?> value="1">electric</option>
<option <?php if($lezaz->set("_VAL_sub_type")){ if($lezaz->set("_VAL_sub_type")=="2") echo "selected ";}else{if(""=="2") echo "selected ";} ?> value="2">engineer</option>
<option <?php if($lezaz->set("_VAL_sub_type")){ if($lezaz->set("_VAL_sub_type")=="3") echo "selected ";}else{if(""=="3") echo "selected ";} ?> value="3">technical</option> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                             

            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_member"  value="yes"  id="submit_member" class="btn  btn-info btn-sm    "  use ="member_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_13121"  value="[reset]"  id="reset_13121" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
         




        <div id="addmain"> 
      
        </div>        


        <?php echo $lezaz->msg( "" ); ?>

        <button id='add_addsub' type="button" class="btn btn-sm btn-danger buttonpic">               
            <i class="ace-icon fa fa-plus icon-on-right bigger-110"></i>
        </button>

        <div id="addsub" class="hidden">
            <div id="bassam_000typexc000"> 
                <input  class="class_000typexc000" value="000typexc000_counter"/>    
                <div >
                    <button id='delete_000typexc000' for="bassam_000typexc000" type="button" class="btn btn-sm btn-danger buttonpic">               
                        <i class="ace-icon fa fa-trash-o icon-on-right bigger-110"></i>
                    </button>
                </div>      
            </div>
        </div>   

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->
<script>
    $(document).ready(function() {
        $('#user_type').on('change', function() {
            if ($(this).val() == '3') {
                $('#input-sub_type').show();
            } else {
                $('#input-sub_type').hide();
            }
        });

        if ($('#user_type').val() == '3') {
            $('#input-sub_type').show();
        } else {
            $('#input-sub_type').hide();
        }

    });

</script>
<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


<script>
    $(document).ready(function() {
        $('#addmain div').each(function() {
            var x = $(this).attr('id');//element id flooridhere
            $('*[for="' + x + '"]').click(function() {
                $('#' + x).remove();
            });

        });

        $('#add_addsub').on('click', function() {
            var x = 'X' + Math.floor((Math.random() * 1000000000000000) + 1);//element id flooridhere
            $('#addmain').append($('#addsub').html().replace(/000typexc000/g, x));
            $('#' + 'delete_' + x).click(function() {
                $('#' + $(this).attr('for')).remove();
            });
        });
    });
</script>