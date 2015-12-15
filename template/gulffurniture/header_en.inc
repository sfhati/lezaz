<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>lezaz:setting(title,My Site)</title>
        <meta name="description" content="">	
        <meta name="author" content="">

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Favicons
        ================================================== -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

       <link rel="stylesheet" href="http://shame.cms/Ace/assets/css/ace.css">
       
          <lezaz:import dir='{template}admin/css' type='css' >   </lezaz:import>       
       <lezaz:import dir='{template}admin/js' type='js' sort='asc' compress='true'>          </lezaz:import>  
   
       
   </head>

    <body class="home blog">

                        <ul id="menu-top-menu" class="menu">                             
                            <lezaz:sql id="topmenu_sql" sql="Select * From pages where page_active='1'  ORDER BY page_sort ASC" limit="4"   counter='4' >                              
                                <lezaz:if condition="lezaz#topmenu_sql[url]" id="ifurl" result="lezaz#topmenu_sql[url],/page/lezaz#topmenu_sql[id]/lezaz#topmenu_sql[page_name]"/>
                            <li id="menu-item-lezaz#topmenu_sql[id]" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-lezaz#topmenu_sql[id]"><a href="lezaz#ifurl">lezaz#topmenu_sql_counter: lezaz#topmenu_sql[page_name]</a></li>                                                                  
                            </lezaz:sql>         
                        </ul>          
            lezaz#topmenu_sql_multipage
         
            lezaz:get(param) = $_GET[param]<br>
    lezaz:post(param) = $_POST[param]<br>
    lezaz:cons(SITE_PATH) = SITE_PATH<br>
    lezaz:sess(bassam,3) = $_SESSION[param]<br>
    lezaz:sess(param,key) = $_SESSION[param][key]<br>
         
            
<lezaz:each id='ideach' array="bassam" type="session" counter="5">
  lezaz#ideach_counter: lezaz#ideach_key =>  lezaz#ideach_value <br>
  </lezaz:each>            

          
 <lezaz:input type="submit" label='cdde' icon-righ0t='usb' color=" success" icon='bluetooth-b  '  size="">
                   bassam alessawi
               </lezaz:input>

    <lezaz:input/>  
    
 