 
            
            

<title>[add career]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[careers]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[add career]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row"> 
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"  enctype="multipart/form-data" > 
			<!-- #section:elements.form -->   
                          
[input:"text","career_title_ar","","[title] - [arabic]","","r","[title] - [arabic]"end input] 
[input:"text","career_title_en","","[title] - [english]","","r","[title] - [english]"end input] 
[input:"text","career_more_ar","","[title] - [arabic]","","r","[title] - [arabic]"end input] 
[input:"text","career_more_en","","[title] - [english]","","r","[title] - [english]"end input] 
[input:"text","career_sort","","[sort]","","","[sort]"end input] 





[if:"[var:"editTable1-var"end var]","
[input:"hidden","career_id"end input] 



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
[input:"hidden","redirect_page","managment_careers"end input] 
[input:"hidden","tablename","career"end input]       
 
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
            