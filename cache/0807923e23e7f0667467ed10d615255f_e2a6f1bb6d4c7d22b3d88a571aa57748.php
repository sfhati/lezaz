<?php global $lezaz;?> 
            
            

<title>system hazard</title>


<div class="page-header">
	<h1>
		[Objective system hazard]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
            
            
            
            
        <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_objective")) {
    $memp = $lezaz->db->row("objective", " `id`=".$lezaz->get("UPDATE_submit_objective"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_objective")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_objective")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_objective");
                $ty = 1;                
            }
                  


                  
                     $data_insert["objective"] = $lezaz->post("objective");
                           
if(!$lezaz->msg() && $lezaz->db->save("objective",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_objective", $_POST["objective"]);}}?>  
        <form id="objective_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_objective")) { echo "<input type=\"hidden\" name=\"EDIT_submit_objective\" value=\"".$lezaz->get("UPDATE_submit_objective")."\"/>";} ?>  
            
                       
			<div id="input-objective" class="form-group<?php if($lezaz->set("_MSG_objective")){echo " has-".$lezaz->set("_MSG_objective");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="objective"> [objective] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="objective" id="objective" value="<?php if($lezaz->set("_VAL_objective")){echo $lezaz->set("_VAL_objective");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="objective_form"  field-type ="longtext"  placeholder ="[objective]"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
               
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_objective"  value="yes"  id="submit_objective" class="btn  btn-info btn-sm    "  use ="objective_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_44224"  value="[reset]"  id="reset_44224" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
                
<?php echo $lezaz->msg( "" ); ?> 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[objective]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[objective]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <?php 

$lezaz_objective_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 10000 ";
 

   $objective_sql = $lezaz->db->query("Select * From objective $limit");
  $lezaz_objective_sql_num =  $lezaz->db->num_row("Select * From objective");
 
$lezaz_objective_sql_counter=0 + $page_number;
        if (is_array($objective_sql))
        foreach ($objective_sql as $lezaz_objective_sql) {
            if (is_array($lezaz_objective_sql)){
            $lezaz_objective_sql_x = ($lezaz_objective_sql_x == '') ? '' : '';
            
?>
           
              
            <tr id="tr<?php echo $lezaz_objective_sql[id]; ?>">
                 <td><?php echo $lezaz_objective_sql[id]; ?></td>
                <td><?php echo $lezaz_objective_sql[objective]; ?></td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="/62_1/?id_objective=<?php echo $lezaz_objective_sql[id]; ?>">
                            <i class="fa fa-plus bigger-130"></i>
                        </a>
                        <a class="green" data-url="/add_objective/&editobjective=<?php echo $lezaz_objective_sql[id]; ?>" href="/62/?UPDATE_submit_objective=<?php echo $lezaz_objective_sql[id]; ?>">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="<?php echo $lezaz_objective_sql[id]; ?>" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  
<?php
$lezaz_objective_sql_counter++;
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
                    $.ajax('/delete/objective/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
        
        
        


        
        
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            