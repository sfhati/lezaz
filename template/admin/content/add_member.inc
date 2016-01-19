
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
            <lezaz:input use="member_form"  type='text' id="username" label="[user name]" field-type="VARCHAR(250) NOT NULL" validation="r;m:8;x:15;ti:members,username" placeholder="Enter user name" /> 
            <lezaz:input use="member_form"  type='password' id="userpassword" label="[password]"  field-type="VARCHAR(250) NOT NULL" validation="r;m:8;x:15" placeholder="Enter password" /> 
            <lezaz:input use="member_form"  type="image" id="icon" save="member" label="[site_icon]" field-type="VARCHAR(250) NOT NULL" size-label='2' size='10'  space='10' />

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

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


