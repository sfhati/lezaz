[sql:"contract_sql","Select * From contract where id_office = [var:"officeid-var"end var]","1","

    <h3 class="header smaller lighter blue">[exiset contract]</h3>




<ul class="list-unstyled spaced2">
    <li>
        <i class="ace-icon fa fa-circle green"></i>
        [client_name]: [row:"client","%contract_sql:id_client-var%","name"end row]
    </li>  
    <li>
        <i class="ace-icon fa fa-circle green"></i>
        [Value rent]: %contract_sql:value%
    </li>  
    <li>
        <i class="ace-icon fa fa-circle green" data='%contract_sql:method%'></i>
       [method]: [php:"echo global_var('contract_method_'.$rowcontract_sql[method]);"end php]
    </li>  
    <li>
        <i class="ace-icon fa fa-circle green"></i>
        [payoption]: %contract_sql:cycle%
    </li>  
    <li>
        <i class="ace-icon fa fa-circle green"></i>
        [start contract date]: %contract_sql:stast_date%
    </li>  
</ul>


    
    
    






<div class="row-fluid">
    <h3 class="header smaller lighter blue"> [payments]</h3>

    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>[id]</th>
                <th>[value]</th>
                <th><i class=" fa fa-calendar bigger-110 hidden-phone"></i> [payment date] </th>                
                <th class="hidden-phone">[status]</th>
            </tr>
        </thead>

        <tbody>



    [sql:"users_sql","Select * From pyment where id_contract = %contract_sql:id-var%","1000","            
            <tr id="tr%users_sql:id%">
                 <td>%users_sql:id%</td>
                 <td>
                    <span class="editable" data-placeholder="Required" data-pk="%users_sql:id%" data-type="text" data-url="/?posteditabletype=1&t=pyment&f=value">%users_sql:value%</span>
                 </td>
                <td>
                   <span class="editable" data-placeholder="Required" data-pk="%users_sql:id%" data-type="date" data-url="/?posteditabletype=1&t=pyment&f=date" data-format="DD-MM-YYYY">%users_sql:date%</span>
                </td>
                <td>[if:"%users_sql:status-var%==1","<i class="ace-icon fa fa-check green changepaystatus" data='%users_sql:id%'></i>"end if]
                    [if:"%users_sql:status-var%==2","<i class="ace-icon fa fa-exclamation-triangle red changepaystatus" data='%users_sql:id%'></i>"end if]
                    [if:"%users_sql:status-var%==0","<i class="ace-icon fa fa-clock-o dark changepaystatus" data='%users_sql:id%'></i>"end if]
                    <input id='exsistcontractt' value='%contract_sql:id%' type='hidden'/>
                    
                </td>
    
            </tr>
   "end sql]
 "end sql]
 
 [if:"!$rowcontract_sql_counter","
 
        <div class="alert alert-info">            
            <strong>[Heads up]!</strong>
            [there is no contract available]
            <br>
        </div>
 
 
 "end if]           
        </tbody>
    </table>
</div>
    
    
    <script>
$('.changepaystatus').click(function(){
    $(this).removeClass('red green dark fa-check fa-exclamation-triangle fa-clock-o');
    var pinNumber = $.ajax({
    type: "POST",
    url: "/",
    data: "changepaystatus="+$(this).attr('data'),
    async: false
}).responseText;
if(pinNumber=='1'){
    $(this).addClass('green fa-check');
}
if(pinNumber=='2'){
    $(this).addClass('red fa-exclamation-triangle');
}
if(pinNumber=='0'){
    $(this).addClass('dark fa-clock-o');
}
}) ; 

$('.editable').editable();
        </script>
        
        
        
       