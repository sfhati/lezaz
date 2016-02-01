 
            
            

<title>department</title>


<div class="page-header">
	<h1>
		[system department]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
            
            
            
            
       <lezaz:form id='department_form' type='database' table="department" >  
            <lezaz:input use="department_form"  type='text' id="department_name" label="[department name]" field-type="VARCHAR(250) NOT NULL" validation="r" placeholder="[department name]" size-label='2' size='10'  space='10'/> 
               
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_department" use="department_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div> 
        </lezaz:form>            
lezaz:msg() 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[department list]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[department name]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <lezaz:sql id='department_sql' sql="Select * From department" limit="10000">           
              
            <tr id="trlezaz#department_sql[id]">
                 <td>lezaz#department_sql[id]</td>
                <td>lezaz#department_sql[department_name]</td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">                      
                        <a class="green" data-url="/add_department/&editdepartment=lezaz#department_sql[id]" href="/member_department/?UPDATE_submit_department=lezaz#department_sql[id]">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="lezaz#department_sql[id]" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  </lezaz:sql>    
            
            
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
                    $.ajax('/delete/department/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
        
        
        


        
        
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            