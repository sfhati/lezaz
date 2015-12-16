 
            
            

<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[projects]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[add project]
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row"> 
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
                <form id="formregister" class="form-horizontal" role="form" method="post" target="ajaxform"  enctype="multipart/form-data" > 
			<!-- #section:elements.form -->   
[input:"text","project_title_ar","","[title] - [arabic]","","r","[title] - [arabic]"end input] 
[input:"text","project_title_en","","[title] - [english]","","r","[title] - [english]"end input]                           
[input:"image","image","","[image]","","","[image]"end input]     

            <div  class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[page content] - [arabic]</label>
                <div  class='col-sm-10' >
                    <textarea  name='project_more_ar' id='edittextarea' style="margin-top: 30px;">[var:"_VAL_project_more_ar"end var]</textarea>
                </div>  
            </div>     
            
            <div class="space-4"></div>
           <div  class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[page content] - [english]</label>
                <div  class='col-sm-10' >
                    <textarea  name='project_more_en' id='edittextarea' style="margin-top: 30px;">[var:"_VAL_project_more_en"end var]</textarea>
                </div>  
            </div>     
            
            <div class="space-4"></div>


[input:"text","project_url","","[url]","","","[url]"end input] 
[input:"image","multiple_image","multiple","[image]","","","[image]"end input]   
[input:"text","project_sort","","[sort]","","","[sort]"end input] 


 


[if:"[var:"editTable1-var"end var]","
[input:"hidden","project_id"end input] 

[php:"
$filesx=0;
$dirfile='project/'.$_GET[editTable1].'/';
$files=LIST_Filse(UPLOADED_PATH.$dirfile);
foreach($files as $linkfile=>$file){
$filesx++;
echo
'
<div class="dd-handle">
    '.$linkfile.'
    <div id="file_'.$filesx.'" class="pull-right action-buttons">
        <a class="blue" target="_f" href="'.UPLOADED_LINK.$dirfile.'/'.$linkfile.'">
            <i class="ace-icon fa fa-camera bigger-130"></i>
        </a>

        <a class="red deletefiles" forx="file_'.$filesx.'" file="'.$linkfile.'" href="javascript:">
            <i class="ace-icon fa fa-trash-o bigger-130"></i>
        </a>
    </div>
</div>
';
}
"end php] 


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
[input:"hidden","redirect_page","managment_projects"end input] 
[input:"hidden","tablename","project"end input]       
 
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
<script>
       
        var modaldel = '';
        $(".deletefiles").click(function() {
            modaldel = $(this);
        }).on(ace.click_event, function() {           
            bootbox.confirm("[are you sure?]", function(result) {
                if (result) {
                    $.ajax('/?deletefolder=projectSLASH[var:"editTable1"end var]&deletefile=' + modaldel.attr('file'));
                    $('#' + modaldel.attr('forx')).hide('fast');
                }
            });
        });


 </script>
 
[include:"{template}admin/jsajax"end include]	
            