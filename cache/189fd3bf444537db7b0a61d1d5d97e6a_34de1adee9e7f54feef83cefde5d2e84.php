<?php global $lezaz;?>
<title>Control Panel - [manage members]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[members]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[manage members]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                
                
                
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [members]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[user name]</th>
                <th>[email]</th>                
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
            $page_number = ($_REQUEST[page_users_sql] - 1) * 10;
                        
$limit = ''; 
$limit = " LIMIT $page_number , 10 ";
 

   $users_sql = $lezaz->db->query("Select * From members $limit");
  $lezaz_users_sql_num =  $lezaz->db->num_row("Select * From members");
 $lezaz_users_sql_multipage = page_counter($_REQUEST[page_users_sql], $lezaz_users_sql_num, 10, $lezaz->address(), 'users_sql', array (
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
                <td>0</td>
                
                <td class="hidden-phone">000</td>
                <td class="hidden-480">
                   
                  
                    <span class="label label-important">
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

$lezaz_adminmem2="oditer";
 ?>      
     
<?php } 
echo $lezaz_adminmem2;
 ?>

                            
   <?php 
$lezaz_adminmem3="";
 if ($lezaz_users_sql[user_type]==3) { 

$lezaz_adminmem3="department";
 ?>      
     
<?php } 
echo $lezaz_adminmem3;
 ?>

                             
                        </span>                                            
                    </span>
             
                </td>
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="#modal-table" onclick="$('#modalid').val('<?php echo $lezaz_users_sql[id]; ?>')">
                            <i class="fa fa-zoom-in bigger-130"></i>
                        </a>
                        <a class="green" data-url="/add_member/&editmember=<?php echo $lezaz_users_sql[id]; ?>" href="/add_member/?UPDATE_submit_member=<?php echo $lezaz_users_sql[id]; ?>">
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
</div>
 

   
 
 <script>
   $(function(){ 
        var modaldel = '';
        $(".deleteuser").click(function() {
            modaldel = $(this);
        }).on(ace.click_event, function() {
            if(modaldel.attr('usr')==1){
                bootbox.alert("[you can't delete root user!]", function() {});
                return false;
            }
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/delete/members/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
});   

 </script>
 
 
<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


       
