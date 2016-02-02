<?php global $lezaz;?> 
            
            

<title>department</title>


<div class="page-header">
	<h1>
		[system department]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
            
            
            
            
        <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_department")) {
    $memp = $lezaz->db->row("department", " `id`=".$lezaz->get("UPDATE_submit_department"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_department")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_department")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_department");
                $ty = 1;                
            }
                  


                  
                     $data_insert["department_name"] = $lezaz->post("department_name");
                           
if(!$lezaz->msg() && $lezaz->db->save("department",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_department_name", $_POST["department_name"]);}}?>  
        <form id="department_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_department")) { echo "<input type=\"hidden\" name=\"EDIT_submit_department\" value=\"".$lezaz->get("UPDATE_submit_department")."\"/>";} ?>  
            
                       
			<div id="input-department_name" class="form-group<?php if($lezaz->set("_MSG_department_name")){echo " has-".$lezaz->set("_MSG_department_name");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="department_name"> [department name] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="department_name" id="department_name" value="<?php if($lezaz->set("_VAL_department_name")){echo $lezaz->set("_VAL_department_name");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="department_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="[department name]"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
               
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_department"  value="yes"  id="submit_department" class="btn  btn-info btn-sm    "  use ="department_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_14084"  value="[reset]"  id="reset_14084" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
                
<?php echo $lezaz->msg( "" ); ?> 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[department list]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[department name]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <?php 

$lezaz_department_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 10000 ";
 

   $department_sql = $lezaz->db->query("Select * From department $limit");
  $lezaz_department_sql_num =  $lezaz->db->num_row("Select * From department");
 
$lezaz_department_sql_counter=0 + $page_number;
        if (is_array($department_sql))
        foreach ($department_sql as $lezaz_department_sql) {
            if (is_array($lezaz_department_sql)){
            $lezaz_department_sql_x = ($lezaz_department_sql_x == '') ? '' : '';
            
?>
           
              
            <tr id="tr<?php echo $lezaz_department_sql[id]; ?>">
                 <td><?php echo $lezaz_department_sql[id]; ?></td>
                <td><?php echo $lezaz_department_sql[department_name]; ?></td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">                      
                        <a class="green" data-url="/add_department/&editdepartment=<?php echo $lezaz_department_sql[id]; ?>" href="/member_department/?UPDATE_submit_department=<?php echo $lezaz_department_sql[id]; ?>">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="<?php echo $lezaz_department_sql[id]; ?>" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  
<?php
$lezaz_department_sql_counter++;
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
                    $.ajax('/delete/department/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
        
        
        


        
        
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            