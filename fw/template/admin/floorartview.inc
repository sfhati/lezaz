<style>
  #floorartstage { 
    border: 1px dashed #ccc;
    height: 375px;
   /* background: url(/template/admin/images/wires-grid.gif);*/
  }
  
  /* Lines can be styled with normal css: */
  div.line{
    -webkit-transform-origin: 0 50%;
       -moz-transform-origin: 0 50%;
            transform-origin: 0 50%;
                 
    height: 5px; /* Line width of 3 */
    background: #948C79; /* Black fill */
    opacity: 1;
 
    
    /* For some nice animation on the rotates: */
    -webkit-transition: -webkit-transform 1s;
       -moz-transition:    -moz-transform 1s;
            transition:         transform 1s;
  }
  
  
 

.hand {
    cursor: pointer;
}
.offices{width:100px;}


</style>



<div id="floorartstage" class="wide">
 [sql:"floor_sql","Select * From floor where id = [var:"floorid-var"end var]","1","    
   %floor_sql:map%
 "end sql]   
    <ul id="offics" class="list-unstyled">
 [sql:"offics_sql","Select * From office where id_floor = [var:"floorid-var"end var] ORDER BY id ASC","1000","    
<li class="offices " style="%offics_sql:style%">%offics_sql:office_no% 
    
    <i class="hand ace-icon fa fa-certificate modalid1" data-rel="tooltip" data-placement="bottom" title="" data-original-title=" [number of rooms]: %offics_sql:office_room%  [area]: %offics_sql:area%" office-no="%offics_sql:office_no%" office="%offics_sql:id%" data-dismiss="modal" data-toggle="modal" data-target="#modal-office"></i>    
</li>
"end sql]
</ul>
</div>

 
<script>
$(function(){
  
$('.modalid1').click(function(){
     
   office=$(this).attr('office');   
   office_no=$(this).attr('office-no'); 
     
 });      
  
});
                        


</script>
    