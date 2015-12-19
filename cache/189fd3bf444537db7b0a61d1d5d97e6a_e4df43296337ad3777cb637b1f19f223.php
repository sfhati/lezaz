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
                <th class="hidden-480">[status]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From members","1000","            
            <tr id="tr%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                <td>%users_sql:name%</td>
                <td>%users_sql:email%</td>
                
                <td class="hidden-phone">[php:"echo date('d/m/Y H:i a',%users_sql:last_update-var%)"end php]</td>
                <td class="hidden-480">
                    [if:"%users_sql:type-var%==1","
                    <span class="label label-inverse arrowed-in">
                        <span class="editable" data-pk="%users_sql:id%" data-source="{'1':'Admin','2':'Store+','3':'Store','4':'Sponser'}" data-type="select" data-name="memb_type" data-url="/?posteditabletype=1">Admin</span>                        
                    </span>
                    "end if]
                    [if:"%users_sql:type-var%==2","
                    <span class="label label-success [style-arrowedleft] arrowed-righ">
                        <span class="editable" data-pk="%users_sql:id%" data-source="{'1':'Admin','2':'Store+','3':'Store','4':'Sponser'}" data-type="select" data-name="memb_type" data-url="/?posteditabletype=1">Store+</span>                                                
                    </span>
                    "end if]
                    [if:"%users_sql:type-var%==3","
                    <span class="label label-purple">
                        <span class="editable" data-pk="%users_sql:id%" data-source="{'1':'Admin','2':'Store+','3':'Store','4':'Sponser'}" data-type="select" data-name="memb_type" data-url="/?posteditabletype=1">Store</span>                                            
                    </span>
                    "end if]
                    [if:"%users_sql:type-var%==4","
                    <span class="label label-important">
                        <span class="editable" data-pk="%users_sql:id%" data-source="{'1':'Admin','2':'Store+','3':'Store','4':'Sponser'}" data-type="select" data-name="memb_type" data-url="/?posteditabletype=1">Sponser</span>                                            
                    </span>
                    "end if]
                </td>
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="#modal-table" onclick="$('#modalid').val('%users_sql:id%')">
                            <i class="fa fa-zoom-in bigger-130"></i>
                        </a>
                        <a class="green" data-url="/admin/page/add_member/&editmember=%users_sql:id%" href="/admin/{{ajxurl}}page/add_member/&editmember=%users_sql:id%">
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
                bootbox.alert("[you can't delete root user!]", function() {});
                return false;
            }
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/?delete_member=' + modaldel.attr('usr'));
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
       
