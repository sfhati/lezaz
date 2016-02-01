
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [Planning]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add Planning]
        </small>
    </h1>
</div><!-- /.page-header -->     
<div class="row">
    <div class="col-xs-12">         
         
        <lezaz:form id='planning_form' type='database'  table="planning" >   
            <lezaz:input use="planning_form"  type='date' format="dd-mm-yyyy" icon="fa-calendar" id="date" label="[date]" field-type="VARCHAR(50) NOT NULL" validation="r" size-label='2' size='10'  space='10'/> 
            
           <lezaz:input use="planning_form"  type="select" id="id_department" sql="select id,department_name from department" label="[department]" field-type="int(6)" size-label='2' size='10'  space='10' ></lezaz:input>                
           <lezaz:input use="planning_form"  type="select" id="id_oditor" sql="select id,username from members where user_type=2" label="[oditer]" field-type="int(6)" size-label='2' size='10'  space='10' ></lezaz:input>                
           <lezaz:input use="planning_form"  type="select" id="id_objective" sql="select id,objective from objective" label="[objective]" field-type="VARCHAR(250) NOT NULL" size-label='2' size='10'  space='10' multiple="multiple"></lezaz:input>                
            
            <lezaz:input use="planning_form"  type='text' id="note" label="[note]" field-type="longtext" validation="r" placeholder="note here" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="planning_form"  type="image" id="icon" save="planning" label="[site_icon]" field-type="VARCHAR(250) NOT NULL"  size-label='2' size='10'  space='10'/>
                   
            <lezaz:input use="planning_form"  type='hidden' id="status" field-type="int(1)"/> 
            <lezaz:input use="planning_form"  type='hidden' id="counter" field-type="int(1)"/> 
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9 ">
                    <lezaz:input id="submit_planning" use="planning_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />     
<a class="btn btn-sm btn-warning" href="/615_1">
												<i class="ace-icon fa fa-calendar bigger-110"></i>
												<span class="bigger-110 no-text-shadow">View Calendar</span>
											</a>                    
                    
                </div>
            </div> 
        </lezaz:form>            
lezaz:msg()
 

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->
<script>
$( document ).ready(function() {
    $('#user_type').on('change',function(){
        if($(this).val()=='3'){
            $('#input-sub_type').show();
        }else{
            $('#input-sub_type').hide();
        }
    });

        if($('#user_type').val()=='3'){
            $('#input-sub_type').show();
        }else{
            $('#input-sub_type').hide();
        }                

});

</script>
<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


