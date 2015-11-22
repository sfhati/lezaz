
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [Dashboard]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [error]
        </small>
    </h1>
</div><!-- /.page-header -->
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
 

 
 
 
 
 
 
 
 
 
 	<!-- #section:pages/error -->
								<div class="error-container">
									<div class="well">
										<h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="ace-icon fa fa-sitemap"></i>
												404
											</span>
                                                                                    [Template file not found] , <br>
                                                                                    [var:"error_template-sess"end var]
										</h1>

										<hr />
										<h3 class="lighter smaller">[We looked everywhere but we couldn't find it]</h3>

										<div>
											<form class="form-search">
												<span class="input-icon align-middle">
													<i class="ace-icon fa fa-search"></i>

													<input type="text" class="search-query" placeholder="[Give it a search]..." />
												</span>
												<button class="btn btn-sm" type="button">[Go]!</button>
											</form>

											<div class="space"></div>
											<h4 class="smaller">[Try one of the following]:</h4>

											<ul class="list-unstyled spaced inline bigger-110 margin-15">
												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													[Re-check the url for typos]
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													[Read the faq]
												</li>

												<li>
													<i class="ace-icon fa fa-hand-o-right blue"></i>
													[Tell us about it]
												</li>
											</ul>
										</div>

										<hr />
										<div class="space"></div>

										<div class="center">
											<a href="javascript:history.back()" class="btn btn-grey">
												<i class="ace-icon fa fa-arrow-left"></i>
												[Go Back]
											</a>

											<a href="/admin/" class="btn btn-primary">
												<i class="ace-icon fa fa-tachometer"></i>
												[Dashboard]
											</a>
										</div>
									</div>
								</div>

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- building specific plugin scripts -->

            <!--[if lte IE 8]>
              <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
            <![endif]-->

            [include:"{template}admin/jsajax"end include]	



 
  