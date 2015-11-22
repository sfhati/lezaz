
<title>Control Panel - [manage buildings]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[buildings]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[manage buildings]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                
                
                
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [buildings]</h3>

    <table id="dynamic-table1" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[building no]</th>
                <th>[building name]</th>
                <th>[owner]</th>
                <th class="hidden-480">[building_type]</th>
                <th class="hidden-480">[address]</th>
                <th class="hidden-phone"><i class=" fa fa-time bigger-110 hidden-phone"></i>[building elevators_no]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From building ORDER BY id ASC","1000","            
            <tr id="tr%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:no%</td>
                <td>%users_sql:nuilding_name%</td>
                <td>
                    [sql:"owner_building_sql","Select * From owner_building where id_building = %users_sql:id-var%","1000","
                    [row:"owner","%owner_building_sql:id_owner-var%","name"end row] <br>
                     "end sql]
                </td> 
                <td>[row:"building_type","%users_sql:type-var%","type_*"end row]</td>
                <td>[row:"city","%users_sql:city-var%","city_name"end row], %users_sql:area%</td>
             
                <td class="hidden-phone">%users_sql:elevators_no%</td>
                
 <td class="td-actions ">   
                    <div class="action-buttons">
                        <a class="green"  href="#modal-table">
                            <i class="fa fa-zoom-in bigger-130"></i>
                        </a>
                        <a class="green" href="/admin/#page/add_building/&editbuilding=%users_sql:id%">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deletebuilding" build="%users_sql:id%" href="javascript:">
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
        $(".deletebuilding").click(function() {
            modaldel = $(this);
        }).on(ace.click_event, function() {

            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/?deletebuilding=' + modaldel.attr('build'));
                    $('#tr' + modaldel.attr('build')).hide('fast');
                }
            });
        });

		

 </script>
 
 
<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<!-- building specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->

[include:"{template}admin/jsajax"end include]	
       
<script>
/*      $.fn.froala_editor = $.fn.editable.noConflict();
   
      	 $('.editable').editable();
*/
$('#dynamic-table1').dataTable({
			bAutoWidth: false,
			"aoColumns": [
			  { "bSortable": false },
			  null, null, null, null,
			  { "bSortable": false }
			],
			"aaSorting": [],
    
    
});

 </script>
 