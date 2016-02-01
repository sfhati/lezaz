 
            
            

<title>system hazard</title>


<div class="page-header">
	<h1>
		[system hazard3]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[system hazard3]
		</small>
	</h1>
</div>
<div class="row"> 
	<div class="col-xs-12">
	
            
            
            
            
                
            
            
            
       <lezaz:form id='hazar_level3_form' type='database' table="hazar_level3" >  
            <lezaz:input use="hazar_level3_form"  type="select" id="id_hazar_level2" sql="select id,hazardname from hazar_level2" label="[hazard section]" field-type="int(6)" size-label='2' size='10'  space='10' >
        
            </lezaz:input>                

           
           <lezaz:input use="hazar_level3_form"  type='text' id="hazardname" label="[hazard section1]" field-type="VARCHAR(250) NOT NULL" validation="r" placeholder="[hazard section]" size-label='2' size='10'  space='10'/> 
 
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_hazar_level3" use="hazar_level3_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div> 
        </lezaz:form>            
lezaz:msg() 

	

<div class="row-fluid">
    <h3 class="header smaller lighter blue">[hazard section]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[hazard section]</th>                
                <th>[hazard section1]</th>                
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <lezaz:sql id='hazar_level3_sql' sql="Select * From hazar_level3" limit="10000">           
              
            <tr id="trlezaz#hazar_level3_sql[id]">
                 <td>lezaz#hazar_level3_sql[id]</td>
                 <td><lezaz:sql id='hazar_levelx_sql' sql="Select hazardname From hazar_level2 where id=lezaz#hazar_level3_sql[id_hazar_level2]" limit="1">lezaz#hazar_levelx_sql[hazardname]</lezaz:sql> </td>
                <td>lezaz#hazar_level3_sql[hazardname]</td>
                              
 <td class="td-actions ">
                    <div class="action-buttons">
                        <a class="blue" data-toggle="modal" href="/611_2/?id_hazar_level3=lezaz#hazar_level3_sql[id]">
                            <i class="fa fa-plus bigger-130"></i>
                        </a>
                        <a class="green" data-url="/add_hazar_level3/&edithazar_level3=lezaz#hazar_level3_sql[id]" href="/611_2/?UPDATE_submit_hazar_level3=lezaz#hazar_level3_sql[id]">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="lezaz#hazar_level3_sql[id]" href="javascript:">
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
                    $.ajax('/delete/hazar_level3/' + modaldel.attr('usr'));
                    $('#tr' + modaldel.attr('usr')).hide('fast');
                }
            });
        });
});   

 </script>
 


<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


            