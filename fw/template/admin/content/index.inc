
<title>[Dashboard] - [project name]</title>

<style>
    .datepicker { z-index: 9999 !important;}
    
</style>
<!-- ajax layout which only needs content area -->
<div class="page-header">
	<h1>
		[Dashboard]
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			[overview & stats]
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">

	<div class="col-xs-12">

     <div class="dd" id="nestable">
        <ol class="dd-list">
           

[sql:"building_sql","Select * From building  ORDER BY id DESC","1000","            
        <li class="dd-item dd2-item dd-colored" id="building_%building_sql:id%">
            <div class="dd2-content no-hover">%building_sql:nuilding_name%</div>
                <ol>
[sql:"floors_sql","Select * From floor where building_id = %building_sql:id-var% ORDER BY sort ASC","1000","
        <li class="dd-item dd2-item dd-colored thisflooor" id="floor_%floors_sql:id%" datafloor="%floors_sql:type%" floorid="%floors_sql:id%">
            <div class="dd2-content [row:"floor_type","%floors_sql:type-var%","color"end row] no-hover">
                 [row:"floor_type","%floors_sql:type-var%","type_*"end row]
                 <div class="[style-pullar] action-buttons">                                                                         
                    <a class="modalid orange" href="javascript:" building-name="%building_sql:nuilding_name%" office-no="%offics_sql:office_no%" office="%offics_sql:id%" floor="%floors_sql:id%" building="%building_sql:id%" data-toggle="modal" data-target="#modal-map">
                        <i dataid="%floors_sql:id%" class="ace-icon fa fa-cog bigger-130"></i>
                    </a>
                </div>  
            </div>
                             
            
                <ol class="" id="offices_%floors_sql:id%">
                    [sql:"offics_sql","Select * From office where id_floor = %floors_sql:id-var% ORDER BY id ASC","1000","
                    <li class="office dd2-content" id="office_%offics_sql:id%" officeid="%offics_sql:id%">            
                        [office No]: %offics_sql:office_no%
                        [number of rooms]: %offics_sql:office_room%                              
                        [area]: %offics_sql:area%                               
                            <div class="[style-pullar] action-buttons">                                                                         
                                <a class="modalid blue" href="javascript:" building-name="%building_sql:nuilding_name%" office-no="%offics_sql:office_no%" office="%offics_sql:id%" floor="%floors_sql:id%" building="%building_sql:id%" data-toggle="modal" data-target="#modal-office">
                                    <i dataid="office_%offics_sql:id%" class="delete_office ace-icon fa fa-cog bigger-130"></i>
                                </a>
                            </div>                               
                    </li>                                                                
                    "end sql]
                </ol>             
         </li>
"end sql]
 </ol>
         </li>
"end sql]
            
      </ol>      
          </div>  
            
            
            
	</div><!-- /.col -->
</div><!-- /.row -->







<!-- Modal control -->
<div class="modal fade" id="modal-office" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
          <button class="btn btn-small btn-info pull-left"  data-dismiss="modal" data-toggle="modal" data-target="#modal-contract">
              <i class="icon-ban-circle"></i>[contract]
          </button>
        
          <button class="btn btn-small btn-info pull-left"  data-dismiss="modal" data-toggle="modal" data-target="#modal-maintenance">
              <i class="icon-ban-circle"></i>[maintenance]
          </button>
         
      </div>
    </div>
  </div>
</div>
<!-- Modal map -->
<div class="modal fade" id="modal-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
       
         
      </div>
    </div>
  </div>
</div>









<!-- Modal maintenance  -->
<div class="modal fade" id="modal-maintenance" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">[maintenance for]</h4>
      </div>
      <div class="modal-body">
          <div class="row">  
              
    
              
         <form  id="formmaintenance" class="form-horizontal" method="post" enctype="multipart/form-data" target="ajaxform"> 
            <!-- #section:elements.form -->
          
                  

    
[input:"date","maintenance_date","","[maintenance date]","9","","dd-mm-yyyy"end input] 

      
[select:"maintenance_maintenance_type","[maintenance type]","data:maintenance_type
id:type_*
"," ",""end select]                                     
                             
[input:"text","maintenance_value","","[maintenance value]","5","","[maintenance value]"end input] 
[input:"hidden","maintenance_id_office","z"end input] 
[input:"text","maintenance_company","","[maintenance company]","12","","[maintenance company]"end input] 



[input:"textarea","maintenance_comment","","[comment]","12","","[comment] - [check no] \ [transaction no]"end input]  
  
[input:"hidden","submit_Table1","123"end input] 
[input:"hidden","tablename","maintenance"end input]     

         </form> 
          </div>  
          
          
      </div>
      <div class="modal-footer">

          <button class="btn btn-small btn-danger pull-right"  data-dismiss="modal">
              <i class="icon-ban-circle"></i>[close]
          </button>     
          <button id="saveformmaintenance" class="btn btn-small btn-info pull-left">
              <i class="icon-ban-circle"></i>[save]
          </button>
        
          <button class="btn btn-small btn-info pull-left" data-dismiss="modal" data-toggle="modal"  data-target="#modal-office">
              <i class="icon-ban-circle"></i>[Go Back]
          </button>
         
      </div>
    </div>
  </div>
</div>
<!-- end  Modal maintenance  -->



<!-- Modal contract  -->
<div class="modal fade" id="modal-contract" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">[contract to]</h4>
      </div>
      <div class="modal-body">
          <div class="row">  
              
              <div id="exsistcontract" class="alert alert-danger">
                
                  <strong>
                      <i class="ace-icon fa fa-exclamation-triangle"></i>
                      [worning]
                  </strong>

                  [there is an existing contract for this office, we wll remove it when you create a new one]
                  <br>
              </div>              
              
         <form  id="formcontract" class="form-horizontal" method="post" enctype="multipart/form-data" target="ajaxform"> 
            <!-- #section:elements.form -->
          
                  

    
[input:"date","contract_stast_date","","[start contract date]","9","","dd-mm-yyyy"end input] 

      
[select:"contract_id_client","[client_name]","data:client
id:name
"," ",""end select]                                     
                             
[input:"text","contract_value","","[Value rent]","5","","[Value rent]"end input] 
[input:"hidden","contract_id_office","z"end input] 



[select:"contract_cycle","[payoption]","rows
1
2
3
4
5
6
7
8
9
10
11
12
"end select]
[select:"contract_method","[method]","rows
12:[annual]
6:[midterm]
4:[Quarterly]
1:[monthly]
3:[three months]
"end select]
 

[input:"text","contract_first_pymant","","[first_pymant]","5","","[first_pymant]"end input] 
[select:"contract_pay_method","[pay method]","rows
1:[check]
2:[transaction]
3:[cache]
4:[other]
"end select]

[input:"textarea","contract_comment","","[comment]","12","","[comment] - [check no] \ [transaction no]"end input]  
  
[input:"hidden","submit_Table1","123"end input] 
[input:"hidden","tablename","contract"end input]     

         </form> 
          </div>  
          
          
      </div>
      <div class="modal-footer">

          <button class="btn btn-small btn-danger pull-right"  data-dismiss="modal">
              <i class="icon-ban-circle"></i>[close]
          </button>     
          <button id="saveformcontract" class="btn btn-small btn-info pull-left">
              <i class="icon-ban-circle"></i>[save]
          </button>
        
          <button class="btn btn-small btn-info pull-left" data-dismiss="modal" data-toggle="modal"  data-target="#modal-office">
              <i class="icon-ban-circle"></i>[Go Back]
          </button>
         
      </div>
    </div>
  </div>
</div>
<!-- end Modal contract  -->

   



[include:"{template}admin/jsajax"end include]	

<script>
                    var scripts = [null,"/template/Ace1.3.3/assets/js/jquery.nestable.js", null]
                    $('.page-content-area').ace_ajax('loadScripts', scripts, function() {
                         jQuery(function($){
                       $('#saveformcontract').click(function(){
                           $('#formcontract').submit();
                       });      
                       $('#saveformmaintenance').click(function(){
                           $('#formmaintenance').submit();
                       });      
                             $('.dd').nestable({maxDepth : 2});
                             $('.dd').nestable('collapseAll');
                             
                             $('#modal-table').modal('show');  
 
 $('.modalid').click(function(){
     if($(this).attr('building')){
    building=$(this).attr('building');
   floor=$(this).attr('floor');
   office=$(this).attr('office');   
   building_name=$(this).attr('building-name');   
   office_no=$(this).attr('office-no'); 
     }
 }); 
 
$('.modal').on('show.bs.modal', function (e) {
  var t=$(this).attr('id');
  var url='';
  if(t=='modal-office'){
    $(this).find('.modal-title').text('[office control] ' + office_no + ' [in building] ' + building_name); 
    url='/?chng_tpl=office_info&officeid='+office;
  }
  
  
  
  if(t=='modal-map'){
    $(this).find('.modal-title').text('[floor art] ' + floor + ' [in building] ' + building_name); 
    url='/?chng_tpl=floorartview&floorid='+floor;
  }
  
  
  
  
  
  if(t=='modal-maintenance'){
          $('#formmaintenance')[0].reset();
     $('#maintenance_id_office').val(office); 
   $(this).find('.modal-title').text('[maintenance for]' + building_name + ' [office No] ' + office_no);
 }
 if(t=='modal-contract'){
          $('#formcontract')[0].reset();

      if($('#exsistcontractt').val()) $('#exsistcontract').show(); else $('#exsistcontract').hide();
     $('#contract_id_office').val(office); 
   $(this).find('.modal-title').text('[contract to]' + building_name + ' [office No] ' + office_no);
   
   
  }
  if(url)
    $(this).find('.modal-body').html('<div class="row-fluid"><h3 class="header smaller lighter grey"><i class="icon-cog icon-spin gray bigger-125"></i>Please Wait<small> Loading...</small></h3></div>').load(url);

/*
      tt='All event for ';
      url='/?chng_tpl=event&moreclint='+modalid;
        }
if(lastload==url) return;  
lastload=url;
$(this).find('.title-modal').text(tt);
  $(this).find('.modal-body').html('<div class="row-fluid"><h3 class="header smaller lighter grey"><i class="icon-cog icon-spin gray bigger-125"></i>Please Wait<small> Loading...</small></h3></div>').load(url);
   $(this).find('.title-modal').text(tt + $('#modaltitle').val());
*/
   });                             
   
                        
                             
                         });

                    }); 
                    
                    
function savecontractdone(){
$('#modal-maintenance').modal('hide');
$('#modal-contract').modal('hide');
$('#modal-office').modal('show');
    $('#formmaintenance')[0].reset();
    $('#formcontract')[0].reset();
} 


</script>      




