 
            
            

<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[add section]
		
	</h1>
</div><!-- /.page-header -->
<div class="row"> 
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"  enctype="multipart/form-data" > 
			<!-- #section:elements.form -->   
                          
[input:"text","section_title_ar","","[title] - [arabic]","","r","[title] - [arabic]"end input] 
[input:"text","section_title_en","","[title] - [english]","","r","[title] - [english]"end input] 





[if:"[var:"editTable1-var"end var]","
[input:"hidden","section_id"end input] 



			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
                                      
[input:"submit","submit_Table1","[update]","btn-info","fa-check"end input]     


[else]

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
                                      
[input:"submit","submit_Table1","[submit]","btn-info","fa-check"end input]     

"end if]

&nbsp; &nbsp;  
[input:"reset","button1","[reset]","","fa-undo"end input]                                     
[input:"hidden","redirect_page","section"end input] 
[input:"hidden","tablename","section"end input]       
 
				</div>
			</div>
                </form> 
			
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->






















<div class="row-fluid">
    <h3 class="header smaller lighter blue">[manage section]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[title] [arabic]</th>
                <th class="hidden-phone">[title] [english]</th> 
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From section","1000","            
            <tr id="tr%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                 <td>%users_sql:title_ar%</td>
                <td>%users_sql:title_en%</td>
                
                
               
 <td class="td-actions ">
                    <div class="action-buttons">                        
                        <a class="green" href="/admin/{{ajxurl}}page/section/&editTable1=%users_sql:id%&tablename=section&redirect_page=section">
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
                    $.ajax('/?delete_t=section&delete_id=' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });


 </script>
 
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->

[include:"{template}admin/jsajax"end include]	
            