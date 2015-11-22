 
<title>[Control Panel] - [configuration]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[configuration]
		
	</h1>
</div><!-- /.page-header -->


<div class="tabbable">

 <ul id="myTab" class="nav nav-tabs">
   <li [if:"[var:"tablename-var"end var]=='floor_type'","class='active'"end if] [if:"![var:"tablename-var"end var]","class='active'"end if]>
      <a href="#floor_type" data-toggle="tab">[floor_type]</a>
   </li>
   <li [if:"[var:"tablename-var"end var]=='building_type'","class='active'"end if]>
      <a href="#building_type" data-toggle="tab">[building_type]</a>
   </li>
   <li [if:"[var:"tablename-var"end var]=='maintenance_type'","class='active'"end if]>
      <a href="#maintenance_type" data-toggle="tab">[maintenance_type]</a>
   </li>
 </ul>

 <div class="tab-content">
   <div class="tab-pane [if:"[var:"tablename-var"end var]=='floor_type'","in active"end if] [if:"![var:"tablename-var"end var]","in active"end if]" id="floor_type"><!-- start floor type -->
     <div class="row">
	<div class="col-xs-12">
             <h3 class="header smaller lighter blue"> 
                 [if:"[var:"editTable1-var"end var] && [var:"tablename-var"end var]=='floor_type'","
                 [edit_floor_type]
                 [else]
                 [add_floor_type]
                 "end if]
             </h3>
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"> 
			<!-- #section:elements.form -->
                         
          
[input:"text","floor_type_type_ar","","[floor_type] - [arabic]","5","r","[floor_type] - [arabic]"end input] 
[input:"text","floor_type_type_en","","[floor_type] - [english]","5","r","[floor_type] - [english]"end input] 
[input:"text","floor_type_color","","[color]","5","r","[color]"end input] 




[if:"[var:"editTable1-var"end var] && [var:"tablename-var"end var]=='floor_type'","
[input:"hidden","floor_type_id"end input] 


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
[input:"hidden","redirect_page","configuration/&tablename=floor_type&[var:"rand-var"end var]"end input] 
[input:"hidden","tablename","floor_type"end input]                                   
				</div>
			</div>
                </form>
			
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->






<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                              
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [floor_type]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[floor_type] - [arabic]</th>
                <th>[floor_type] - [english]</th>
                <th><i class=" fa fa-paint-brush bigger-110 hidden-phone"></i>[color]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From floor_type","1000","            
            <tr id="floor_type%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                 <td>%users_sql:type_ar%</td>
                <td>%users_sql:type_en%</td>
                <td>%users_sql:color%</td>
                
                
               
 <td class="td-actions ">
                    <div class="action-buttons">                        
                        <a class="green" href="/admin/{{ajxurl}}page/configuration/&editTable1=%users_sql:id%&tablename=floor_type&redirect_page=configuration">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" tbl="floor_type" usr="%users_sql:id%" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>
                    </div>
                </td>
               
            </tr>
   "end sql]
            
            
        </tbody>
    </table>
</div>
 

   
                
                
                
                
                
                
                

<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


   </div><!-- end floor type -->
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   <div class="tab-pane  [if:"[var:"tablename-var"end var]=='building_type'","in active"end if]" id="building_type"><!-- start building_type -->
       <div class="row">
	<div class="col-xs-12">
             <h3 class="header smaller lighter blue"> 
                 [if:"[var:"editTable1-var"end var] && [var:"tablename-var"end var]=='building_type'","
                 [edit_building_type]
                 [else]
                 [add_building_type]
                 "end if]
             </h3>
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"> 
			<!-- #section:elements.form -->
                         
          
[input:"text","building_type_type_ar","","[building_type] - [arabic]","5","r","[building_type] - [arabic]"end input] 
[input:"text","building_type_type_en","","[building_type] - [english]","5","r","[building_type] - [english]"end input] 




[if:"[var:"editTable1-var"end var] && [var:"tablename-var"end var]=='building_type'","
[input:"hidden","building_type_id"end input] 


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
[input:"hidden","redirect_page","configuration/&tablename=building_type&[var:"rand-var"end var]"end input] 
[input:"hidden","tablename","building_type"end input]                                   
				</div>
			</div>
                </form>
			
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->






<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                              
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [building_type]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[building_type] - [arabic]</th>
                <th>[building_type] - [english]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From building_type","1000","            
            <tr id="building_type%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                 <td>%users_sql:type_ar%</td>
                <td>%users_sql:type_en%</td>
               
                
                
               
 <td class="td-actions ">
                    <div class="action-buttons">                        
                        <a class="green" href="/admin/{{ajxurl}}page/configuration/&editTable1=%users_sql:id%&tablename=building_type&redirect_page=configuration">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" tbl="building_type" usr="%users_sql:id%" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>
                    </div>
                </td>
               
            </tr>
   "end sql]
            
            
        </tbody>
    </table>
</div>
 

   
                
                
                
                
                
                
                

<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
  
   </div><!-- end building_type -->
   
   
   
   
   
   
   
   
   
   
   
   
   
  
   <div class="tab-pane  [if:"[var:"tablename-var"end var]=='maintenance_type'","in active"end if]" id="maintenance_type"><!-- start maintenance_type -->
       <div class="row">
	<div class="col-xs-12">
             <h3 class="header smaller lighter blue"> 
                 [if:"[var:"editTable1-var"end var] && [var:"tablename-var"end var]=='maintenance_type'","
                 [edit_maintenance_type]
                 [else]
                 [add_maintenance_type]
                 "end if]
             </h3>
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"> 
			<!-- #section:elements.form -->
                         
          
[input:"text","maintenance_type_type_ar","","[maintenance_type] - [arabic]","5","r","[maintenance_type] - [arabic]"end input] 
[input:"text","maintenance_type_type_en","","[maintenance_type] - [english]","5","r","[maintenance_type] - [english]"end input] 




[if:"[var:"editTable1-var"end var] && [var:"tablename-var"end var]=='maintenance_type'","
[input:"hidden","maintenance_type_id"end input] 


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
[input:"hidden","redirect_page","configuration/&tablename=maintenance_type&[var:"rand-var"end var]"end input] 
[input:"hidden","tablename","maintenance_type"end input]                                   
				</div>
			</div>
                </form>
			
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->






<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                              
 
<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [maintenance_type]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[maintenance_type] - [arabic]</th>
                <th>[maintenance_type] - [english]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
    [sql:"users_sql","Select * From maintenance_type","1000","            
            <tr id="maintenance_type%users_sql:id%">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>%users_sql:id%</td>
                 <td>%users_sql:type_ar%</td>
                <td>%users_sql:type_en%</td>
               
                
                
               
 <td class="td-actions ">
                    <div class="action-buttons">                        
                        <a class="green" href="/admin/{{ajxurl}}page/configuration/&editTable1=%users_sql:id%&tablename=maintenance_type&redirect_page=configuration">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" tbl="maintenance_type" usr="%users_sql:id%" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>
                    </div>
                </td>
               
            </tr>
   "end sql]
            
            
        </tbody>
    </table>
</div>
 

   
                
                
                
                
                
                
                

<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
  
   </div><!-- end maintenance_type -->
   
   
   
   
   
   
   
   
   
   
 </div>

</div>




<script>
       
        var modaldel = '';
        $(".deleteuser").click(function() {
            modaldel = $(this);
        }).on(ace.click_event, function() {           
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/?delete_t='+ modaldel.attr('tbl') +'&delete_id=' + modaldel.attr('usr'));
                    $('#' + modaldel.attr('tbl') + modaldel.attr('usr')).hide('fast');
                }
            });
        });


 </script>
 
 
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->

[include:"{template}admin/jsajax"end include]	
       
                