 



<title>[plan]</title>

<!-- ajax layout which only needs content area -->
<div class="page-header">
    <h1>
        [plan]

    </h1>
</div><!-- /.page-header -->
<div class="row"> 
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <lezaz:sql id='plan_sql' sql="Select * From planning where id=$_GET[plan]" limit="1">  

            <lezaz:sql id='oditor_sql' sql="Select * From members where id=lezaz#plan_sql[id_oditor]" limit="1">  
                Oditor : lezaz#oditor_sql[username] <br>
            </lezaz:sql>
            <lezaz:sql id='department_sql' sql="Select * From department where id=lezaz#plan_sql[id_department]" limit="1">  
                Department : lezaz#department_sql[department_name] <br>
            </lezaz:sql>

            in : lezaz#plan_sql[date] <br>
            <h4>Objective:</h4>
            <lezaz:sql id='objective_sql' sql="Select * From objective where id=lezaz#plan_sql[id_objective]" limit="1000">  
                
                <h5>lezaz#objective_sql[objective] </h5> <br>
                <lezaz:sql id='list_sql' sql="Select * From check_list where id_objective=lezaz#plan_sql[id_objective]" limit="1000">  
                    <lezaz:if condition="lezaz#plan_sql[status]==1">
                        * lezaz#list_sql[question]<input><br>
                        <lezaz_else/>
                        * lezaz#list_sql[question]<br>
                    </lezaz:if>
                   
                </lezaz:sql>    
            </lezaz:sql>



           
            <hr>
            <br> counter: lezaz#plan_sql[counter]
           <br> note: lezaz#plan_sql[note]
         

        </lezaz:sql>


        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="/template/Ace1.3.3/assets/js/excanvas.js"></script>
<![endif]-->


