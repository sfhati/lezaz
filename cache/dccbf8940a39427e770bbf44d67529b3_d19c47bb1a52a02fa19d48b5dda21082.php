<?php global $lezaz;?> 
            
            

<title>Check list</title>


<div class="page-header">
	<h1>
		[Check list]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
                
            
            
            
        <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_check_list")) {
    $memp = $lezaz->db->row("check_list", " `id`=".$lezaz->get("UPDATE_submit_check_list"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_check_list")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_check_list")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_check_list");
                $ty = 1;                
            }
                  


                  
                     $data_insert["id_objective"] = $lezaz->post("id_objective");
                          
                     $data_insert["question"] = $lezaz->post("question");
                           
if(!$lezaz->msg() && $lezaz->db->save("check_list",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_id_objective", $_POST["id_objective"]);$lezaz->set("_VAL_question", $_POST["question"]);}}?>  
        <form id="check_list_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_check_list")) { echo "<input type=\"hidden\" name=\"EDIT_submit_check_list\" value=\"".$lezaz->get("UPDATE_submit_check_list")."\"/>";} ?>  
            
                       
			<div id="input-id_objective" class="form-group<?php if($lezaz->set("_MSG_id_objective")){echo " has-".$lezaz->set("_MSG_id_objective");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="id_objective"> [objective] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="id_objective" name="id_objective"  data-placeholder=""   use ="check_list_form"  sql ="select id,objective from objective"  field-type ="int(6)" >
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
            
                             

           
           
                       
			<div id="input-question" class="form-group<?php if($lezaz->set("_MSG_question")){echo " has-".$lezaz->set("_MSG_question");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="question"> [Question] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="question" id="question" value="<?php if($lezaz->set("_VAL_question")){echo $lezaz->set("_VAL_question");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="check_list_form"  field-type ="longtext"  placeholder ="[Question]"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
 
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_check_list"  value="yes"  id="submit_check_list" class="btn  btn-info btn-sm    "  use ="check_list_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_22529"  value="[reset]"  id="reset_22529" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
                
<?php echo $lezaz->msg( "" ); ?> 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[Check list]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[objective]</th>                
                <th>[Question]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <?php 

$lezaz_check_list_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 10000 ";
 

   $check_list_sql = $lezaz->db->query("Select * From check_list $limit");
  $lezaz_check_list_sql_num =  $lezaz->db->num_row("Select * From check_list");
 
$lezaz_check_list_sql_counter=0 + $page_number;
        if (is_array($check_list_sql))
        foreach ($check_list_sql as $lezaz_check_list_sql) {
            if (is_array($lezaz_check_list_sql)){
            $lezaz_check_list_sql_x = ($lezaz_check_list_sql_x == '') ? '' : '';
            
?>
           
              
            <tr id="tr<?php echo $lezaz_check_list_sql[id]; ?>">
                 <td><?php echo $lezaz_check_list_sql[id]; ?></td>
                 <td><?php 

$lezaz_hazar_levelx_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1 ";
 

   $hazar_levelx_sql = $lezaz->db->query("Select objective From objective where id=$lezaz_check_list_sql[id_objective] $limit");
  $lezaz_hazar_levelx_sql_num =  $lezaz->db->num_row("Select objective From objective where id=$lezaz_check_list_sql[id_objective]");
 
$lezaz_hazar_levelx_sql_counter=0 + $page_number;
        if (is_array($hazar_levelx_sql))
        foreach ($hazar_levelx_sql as $lezaz_hazar_levelx_sql) {
            if (is_array($lezaz_hazar_levelx_sql)){
            $lezaz_hazar_levelx_sql_x = ($lezaz_hazar_levelx_sql_x == '') ? '' : '';
            
?>
<?php echo $lezaz_hazar_levelx_sql[objective]; ?>
<?php
$lezaz_hazar_levelx_sql_counter++;
        }}
?>        
    
 </td>
                <td><?php echo $lezaz_check_list_sql[question]; ?></td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">                       
                        <a class="green" data-url="/add_check_list/&editcheck_list=<?php echo $lezaz_check_list_sql[id]; ?>" href="/62_1/?UPDATE_submit_check_list=<?php echo $lezaz_check_list_sql[id]; ?>">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="<?php echo $lezaz_check_list_sql[id]; ?>" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  
<?php
$lezaz_check_list_sql_counter++;
        }}
?>        
    
    
            
            
        </tbody>
    </table>
  
</div>






		<!-- PAGE CONTENT ENDS -->
	</div>
</div>


<script>
   $(function(){ 
        var modaldel = '';
        $(".deleteuser").click(function() {
            modaldel = $(this);
        }).on(ace.click_event, function() {         
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/delete/check_list/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            