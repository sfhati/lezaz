 
            
            

<title>system hazard</title>


<div class="page-header">
	<h1>
		[Objective system hazard]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
            
            
            
            
       <lezaz:form id='objective_form' type='database' table="objective" >  
            <lezaz:input use="objective_form"  type='text' id="objective" label="[objective]" field-type="longtext" validation="r" placeholder="[objective]" size-label='2' size='10'  space='10'/> 
               
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_objective" use="objective_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div> 
        </lezaz:form>            
lezaz:msg() 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[objective]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[objective]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <lezaz:sql id='objective_sql' sql="Select * From objective" limit="10000">           
              
            <tr id="trlezaz#objective_sql[id]">
                 <td>lezaz#objective_sql[id]</td>
                <td>lezaz#objective_sql[objective]</td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="/62_1/?id_objective=lezaz#objective_sql[id]">
                            <i class="fa fa-plus bigger-130"></i>
                        </a>
                        <a class="green" data-url="/add_objective/&editobjective=lezaz#objective_sql[id]" href="/62/?UPDATE_submit_objective=lezaz#objective_sql[id]">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="lezaz#objective_sql[id]" href="javascript:">
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
                    $.ajax('/delete/objective/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
        
        
        


        
        
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            