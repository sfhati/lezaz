<?php global $lezaz;?> 



<title>[plan]</title>
<style>
    .inputcorre{
        clear: both;
        height:100px;
    }
</style>
<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [plan]

    </h1>
</div><!-- /.page-header -->
<div class="row"> 
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
<?php echo $lezaz->msg( "" ); ?>
        <?php 

$lezaz_plan_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1 ";
 

   $plan_sql = $lezaz->db->query("Select * From planning where id=$_GET[plan] $limit");
  $lezaz_plan_sql_num =  $lezaz->db->num_row("Select * From planning where id=$_GET[plan]");
 
$lezaz_plan_sql_counter=0 + $page_number;
        if (is_array($plan_sql))
        foreach ($plan_sql as $lezaz_plan_sql) {
            if (is_array($lezaz_plan_sql)){
            $lezaz_plan_sql_x = ($lezaz_plan_sql_x == '') ? '' : '';
            
?>
  

            <?php 

$lezaz_oditor_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1 ";
 

   $oditor_sql = $lezaz->db->query("Select * From members where id=$lezaz_plan_sql[id_oditor] $limit");
  $lezaz_oditor_sql_num =  $lezaz->db->num_row("Select * From members where id=$lezaz_plan_sql[id_oditor]");
 
$lezaz_oditor_sql_counter=0 + $page_number;
        if (is_array($oditor_sql))
        foreach ($oditor_sql as $lezaz_oditor_sql) {
            if (is_array($lezaz_oditor_sql)){
            $lezaz_oditor_sql_x = ($lezaz_oditor_sql_x == '') ? '' : '';
            
?>
  
                Oditor : <?php echo $lezaz_oditor_sql[username]; ?> <br>
            
<?php
$lezaz_oditor_sql_counter++;
        }}
?>        
    

            <?php 

$lezaz_department_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1 ";
 

   $department_sql = $lezaz->db->query("Select * From department where id=$lezaz_plan_sql[id_department] $limit");
  $lezaz_department_sql_num =  $lezaz->db->num_row("Select * From department where id=$lezaz_plan_sql[id_department]");
 
$lezaz_department_sql_counter=0 + $page_number;
        if (is_array($department_sql))
        foreach ($department_sql as $lezaz_department_sql) {
            if (is_array($lezaz_department_sql)){
            $lezaz_department_sql_x = ($lezaz_department_sql_x == '') ? '' : '';
            
?>
  
                Department : <?php echo $lezaz_department_sql[department_name]; ?> <br>
            
<?php
$lezaz_department_sql_counter++;
        }}
?>        
    


            in : <?php echo $lezaz_plan_sql[date]; ?> <br>
            <h4>Objective:</h4>

            <form method="post">
                <input type='hidden' name='plan_id' value='<?php echo $lezaz->get( "plan" ); ?>'/>                

                    <?php 

$lezaz_objective_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1000 ";
 

   $objective_sql = $lezaz->db->query("Select * From check_list_oditer where id_plan = '" . $lezaz_plan_sql[id] . "' and status='3' $limit");
  $lezaz_objective_sql_num =  $lezaz->db->num_row("Select * From check_list_oditer where id_plan = '" . $lezaz_plan_sql[id] . "' and status='3'");
 
$lezaz_objective_sql_counter=0 + $page_number;
        if (is_array($objective_sql))
        foreach ($objective_sql as $lezaz_objective_sql) {
            if (is_array($lezaz_objective_sql)){
            $lezaz_objective_sql_x = ($lezaz_objective_sql_x == '') ? '' : '';
            
?>
  
                        <?php 

$lezaz_objective1_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1 ";
 

   $objective1_sql = $lezaz->db->query("Select * From objective where id = '" . $lezaz_objective_sql[id_obj] . "' $limit");
  $lezaz_objective1_sql_num =  $lezaz->db->num_row("Select * From objective where id = '" . $lezaz_objective_sql[id_obj] . "'");
 
$lezaz_objective1_sql_counter=0 + $page_number;
        if (is_array($objective1_sql))
        foreach ($objective1_sql as $lezaz_objective1_sql) {
            if (is_array($lezaz_objective1_sql)){
            $lezaz_objective1_sql_x = ($lezaz_objective1_sql_x == '') ? '' : '';
            
?>
 
                            <div class="dd2-content"><?php echo $lezaz_objective1_sql[objective]; ?></div>  

                        
<?php
$lezaz_objective1_sql_counter++;
        }}
?>        
    

                        <?php 

$lezaz_list_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1000 ";
 

   $list_sql = $lezaz->db->query("Select * From check_list where id_objective='" . $lezaz_objective_sql[id_obj] . "' $limit");
  $lezaz_list_sql_num =  $lezaz->db->num_row("Select * From check_list where id_objective='" . $lezaz_objective_sql[id_obj] . "'");
 
$lezaz_list_sql_counter=1 + $page_number;
        if (is_array($list_sql))
        foreach ($list_sql as $lezaz_list_sql) {
            if (is_array($lezaz_list_sql)){
            $lezaz_list_sql_x = ($lezaz_list_sql_x == '') ? '' : '';
            
?>
  

                            
   <?php  if (is_root() || is_editor()) { 

$lezaz_="1";
 ?>      
  
                                <input type='hidden' name='obj_[<?php echo $lezaz_list_sql[id]; ?>]' value='<?php echo $lezaz_objective_sql[id_obj]; ?>'/>

                                <li class="dd-item dd2-item" data-id="14">
                                    <div class="dd-handle dd2-handle">
                                        <label>
                                            <?php echo $lezaz_list_sql_counter; ?>                                   
                                        </label>
                                    </div>
                                    <div class="dd2-content">
                                        <?php echo $lezaz_list_sql[question]; ?>  
                                        <div class="checkbox col-sm-oo"> 
                                            <label> 
                                                <input id="<?php echo $lezaz_list_sql[id]; ?>" name="use_[<?php echo $lezaz_list_sql[id]; ?>]" value="1"  <?php echo $lezaz->get( "_VAL_status_$lezaz_list_sql[id]" ); ?> class="ace ace-switch ace-switch-5 " type="checkbox"  > 
                                                <span class="lbl"> </span> 
                                            </label>
                                        </div>     
                                        <div class='inputcorre'>

                                            <div id="input-icon" class="form-group"> 
                                                <label class="col-sm-2 control-label no-padding-right" for="icon"> 
                                                    [Attatchment] 
                                                </label> 
                                                <div class="col-sm-10"> 
                                                    <input type="file" name="icon_[<?php echo $lezaz_list_sql[id]; ?>]" id="icon"  class="col-sm-12 imagefile "/>
                                                </div>
                                            </div> 
                                            <div class="space-10">
                                            </div> 
                                            <div id='inpt<?php echo $lezaz_list_sql[id]; ?>'> 
                                                <div id="input-note" class="form-group"> 
                                                    <label class="col-sm-2 control-label no-padding-right" for="note"> 
                                                        [Corrective action] 
                                                    </label> 
                                                    <div class="col-sm-10"> 
                                                        <input type="text" name="note_[<?php echo $lezaz_list_sql[id]; ?>]" value='<?php echo $lezaz->get( "_VAL_action_$lezaz_list_sql[id]" ); ?>' class="col-sm-12 " placeholder ="note here"  />
                                                    </div>
                                                </div> 
                                                <div class="space-10">
                                                </div> 
                                                <div id="input-date" class="form-group"> 
                                                    <label class="col-sm-2 control-label no-padding-right" for="date"> 
                                                        [Complete date] 
                                                    </label> 
                                                    <div class="col-sm-10"> 
                                                        <span class="input-icon">
                                                            <input type="text" name="date_[<?php echo $lezaz_list_sql[id]; ?>]" class="col-sm-12  date-picker "   value='<?php echo $lezaz->get( "_VAL_date_$lezaz_list_sql[id]" ); ?>' data-date-format="dd-mm-yyyy"/><i class="ace-icon fa fa-calendar"></i></span>
                                                    </div>
                                                </div> 
                                                <div class="space-10">
                                                </div>                                          

                                            </div>
                                            </li>                      








                                                <?php }else{ ?>
                                            * <?php echo $lezaz_list_sql[question]; ?><br>
                                                
<?php }  ?>


                                            
<?php
$lezaz_list_sql_counter++;
        }}
?>        
    
    
                                            
<?php
$lezaz_objective_sql_counter++;
        }}
?>        
    


                                            
   <?php  if (is_editor() && $lezaz_plan_sql[status]==1) { 

$lezaz_="1";
 ?>      
 
                                                <div class="clearfix form-actions" >   
                                                    <div class="col-md-offset-3 col-md-9 ">
                                                         
<button type="submit"   name="submit_chicklisteditor"  value="yes"  id="submit_chicklisteditor" class="btn  btn-info btn-sm    " > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                                                         
<button type="reset"   name="reset_12552"  value="[reset]"  id="reset_12552" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                 
                                                        <a class="btn btn-sm btn-warning" href="/615_1">
                                                            <i class="ace-icon fa fa-calendar bigger-110"></i>
                                                            <span class="bigger-110 no-text-shadow">View Calendar</span>
                                                        </a>                    
                                                    </div>
                                                </div>                           
                                                
<?php }  ?>
                
                                           
   <?php  if (is_root() && $lezaz_plan_sql[status]==2) { 

$lezaz_="1";
 ?>      
 
                                                <div class="clearfix form-actions" >   
                                                    <div class="col-md-offset-3 col-md-9 ">
                                                         
<button type="submit"   name="submit_chicklisteditor2"  value="yes"  id="submit_chicklisteditor2" class="btn  btn-info btn-sm    " > 
    <i class="ace-icon fa fa-check"></i>  [Confirm] 
 </button>        
            
                                                         
<button type="reset"   name="reset_9968"  value="[reset]"  id="reset_9968" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                 
                                                        <a class="btn btn-sm btn-warning" href="/615_1">
                                                            <i class="ace-icon fa fa-calendar bigger-110"></i>
                                                            <span class="bigger-110 no-text-shadow">View Calendar</span>
                                                        </a>                    
                                                    </div>
                                                </div>                           
                                                
<?php }  ?>
                

                                            </form>


                                            <hr>
                                            <br> counter: <?php echo $lezaz_plan_sql[counter]; ?>
                                            <br> note: <?php echo $lezaz_plan_sql[note]; ?>


                                            
<?php
$lezaz_plan_sql_counter++;
        }}
?>        
    



                                            <!-- PAGE CONTENT ENDS -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <script>
                                        $('.ace-switch').change(function () {
                                            var id = ($(this).attr('id'));
                                            if ($(this).is(":checked")) {
                                                $('#inpt' + id).hide();
                                            } else {
                                                $('#inpt' + id).show();
                                            }
                                        });
                                    </script>
                                    <!-- page specific plugin scripts -->

                                    <!--[if lte IE 8]>
                                      <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
                                    <![endif]-->


