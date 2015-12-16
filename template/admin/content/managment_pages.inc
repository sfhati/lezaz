
<title>Control Panel - [manage pages]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[pages]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[manage pages]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                
                
                
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [pages]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[page name]</th>
                <th>[language]</th>                
                <th class="hidden-phone"><i class=" fa fa-time bigger-110 hidden-phone"></i>[last update]</th>
                <th class="hidden-480">[status]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From pages","1000","            
            <tr id="tr%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                <td>%users_sql:page_name%</td>
 <td class="hidden-480">

                    <span class="label label-inverse arrowed-in">
                        <span class="editable" data-pk="%users_sql:id%" data-source="{'index':'index','sub_en':'sub_en','sub_ar':'sub_ar','index_ar':'index_ar'}" data-type="select" data-name="template" data-url="/?posteditabletype=1">%users_sql:linklabel%</span>                        
                    </span>
                   
                    
                </td>                
                <td class="hidden-phone">[php:"echo date('d/m/Y H:i a',%users_sql:last_update-var%)"end php]</td>
                <td class="hidden-480">

                        <span>%users_sql:page_active%</span>                        
                   
                    
                </td>
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="#modal-table" onclick="$('#modalid').val('%users_sql:id%')">
                            <i class="fa fa-zoom-in bigger-130"></i>
                        </a>
                        <a class="green" href="/admin/{{ajxurl}}page/add_page/&editpage=%users_sql:id%">
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
            if(modaldel.attr('usr')==1){
                bootbox.alert("[you can't delete home page!]", function() {});
                return false;
            }
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/?delete_page=' + modaldel.attr('usr'));
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
       
<script>
/*      $.fn.froala_editor = $.fn.editable.noConflict();
   
      	 $('.editable').editable();
*/


 </script>
 