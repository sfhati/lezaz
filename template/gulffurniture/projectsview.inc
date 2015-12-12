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
                 [sql:"Projects_sql","Select * From project where url=12 and id=[var:"projectsid-var"end var]","1","                                         
                 <h3 class="page-title">
                     <a href="/">Home</a> \ 
                     <a href="/projects/">Our Projects</a> \ %Projects_sql:title_en%</h3>
        
        <div class="text">
            
            %Projects_sql:more_en%</div>   
                    "end sql]                  
        
                     
    </div>
</div>
[include:"footer_en"end include]                

