<?php global $lezaz;?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Theme Template for Bootstrap</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Optional theme -->

    </head>
    <body role="document">

    
         <?php 
                       
                     
                        
                        ?>  <?php
if ($lezaz->get("UPDATE_submit_member")) {
    $memp = $lezaz->db->row("members", " `id`=".$lezaz->get("UPDATE_submit_member"));
    if ($memp && is_array($memp)) {  $lezaz->set("_VAL_username",$memp["username"]);  $lezaz->set("_VAL_userpassword",$memp["userpassword"]);  $lezaz->set("_VAL_useremail",$memp["useremail"]);  $lezaz->set("_VAL_icon",$memp["icon"]);  $lezaz->set("_VAL_user_type",$memp["user_type"]);  $lezaz->set("_VAL_user_sex",$memp["user_sex"]);     }else{
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
                        $x= $lezaz->file->save($_FILES["icon"], "member");
                            $data_insert["icon"] = "member/".$x;
                            }
                          
                     $data_insert["user_type"] = $lezaz->post("user_type");
                          
                     $data_insert["user_sex"] = $lezaz->post("user_sex");
                           
if(!$lezaz->msg() && $lezaz->db->save("members",$data_insert,$cond,$ty)){                
 $lezaz->set_msg("[save & update is done]","success");            
 $lezaz->go("");          
}else{
$lezaz->set("_VAL_username", $_POST["username"]);$lezaz->set("_VAL_userpassword", $_POST["userpassword"]);$lezaz->set("_VAL_useremail", $_POST["useremail"]);$lezaz->set("_VAL_icon", $_POST["icon"]);$lezaz->set("_VAL_user_type", $_POST["user_type"]);$lezaz->set("_VAL_user_sex", $_POST["user_sex"]);}}?>  
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
<option <?php if($lezaz->set("_VAL_user_type")){ if($lezaz->set("_VAL_user_type")=="2") echo "selected ";}else{if(""=="2") echo "selected ";} ?> value="2">member</option> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                      
            
                       
			<div id="input-user_sex" class="form-group<?php if($lezaz->set("_MSG_user_sex")){echo " has-".$lezaz->set("_MSG_user_sex");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="user_sex"> [user_sex] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control " id="user_sex" name="user_sex"  data-placeholder=""   use ="member_form"  field-type ="int(11)" >
    
<option <?php if($lezaz->set("_VAL_user_sex")){ if($lezaz->set("_VAL_user_sex")=="1") echo "selected ";}else{if(""=="1") echo "selected ";} ?> value="1">[male]</option>
<option <?php if($lezaz->set("_VAL_user_sex")){ if($lezaz->set("_VAL_user_sex")=="2") echo "selected ";}else{if(""=="2") echo "selected ";} ?> value="2">[female]</option> 

	</select>				
				</div>
			</div>
                        <div class="space-10"></div> 
            
                      

            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_member"  value="yes"  id="submit_member" class="btn  btn-info btn-sm    "  use ="member_form" > 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_25915"  value="[reset]"  id="reset_25915" class="btn  btn-grey btn-sm    " > 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                                                                         
                </div>
            </div> 
              
        </form>
     
    
    
<?php echo $lezaz->msg( "" ); ?>
        
        
  
<hr>


    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[user name]</th>
                <th class="hidden-phone"><i class=" fa fa-time bigger-110 hidden-phone"></i>[last login]</th>
                <th class="hidden-480">[user_type]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <?php 

$lezaz_users_sql_x='';
if (!$_REQUEST[page_users_sql])
            $page_number = '0';
        else
            $page_number = ($_REQUEST[page_users_sql] - 1) * 5;
                        
$limit = ''; 
$limit = " LIMIT $page_number , 5 ";
 

   $users_sql = $lezaz->db->query("Select * From members $limit");
  $lezaz_users_sql_num =  $lezaz->db->num_row("Select * From members");
 $lezaz_users_sql_multipage = page_counter($_REQUEST[page_users_sql], $lezaz_users_sql_num, 5, $lezaz->address(), 'users_sql', array (
  0 => '',
) );

$lezaz_users_sql_counter=0 + $page_number;
        if (is_array($users_sql))
        foreach ($users_sql as $lezaz_users_sql) {
            
            if (is_array($lezaz_users_sql)){
            $lezaz_users_sql_x = ($lezaz_users_sql_x == '') ? '' : '';
            
?>
           
             
            <tr id="tr<?php echo $lezaz_users_sql[id]; ?>">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td><?php echo $lezaz_users_sql[id]; ?></td>
                <td><?php echo $lezaz_users_sql[username]; ?></td>
                <td><?php echo $lezaz_users_sql[datetime_updated]; ?></td>
                
             
                <td class="hidden-480">
                   
                  
                    <span class="label-important">
                        <span >
                            
   <?php 
$lezaz_adminmem1="";
 if ($lezaz_users_sql[user_type]==1) { 

$lezaz_adminmem1="admin";
 ?>      
     
<?php } 
echo $lezaz_adminmem1;
 ?>

                            
   <?php 
$lezaz_adminmem2="";
 if ($lezaz_users_sql[user_type]==2) { 

$lezaz_adminmem2="member";
 ?>      
     
<?php } 
echo $lezaz_adminmem2;
 ?>
                             
                        </span>                                            
                    </span>
             
                </td>
 <td class="td-actions ">
                    <div class="action-buttons">                     
                        <a class="green" href="/?UPDATE_submit_member=<?php echo $lezaz_users_sql[id]; ?>">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="<?php echo $lezaz_users_sql[id]; ?>" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  
<?php
$lezaz_users_sql_counter++;
        }}
?>        
    
    
            
            
        </tbody>
    </table>
    There is <?php echo $lezaz_users_sql_num; ?> rows <br>
    <?php echo $lezaz_users_sql_multipage; ?>



        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>   
    </body>
</html>