 
            
            

<title>Check list</title>


<div class="page-header">
	<h1>
		[Check list]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
                
            
            
            
       <lezaz:form id='check_list_form' type='database' table="check_list" >  
            <lezaz:input use="check_list_form"  type="select" id="id_objective" sql="select id,objective from objective" label="[objective]" field-type="int(6)" size-label='2' size='10'  space='10' >
        
            </lezaz:input>                

           
           <lezaz:input use="check_list_form"  type='text' id="question" label="[Question]" field-type="longtext" validation="r" placeholder="[Question]" size-label='2' size='10'  space='10'/> 
 
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_check_list" use="check_list_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div> 
        </lezaz:form>            
lezaz:msg() 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[Check list]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[objective]</th>                
                <th>[Question]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <lezaz:sql id='check_list_sql' sql="Select * From check_list" limit="10000">           
              
            <tr id="trlezaz#check_list_sql[id]">
                 <td>lezaz#check_list_sql[id]</td>
                 <td><lezaz:sql id='hazar_levelx_sql' sql="Select objective From objective where id=lezaz#check_list_sql[id_objective]" limit="1">lezaz#hazar_levelx_sql[objective]</lezaz:sql> </td>
                <td>lezaz#check_list_sql[question]</td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">                       
                        <a class="green" data-url="/add_check_list/&editcheck_list=lezaz#check_list_sql[id]" href="/62_1/?UPDATE_submit_check_list=lezaz#check_list_sql[id]">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="lezaz#check_list_sql[id]" href="javascript:">
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
                    $.ajax('/delete/check_list/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            