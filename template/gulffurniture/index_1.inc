[include:"header_en"end include]
					    <a class="navbar-brand" href="index.html">
					    	<img class="img-responsive" src="{{upload}}/site/[cache:"logo1"end cache]" alt="logo">
					    </a>                    

	<!-- Slider start -->
	<section id="home">	
		<!-- Carousel -->
    	<div id="main-slide" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ol class="carousel-indicators">
                 [sql:"slider_sql","Select * From slider ORDER BY sort ASC","1000","                       
			  	<li data-none="%slider_sql:id%" data-target="#main-slide" data-slide-to="%slider_sql:#%" class="[if:"%slider_sql:#-var%==1","active"end if]"></li>			  
                    "end sql]          
			</ol><!--/ Indicators end-->

			<!-- Carousel inner --> 
			<div class="carousel-inner">
                            
           [sql:"slider_sql","Select * From slider ORDER BY sort ASC","1000","                     
                            
			    <div class="item [if:"%slider_sql:#-var%==1","active"end if]">
			    	<img class="img-responsive" src="{{upload}}slider/%slider_sql:image%" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                    		<h2 class="animated2">
                        		<span>%slider_sql:title1e%</span>
                        	</h2>
                            <h3 class="animated3">
                            	<span>%slider_sql:title2e%</span>
                            </h3>
                            <p class="animated4"><a href="%slider_sql:url%" class="slider btn btn-primary">%slider_sql:title_urle%</a></p>
                        </div>
                    </div>
			    </div><!--/ Carousel item end -->
                            
          "end sql]                         
			   
			    
			</div><!-- Carousel inner end-->

			<!-- Controls -->
			<a class="left carousel-control" href="#main-slide" data-slide="prev">
		    	<span><i class="fa fa-angle-left"></i></span>
			</a>
			<a class="right carousel-control" href="#main-slide" data-slide="next">
		    	<span><i class="fa fa-angle-right"></i></span>
			</a>
		</div><!-- /carousel -->    	
    </section>
    <!--/ Slider end -->


    <!-- Newsletter start -->
    <!--div id="newsletter" class="wow slideInLeft">
    	<div class="container">
    		<div class="row">
				<form class="form-inline" role="form">
                      <div class="form-group col-lg-9 col-md-8 col-sm-7 col-xs-7">
                         <input type="text" class="form-control" placeholder="Want to be update with our latest offer?" >
                      </div>
                      <button type="submit" class="btn btn-primary btn-lg">Join Our Newsletter</button>
                 </form>
    		</div>
    	</div>
    </div-->
    <!-- Newsletter end -->

    
   <section id="service" class="wow fadeInUp">
    	<div class="container">
            <div class="row titlebox">
             our media production process 
            </div> 
        </div>
   </section>
    
    
	<!-- Service box start -->
    <section id="service" class="wow fadeInUp">
    	<div class="container">
    		<div class="row">
                               [sql:"product_sql","Select * From media ORDER BY sort ASC","4","                     
				<div class="col-md-3 col-sm-3">
					<div class="service-content [if:"%product_sql:#-var%==4","last"end if] ">
					    <a href="%product_sql:url%"><span class="service-icon"><img class="img-circle wow flipInX" src="{{upload}}media/%product_sql:image%"/></span></a>
					    <h3>%product_sql:title_en%</h3>
					    <p>%product_sql:more_en%</p>
					</div>
				</div><!--/ End first service -->
                                 "end sql] 				
    		</div>
    	</div>
    </section><!-- Service box end -->

  
    <section id="service" class="wow fadeInUp">
    	<div class="container">
            <div class="row titlebox">
             projects
            </div> 
        </div>
   </section>
 
    <!-- Portfolio start -->
	<section id="portfolio">
		<div class="container">

		  <div class='row wow fadeInUp'>
		    <div class='col-lg-12'>
		      <div class="carousel slide" id="portfolio-carousel">
		        <div class="carousel-inner">
		          	<div class="item  active">
		            	<div class="row">
   [sql:"project_sqlx","Select * From project ORDER BY sort ASC","3","   <h3 style="display: none">%project_sqlx:id%</h3>   "end sql]                                     
                                    
                               [sql:"project_sql","Select * From project ORDER BY sort ASC limit 0,4","","                     
                                                        <div class="col-xs-6 col-sm-3 col-md-3">   
								<div class="thumbnail">
								    <div class="caption">
								    	<div class="caption-content">
									    	<span>												
									        	<a href="%project_sql:url%" class=""><i class="fa fa-link"></i></a>
									        </span>
									        <h3>%project_sql:title_en%</h3>
									        <p>%project_sql:more_en%</p>
								    	</div>
								    </div>
								    <img src="{{upload}}project/%project_sql:image%" alt="%project_sql:title_en%">
								</div>
							</div>          
                                 "end sql] 				
                                    
                                    
				
		            	</div>
		          	</div><!--/ Item active end -->
                                [if:"[var:"project_sqlx_num_rows-var"end var]>4","
                                <div class="item">
                                    <div class="row">
                              [sql:"project_sql","Select * From project ORDER BY sort ASC limit 4,8","","                     
                                                        <div class="col-xs-6 col-sm-3 col-md-3">   
								<div class="thumbnail">
								    <div class="caption">
								    	<div class="caption-content">
									    	<span>
									        	<a href="%project_sql:url%" class=""><i class="fa fa-link"></i></a>
									        </span>
									        <h3>%project_sql:title_en%</h3>
									        <p>%project_sql:more_en%</p>
								    	</div>
								    </div>
								    <img src="{{upload}}project/%project_sql:image%" alt="%project_sql:title_en%">
								</div>
							</div>          
                                 "end sql] 				
 
                                    </div>
                                </div><!--/ Item end -->
                                "end if]
                                [if:"[var:"project_sqlx_num_rows-var"end var]>8","
                              <div class="item">
                                    <div class="row">
                              [sql:"project_sql","Select * From project ORDER BY sort ASC limit 8,12","","                     
                                                        <div class="col-xs-6 col-sm-3 col-md-3">   
								<div class="thumbnail">
								    <div class="caption">
								    	<div class="caption-content">
									    	<span>
									        	<a href="%project_sql:url%" class=""><i class="fa fa-link"></i></a>
									        </span>
									        <h3>%project_sql:title_en%</h3>
									        <p>%project_sql:more_en%</p>
								    	</div>
								    </div>
								    <img src="{{upload}}project/%project_sql:image%" alt="%project_sql:title_en%">
								</div>
							</div>          
                                 "end sql] 				
 
                                    </div>
                                </div><!--/ Item end -->
                                 "end if]
		        </div><!-- Carousel inner end -->

	        	<div class="dart-carousel-controller">
			        <a data-slide="prev" href="#portfolio-carousel" class="left"><i class="fa fa-chevron-left"></i></a>
			        <a data-slide="next" href="#portfolio-carousel" class="right"><i class="fa fa-chevron-right"></i></a>
		    	</div><!-- Controller end -->

		      </div><!-- Carousel end -->                          
		    </div><!-- Main Col end -->
		  </div><!--/ Main row end -->
		</div><!--/ Container end -->
	</section><!-- Portfolio end -->

  
    <!-- Clients start -->
	<section id="clients">
	  <div class="container">

   <section id="service" class="wow fadeInUp">
    	<div class="container">
            <div class="row titlebox">
             our clients
            </div> 
        </div>
   </section>              
              
	    <div class="row wow fadeInLeft">
	      <div id="client-carousel" class="col-sm-12 owl-carousel owl-theme text-center client-carousel">
                   [sql:"client_sql","Select * From client ORDER BY sort ASC","1000","    
	        <figure class="item client_logo">
	          <a href="%client_sql:url%">
	            <img src="{{upload}}client/%client_sql:image%" alt="%client_sql:title_en%">
	          </a>
	        </figure>
                     "end sql] 
	
	      </div><!-- Owl carousel end -->
	    </div><!-- Main row end -->
<div class="cnext"><img src='{{this}}/images/next.png'></i></div>             
<div class="cprev"><img src='{{this}}/images/back.png'></i></div>             

	  </div><!-- Main container end -->
	</section><!-- Clients end -->
	
	
[include:"footer_en"end include]        