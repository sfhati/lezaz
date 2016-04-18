<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Theme Template for Bootstrap</title>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Optional theme -->

    </head>
    <body role="document">

    
        <lezaz:form id='member_form' type='database' table="members" >  
            <lezaz:input use="member_form"  type='text' id="username" label="[user name]" field-type="VARCHAR(250) NOT NULL" validation="r;m:8;x:15;ti:members,username" placeholder="Enter user name" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type='password' id="userpassword" label="[password]"  field-type="VARCHAR(250) NOT NULL" validation="r;m:8;x:15" placeholder="Enter password" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type='text' id="useremail" label="[email]"  field-type="VARCHAR(250) NOT NULL" validation="r;e" placeholder="Enter email" size-label='2' size='10'  space='10'/> 
            <lezaz:input use="member_form"  type="image" id="icon" save="member" label="[site_icon]" field-type="VARCHAR(250) NOT NULL"  size-label='2' size='10'  space='10'/>
            <lezaz:input use="member_form"  type="select" id="user_type"  label="[user_type]" field-type="int(11)"  size-label='2' size='10'  space='10'>
                <option value="1">admin</option>
                <option value="2">member</option>
            </lezaz:input>         
            <lezaz:input use="member_form"  type="select" id="user_sex"  label="[user_sex]" field-type="int(11)"  size-label='2' size='10'  space='10'>
                <option value="1">[male]</option>
                <option value="2">[female]</option>
            </lezaz:input>         

            
            <div class="clearfix form-actions">   
                <div class="col-md-offset-3 col-md-9">
                    <lezaz:input id="submit_member" use="member_form"  type='submit' value="yes" label='[save]' icon='fa-check' color='info'/>
                    <lezaz:input type='reset' label='[reset]' icon='fa-undo' />                                                             
                </div>
            </div> 
        </lezaz:form> 
    
    
lezaz:msg()
        
        
  
<hr>


    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center"><label><input type="checkbox" /><span class="lbl"></span></label></th>
                <th>[id]</th>
                <th>[user name]</th>
                <th class="hidden-phone"><i class=" fa fa-time bigger-110 hidden-phone"></i>[last login]</th>
                <th class="hidden-480">[user_type]</th>
                <th>[action]</th>
            </tr>
        </thead>

        <tbody>
        <lezaz:sql id='users_sql' sql="Select * From members" limit="5" multipage="multipage">           
             
            <tr id="trlezaz#users_sql[id]">
                <td class="center"><label><input type="checkbox" /><span class="lbl"></span></label></td>
                 <td>lezaz#users_sql[id]</td>
                <td>lezaz#users_sql[username]</td>
                <td>lezaz#users_sql[datetime_updated]</td>
                
             
                <td class="hidden-480">
                   
                  
                    <span class="label-important">
                        <span >
                            <lezaz:if id="adminmem1" condition="lezaz#users_sql[user_type]==1" pass="admin" print="true" fail=""/>
                            <lezaz:if id="adminmem2" condition="lezaz#users_sql[user_type]==2" pass="member" print="true" fail=""/>                             
                        </span>                                            
                    </span>
             
                </td>
 <td class="td-actions ">
                    <div class="action-buttons">                     
                        <a class="green" href="/?UPDATE_submit_member=lezaz#users_sql[id]">
                            <i class="fa fa-pencil bigger-130"></i>
                        </a>
                        <a class="red deleteuser" usr="lezaz#users_sql[id]" href="javascript:">
                            <i class="fa fa-trash bigger-130"></i>
                        </a>  
                    </div>
                </td>
               
            </tr>
  </lezaz:sql>    
            
            
        </tbody>
    </table>
    There is lezaz#users_sql_num rows <br>
    lezaz#users_sql_multipage



        <!-- Bootstrap core JavaScript -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>   
    </body>
</html>