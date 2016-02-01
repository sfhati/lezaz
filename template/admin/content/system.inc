
<title>Form Elements - Ace Admin</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [levels]
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            [add levels]
        </small>
    </h1>
</div><!-- /.page-header -->     
<div class="row">
    <div class="col-xs-12">        

        <lezaz:form id='member_form' create="off" type='database' table="level1" >  
            <lezaz:input use="member_form"  type='text' id="username" label="[objective]" field-type="VARCHAR(250) NOT NULL" validation="r" placeholder="Enter objective" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type="select" id="user_type" save="member" label="[user_type]" field-type="int(11)"  size-label='2' size='10'  space='10'>
                <option value="1">admin</option>
                <option value="2">oditer</option>
                <option value="3">department</option>
            </lezaz:input>                

            <lezaz:input use="member_form"  type="select" id="sub_type" save="member" label="[sub_type]" field-type="int(6)" size-label='2' size='10'  space='10' >
                <option value="1">electric</option>
                <option value="2">engineer</option>
                <option value="3">technical</option>
            </lezaz:input>                

            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_member" use="member_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div> 
        </lezaz:form>     




        <div id="addmain"> 
      
        </div>        


        lezaz:msg()

        <button id='add_addsub' type="button" class="btn btn-sm btn-danger buttonpic">               
            <i class="ace-icon fa fa-plus icon-on-right bigger-110"></i>
        </button>

        <div id="addsub" class="hidden">
            <div id="bassam_000typexc000"> 
                <input  class="class_000typexc000" value="000typexc000_counter"/>    
                <div >
                    <button id='delete_000typexc000' for="bassam_000typexc000" type="button" class="btn btn-sm btn-danger buttonpic">               
                        <i class="ace-icon fa fa-trash-o icon-on-right bigger-110"></i>
                    </button>
                </div>      
            </div>
        </div>   

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->
<script>
    $(document).ready(function() {
        $('#user_type').on('change', function() {
            if ($(this).val() == '3') {
                $('#input-sub_type').show();
            } else {
                $('#input-sub_type').hide();
            }
        });

        if ($('#user_type').val() == '3') {
            $('#input-sub_type').show();
        } else {
            $('#input-sub_type').hide();
        }

    });

</script>
<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


<script>
    $(document).ready(function() {
        $('#addmain div').each(function() {
            var x = $(this).attr('id');//element id flooridhere
            $('*[for="' + x + '"]').click(function() {
                $('#' + x).remove();
            });

        });

        $('#add_addsub').on('click', function() {
            var x = 'X' + Math.floor((Math.random() * 1000000000000000) + 1);//element id flooridhere
            $('#addmain').append($('#addsub').html().replace(/000typexc000/g, x));
            $('#' + 'delete_' + x).click(function() {
                $('#' + $(this).attr('for')).remove();
            });
        });
    });
</script>