		<div class="main-content">
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

                                            
                                            
                                            <lezaz:block file="{template}admin/option" />
                           
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                


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
                <lezaz:if condition="lezaz:get(useajax)">
		<script src="/template/Ace1.3.3/assets/js/ace/ace-ajax.js"></script>
                <lezaz:else/>
		<script src="/template/Ace1.3.3/assets/js/ace/ace.js"></script>
                </lezaz:if>
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

                                                <lezaz:if condition="lezaz:get(useajax)">
						<div class="page-content-area" data-ajax-content="true">
							<!-- ajax content goes here -->
						</div><!-- /.page-content-area -->                                                                                         
                                              <lezaz:else/>

                                                 
 <div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
<lezaz:block file="{template}admin/content/'.lezaz:get(noajaxpage).'"/>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
                                                                                                        
						
                                                 </lezaz:if>
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->