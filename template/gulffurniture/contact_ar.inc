
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
			            <li> <a href="#">الرئيسيه </a></li>
			            <li><a href="#"> [var:"pagedata[page_name]"end var]</a></li>
		          	</ul>
	          	</div>
	        </div>
	      </div>
	    </div>
	 </section>
	<!-- Subpage title end -->

	<div class="gap-40"></div>
        
        <!-- Contact page start -->
	<section id="Contact-page">
		<div class="container">
			<div class="row">

				<!-- Map start here -->
				<div class="map" id="map"></div>
				<!-- Map end here -->

				<!-- Contact form start -->
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                    [if:"[var:"success_message-var"end var]","
                                    <div class="alert-success">Thank you , your message successfully sent.</div> 
"end if]
					<div class="contact-form">
						<h3>إتصل بنا</h3>
						<form method="post" role="form">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>الإسم</label>
									<input class="form-control" name="name" id="name" placeholder="" type="text" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>البريد الإلكتروني</label>
										<input class="form-control" name="email" id="email" 
										placeholder="" type="email" required>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>الموضوع</label>
										<input class="form-control" name="subject" id="subject" 
										placeholder="" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>نص الرساله</label>
								<textarea class="form-control" name="message" id="message" placeholder="" rows="8" required></textarea>
							</div>
							<div><br>
							<button class="btn btn-primary" type="submit">إرسال الرساله</button> 
							</div>
						</form>
					</div><!-- Contact form end -->	
				</div> <!-- Col end -->

				<!-- sidebar start -->
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="contact-info">
		    		<h3>معلومات الإتصال</h3>
		    		<p> [var:"pagedata[page_cont]"end var]	</p>
		    		<br>
		    		<p><i class="fa fa-home"></i> lezaz:setting(addressar) </p>
					<p><i class="fa fa-phone"></i>lezaz:setting(site_phone)</p>
					<p><i class="fa fa-envelope-o"></i>lezaz:setting(site_email)</p>
					<p><i class="fa fa-globe"></i>  www.shahamh.com</p>
		    		</div>
				</div><!-- sidebar end -->
    		</div><!--/ row end -->
		</div><!--/ container end -->
	</section>


        
	<!-- Faq page end -->
[include:"footer_ar"end include]  

<!-- Google Map API Key Source -->
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<!-- For Google Map -->
	<script type="text/javascript" src="{{this}}/js/gmap3.js"></script>
	<!-- Doc http://www.mkyong.com/google-maps/google-maps-api-hello-world-example/ -->

	<script type="text/javascript">
      $(function() {
          
var myLatLng = {lat: lezaz:setting(lat), lng: lezaz:setting(lng)};
  // Create a map object and specify the DOM element for display.
  var map = new google.maps.Map(document.getElementById('map'), {
    center: myLatLng,
    scrollwheel: false,
    zoom: 18
  });

  // Create a marker and set its position.
  var marker = new google.maps.Marker({
    map: map,
    position: myLatLng,
    icon: "{{upload}}site/lezaz:setting(iconmap)"
  });          
    
  
  
        
        });
    </script>