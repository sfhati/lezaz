[include:"header_en"end include]
<style>
.slider {
    box-shadow: 0 0 0 #eee;
    height: 20px;
    background: #737372;
}    
</style>
<div class="slider">
    <ul id="slider">        
        <li>
        </li>		                           
    </ul>
    <div class="slider-overlay"></div>
</div>
<div class="main">
    <div class="home-section">
                           
        <h3 class="page-title"><a href="/">Home</a> \   Our Services</h3>
        <div class="text">
            <div class="boxes">
                <ul>
            
                   [sql:"services_sql","Select * From project where url=11 ORDER BY sort ASC","1000","                                         
            <li class="box maroon">
                <a href="%services_sql:id%">
                    <img src="{{upload}}project/%services_sql:image%" class="box-img">
                    <div class="box-content bg">
                        <div class="box-content-icon"></div>
                        <span class="box-content-separator"></span>
                        <h3 class="box-content-text">%services_sql:title_en%</h3>
                    </div>
                </a>
            </li>
                    "end sql]                          
          </ul>
            </div>       
</div>                        
    </div>
</div>
[include:"footer_en"end include]                

