[include:"header_en"end include]
	<div id="inner-header">
		<img src="{{upload}}pages/[var:"pagedata[image_name]"end var]" alt ="" />
	</div>



        
[if:"[var:"projectid-var"end var]","


[php:"
$sqlproject = check_db('project', " `id`='$_GET[projectid]'");
$filesx=0;
$dirfile='project/'.$_GET[projectid].'/';
$files=LIST_Filse(UPLOADED_PATH.$dirfile);

echo '
	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2>'.$sqlproject[title_en].'</h2>
		        	<ul class="breadcrumb">
			            <li> <a href="/">Home </a></li>
			            <li><a href="/page/'.$id.'/'.$pagedata[page_name].'/"> '.$pagedata[page_name].'</a></li>
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
        <div class="row">
                    '.$sqlproject[more_en].'
                    <br></div>			
			<!-- Isotope row start --> 
			<div class="row">
				<div id="isotope" class="isotope portfolio-page-items">
';


if(is_array($files))foreach($files as $linkfile=>$file){
$filesx++;
 
echo
'

<div class="col-sm-3">
    <div class="portfolio-overlay">
        <div class="portfolio-overlay-btn">
            <a data-rel="prettyPhoto" href="'.UPLOADED_LINK.$dirfile.'/'.$linkfile.'"><i class="fa fa-search"></i></a>
        </div>
    </div>
    <div class="image-thumb">
        <img src="'.UPLOADED_LINK.$dirfile.'/'.$linkfile.'" alt="%portfolio_sql:title_en%">
    </div>
</div><!-- col-sm-3 end -->
';
}
"end php] 

[else]
  



	<!-- Subpage title start -->
	<section id="inner-title">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	        	<div class="inner-title-content">
		        	<h2>[var:"pagedata[page_name]"end var]</h2>
		        	<ul class="breadcrumb">
			            <li> <a href="/">Home </a></li>
			            <li><a href="/page/[var:"id"end var]/[var:"pagedata[page_name]"end var]/"> [var:"pagedata[page_name]"end var]</a></li>
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
			
			<!-- Isotope row start --> 
			<div class="row">
				<div id="isotope" class="isotope portfolio-page-items">
       [sql:"portfolio_sql","Select * From project ORDER BY id ASC","1000","                     
                            
					<div class="col-sm-3">
						<div class="portfolio-overlay">
							<div class="portfolio-overlay-btn">
								<a href="/page/13/Our Projects/&projectid=%portfolio_sql:id%"><i class="fa fa-link"></i></a>
							</div>
						</div>
						<div class="image-thumb">
							<img src="{{upload}}project/%portfolio_sql:image%" alt="%portfolio_sql:title_en%">
						</div>
					</div><!-- col-sm-3 end -->


                            
          "end sql]                                           

  "end if]      
        
 				</div><!-- Isotope end -->
			</div><!-- Isotope row start -->
		</div><!-- Portfolio page container end -->
	</section>
	<!-- Portfolio page end -->       
[include:"footer_en"end include]            