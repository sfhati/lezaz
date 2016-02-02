<?php global $lezaz;?> 
            
            

<title>system hazard</title>


<div class="page-header">
	<h1>
		[system hazard]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[system hazard]
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
            
            
            
            
        <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_hazar_level1")) {
    $memp = $lezaz->db->row("hazar_level1", " `id`=".$lezaz->get("UPDATE_submit_hazar_level1"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_hazar_level1")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_hazar_level1")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_hazar_level1");
                $ty = 1;                
            }
                  


                  
                     $data_insert["hazardname"] = $lezaz->post("hazardname");
                           
if(!$lezaz->msg() && $lezaz->db->save("hazar_level1",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_hazardname", $_POST["hazardname"]);}}?>  
        <form id="hazar_level1_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_hazar_level1")) { echo "<input type=\"hidden\" name=\"EDIT_submit_hazar_level1\" value=\"".$lezaz->get("UPDATE_submit_hazar_level1")."\"/>";} ?>  
            
                       
			<div id="input-hazardname" class="form-group<?php if($lezaz->set("_MSG_hazardname")){echo " has-".$lezaz->set("_MSG_hazardname");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="hazardname"> [hazard section] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="hazardname" id="hazardname" value="<?php if($lezaz->set("_VAL_hazardname")){echo $lezaz->set("_VAL_hazardname");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="hazar_level1_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="[hazard section]"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
               
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_hazar_level1"  value="yes"  id="submit_hazar_level1" class="btn  btn-info btn-sm    "  use ="hazar_level1_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_24824"  value="[reset]"  id="reset_24824" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
                
<?php echo $lezaz->msg( "" ); ?> 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[hazard section]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[hazard section]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <?php 

$lezaz_hazar_level1_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 10000 ";
 

   $hazar_level1_sql = $lezaz->db->query("Select * From hazar_level1 $limit");
  $lezaz_hazar_level1_sql_num =  $lezaz->db->num_row("Select * From hazar_level1");
 
$lezaz_hazar_level1_sql_counter=0 + $page_number;
        if (is_array($hazar_level1_sql))
        foreach ($hazar_level1_sql as $lezaz_hazar_level1_sql) {
            if (is_array($lezaz_hazar_level1_sql)){
            $lezaz_hazar_level1_sql_x = ($lezaz_hazar_level1_sql_x == '') ? '' : '';
            
?>
           
              
            <tr id="tr<?php echo $lezaz_hazar_level1_sql[id]; ?>">
                 <td><?php echo $lezaz_hazar_level1_sql[id]; ?></td>
                <td><?php echo $lezaz_hazar_level1_sql[hazardname]; ?></td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="/611_1/?id_hazar_level1=<?php echo $lezaz_hazar_level1_sql[id]; ?>">
                            <i class="fa fa-plus bigger-130"></i>
                        </a>
                        <a class="green" data-url="/add_hazar_level1/&edithazar_level1=<?php echo $lezaz_hazar_level1_sql[id]; ?>" href="/611/?UPDATE_submit_hazar_level1=<?php echo $lezaz_hazar_level1_sql[id]; ?>">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="<?php echo $lezaz_hazar_level1_sql[id]; ?>" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  
<?php
$lezaz_hazar_level1_sql_counter++;
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
                    $.ajax('/delete/hazar_level1/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
        
        
        


        
        
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            