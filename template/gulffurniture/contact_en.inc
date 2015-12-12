
[include:"header_en"end include]
<div class="slider">
    <ul id="slider">        
        <li>
            <img width="2000" height="550" src="{{upload}}pages/[var:"pagedata[image_name]"end var]" class="attachment-full wp-post-image" alt="%slider_sql:title1e%">
        </li>		                           
    </ul>
    <div class="slider-overlay"></div>
</div>
<div class="main">
    <div class="">
  
        
        <div class="section contactus">
            <div class="text">[var:"pagedata[page_cont]"end var]</div>  
            <div class="left">
                
                
                
                <h3 class="page-title">Contact Us</h3>
                        [if:"[var:"success_message-var"end var]","
                            <div class="alert-success">Thank you , your message successfully sent.</div> 
                            "end if]

	                
                <p class="contactus-text">If you have any question please contact us by filling the form below</p>
                <form id="contactus" class="form contactus-form" method="post" action="">
                    <div class="form-field">
                        <label id="label-name" for="contactus-name">Full Name<span></span></label>
                        <input type="text" id="input-name" name="name" class="form-input form-text" />
                    </div>
                    <div class="form-field">
                        <label id="label-email" for="contactus-email">Email<span></span></label>
                        <input type="text" id="input-email" name="email" class="form-input form-text" />
                    </div>
                    <div class="form-field">
                        <label id="label-phone" for="contactus-phone">Phone Number <span></span></label>
                        <input type="phone" id="input-phone" name="subject" class="form-input form-text" />
                    </div>
                    <div class="form-field">
                        <label id="label-message" for="contactus-message">Message<span></span></label>
                        <textarea id="input-message" name="message" class="form-input form-message"></textarea>
                    </div>

                    <div class="form-btn">
                        <p id="result" class="form-result"></p>
                        <input id="submit" type="submit" id="form-submit" value="Send" class="form-submit" />
                        <input type="hidden" name="ref" value="website" />
                    </div>
                </form>
            </div>

            <div class="right">
                <h3 class="page-title">Contact Information</h3>
                <div id="map" class="contact-map"></div>
                    <p>Tel: [cache:"site_phone"end cache]</p>
                    <p>[cache:"address"end cache]</p>                   
                    <p>Email: <a href="mailto:[cache:"site_email"end cache]" target="_blank">[cache:"site_email"end cache]</a></p>
                    <p>&nbsp;</p>
                    
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>


<!-- Google Map API Key Source -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<style>
    .alert-success {
    color: #468847;
    background-color: #dff0d8;
    border-color: #d6e9c6;
    padding: 20px;
    margin: 20px;       
}
.main {
    width: 1100px;
    margin: 0 auto;
    padding-bottom: 5px;
    min-height: 512px;
    background: #F2F2F2;
}
</style>
<script type="text/javascript">
$(function() {

var myLatLng = {lat:[cache:"lat"end cache], lng: [cache:"lng"end cache]};
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
                icon: "{{upload}}site/[cache:"iconmap"end cache]"
});
});    </script>
[include:"footer_en"end include]  