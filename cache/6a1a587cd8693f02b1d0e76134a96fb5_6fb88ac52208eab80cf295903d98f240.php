<?php global $lezaz;?> 
            
            

<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[sliders]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[add slider]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row"> 
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"  enctype="multipart/form-data" > 
			<!-- #section:elements.form -->   
                          
[input:"image","image","","[image]","","","[image]"end input]          
[input:"text","slider_title1","","[slider title1] - [arabic]","","r","[slider title1]"end input] 
[input:"text","slider_title2","","[slider title2] - [arabic]","","r","[slider title2]"end input] 
[input:"text","slider_title1e","","[slider title1] - [english]","","r","[slider title1]"end input] 
[input:"text","slider_title2e","","[slider title2] - [english]","","r","[slider title2]"end input] 
[input:"text","slider_title_url","","[slider button text] - [arabic]","","","[slider button text]"end input] 
[input:"text","slider_title_urle","","[slider button text] - [english]","","","[slider button text]"end input] 
[input:"text","slider_url","","[slider url]","","","[slider url]"end input] 
[input:"text","slider_sort","","[sort]","","","[sort]"end input] 





[if:"[var:"editTable1-var"end var]","
[input:"hidden","slider_id"end input] 



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
[input:"hidden","redirect_page","managment_sliders"end input] 
[input:"hidden","tablename","slider"end input]       
 
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
            