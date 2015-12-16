<link href="/template/Ace1.3.3/assets/froala/css/froala_editor.min.css" rel="stylesheet" type="text/css">
<link href="/template/Ace1.3.3/assets/froala/css/froala_style.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/template/Ace1.3.3/assets/css/chosen.css" />


[if:"[var:"useajax-var"end var]"," [else]
<!-- page specific plugin scripts -->

<script src="/template/Ace1.3.3/assets/js/jquery.bootstrap-duallistbox.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.raty.js"></script>
<script src="/template/Ace1.3.3/assets/js/bootstrap-multiselect.js"></script>
<script src="/template/Ace1.3.3/assets/js/select2.js"></script>
<script src="/template/Ace1.3.3/assets/js/typeahead.jquery.js"></script>

<script src="/template/Ace1.3.3/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="/template/Ace1.3.3/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
<script src="/template/Ace1.3.3/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
<script src="/template/Ace1.3.3/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>

<script src="/template/Ace1.3.3/assets/js/jquery-ui.custom.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.ui.touch-punch.js"></script>
<script src="/template/Ace1.3.3/assets/js/date-time/moment.js"></script>
<script src="/template/Ace1.3.3/assets/js/bootbox.js"></script>

<script src="/template/Ace1.3.3/assets/js/prettify.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.gritter.js"></script>
<script src="/template/Ace1.3.3/assets/js/spin.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.colorbox.js"></script>



<script src="/template/Ace1.3.3/assets/js/chosen.jquery.js"></script>
<script src="/template/Ace1.3.3/assets/js/fuelux/fuelux.spinner.js"></script>
<script src="/template/Ace1.3.3/assets/js/date-time/bootstrap-datepicker.js"></script>
<script src="/template/Ace1.3.3/assets/js/date-time/bootstrap-timepicker.js"></script>
<script src="/template/Ace1.3.3/assets/js/date-time/daterangepicker.js"></script>
<script src="/template/Ace1.3.3/assets/js/date-time/bootstrap-datetimepicker.js"></script>
<script src="/template/Ace1.3.3/assets/js/bootstrap-colorpicker.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.knob.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.autosize.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.inputlimiter.1.3.1.js"></script>
<script src="/template/Ace1.3.3/assets/js/jquery.maskedinput.js"></script>
<script src="/template/Ace1.3.3/assets/js/bootstrap-tag.js"></script>     
<script src="/template/Ace1.3.3/assets/js/x-editable/bootstrap-editable.js"></script>     
<script src="/template/Ace1.3.3/assets/js/x-editable/ace-editable.js"></script>     


<script src="/template/Ace1.3.3/assets/froala/js/froala_editor.min.js"></script>
<!--[if lt IE 9]>
  <script src="/template/Ace1.3.3/assets/froala/js/froala_editor_ie8.min.js"></script>
<![endif]-->
<script src="/template/Ace1.3.3/assets/froala/js/plugins/tables.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/lists.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/colors.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/media_manager.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/font_family.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/font_size.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/block_styles.min.js"></script>
<script src="/template/Ace1.3.3/assets/froala/js/plugins/video.min.js"></script>

"end if]



<!-- page specific plugin scripts -->
<script type="text/javascript">
    [if:"[var:"useajax-var"end var]"," 
                    var scripts = [null,
                            "/template/Ace1.3.3/assets/js/jquery.bootstrap-duallistbox.js",
                            "/template/Ace1.3.3/assets/js/bootstrap-multiselect.js",
                            "/template/Ace1.3.3/assets/js/select2.js",
                            "/template/Ace1.3.3/assets/js/typeahead.jquery.js",
            
                            "/template/Ace1.3.3/assets/js/dataTables/jquery.dataTables.js",
                            "/template/Ace1.3.3/assets/js/dataTables/jquery.dataTables.bootstrap.js",
                            "/template/Ace1.3.3/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js",
                            "/template/Ace1.3.3/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js",
            
                            "/template/Ace1.3.3/assets/js/jquery-ui.custom.js",
                            "/template/Ace1.3.3/assets/js/jquery.ui.touch-punch.js",
                            "/template/Ace1.3.3/assets/js/date-time/moment.js",
                            "/template/Ace1.3.3/assets/js/bootbox.js",
            
                            "/template/Ace1.3.3/assets/js/prettify.js",
            
                            "/template/Ace1.3.3/assets/js/jquery.gritter.js",
                            "/template/Ace1.3.3/assets/js/spin.js",
            
                            "/template/Ace1.3.3/assets/js/jquery.colorbox.js",
            
                            "/template/Ace1.3.3/assets/js/chosen.jquery.js",
                            "/template/Ace1.3.3/assets/js/fuelux/fuelux.spinner.js",
                            "/template/Ace1.3.3/assets/js/date-time/bootstrap-datepicker.js",
                            "/template/Ace1.3.3/assets/js/date-time/bootstrap-timepicker.js",
                            "/template/Ace1.3.3/assets/js/date-time/daterangepicker.js",
                            "/template/Ace1.3.3/assets/js/date-time/bootstrap-datetimepicker.js",
                            "/template/Ace1.3.3/assets/js/bootstrap-colorpicker.js",
                            "/template/Ace1.3.3/assets/js/jquery.knob.js",
                            "/template/Ace1.3.3/assets/js/jquery.autosize.js",
                            "/template/Ace1.3.3/assets/js/jquery.inputlimiter.1.3.1.js",
                            "/template/Ace1.3.3/assets/js/jquery.maskedinput.js",
                            "/template/Ace1.3.3/assets/js/bootstrap-tag.js",
                            "/template/Ace1.3.3/assets/js/x-editable/bootstrap-editable.js",
                            "/template/Ace1.3.3/assets/js/x-editable/ace-editable.js",
            
                            "/template/Ace1.3.3/assets/froala/js/froala_editor.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/tables.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/lists.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/colors.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/media_manager.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/font_family.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/font_size.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/block_styles.min.js",
                            "/template/Ace1.3.3/assets/froala/js/plugins/video.min.js",
          
                            null]
                        
                    $('.page-content-area').ace_ajax('loadScripts', scripts, function() {
            "end if]       

                    ///////////
                    $(document).one('ajaxloadstart.page', function(e) {
                        $.gritter.removeAll();
                        $('.modal').modal('hide');
                        $('#ajaxform').attr('src', '');
                        $('#colorbox, #cboxOverlay').remove();
                    });
                    $('[data-rel=tooltip]').tooltip({container:'body'});
                    $('[data-rel=popover]').popover({container:'body'});
                    $('textarea[class*=autosize]').autosize({append: "\n"});
                    $('textarea.limited').inputlimiter({
                        remText: '%n character%s remaining...',
                        limitText: 'max allowed : %n.'
                    });
                    $('.imagefile').ace_file_input({
                        no_file:'[no image] ...',
                        btn_choose:'Choose',
                        btn_change:'Change',
                        droppable:false,
                        onchange:null,
                        thumbnail:false, //| true | large
                        whitelist:'gif|png|jpg|jpeg'
                    });
                    $('.filefile').ace_file_input({
                        no_file:'[no file] ...',
                        btn_choose:'Choose',
                        btn_change:'Change',
                        droppable:false,
                        onchange:null,
                        thumbnail:false, //| true | large
                        blacklist:'exe|php'
                    });
                    
                    
 				$('.multiple_imagefile').ace_file_input({
					style:'well',
					btn_choose:'[Drop images here or click to choose]',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
                                        whitelist:'gif|png|jpg|jpeg',
					thumbnail:'small'//large | fit	
                                        
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
                   
                    
                    
                    
                    //pre-show a file name, for example a previously selected file
                    //$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
                    $('.chosen-select').chosen({allow_single_deselect:true});

                    $('.multiple_filefile').ace_file_input({
                        style:'well',
                        btn_choose:'[Drop files here or click to choose]',
                        btn_change:null,
                        no_icon:'ace-icon fa fa-cloud-upload',
                        droppable:true,
                        thumbnail:'small',
                    });
                    
                    $('.date-picker').datepicker({
                        autoclose: true,
                        todayHighlight: true
                    })
                    //show datepicker when clicking on the icon
                    .next().on(ace.click_event, function(){
                        $(this).prev().focus();
                    });
                    //or change it into a date range picker
                    $('.daterange').datepicker({autoclose:true});
                    //to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
                    $('.DateRangePicker').daterangepicker({
                        'applyClass' : 'btn-sm btn-success',
                        'cancelClass' : 'btn-sm btn-default',
                        locale: {
                            applyLabel: 'Apply',
                            cancelLabel: 'Cancel',
                        }
                    })
                    .prev().on(ace.click_event, function(){
                        $(this).next().focus();
                    });
                    
                    $('.timepicker').timepicker({
                        minuteStep: 1,
                        showSeconds: true,
                        showMeridian: false
                    }).next().on(ace.click_event, function(){
                        $(this).prev().focus();
                    });
                    
                    $('.timepicker1').datetimepicker().next().on(ace.click_event, function(){
                        $(this).prev().focus();
                    });
                    $('.colorpicker').colorpicker();
                    $('.colorpicker1').ace_colorpicker();

                    $(".knob").knob();

                    $('#modal-form input[type=file]').ace_file_input({
                        style:'well',
                        btn_choose:'[Drop files here or click to choose]',
                        btn_change:null,
                        no_icon:'ace-icon fa fa-cloud-upload',
                        droppable:true,
                        thumbnail:'large'
                    })


                    $('#edittextarea , .edittextarea').editable({
                        inlineMode: false,
                        height:200,
                        imageUploadURL: '/?upoladimages=1'                      
                    });
                    
                    $('#formpage').submit(function() {
                        $('#newtextarea').val($('.froala-view').html());
                    });
                    $("a:contains('Unlicensed Froala Editor')").hide();

                    $(document).one('ajaxloadstart.page', function(e) {
                        $('textarea[class*=autosize]').trigger('autosize.destroy');
                        $('.limiterBox,.autosizejs').remove();
                        $('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
                    });
	
           
            [if:"[var:"useajax-var"end var]"," 
                    });
                               

            
            "end if]   

    function locationset(p){
        setTimeout((function(){window.top.location.href = '/admin/{{ajxurl}}page/' + p}), 1000);
    }
                            // load other pages 

</script>


