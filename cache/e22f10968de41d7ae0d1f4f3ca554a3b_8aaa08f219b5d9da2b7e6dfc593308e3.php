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
        <?php echo $lezaz->msg( "" ); ?>
         <?php 
                       
                       
                     $lezaz->set("_VAL_use_ajax", $lezaz->setting("use_ajax"));
                            
                     $lezaz->set("_VAL_skinchoose", $lezaz->setting("skinchoose"));
                            
                     $lezaz->set("_VAL_site_title", $lezaz->setting("site_title"));
                            
                     $lezaz->set("_VAL_site_titlear", $lezaz->setting("site_titlear"));
                            
                     $lezaz->set("_VAL_site_phone", $lezaz->setting("site_phone"));
                            
                     $lezaz->set("_VAL_site_email", $lezaz->setting("site_email"));
                            
                     $lezaz->set("_VAL_facebook", $lezaz->setting("facebook"));
                            
                     $lezaz->set("_VAL_twiter", $lezaz->setting("twiter"));
                            
                     $lezaz->set("_VAL_instagram", $lezaz->setting("instagram"));
                            
                     $lezaz->set("_VAL_youtube", $lezaz->setting("youtube"));
                            
                     $lezaz->set("_VAL_rinning", $lezaz->setting("rinning"));
                            
                     $lezaz->set("_VAL_lat", $lezaz->setting("lat"));
                            
                     $lezaz->set("_VAL_lng", $lezaz->setting("lng"));
                            
                     $lezaz->set("_VAL_address", $lezaz->setting("address"));
                            
                     $lezaz->set("_VAL_addressar", $lezaz->setting("addressar"));
                            
                     $lezaz->set("_VAL_", $lezaz->setting(""));
                          
                        
                        ?>  <?php
              if($lezaz->post("submit_setting")){
                    
                     $lezaz->setsetting("use_ajax",$lezaz->post("use_ajax"));
                            
                     $lezaz->setsetting("skinchoose",$lezaz->post("skinchoose"));
                            
                     $lezaz->setsetting("site_title",$lezaz->post("site_title"));
                            
                     $lezaz->setsetting("site_titlear",$lezaz->post("site_titlear"));
                            
                     $lezaz->setsetting("site_phone",$lezaz->post("site_phone"));
                            
                     $lezaz->setsetting("site_email",$lezaz->post("site_email"));
                            
                     $lezaz->setsetting("facebook",$lezaz->post("facebook"));
                            
                     $lezaz->setsetting("twiter",$lezaz->post("twiter"));
                            
                     $lezaz->setsetting("instagram",$lezaz->post("instagram"));
                            
                     $lezaz->setsetting("youtube",$lezaz->post("youtube"));
                            
                     $lezaz->setsetting("rinning",$lezaz->post("rinning"));
                            
                     $lezaz->setsetting("lat",$lezaz->post("lat"));
                            
                     $lezaz->setsetting("lng",$lezaz->post("lng"));
                            
                     $lezaz->setsetting("address",$lezaz->post("address"));
                            
                     $lezaz->setsetting("addressar",$lezaz->post("addressar"));
                           
                                  if($_FILES["logo1"]["name"]){
                        $x= $lezaz->file->save($_FILES["logo1"], "setting", "img");
                        $lezaz->setsetting("logo1",$x);  
                            }
                           
                                  if($_FILES["logo2"]["name"]){
                        $x= $lezaz->file->save($_FILES["logo2"], "", "img");
                        $lezaz->setsetting("logo2",$x);  
                            }
                           
                                  if($_FILES["icon"]["name"]){
                        $x= $lezaz->file->save($_FILES["icon"], "", "img");
                        $lezaz->setsetting("icon",$x);  
                            }
                           
                                  if($_FILES["iconmap"]["name"]){
                        $x= $lezaz->file->save($_FILES["iconmap"], "", "img");
                        $lezaz->setsetting("iconmap",$x);  
                            }
                            
                     $lezaz->setsetting("",$lezaz->post(""));
                           
 $lezaz->set_msg("[save & update is done]","success");                
 $lezaz->go();                
}
                   ?>  
        <form id="settingpage" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   
            <!-- #section:elements.form -->


            
