<?php global $lezaz;?>
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
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"> 
			<!-- #section:elements.form -->
                         
          
[input:"text","username","","[user name]","5","r;m:8;x:15;ti:members,name","Enter user name"end input] 
[input:"password","userpassword","","[password]","5","r;m:8;x:15","password here"end input] 
[input:"text","useremail","","[email]","5","r;e;ti:members,email","your@mail.com"end input] 

[if:"[var:"editmember-var"end var]","
[input:"hidden","editmemberid"end input] 

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
                                      
[input:"submit","submit_register","[update]","btn-info","fa-check"end input]     


[else]

			<div class="clearfix form-actions">
				<div class="col-md-offset-3 col-md-9">
                                      
[input:"submit","submit_register","[submit]","btn-info","fa-check"end input]     

"end if]

&nbsp; &nbsp;  
[input:"reset","button1","[reset]","","fa-undo"end input]                                     
                                  
				</div>
			</div>
                </form>
			
		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->

[include:"{template}admin/jsajax"end include]	
