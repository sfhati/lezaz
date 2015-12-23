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

               

<?php if($lezaz->get("_VAL_use_ajax")){ $_VAL_use_ajax_chk = "checked";} ?>            
<div class="checkbox col-sm-12">
    <label>
            <input id="use_ajax"  name="use_ajax"  value="1" class="ace ace-switch ace-switch-5" type="checkbox" <?php echo $_VAL_use_ajax_chk; ?> >
            <span class="lbl"> [use ajax]</span>
    </label>
</div>          
<div class="space-12"></div>             
             
 


    
       
            
          
               
           
 
            

            

            
                       
			<div id="input-site_title" class="form-group<?php if($lezaz->get("_MSG_site_title")){echo " has-".$lezaz->get("_MSG_site_title");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="site_title"> [site_title]-[english] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="site_title" id="site_title" value="<?php if($lezaz->get("_VAL_site_title")){echo $lezaz->get("_VAL_site_title");}else{ echo ""; } ?>" placeholder="Enter title" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-site_titlear" class="form-group<?php if($lezaz->get("_MSG_site_titlear")){echo " has-".$lezaz->get("_MSG_site_titlear");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="site_titlear"> [site_title]-[arabic] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="site_titlear" id="site_titlear" value="<?php if($lezaz->get("_VAL_site_titlear")){echo $lezaz->get("_VAL_site_titlear");}else{ echo ""; } ?>" placeholder="Enter title" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-site_phone" class="form-group<?php if($lezaz->get("_MSG_site_phone")){echo " has-".$lezaz->get("_MSG_site_phone");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="site_phone"> [site_phone] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="site_phone" id="site_phone" value="<?php if($lezaz->get("_VAL_site_phone")){echo $lezaz->get("_VAL_site_phone");}else{ echo ""; } ?>" placeholder="+966 (55555555)" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-site_email" class="form-group<?php if($lezaz->get("_MSG_site_email")){echo " has-".$lezaz->get("_MSG_site_email");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="site_email"> [site_email] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="site_email" id="site_email" value="<?php if($lezaz->get("_VAL_site_email")){echo $lezaz->get("_VAL_site_email");}else{ echo ""; } ?>" placeholder="email@site.com" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-facebook" class="form-group<?php if($lezaz->get("_MSG_facebook")){echo " has-".$lezaz->get("_MSG_facebook");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="facebook"> [facebook] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="facebook" id="facebook" value="<?php if($lezaz->get("_VAL_facebook")){echo $lezaz->get("_VAL_facebook");}else{ echo ""; } ?>" placeholder="http://site.com" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-twiter" class="form-group<?php if($lezaz->get("_MSG_twiter")){echo " has-".$lezaz->get("_MSG_twiter");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="twiter"> [twiter] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="twiter" id="twiter" value="<?php if($lezaz->get("_VAL_twiter")){echo $lezaz->get("_VAL_twiter");}else{ echo ""; } ?>" placeholder="http://site.com" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-instagram" class="form-group<?php if($lezaz->get("_MSG_instagram")){echo " has-".$lezaz->get("_MSG_instagram");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="instagram"> [instagram] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="instagram" id="instagram" value="<?php if($lezaz->get("_VAL_instagram")){echo $lezaz->get("_VAL_instagram");}else{ echo ""; } ?>" placeholder="http://site.com" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-youtube" class="form-group<?php if($lezaz->get("_MSG_youtube")){echo " has-".$lezaz->get("_MSG_youtube");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="youtube"> [youtube] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="youtube" id="youtube" value="<?php if($lezaz->get("_VAL_youtube")){echo $lezaz->get("_VAL_youtube");}else{ echo ""; } ?>" placeholder="http://site.com" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-rinning" class="form-group<?php if($lezaz->get("_MSG_rinning")){echo " has-".$lezaz->get("_MSG_rinning");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="rinning"> [rinning] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="rinning" id="rinning" value="<?php if($lezaz->get("_VAL_rinning")){echo $lezaz->get("_VAL_rinning");}else{ echo ""; } ?>" placeholder="http://site.com" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-lat" class="form-group<?php if($lezaz->get("_MSG_lat")){echo " has-".$lezaz->get("_MSG_lat");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="lat"> google map lat </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="lat" id="lat" value="<?php if($lezaz->get("_VAL_lat")){echo $lezaz->get("_VAL_lat");}else{ echo ""; } ?>" placeholder="-332" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-lng" class="form-group<?php if($lezaz->get("_MSG_lng")){echo " has-".$lezaz->get("_MSG_lng");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="lng"> google map lng </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="lng" id="lng" value="<?php if($lezaz->get("_VAL_lng")){echo $lezaz->get("_VAL_lng");}else{ echo ""; } ?>" placeholder="556" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
            
                       
			<div id="input-address" class="form-group<?php if($lezaz->get("_MSG_address")){echo " has-".$lezaz->get("_MSG_address");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="address"> [address]-[english] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="address" id="address" value="<?php if($lezaz->get("_VAL_address")){echo $lezaz->get("_VAL_address");}else{ echo ""; } ?>" placeholder="saudi , makka 12 building" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-12"></div> 
            
              
            
                       
			<div id="input-addressar" class="form-group<?php if($lezaz->get("_MSG_addressar")){echo " has-".$lezaz->get("_MSG_addressar");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="addressar"> [address]-[arabic] </label> 
    
				<div class="col-sm-10">
                                   
<input type="text" name="addressar" id="addressar" value="<?php if($lezaz->get("_VAL_addressar")){echo $lezaz->get("_VAL_addressar");}else{ echo ""; } ?>" placeholder="saudi , makka 12 building" class="col-sm-12" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
              

 

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
                     
<button type="submit" class="btn  btn-info2 btn-sm   "> 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset" class="btn  btn-info2 btn-sm   "> 
    <i class="ace-icon fa fa-check"></i>  [reset] 
 </button>        
                                                                         
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

      



 
  