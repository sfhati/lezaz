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
                           
        <h3 class="page-title"><a href="/">Home</a> \   Our Projects</h3>
        <div class="text">
            <div class="boxes">
                <ul>
            
                   [sql:"projects_sql","Select * From project where url=12 ORDER BY sort ASC","1000","                                         
                    <li>
                        <a class="animate" href="/projects/%projects_sql:id%">
                            <div class="content">
                                <h4 class="date">%projects_sql:title_en%</h4>
                                <div>%projects_sql:more_en%</div>
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

