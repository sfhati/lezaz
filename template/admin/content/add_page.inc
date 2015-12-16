
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [pages]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add page]
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form  id="formpage" class="form-horizontal" method="post" enctype="multipart/form-data" target="ajaxform"> 
            <!-- #section:elements.form -->


            [input:"text","pagename","","[page name]","12","r;ti:pages,page_name","[page name]"end input] 


            <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[image]</label>
                <div  class='col-sm-10' >
                    <input name="file2" type="file" class='imagefile' id="id-input-file-2" />
                </div>   
            </div> 
            
            <div class="space-4"></div>
                       <textarea  name='pagecontent' id='newtextarea' style="display: none;"></textarea>
         
            <div  class="form-group">
                <label class='col-sm-2 control-label' for="form-field-2">[page content]</label>
                <div  class='col-sm-10' >
                    <textarea  name='page_content' id='edittextarea' style="margin-top: 30px;">[var:"_VAL_pagecontent"end var]</textarea>
                </div>  
            </div>     
            
            <div class="space-4"></div>

            <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-8">[page template]</label>
                <select name="page_template"  class='col-sm-9'>
                    <option value='index_ar' [if:"[var:"_VAL_page_template-var"end var]=='index_ar'","selected='selected'"end if]>[home page] - [arabic]</option>
                    <option value='sub_ar' [if:"[var:"_VAL_page_template-var"end var]=='sub_ar'","selected='selected'"end if]>[sub page] - [arabic]</option>
                   <option value='index' [if:"[var:"_VAL_page_template-var"end var]=='index'","selected='selected'"end if]>[home page] - [english]</option>
                    <option value='sub_en' [if:"[var:"_VAL_page_template-var"end var]=='sub_en'","selected='selected'"end if]>[sub page] - [english]</option>
                    <option value='contact_ar' [if:"[var:"_VAL_page_template-var"end var]=='contact_ar'","selected='selected'"end if]>[contact] - [arabic]</option>
                    <option value='contact_en' [if:"[var:"_VAL_page_template-var"end var]=='contact_en'","selected='selected'"end if]>[contact] - [english]</option>
                   <option value='portfolio_ar' [if:"[var:"_VAL_page_template-var"end var]=='portfolio_ar'","selected='selected'"end if]>[portfolio] - [arabic]</option>
                    <option value='portfolio_en' [if:"[var:"_VAL_page_template-var"end var]=='portfolio_en'","selected='selected'"end if]>[portfolio] - [english]</option>

                     <option value='project_ar' [if:"[var:"_VAL_page_template-var"end var]=='project_ar'","selected='selected'"end if]>[projects] - [arabic]</option>
                    <option value='project_en' [if:"[var:"_VAL_page_template-var"end var]=='project_en'","selected='selected'"end if]>[projects] - [english]</option>
                     <option value='career_ar' [if:"[var:"_VAL_page_template-var"end var]=='career_ar'","selected='selected'"end if]>[careers] - [arabic]</option>
                    <option value='career_en' [if:"[var:"_VAL_page_template-var"end var]=='career_en'","selected='selected'"end if]>[careers] - [english]</option>
             </select>
            </div>                 

                        <div class="space-4"></div>

            
            
             <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-8">[language]</label>
                <select name="page_linklabel"  class='col-sm-9'>
                    <option value='ar' [if:"[var:"_VAL_page_linklabel-var"end var]=='ar'","selected='selected'"end if]>[arabic]</option>
                   <option value='en' [if:"[var:"_VAL_page_linklabel-var"end var]=='en'","selected='selected'"end if]>[english]</option>
                </select>
            </div>                 
           
            
                        <div class="space-4"></div>

            
            
            
                      <div class="form-group">
                <label class='col-sm-2 control-label' for="form-field-8">[show in menu]</label>
                <select name="page_place"  class='col-sm-9'>
                    <option value='0' [if:"[var:"_VAL_page_place-var"end var]=='0'","selected='selected'"end if]>[no]</option>
                    <option value='1' [if:"[var:"_VAL_page_place-var"end var]=='1'","selected='selected'"end if]>[up manu]</option>
                    <option value='2' [if:"[var:"_VAL_page_place-var"end var]=='2'","selected='selected'"end if]>[down menu]</option>
                    <option value='3' [if:"[var:"_VAL_page_place-var"end var]=='3'","selected='selected'"end if]>[both menu]</option>
 
                </select>
            </div>                 

            <div class="space-4"></div>


            [input:"text","page_sort","","[sort]","12","n","[Enter number]"end input] 








            [if:"[var:"editpage-var"end var]","
            [input:"hidden","editpageid"end input] 

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">

                    [input:"submit","submit_page","[update]","btn-info","fa-check"end input]     


                    [else]

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">

                            [input:"submit","submit_page","[submit]","btn-info","fa-check"end input]     

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



 
  