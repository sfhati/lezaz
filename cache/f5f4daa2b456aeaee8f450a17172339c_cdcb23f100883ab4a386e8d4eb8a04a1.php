<?php global $lezaz;?> 
            
            

<title>system hazard</title>


<div class="page-header">
	<h1>
		[system hazard2]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[system hazard2]
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
                
            
            
            
        <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_hazar_level2")) {
    $memp = $lezaz->db->row("hazar_level2", " `id`=".$lezaz->get("UPDATE_submit_hazar_level2"));
    if ($memp && is_array($memp)) {  
        foreach($memp as $k=>$v){
        $lezaz->set("_VAL_".$k,$v);
        }       
    }else{
         $lezaz->set_msg("[Record Not Found!]","info");      
    }         
}                    


        if ($lezaz->post("submit_hazar_level2")) {
            $data_insert="";
            $cond = "";
            $ty = 0;
            $data_insert = "";
            if ($lezaz->post("EDIT_submit_hazar_level2")) {
                $cond = "id = " . $lezaz->post("EDIT_submit_hazar_level2");
                $ty = 1;                
            }
                  


                  
                     $data_insert["id_hazar_level1"] = $lezaz->post("id_hazar_level1");
                          
                     $data_insert["hazardname"] = $lezaz->post("hazardname");
                           
if(!$lezaz->msg() && $lezaz->db->save("hazar_level2",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go();          
}else{
$lezaz->set("_VAL_id_hazar_level1", $_POST["id_hazar_level1"]);$lezaz->set("_VAL_hazardname", $_POST["hazardname"]);}}?>  
        <form id="hazar_level2_form" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   <?php if ($lezaz->get("UPDATE_submit_hazar_level2")) { echo "<input type=\"hidden\" name=\"EDIT_submit_hazar_level2\" value=\"".$lezaz->get("UPDATE_submit_hazar_level2")."\"/>";} ?>  
            
                       
			<div id="input-id_hazar_level1" class="form-group<?php if($lezaz->set("_MSG_id_hazar_level1")){echo " has-".$lezaz->set("_MSG_id_hazar_level1");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="id_hazar_level1"> [hazard section] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="id_hazar_level1" name="id_hazar_level1"  data-placeholder=""   use ="hazar_level2_form"  sql ="select id,hazardname from hazar_level1"  field-type ="int(6)" >
    <?php 
        $rows = $lezaz->db->query("select id,hazardname from hazar_level1");
         if (is_array($rows))
        foreach ($rows as $row) {
        $row=array_values($row);
        $selectted="";
        if($lezaz->set("_VAL_id_hazar_level1")){ if($lezaz->set("_VAL_id_hazar_level1")==$row[0]) $selectted= "selected ";}else{if(""==$row[0]) echo $selectted="selected ";}
            echo "<option  value=\"$row[0]\" $selectted>$row[1]</option> \n";
        }
        ?> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                             

           
           
                       
			<div id="input-hazardname" class="form-group<?php if($lezaz->set("_MSG_hazardname")){echo " has-".$lezaz->set("_MSG_hazardname");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="hazardname"> [hazard section1] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="hazardname" id="hazardname" value="<?php if($lezaz->set("_VAL_hazardname")){echo $lezaz->set("_VAL_hazardname");}else{ echo ""; } ?>"  class="col-sm-12 "   use ="hazar_level2_form"  field-type ="VARCHAR(250) NOT NULL"  placeholder ="[hazard section]"  />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              
 
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_hazar_level2"  value="yes"  id="submit_hazar_level2" class="btn  btn-info btn-sm    "  use ="hazar_level2_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_20478"  value="[reset]"  id="reset_20478" class="btn  btn-grey btn-sm    " > 
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
                <th>[hazard section1]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <?php 

$lezaz_hazar_level2_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 10000 ";
 

   $hazar_level2_sql = $lezaz->db->query("Select * From hazar_level2 $limit");
  $lezaz_hazar_level2_sql_num =  $lezaz->db->num_row("Select * From hazar_level2");
 
$lezaz_hazar_level2_sql_counter=0 + $page_number;
        if (is_array($hazar_level2_sql))
        foreach ($hazar_level2_sql as $lezaz_hazar_level2_sql) {
            if (is_array($lezaz_hazar_level2_sql)){
            $lezaz_hazar_level2_sql_x = ($lezaz_hazar_level2_sql_x == '') ? '' : '';
            
?>
           
              
            <tr id="tr<?php echo $lezaz_hazar_level2_sql[id]; ?>">
                 <td><?php echo $lezaz_hazar_level2_sql[id]; ?></td>
                 <td><?php 

$lezaz_hazar_levelx_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1 ";
 

   $hazar_levelx_sql = $lezaz->db->query("Select hazardname From hazar_level1 where id=$lezaz_hazar_level2_sql[id_hazar_level1] $limit");
  $lezaz_hazar_levelx_sql_num =  $lezaz->db->num_row("Select hazardname From hazar_level1 where id=$lezaz_hazar_level2_sql[id_hazar_level1]");
 
$lezaz_hazar_levelx_sql_counter=0 + $page_number;
        if (is_array($hazar_levelx_sql))
        foreach ($hazar_levelx_sql as $lezaz_hazar_levelx_sql) {
            if (is_array($lezaz_hazar_levelx_sql)){
            $lezaz_hazar_levelx_sql_x = ($lezaz_hazar_levelx_sql_x == '') ? '' : '';
            
?>
<?php echo $lezaz_hazar_levelx_sql[hazardname]; ?>
<?php
$lezaz_hazar_levelx_sql_counter++;
        }}
?>        
    
 </td>
                <td><?php echo $lezaz_hazar_level2_sql[hazardname]; ?></td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="/611_2/?id_hazar_level2=<?php echo $lezaz_hazar_level2_sql[id]; ?>">
                            <i class="fa fa-plus bigger-130"></i>
                        </a>
                        <a class="green" data-url="/add_hazar_level2/&edithazar_level2=<?php echo $lezaz_hazar_level2_sql[id]; ?>" href="/611_1/?UPDATE_submit_hazar_level2=<?php echo $lezaz_hazar_level2_sql[id]; ?>">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="<?php echo $lezaz_hazar_level2_sql[id]; ?>" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  
<?php
$lezaz_hazar_level2_sql_counter++;
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
                    $.ajax('/delete/hazar_level2/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            