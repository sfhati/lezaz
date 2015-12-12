
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

	<!-- Portfolio page start -->
	<section id="sub-page">
		<div class="container">                          
			<div class="row">  
                            [var:"pagedata[page_cont]"end var]		
                            
<!-- Toggle start -->
<div class="panel-group" id="accordion">
    
    
   [sql:"users_sql","Select * From career","1000","              
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title"> 
                <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse%users_sql:id%"> %users_sql:title_ar% </a> 
            </h4>
        </div>
        <div id="collapse%users_sql:id%" class="panel-collapse collapse">
            <div class="panel-body">
                <p>%users_sql:more_ar%</p>
                
                
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    [if:"[var:"success_message-var"end var]","
                                    <div class="alert-success">Thank you , your message successfully sent.</div> 
                                    "end if]
					<div class="contact-form">
						<h3>كن أحد أفراد الفريق ... تقدم الآن </h3>
						<form method="post" role="form">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label>رقم الهاتف</label>
									<input class="form-control" name="phone" id="name" placeholder="" type="text" required>
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
										<label>الإسم</label>
										<input class="form-control" name="careername" id="subject" 
										placeholder="" required>
                                                                                <input type="hidden" name='postion' value='%users_sql:id%'/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>ملف السيرة الذاتيه</label>
                                                                <input type='file' class="form-control" name="cvfile" required>
							</div>
							<div><br>
							<button class="btn btn-primary" type="submit">تقدم للوظيفه </button> 
							</div>
						</form>
					</div><!-- Contact form end -->	
				</div>
                
                
                
            </div>
        </div>
    </div><!--/ Panel 1 end-->
       "end sql]        
</div><!-- Toggle end -->                            
                            
			</div><!--row -->	
		</div><!-- container -->
	</section>
	<!-- Portfolio page end -->

        
[include:"footer_ar"end include]                
        