
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [members]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add member]
        </small>
    </h1>
</div><!-- /.page-header -->     
<div class="row">
    <div class="col-xs-12">        
        
        <lezaz:form id='member_form' type='database' table="members" >  
            <lezaz:input use="member_form"  type='text' id="username" label="[user name]" field-type="VARCHAR(250) NOT NULL" validation="r;m:8;x:15;ti:members,username" placeholder="Enter user name" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type='password' id="userpassword" label="[password]"  field-type="VARCHAR(250) NOT NULL" validation="r;m:8;x:15" placeholder="Enter password" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type='text' id="useremail" label="[email]"  field-type="VARCHAR(250) NOT NULL" validation="r;e" placeholder="Enter email" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type="image" id="icon" save="member" label="[site_icon]" field-type="VARCHAR(250) NOT NULL"  size-label='2' size='10'  space='10'/>
            <lezaz:input use="member_form"  type="select" id="user_type" save="member" label="[user_type]" field-type="int(11)"  size-label='2' size='10'  space='10'>
                <option value="1">admin</option>
                <option value="2">oditer</option>
                <option value="3">department</option>
            </lezaz:input>                

            <lezaz:input use="member_form"  type="select" id="sub_type" save="member" label="[sub_type]" field-type="int(6)" size-label='2' size='10'  space='10' >
                <option value="1">electric</option>
                <option value="2">engineer</option>
                <option value="3">technical</option>
            </lezaz:input>                
            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_member" use="member_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
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


