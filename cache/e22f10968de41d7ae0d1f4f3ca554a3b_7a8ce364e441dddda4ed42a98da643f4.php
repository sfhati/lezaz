<?php global $lezaz;?>
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [Settings]
     
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form  id="formproduct" class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <!-- #section:elements.form -->

            
             <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[use ajax]</label>
                <div  class='col-sm-9' >
<label>
    <input type="checkbox" name="use_ajax" value="1" [var:"_VAL_use_ajax"end var]  class="ace ace-switch" />
  <span class="lbl"></span>
 </label>
                </div>   
            </div> 

            
            
            
            
            <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[Choose skin]</label>
                <div  class='col-sm-9' >
            <select class="form-control" name="skinchoose">
                <option value="no-skin" [if:"[var:"skin-var"end var]=='no-skin' "," selected='selected'"end if]>[Defult skin]</option>
                <option value="skin-1" [if:"[var:"skin-var"end var]=='skin-1' "," selected='selected'"end if]>[skin-1]</option>
                <option value="skin-2" [if:"[var:"skin-var"end var]=='skin-2' "," selected='selected'"end if]>[skin-2]</option>
                <option value="no-skin skin-3" [if:"[var:"skin-var"end var]=='no-skin skin-3' "," selected='selected'"end if]>[skin-3]</option>
            </select>            

                </div>   
            </div> 
            
 
            

            
 
<div class="space-4"></div>
            [input:"text","site_title","","[site_title]-[english]","12","","Enter title"end input] 
            [input:"text","site_titlear","","[site_title]-[arabic]","12","","Enter title"end input] 
            [input:"text","site_phone","","[site_phone]","12","","+966 (55555555)"end input] 
            [input:"text","site_email","","[site_email]","12","","email@site.com"end input] 
            [input:"text","facebook","","[facebook]","12","","http://site.com"end input] 
            [input:"text","twiter","","[twiter]","12","","http://site.com"end input] 
            [input:"text","instagram","","[instagram]","12","","http://site.com"end input] 
            [input:"text","youtube","","[youtube]","12","","http://site.com"end input] 
            [input:"text","rinning","","[rinning]","12","","http://site.com"end input] 
            [input:"text","lat","","google map lat","12","","-332"end input] 
            [input:"text","lng","","google map lng","12","","556"end input] 
            
            [input:"text","address","","[address]-[english]","12","","saudi , makka 12 building"end input] 
            [input:"text","addressar","","[address]-[arabic]","12","","saudi , makka 12 building"end input] 



            <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[site_logo_up]</label>
                <div  class='col-sm-9' >
                    <input name="logo1" type="file" id="id-input-file-2" />
                </div>   
            </div> 
            
            <div class="space-4"></div>
            
           <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[site_logo_down]</label>
                <div  class='col-sm-9' >
                    <input name="logo2" type="file" id="id-input-file-2" />
                </div>   
            </div> 
            
            <div class="space-4"></div>
            
           <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[site_icon]</label>
                <div  class='col-sm-9' >
                    <input name="icon" type="file" id="id-input-file-2" />
                </div>   
            </div> 
           <div class="space-4"></div>
            
           <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[iconmap]</label>
                <div  class='col-sm-9' >
                    <input name="iconmap" type="file" id="id-input-file-2" />
                </div>   
            </div> 
            
            <div class="space-4"></div>
            

                      












            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                            [input:"submit","submit_setting","[save]","btn-info","fa-check"end input]     
                            &nbsp; &nbsp;  
                            [input:"reset","button1","[reset]","","fa-undo"end input]                                     
                        </div>
                    </div>
                    </form>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- product specific plugin scripts -->

            <!--[if lte IE 8]>
              <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
            <![endif]-->

            [include:"{template}admin/jsajax"end include]	



 
  