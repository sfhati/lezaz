<style>
  #floorartstage { 
    border: 1px dashed #ccc;
    height: 375px;
    background: url(/template/admin/images/wires-grid.gif);
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
  
  div.line:hover{
    background: #C30;
    box-shadow: 0 0 8px #C30;
    opacity: 1;
  }
  
  div.line.active{
    background: #666;
    opacity: 1;
  }
 .modal-body {
    overflow: hidden;
} 
.hand {
    cursor: move;
}
.offices{width:100px;}
#controlbutton{
    position: fixed;
    top: 19px;
    left: 100px;
}

</style>
<div id="controlbutton" data-toggle="buttons" class="btn-group btn-overlap btn-corner">
    <label id="arttrash" class="btn btn-sm btn-white btn-info">
        <input type="radio" value="1">
        <i class="icon-only ace-icon fa fa-trash bigger-110"></i>
    </label>

    <label id="artedit" class="btn btn-sm btn-white btn-info">
        <input type="radio" value="2">
        <i class="icon-only ace-icon fa fa-edit bigger-110"></i>
    </label>

    <label id="artpointer" class="btn btn-sm btn-white btn-info">
        <input type="radio" value="3">
        <i class="icon-only ace-icon fa fa-mouse-pointer bigger-110"></i>
    </label>
    <label id="artnote" class="btn btn-sm btn-white btn-info"> 
        <input type="radio" value="3">
        <i class="icon-only ace-icon fa fa-sticky-note-o bigger-110"></i>
    </label>
</div>




<div id="floorartstage" class="wide">
 [sql:"floor_sql","Select * From floor where id = [var:"floorid-var"end var]","1","    
   %floor_sql:map%
 "end sql]   
    <ul id="offics" class="list-unstyled">
 [sql:"offics_sql","Select * From office where id_floor = [var:"floorid-var"end var] ORDER BY id ASC","1000","    
<li class="offices" f="%offics_sql:id%" style="%offics_sql:style%">%offics_sql:office_no% 
    <i class="hand ace-icon fa fa-certificate" data-rel="tooltip" data-placement="bottom" title="" data-original-title=" [number of rooms]: %offics_sql:office_room%  [area]: %offics_sql:area%"></i>    
</li>
"end sql]
</ul>
</div>

    <form  id="sendart" class="hidden" method="post" enctype="multipart/form-data" target="ajaxform"> 
       [input:"hidden","sendmapart"end input] 
       [input:"hidden","idfloor","[var:"floorid-var"end var]"end input] 
       [input:"hidden","officespath",""end input] 
   </form>      
       
<script>
$(function(){
  var x1 = null, y1 = null,art=null;
  
  function createLine(x1,y1, x2,y2){
		var length = Math.sqrt((x1-x2)*(x1-x2) + (y1-y2)*(y1-y2));
    var angle  = Math.atan2(y2 - y1, x2 - x1) * 180 / Math.PI;
    var transform = 'rotate('+angle+'deg)';
    
		var line = $('<div>')
			.appendTo('#floorartstage')
			.addClass('line')
			.css({
			  'position': 'absolute',
			  '-webkit-transform':  transform,
			  '-moz-transform':     transform,
			  'transform':          transform
			})
			.width(length)
			.offset({left: x1, top: y1});

		return line;
	}
           
$('#arttrash').click(function(event){
     x1=null; y1=null;
     art=2;     
  });
 $('#artedit').click(function(event){
     x1=null; y1=null;
     art=1;
  });
$('#artpointer').click(function(event){
     x1=null; y1=null;
     art=3;
  });
$('#artnote').click(function(event){
    event.preventDefault();
    $('.line').fadeOut(300, function(){ $(this).remove(); });    
     x1=null; y1=null;
     art=3;
  });
  
  $('#floorartstage').click(function(event){
      if(art==1){
    var x = event.pageX,
        y = event.pageY;
    
    if (x1 == null){
      x1 = x; y1 = y;
    } else {
      createLine(x1,y1,x,y);
      x1 = x; y1 = y;
    }
      }
  $('.line').on( "click", function() {
      if(art==2){
          $(this).fadeOut(300, function(){ $(this).remove(); }); 
      }
  });
  // $( ".line" ).draggable({ containment: "#floorartstage",scroll: false }); 
  });
  
 
  $('.line').on( "click", function() {
      if(art==2){
          $(this).fadeOut(300, function(){ $(this).remove(); }); 
      }
  });
 $( ".offices" ).draggable({ handle: ".hand", containment: "#floorartstage",scroll: false }); 
 $('[data-rel=tooltip]').tooltip();

});
                        


</script>
    