<?php if($lezaz->get("_VAL_use_ajax")){ $_VAL_use_ajax_chk = "checked";} ?>            
<div class="checkbox col-sm-12">
    <label>
            <input id="use_ajax"  name="use_ajax"  value="1" class="ace ace-switch ace-switch-5" type="checkbox" <?php echo $_VAL_use_ajax_chk; ?> >
            <span class="lbl"> [use ajax]</span>
    </label>
</div>          
<div class="space-12"></div>             
             

            
                       
			<div id="input-skinchoose" class="form-group<?php if($lezaz->get("_MSG_skinchoose")){echo " has-".$lezaz->get("_MSG_skinchoose");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="skinchoose"> [Choose skin] </label> 
    
				<div class="col-sm-10">
                                   
<select class=" col-sm-12 form-control" id="skinchoose" name="skinchoose"  data-placeholder="أختر ">
    
<option <?php if($lezaz->get("_VAL_skinchoose")){ if($lezaz->get("_VAL_skinchoose")=="no-skin") echo "selected ";}else{if("skin-1"=="no-skin") echo "selected ";} ?> value="no-skin">[Defult skin]</option>
<option <?php if($lezaz->get("_VAL_skinchoose")){ if($lezaz->get("_VAL_skinchoose")=="skin-1") echo "selected ";}else{if("skin-1"=="skin-1") echo "selected ";} ?> value="skin-1">[skin-1]</option>
<option <?php if($lezaz->get("_VAL_skinchoose")){ if($lezaz->get("_VAL_skinchoose")=="skin-2") echo "selected ";}else{if("skin-1"=="skin-2") echo "selected ";} ?> value="skin-2">[skin-2]</option>
<option <?php if($lezaz->get("_VAL_skinchoose")){ if($lezaz->get("_VAL_skinchoose")=="no-skin skin-3") echo "selected ";}else{if("skin-1"=="no-skin skin-3") echo "selected ";} ?> value="no-skin skin-3">[skin-3]</option> 

	</select>				
				</div>
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
            
              


            
                       
			<div id="input-logo1" class="form-group<?php if($lezaz->get("_MSG_logo1")){echo " has-".$lezaz->get("_MSG_logo1");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="logo1"> [site_logo_up] </label> 
    
				<div class="col-sm-10">
                                   
<input type="file" name="logo1" id="logo1"  data-no_file="bassam" class="col-sm-12 imagefile" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
             
            
                       
			<div id="input-logo2" class="form-group<?php if($lezaz->get("_MSG_logo2")){echo " has-".$lezaz->get("_MSG_logo2");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="logo2"> [site_logo_down] </label> 
    
				<div class="col-sm-10">
                                   
<input type="file" name="logo2" id="logo2"  data-no_file="bassam" class="col-sm-12 imagefile" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
             
            
                       
			<div id="input-icon" class="form-group<?php if($lezaz->get("_MSG_icon")){echo " has-".$lezaz->get("_MSG_icon");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="icon"> [site_icon] </label> 
    
				<div class="col-sm-10">
                                   
<input type="file" name="icon" id="icon"  data-no_file="bassam" class="col-sm-12 imagefile" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
             
            
                       
			<div id="input-iconmap" class="form-group<?php if($lezaz->get("_MSG_iconmap")){echo " has-".$lezaz->get("_MSG_iconmap");} ?>">
				 
       <label class="col-sm-2 control-label no-padding-right" for="iconmap"> [iconmap] </label> 
    
				<div class="col-sm-10">
                                   
<input type="file" name="iconmap" id="iconmap"  data-no_file="bassam" class="col-sm-12 imagefile" />

					
				</div>
			</div>
                        <div class="space-10"></div> 
            
             

       


     

  












            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                     
<button type="submit"   name="submit_setting"  value="yes"  id="submit_setting" class="btn  btn-info btn-sm   "> 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_32764"  value="[reset]"  id="reset_32764" class="btn  btn-grey btn-sm   "> 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
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






