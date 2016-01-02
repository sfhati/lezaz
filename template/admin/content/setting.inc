
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
        lezaz:msg()
        <lezaz:form id='settingpage' type='setting'>
            <!-- #section:elements.form -->


            <lezaz:input use="settingpage" id='use_ajax' type="checkbox"  label="[use ajax]"  value="1" skin="7" size="12" space='12' />

            <lezaz:input use="settingpage"  id='skinchoose' type='select' label="[Choose skin]"  value="skin-1" size-label='2' size='10'  space='12' skin="11" mult2iple="multiple" placeholder="أختر ">  
                <option value="no-skin">[Defult skin]</option>
                <option value="skin-1">[skin-1]</option>
                <option value="skin-2">[skin-2]</option> 
                <option value="no-skin skin-3">[skin-3]</option>  
            </lezaz:input>












            <lezaz:input use="settingpage"  type='text' id="site_title" label="[site_title]-[english]" placeholder="Enter title" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="site_titlear" label="[site_title]-[arabic]" placeholder="Enter title" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="site_phone" label="[site_phone]" placeholder="+966 (55555555)" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="site_email" label="[site_email]" placeholder="email@site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="facebook" label="[facebook]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="twiter" label="[twiter]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="instagram" label="[instagram]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="youtube" label="[youtube]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="rinning" label="[rinning]" placeholder="http://site.com" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="lat" label="google map lat" placeholder="-332" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="lng" label="google map lng" placeholder="556" size-label='2' size='10'  space='12'/> 

            <lezaz:input use="settingpage"  type='text' id="address" label="[address]-[english]" placeholder="saudi , makka 12 building" size-label='2' size='10'  space='12'/> 
            <lezaz:input use="settingpage"  type='text' id="addressar" label="[address]-[arabic]" placeholder="saudi , makka 12 building" size-label='2' size='10'  space='10'/> 


            <lezaz:input use="settingpage" save="setting"  type="image" id="logo1" label="[site_logo_up]" size-label='2' size='10'  space='10' />
            <lezaz:input use="settingpage"  type="image" id="logo2" label="[site_logo_down]" size-label='2' size='10'  space='10' />
            <lezaz:input use="settingpage"  type="image" id="icon" label="[site_icon]" size-label='2' size='10'  space='10' />
            <lezaz:input use="settingpage"  type="image" id="iconmap" label="[iconmap]" size-label='2' size='10'  space='10' />

       


     

  












            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_setting" use="settingpage"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input use="settingpage"  type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div>
        </lezaz:form>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- product specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->






