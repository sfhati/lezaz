<?php global $lezaz;?> <?php 
                       
                       
                     $lezaz->set("_VAL_instagram", $lezaz->setting("instagram"));
                            
                     $lezaz->set("_VAL_youtube", $lezaz->setting("youtube"));
                            
                     $lezaz->set("_VAL_rinning", $lezaz->setting("rinning"));
                          
                        
                        ?>  <?php
              if($lezaz->post("savenow")){
                    
                     $lezaz->setsetting("instagram",$lezaz->post("instagram"));
                            
                     $lezaz->setsetting("youtube",$lezaz->post("youtube"));
                            
                     $lezaz->setsetting("rinning",$lezaz->post("rinning"));
                           
 $lezaz->set_msg("[save & update is done]","success");                
 $lezaz->go();                
}
                   ?>  
        <form id="bassam" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   
    fdsggfds gf gdfs gds g
                
                       
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
            
              
g fdsg df gdfg df
        
<button type="submit"   name="savenow"  value="yes"  id="savenow" class="btn  btn-info btn-sm   "> 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                      
<button type="reset"   name="reset_27930"  value="[reset]"  id="reset_27930" class="btn  btn-grey btn-sm   "> 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                          
      
        </form>
    
  
   <?php echo $lezaz->msg( "" ); ?>
  
        <form id="rasha" class="form-horizontal" role="form" method="post"   enctype="multipart/form-data" >
   
   
                       
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
                                   
<input type="file" name="logo1" id="logo1"  data-no_file="bassam" class="col-sm-12 filefile" />

					
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
            
             
        
<button type="submit"   name="submit_34316"  value="[save]"  id="submit_34316" class="btn  btn-info btn-sm   "> 
    <i class="ace-icon fa fa-check"></i>  [save] 
 </button>        
            
                     
<button type="reset"   name="reset_19298"  value="[reset]"  id="reset_19298" class="btn  btn-grey btn-sm   "> 
    <i class="ace-icon fa fa-undo"></i>  [reset] 
 </button>        
                          
      
        </form>
      