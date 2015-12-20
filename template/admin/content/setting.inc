
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

               
<lezaz:input id='use_ajax' type="checkbox"  label="[use ajax]"  value="1" skin="7" size="12" space='12' />
 
<lezaz:input id='text' placeholder="bassam" label="text"  value="x" validation="r" size-label='2' size='10'  space='12'/>  
<lezaz:input id='skinchoose' type='select' label="[Choose skin]"  value="skin-1" size-label='2' size='10'  space='12'>  
                <option value="no-skin">[Defult skin]</option>
                <option value="skin-1">[skin-1]</option>
                <option value="skin-2">[skin-2]</option>
                <option value="no-skin skin-3">[skin-3]</option>
</lezaz:input>

    
       
            
          
               
           
 
            

            

            <lezaz:input type='text' id="site_title" label="[site_title]-[english]" placeholder="Enter title" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="site_titlear" label="[site_title]-[arabic]" placeholder="Enter title" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="site_phone" label="[site_phone]" placeholder="+966 (55555555)" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="site_email" label="[site_email]" placeholder="email@site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="facebook" label="[facebook]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="twiter" label="[twiter]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="instagram" label="[instagram]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="youtube" label="[youtube]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="rinning" label="[rinning]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="lat" label="google map lat" placeholder="-332" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="lng" label="google map lng" placeholder="556" size-label='2' size='10'  space='12'/> 
            
            <lezaz:input type='text' id="address" label="[address]-[english]" placeholder="saudi , makka 12 building" size-label='2' size='10'  space='12'/> 
            <lezaz:input type='text' id="addressar" label="[address]-[arabic]" placeholder="saudi , makka 12 building" size-label='2' size='10'  space='12'/> 



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

      



 
  