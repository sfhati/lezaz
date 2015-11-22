<?php $useajax = global_var("useajax");$useajax = global_var("useajax");?>		<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="#">[Home]</a>
							</li>
						</ul><!-- /.breadcrumb -->

						<!-- #section:basics/content.searchbox -->
						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->

						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">

                                            
                                            
                           <?php echo  include_file_template("{template}admin/option"); ?>	                 
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                

		<!-- basic scripts -->
   
		<!--[if !IE]> -->


		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='/template/Ace1.3.3/assets/js/jquery1x.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/template/Ace1.3.3/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/template/Ace1.3.3/assets/js/bootstrap.js"></script>

		<!-- ace scripts -->
		<script src="/template/Ace1.3.3/assets/js/ace/elements.scroller.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.colorpicker.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.fileinput.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.typeahead.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.wysiwyg.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.spinner.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.treeview.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.wizard.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/elements.aside.js"></script>
                
   <?php if ($useajax) { ?>
 
		<script src="/template/Ace1.3.3/assets/js/ace/ace-ajax.js"></script>
                 <?php }else{ ?>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.js"></script>
                     
<?php } ?>

		<script src="/template/Ace1.3.3/assets/js/ace/ace.ajax-content.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.touch-drag.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.sidebar.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.submenu-hover.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.widget-box.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.settings.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.settings-rtl.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.settings-skin.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.searchbox-autocomplete.js"></script>


                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
						<!-- /section:settings.box -->
                                                
   <?php if ($useajax) { ?>
 
						<div class="page-content-area" data-ajax-content="true">
							<!-- ajax content goes here -->
						</div><!-- /.page-content-area -->                                                                                         
                                               <?php }else{ ?>

                                                 
 <div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<?php echo  include_file_template("{template}admin/content/$_SESSION[noajaxpage]"); ?>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
                                                                                                        
						
                                                      
<?php } ?>

					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->