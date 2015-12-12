[include:"header_ar"end include]
	<div id="inner-header">
		<img src="{{upload}}pages/[var:"pagedata[image_name]"end var]" alt ="" />
	</div>

	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2>[var:"pagedata[page_name]"end var]</h2>
		        	<ul class="breadcrumb">
			            <li> <a href="/page/8/الرئيسيه">الرئيسيه </a></li>
			            <li><a href="#"> [var:"pagedata[page_name]"end var]</a></li>
		          	</ul>
	          	</div>
	        </div>
	      </div>
	    </div>
	 </section>
	<!-- Subpage title end -->

	<div class="gap-40"></div>
        
        
        
        <section id="portfolio-page">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12"  id="isotope-filter">
					<a data-filter="*" href="#" class="active">الجميع</a>
[sql:"section_sql","Select * From section ORDER BY id ASC","1000","                                              
					<a data-filter=".web-%section_sql:id%" href="#" class="">%section_sql:title_ar%</a>					
"end sql]                                         
				</div>
			</div><!--Portfolio filter end -->


			<!-- Isotope row start --> 
			<div class="row">
				<div id="isotope" class="isotope portfolio-page-items">
       [sql:"portfolio_sql","Select * From portfolio ORDER BY id ASC","1000","                     
                            
					<div class="col-sm-3 web-%portfolio_sql:section%">
						<div class="portfolio-overlay">
							<div class="portfolio-overlay-btn">
								<a data-rel="prettyPhoto" href="{{upload}}portfolio/%portfolio_sql:image%"><i class="fa fa-search"></i></a>
							</div>
						</div>
						<div class="image-thumb">
							<img src="{{upload}}portfolio/%portfolio_sql:image%" alt="%portfolio_sql:title_ar%">
						</div>
					</div><!-- col-sm-3 end -->


                            
          "end sql]                                           
				</div><!-- Isotope end -->
			</div><!-- Isotope row start -->
		</div><!-- Portfolio page container end -->
	</section>
	<!-- Portfolio page end -->
        
        
        
[include:"footer_ar"end include]              