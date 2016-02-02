 



<title>[plan]</title>
<style>
    .inputcorre{
        clear: both;
        height:100px;
    }
</style>
<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [plan]

    </h1>
</div><!-- /.page-header -->
<div class="row"> 
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
lezaz:msg()
        <lezaz:sql id='plan_sql' sql="Select * From planning where id=$_GET[plan]" limit="1">  

            <lezaz:sql id='oditor_sql' sql="Select * From members where id=lezaz#plan_sql[id_oditor]" limit="1">  
                Oditor : lezaz#oditor_sql[username] <br>
            </lezaz:sql>
            <lezaz:sql id='department_sql' sql="Select * From department where id=lezaz#plan_sql[id_department]" limit="1">  
                Department : lezaz#department_sql[department_name] <br>
            </lezaz:sql>

            in : lezaz#plan_sql[date] <br>
            <h4>Objective:</h4>

            <form method="post">
                <input type='hidden' name='plan_id' value='lezaz:get(plan)'/>                

                    <lezaz:sql id='objective_sql' sql="Select * From check_list_oditer where id_plan = '{#lezaz#plan_sql[id]#}' and status='3'" limit="1000">  
                        <lezaz:sql id='objective1_sql' sql="Select * From objective where id = '{#lezaz#objective_sql[id_obj]#}'" limit="1"> 
                            <div class="dd2-content">lezaz#objective1_sql[objective]</div>  

                        </lezaz:sql>
                        <lezaz:sql id='list_sql' sql="Select * From check_list where id_objective='{#lezaz#objective_sql[id_obj]#}'" limit="1000" counter='1'>  

                            <lezaz:if condition="is_root() || is_editor()"> 
                                <input type='hidden' name='obj_[{{lezaz#list_sql[id]}}]' value='lezaz#objective_sql[id_obj]'/>

                                <li class="dd-item dd2-item" data-id="14">
                                    <div class="dd-handle dd2-handle">
                                        <label>
                                            lezaz#list_sql_counter                                   
                                        </label>
                                    </div>
                                    <div class="dd2-content">
                                        lezaz#list_sql[question]  
                                        <div class="checkbox col-sm-oo"> 
                                            <label> 
                                                <input id="{{lezaz#list_sql[id]}}" name="use_[{{lezaz#list_sql[id]}}]" value="1"  lezaz:get(_VAL_status_$lezaz_list_sql[id]) class="ace ace-switch ace-switch-5 " type="checkbox"  > 
                                                <span class="lbl"> </span> 
                                            </label>
                                        </div>     
                                        <div class='inputcorre'>

                                            <div id="input-icon" class="form-group"> 
                                                <label class="col-sm-2 control-label no-padding-right" for="icon"> 
                                                    [Attatchment] 
                                                </label> 
                                                <div class="col-sm-10"> 
                                                    <input type="file" name="icon_[{{lezaz#list_sql[id]}}]" id="icon"  class="col-sm-12 imagefile "/>
                                                </div>
                                            </div> 
                                            <div class="space-10">
                                            </div> 
                                            <div id='inpt{{lezaz#list_sql[id]}}'> 
                                                <div id="input-note" class="form-group"> 
                                                    <label class="col-sm-2 control-label no-padding-right" for="note"> 
                                                        [Corrective action] 
                                                    </label> 
                                                    <div class="col-sm-10"> 
                                                        <input type="text" name="note_[{{lezaz#list_sql[id]}}]" value='lezaz:get(_VAL_action_$lezaz_list_sql[id])' class="col-sm-12 " placeholder ="note here"  />
                                                    </div>
                                                </div> 
                                                <div class="space-10">
                                                </div> 
                                                <div id="input-date" class="form-group"> 
                                                    <label class="col-sm-2 control-label no-padding-right" for="date"> 
                                                        [Complete date] 
                                                    </label> 
                                                    <div class="col-sm-10"> 
                                                        <span class="input-icon">
                                                            <input type="text" name="date_[{{lezaz#list_sql[id]}}]" class="col-sm-12  date-picker "   value='lezaz:get(_VAL_date_$lezaz_list_sql[id])' data-date-format="dd-mm-yyyy"/><i class="ace-icon fa fa-calendar"></i></span>
                                                    </div>
                                                </div> 
                                                <div class="space-10">
                                                </div>                                          

                                            </div>
                                            </li>                      








                                                <lezaz_else/>
                                            * lezaz#list_sql[question]<br>
                                            </lezaz:if>

                                            </lezaz:sql>    
                                            </lezaz:sql>

                                            <lezaz:if condition="is_editor() && lezaz#plan_sql[status]==1">
                                                <div class="clearfix form-actions" >   
                                                    <div class="col-md-offset-3 col-md-9 ">
                                                        <lezaz:input id="submit_chicklisteditor"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                                                        <lezaz:input type='reset' label='[reset]' icon='fa-undo' />     
                                                        <a class="btn btn-sm btn-warning" href="/615_1">
                                                            <i class="ace-icon fa fa-calendar bigger-110"></i>
                                                            <span class="bigger-110 no-text-shadow">View Calendar</span>
                                                        </a>                    
                                                    </div>
                                                </div>                           
                                            </lezaz:if>                
                                           <lezaz:if condition="is_root() && lezaz#plan_sql[status]==2">
                                                <div class="clearfix form-actions" >   
                                                    <div class="col-md-offset-3 col-md-9 ">
                                                        <lezaz:input id="submit_chicklisteditor2"  type='submit' value="yes" label='[Confirm]' icon='fa-check' color='info'/>
                                                        <lezaz:input type='reset' label='[reset]' icon='fa-undo' />     
                                                        <a class="btn btn-sm btn-warning" href="/615_1">
                                                            <i class="ace-icon fa fa-calendar bigger-110"></i>
                                                            <span class="bigger-110 no-text-shadow">View Calendar</span>
                                                        </a>                    
                                                    </div>
                                                </div>                           
                                            </lezaz:if>                

                                            </form>


                                            <hr>
                                            <br> counter: lezaz#plan_sql[counter]
                                            <br> note: lezaz#plan_sql[note]


                                            </lezaz:sql>


                                            <!-- PAGE CONTENT ENDS -->
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <script>
                                        $('.ace-switch').change(function () {
                                            var id = ($(this).attr('id'));
                                            if ($(this).is(":checked")) {
                                                $('#inpt' + id).hide();
                                            } else {
                                                $('#inpt' + id).show();
                                            }
                                        });
                                    </script>
                                    <!-- page specific plugin scripts -->

                                    <!--[if lte IE 8]>
                                      <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
                                    <![endif]-->


