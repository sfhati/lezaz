<?php global $lezaz;?>
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [Planning]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add Planning]
        </small>
    </h1>
</div><!-- /.page-header -->     
<div class="row">
    <div class="col-xs-12">         
         
         <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_planning")) {
    $memp = $lezaz->db->row("planning", " `id`=".$lezaz->get("UPDATE_submit_planning"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_planning")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_planning")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_planning");
                $ty = 1;                
            }
                  


                  
                     $data_insert["date"] = $lezaz->post("date");
                          
                     $data_insert["id_department"] = $lezaz->post("id_department");
                          
                     $data_insert["id_oditor"] = $lezaz->post("id_oditor");
                          
                     $data_insert["id_objective"] = $lezaz->post("id_objective");
                          
                     $data_insert["note"] = $lezaz->post("note");
                           
                                  if($_FILES["icon"]["name"]){
                        $x= $lezaz->file->save($_FILES["icon"], "planning", "img");
                            $data_insert["icon"] = "planning/".$x;
                            }
                          
                     $data_insert["status"] = $lezaz->post("status");
                          
                     $data_insert["counter"] = $lezaz->post("counter");
                           
if(!$lezaz->msg() && $lezaz->db->save("planning",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_date", $_POST["date"]);$lezaz->set("_VAL_id_department", $_POST["id_department"]);$lezaz->set("_VAL_id_oditor", $_POST["id_oditor"]);$lezaz->set("_VAL_id_objective", $_POST["id_objective"]);$lezaz->set("_VAL_note", $_POST["note"]);$lezaz->set("_VAL_icon", $_POST["icon"]);$lezaz->set("_VAL_status", $_POST["status"]);$lezaz->set("_VAL_counter", $_POST["counter"]);}}?>  
        <form id="planning_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_planning")) { echo "<input type=\"hidden\" name=\"EDIT_submit_planning\" value=\"".$lezaz->get("UPDATE_submit_planning")."\"/>";} ?>   
            
                       
			<div id="input-date" class="form-group<?php if($lezaz->set("_MSG_date")){echo " has-".$lezaz->set("_MSG_date");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="date"> [date] </label> 
    
				<div class="col-sm-10">
                                    <span class="input-icon">
<input type="text" name="date" id="date" value="<?php if($lezaz->set("_VAL_date")){echo $lezaz->set("_VAL_date");}else{ echo ""; } ?>"  class="col-sm-12  date-picker "   use ="planning_form"  format ="dd-mm-yyyy"  field-type ="VARCHAR(50) NOT NULL"  data-date-format="dd-mm-yyyy"/>
<i class="ace-icon fa fa-calendar"></i></span>
					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
            
           
                       
			<div id="input-id_department" class="form-group<?php if($lezaz->set("_MSG_id_department")){echo " has-".$lezaz->set("_MSG_id_department");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="id_department"> [department] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="id_department" name="id_department"  data-placeholder=""   use ="planning_form"  sql ="select id,department_name from department"  field-type ="int(6)" >
    <?php 
        $rows = $lezaz->db->query("select id,department_name from department");
         if (is_array($rows))
        foreach ($rows as $row) {
        $row=array_values($row);
        $selectted="";
        if($lezaz->set("_VAL_id_department")){ if($lezaz->set("_VAL_id_department")==$row[0]) $selectted= "selected ";}else{if(""==$row[0]) echo $selectted="selected ";}
            echo "<option  value=\"$row[0]\" $selectted>$row[1]</option> \n";
        }
        ?> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                             
           
                       
			<div id="input-id_oditor" class="form-group<?php if($lezaz->set("_MSG_id_oditor")){echo " has-".$lezaz->set("_MSG_id_oditor");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="id_oditor"> [oditer] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="id_oditor" name="id_oditor"  data-placeholder=""   use ="planning_form"  sql ="select id,username from members where user_type=2"  field-type ="int(6)" >
    <?php 
        $rows = $lezaz->db->query("select id,username from members where user_type=2");
         if (is_array($rows))
        foreach ($rows as $row) {
        $row=array_values($row);
        $selectted="";
        if($lezaz->set("_VAL_id_oditor")){ if($lezaz->set("_VAL_id_oditor")==$row[0]) $selectted= "selected ";}else{if(""==$row[0]) echo $selectted="selected ";}
            echo "<option  value=\"$row[0]\" $selectted>$row[1]</option> \n";
        }
        ?> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                             
           
                       
			<div id="input-id_objective" class="form-group<?php if($lezaz->set("_MSG_id_objective")){echo " has-".$lezaz->set("_MSG_id_objective");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="id_objective"> [objective] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="id_objective" name="id_objective[]" multiple="multiple" data-placeholder=""   use ="planning_form"  sql ="select id,objective from objective"  field-type ="VARCHAR(250) NOT NULL"  multiple ="multiple" >
    <?php 
        $rows = $lezaz->db->query("select id,objective from objective");
         if (is_array($rows))
        foreach ($rows as $row) {
        $row=array_values($row);
        $selectted="";
        if($lezaz->set("_VAL_id_objective")){ if($lezaz->set("_VAL_id_objective")==$row[0]) $selectted= "selected ";}else{if(""==$row[0]) echo $selectted="selected ";}
            echo "<option  value=\"$row[0]\" $selectted>$row[1]</option> \n";
        }
        ?> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                             
            
            
                       
			<div id="input-note" class="form-group<?php if($lezaz->set("_MSG_note")){echo " has-".$lezaz->set("_MSG_note");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="note"> [note] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="note" id="note" value="<?php if($lezaz->set("_VAL_note")){echo $lezaz->set("_VAL_note");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="planning_form"  field-type ="longtext"  placeholder ="note here"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
            
                       
			<div id="input-icon" class="form-group<?php if($lezaz->set("_MSG_icon")){echo " has-".$lezaz->set("_MSG_icon");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="icon"> [site_icon] </label> 
    
				<div class="col-sm-10">
                                   
<input type="file" name="icon" id="icon"  data-no_file="bassam" class="col-sm-12 imagefile "   use ="planning_form"  field-type ="VARCHAR(250) NOT NULL" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
          
                   
             
             
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9 ">
                     
<button type="submit"   name="submit_planning"  value="yes"  id="submit_planning" class="btn  btn-info btn-sm    "  use ="planning_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_31068"  value="[reset]"  id="reset_31068" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                 
<a class="btn btn-sm btn-warning" href="/615_1">
												<i class="ace-icon fa fa-calendar bigger-110"></i>
												<span class="bigger-110 no-text-shadow">View Calendar</span>
											</a>                    
                    
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


