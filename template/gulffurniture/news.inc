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
        <h3 class="page-title"><a href="/">Home</a> \   Our News</h3>
        <div class="text">
            <div class="list-small">
                <ul>
            
                   [sql:"news_sql","Select * From project where url=13 ORDER BY sort ASC","1000","                                         
                    <li>
                        <a class="animate" href="/news/%news_sql:id%">
                            <div class="img"><img width="50" height="50" src="{{upload}}project/%news_sql:image%" class="attachment-thumb-img wp-post-image" alt="cbs-1"></div>
                            <div class="content">
                                <h4 class="date">%news_sql:title_en%</h4>
                                <div>%news_sql:more_en%</div>
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

