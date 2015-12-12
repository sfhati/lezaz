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
                 [sql:"solutions_sql","Select * From project where url=15 and id=[var:"solutionsid-var"end var]","1","                                         
                 <h3 class="page-title">
                     <a href="/">Home</a> \ 
                     <a href="/solutions/">Solutions</a> \ %solutions_sql:title_en%</h3>
        
        <div class="text">
            
            %solutions_sql:more_en%</div>   
                    "end sql]                  
        
                     
    </div>
</div>
[include:"footer_en"end include]                

