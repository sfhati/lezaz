
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [buildings]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add building]
        </small>
    </h1>
</div><!-- /.page-header -->
           <style>
                .addFloor{cursor: pointer;}
                .error{
                    border-color: #f2a696 !important;
                    color: #d68273 !important;
                }   
            </style>
<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form  id="formbuilding" class="form-horizontal" method="post" enctype="multipart/form-data" target="ajaxform"> 
            <!-- #section:elements.form -->

            <div class="col-xs-12 col-sm-12">
                <div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">[building main information]</h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>                          
                        </div>
                    </div>

                    <div class="widget-body" style="display: block;">
                        <div class="widget-main">
                            <div>
                                [input:"text","building_nuilding_name","","[building name]","12","","[building name]"end input] 
                                [input:"text","building_no","","[building no]","12","","[building no]"end input] 
                                [input:"text","building_elevators_no","","[building elevators_no]","12","","[building elevators_no]"end input] 
[select:"building_type","[building_type]","data:building_type
id:type_*
","",""end select]                                  
                                  
[select:"building_city","[City]","data:city(id_contry=126)
id:city_name
","",""end select]                                  
                                
                                [input:"text","building_area","","[building area]","12","","[building area]"end input] 
                                [input:"text","building_street","","[building street]","12","","[building street]"end input] 
                                [input:"text","building_basin_no","","[building basin_no]","12","","[building basin_no]"end input] 
                                [input:"text","building_land_no","","[building land_no]","12","","[building land_no]"end input] 
                          
[select:"ownerdata","[owner]","data:owner
id:name
","chosen multiple",""end select]                                     
                                     





   
                                 
                            </div>

                            <!-- /section:plugins/input.autosize -->
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
<div class="widget-box">
                    <div class="widget-header">
                        <h4 class="widget-title">[floors main information]</h4>

                        <div class="widget-toolbar">
                            <a href="#" data-action="collapse">
                                <i class="ace-icon fa fa-chevron-up"></i>
                            </a>                          
                        </div>
                    </div>

                    <div class="widget-body" style="display: block;">
                        <div class="widget-main">
                            <div>




                                
<div id="input-floordata" class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="floordata"> نوع الطابق </label>
				
				<div class="col-sm-9">
                                   
                                    
<div class="row">
    <div class="col-xs-9 col-sm-12">
        <!-- #section:plugins/date-time.datepicker -->
        <div class="input-group">
[select:"floordata","","data:floor_type
id:type_*
","",""end select]     
            <span class="input-group-addon addFloor" style="cursor: pointer">
                <i class="fa fa-plus bigger-80 green "></i>
            </span>
        </div>
    </div>
</div>                                    

    <div id="addfloorelement" style="display: none">                                
        <li class="dd-item dd2-item dd-colored dd-collapsed thisflooor" id="floor_flooridhere" datafloor="000typexc000" floorid="flooridhere">
            <div class="dd-handle dd2-handle 000color000">
                <i class="normal-icon ace-icon fa fa-bars bigger-130"></i>
                <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
            </div>
            <div class="dd2-content 000color000 no-hover">000type000
                                  
                <div class="[style-pullar] action-buttons">
                    <a class="blue" href="javascript:">
                        <i class="add_office ace-icon fa fa-plus bigger-130" floor="flooridhere"></i>
                    </a>

                    <a class="red" href="javascript:">
                        <i class="delete_floor ace-icon fa fa-trash-o bigger-130" floor="flooridhere"></i>
                    </a>
                </div>                       
                                        
            </div>
               <ol class="" id="offices_flooridhere">
                </ol>
         </li>

    </div>

                                    
    <div id="addofficeelement" style="display: none">
        <li class="office dd2-content" id="office_officeidhere" officeid="officeidhere">            
            [office No] <input class="input-mini officeno" placeholder="[office No]"/>
            [number of rooms] <input class="input-mini roomno" placeholder="[number of rooms]" />                                  
            [area] <input class="input-mini area" placeholder="[area]" />                                  
                <div class="[style-pullar] action-buttons">                    
                    <a class="orange" href="javascript:">
                        <i dataid="office_officeidhere" class="delete_office ace-icon fa fa-trash-o bigger-130"></i>
                    </a>
                </div>                               
        </li>                                        
    </div> 
                                    
                                    
                                    <br>
 <div id="nestable-menu" class="btn-group-mini">					
    <button type="button" class="btn btn-sm btn-info" data-action="collapse-all">						
        <i class="icon-only  ace-icon fa fa-chevron-up"></i>
    </button>
    <button type="button" class="btn btn-sm btn-info" data-action="expand-all">
        <i class="icon-only  ace-icon fa fa-chevron-down"></i>
    </button>
</div>   
                                    <br>
                                    
                                    
                                    
                                    
<div id="floors">
    <div class="dd" id="nestable">
        <ol class="dd-list">
  

[if:"[var:"editbuilding-var"end var]","

[sql:"floors_sql","Select * From floor where building_id = [var:"editbuilding-var"end var] ORDER BY sort ASC","1000","
        <li class="dd-item dd2-item dd-colored thisflooor" id="floor_%floors_sql:id%" datafloor="%floors_sql:type%" floorid="%floors_sql:id%">
            <div class="dd-handle dd2-handle [row:"floor_type","%floors_sql:type-var%","color"end row]">
                <i class="normal-icon ace-icon fa fa-bars bigger-130"></i>
                <i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
            </div>
            <div class="dd2-content [row:"floor_type","%floors_sql:type-var%","color"end row] no-hover">[row:"floor_type","%floors_sql:type-var%","type_*"end row]
                                  
                <div class="pull-left action-buttons">
                    <a class="blue" href="javascript:">
                        <i class="add_office ace-icon fa fa-plus bigger-130" floor="%floors_sql:id%"></i>
                    </a>

                    <a class="blue" href="javascript:" >
                        <i class="art_floor ace-icon fa fa-map-marker bigger-130" floor="%floors_sql:id%" data-toggle="modal" data-target="#modal-art"></i>
                    </a>

                    <a class="red" href="javascript:">
                        <i class="delete_floor ace-icon fa fa-trash-o bigger-130" floor="%floors_sql:id%"></i>
                    </a>
                </div>                       
                                        
            </div>
                <ol class="" id="offices_%floors_sql:id%">
                    [sql:"offics_sql","Select * From office where id_floor = %floors_sql:id-var% ORDER BY id ASC","1000","
                    <li class="office dd2-content" id="office_%offics_sql:id%" officeid="%offics_sql:id%">            
                        [office No] <input class="input-mini officeno" value="%offics_sql:office_no%" placeholder="[office No]"/> 
                        [number of rooms] <input class="input-mini roomno" value="%offics_sql:office_room%" placeholder="[number of rooms]" />                                  
                        [area] <input class="input-mini area" value="%offics_sql:area%" placeholder="[area]" />                                  
                            <div class="[style-pullar] action-buttons">                    
                                <a class="orange" href="javascript:">
                                    <i dataid="office_%offics_sql:id%" class="delete_office ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                            </div>                               
                    </li>                                                                
                    "end sql]
                </ol>
         </li>
"end sql]

"end if]            
            
            
            
        </ol>
    </div>
</div>                                   

				</div>
			</div>                                
                                
                                
                                



                                 
                            </div>

                            <!-- /section:plugins/input.autosize -->
                        </div>
                    </div>
                </div>  <!-- /end floor -->
                
                
                
                
                
                
                
                
            </div>











            [if:"[var:"editbuilding-var"end var]","
            [input:"hidden","editbuildingid"end input] 

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">

                    [input:"button","submit_building","[update]","btn-info","fa-check"end input]     


                    [else]

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">

                            [input:"button","submit_building","[submit]","btn-info","fa-check"end input]     

                            "end if]

                            &nbsp; &nbsp;  
                            [input:"reset","button1","[reset]","","fa-undo"end input]                                     

                        </div>
                    </div>
                    
                                   
     [input:"hidden","floorsdata"end input]                
     [input:"hidden","buidingsubmit","yes"end input]                
                    </form>

        
        
        
        
        
        
        
        
        

<!-- Modal control -->
<div class="modal fade" id="modal-art" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">[office control]</h4>
      </div>
      <div class="modal-body">
        
          
          
          
          
          
      </div>
      <div class="modal-footer">

          <button class="btn btn-small btn-danger pull-right"  data-dismiss="modal">
              <i class="icon-ban-circle"></i>[close]
          </button>     
          <button id="savrfloorart" class="btn btn-small btn-info pull-left" data-dismiss="modal">
              <i class="icon-ban-circle"></i>[save]
          </button>
               
      </div>
    </div>
  </div>
</div>

        
              <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->

            <!-- building specific plugin scripts -->

            <!--[if lte IE 8]>
              <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
            <![endif]-->

            [include:"{template}admin/jsajax"end include]	

 

            <!-- page specific plugin scripts -->
            <script type="text/javascript">
                    var scripts = [null,"/template/Ace1.3.3/assets/js/jquery.nestable.js", null]
                    $('.page-content-area').ace_ajax('loadScripts', scripts, function() {
                      //inline scripts related to this page
                        jQuery(function($){
                            $('.addFloor').click(function(){
                                var x = 'X' + Math.floor((Math.random() * 1000000000000000) + 1);//element id flooridhere
                                var floortype = {
                    [sql:"floor_type","Select * From floor_type","1000","
                        %floor_type:id%:"%floor_type:color%" ,   
                "end sql]
            0:"red"};
                                $('#nestable .dd-list').append($( '#addfloorelement').html().replace(/000typexc000/g,$('#floordata').val()).replace(/000type000/g,$('#floordata option:selected').text()).replace(/000color000/g,floortype[$('#floordata').val()]).replace(/flooridhere/g,x));
                            $('#floor_'+x).find('.delete_floor').on( "click", function() {
                                $('#floor_'+x).remove();
                            });  
                             $('#floor_'+x).find('.add_office').on( "click", function() {
                                var x1 = 'X' + Math.floor((Math.random() * 1000000000000000) + 1);//element id flooridhere
                                $('#offices_'+x).append($( '#addofficeelement').html().replace(/flooridhere/g,x).replace(/officeidhere/g,x1));
                                $('#office_'+x1).find('.delete_office').click(function(){
                                    $('#'+ $(this).attr('dataid')).remove();
                                });
                            });    
                            });
                           $('.dd').nestable({maxDepth : 2});
			
                                $('.dd-handle a').on('mousedown', function(e){
                                        e.stopPropagation();
                                });
                               
             

                             $('.add_office').on( "click", function() {
                                 var x=$(this).attr('floor');   
                                var x1 = 'X' + Math.floor((Math.random() * 1000000000000000) + 1);//element id flooridhere
                                $('#offices_'+x).append($( '#addofficeelement').html().replace(/flooridhere/g,x).replace(/officeidhere/g,x1));
                                $('#office_'+x1).find('.delete_office').click(function(){
                                    $('#'+ $(this).attr('dataid')).remove();
                                });
                            });
                            
  

                                     

                               $('.delete_office').click(function(){
                                    $('#'+ $(this).attr('dataid')).remove();
                                });

                               $('.delete_floor').click(function(){
                                    $('#floor_'+ $(this).attr('floor')).remove();
                                });
 
 
                        $('#submit_building').click(function(){
                            $('#floorsdata').val('');
                            getalldatafloor();
                            if($('#floorsdata').val()) $('#formbuilding').submit();
                        });
                        
     $('#nestable-menu button').click(function(){
          var action = $(this).data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });  
    
var art_floor;
 
 $('.art_floor').click(function(){
     if($(this).attr('floor')){
    art_floor=$(this).attr('floor');  
     }
 });     
    
$('.modal').on('show.bs.modal', function (e) {
  var t=$(this).attr('id');
  var url='';
  if(t=='modal-art'){
    $(this).find('.modal-title').text('[floor art] '); 
    url='/?chng_tpl=floorart&floorid='+art_floor;
  }
 
  if(url)
    $(this).find('.modal-body').html('<div class="row-fluid"><h3 class="header smaller lighter grey"><i class="icon-cog icon-spin gray bigger-125"></i>Please Wait<small> Loading...</small></h3></div>').load(url);

   });                                 
                
     $('#savrfloorart').click(function(){
      var topleft='';
            
            $('.offices').each(function(){
                topleft = topleft + $(this).attr('f') + '|';
                topleft = topleft + $(this).attr('style') + '||';
            });

          $('#officespath').val(topleft);
          $('#offics').remove();
          
          $('#sendmapart').val($('#floorartstage').html());
          $('#sendart').submit();
     }); 
                    
                       
                       
                       
                       
                       
                          });
                        });
                        
                        function notnumber(n){
                             n.removeClass('error');
                                            if(!n.val().match(/^\d+$/)){
                                                msgerror('[ERR_number]');
                                                n.addClass('error');
                                                return '1';
                                            }else{
                                            return '2';
                                        }
                                        }
                        function getalldatafloor(){
                         var floor_data='';
                                    var floorsort = 0;
                                    var errorreturn = 0 ;
                                    $('.thisflooor').each(function() {
                                        if(floorsort){
                                        var idfloor=$(this).attr('floorid');                                        
                                        floor_data = floor_data + floorsort + ';' + idfloor + ','+$(this).attr('datafloor')+',';
                                        $('#offices_'+idfloor).find('.office').each(function() {
                                           
                                            if(notnumber($(this).find('.officeno'))=='1'){ errorreturn = 1; return false;}
                                            if(notnumber($(this).find('.roomno'))=='1'){ errorreturn = 1; return false;}
                                            
                                            floor_data = floor_data + $(this).find('.officeno').val()+';';
                                            floor_data = floor_data + $(this).find('.roomno').val()+';';
                                            floor_data = floor_data + $(this).find('.area').val()+';';
                                            floor_data = floor_data + $(this).attr('officeid') +'-';
                                        });
                                        if(errorreturn==1)  return false;
                                        floor_data = floor_data + '|';
                                    }
                                        floorsort++;
                                    });
                                    if(errorreturn==1)return false;
                                    $('#floorsdata').val(floor_data);
                                }


   
                 
      
                    
            </script>

         
 