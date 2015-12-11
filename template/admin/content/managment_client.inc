
<title>Control Panel - [manage clients]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[clients]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[management clients]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                
                
                
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [clients]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[client_name]</th>
                <th><i class=" fa fa-phone bigger-110 hidden-phone"></i>[phone]</th>                
                <th class="hidden-phone">[address]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From client","1000","            
            <tr id="tr%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                 <td>%users_sql:name%</td>
                <td>%users_sql:phone% - %users_sql:mobile%</td>
                <td>%users_sql:address%</td>
                
                
               
 <td class="td-actions ">
                    <div class="action-buttons">                        
                        <a class="green" href="/admin/{{ajxurl}}page/add_client/&editTable1=%users_sql:id%&tablename=client&redirect_page=managment_client">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="%users_sql:id%" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>
                    </div>
                </td>
               
            </tr>
   "end sql]
            
            
        </tbody>
    </table>
</div>
 

   
 
 <script>
       
        var modaldel = '';
        $(".deleteuser").click(function() {
            modaldel = $(this);
        }).on(ace.click_event, function() {           
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/?delete_t=client&delete_id=' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
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

[include:"{template}admin/jsajax"end include]	
       
