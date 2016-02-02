<?php global $lezaz;?><!-- #section:basics/navbar.layout -->
<div id="navbar" class="navbar navbar-default">
    <script type="text/javascript">
        try {
            ace.settings.check('navbar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="navbar-container" id="navbar-container">
        <!-- #section:basics/sidebar.mobile.toggle -->
        <button type="button" class="navbar-toggle menu-toggler [style-pullen]" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <!-- /section:basics/sidebar.mobile.toggle -->
        <div class="navbar-header [style-pullen]">
            <!-- #section:basics/navbar.layout.brand -->
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    Sfhati Admin
                </small>
            </a>

            <!-- /section:basics/navbar.layout.brand -->

            <!-- #section:basics/navbar.toggle -->

            <!-- /section:basics/navbar.toggle -->
        </div>

        <!-- #section:basics/navbar.dropdown -->
        <div class="navbar-buttons navbar-header [style-pullar]" role="navigation">
            <ul class="nav ace-nav">

<?php 

$lezaz_notificationx_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1000 ";
 

   $notificationx_sql = $lezaz->db->query("Select * From alert where status=0 and type=1 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "'  $limit");
  $lezaz_notificationx_sql_num =  $lezaz->db->num_row("Select * From alert where status=0 and type=1 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "' ");
 
$lezaz_notificationx_sql_counter=0 + $page_number;
        if (is_array($notificationx_sql))
        foreach ($notificationx_sql as $lezaz_notificationx_sql) {
            if (is_array($lezaz_notificationx_sql)){
            $lezaz_notificationx_sql_x = ($lezaz_notificationx_sql_x == '') ? '' : '';
            
?>

<?php
$lezaz_notificationx_sql_counter++;
        }}
?>        
    

                 

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important"><?php echo $lezaz_notificationx_sql_num; ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            <?php echo $lezaz_notificationx_sql_num; ?> Notifications
                        </li>
                        <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
                                <ul class="dropdown-menu dropdown-navbar navbar-pink">
 <?php 

$lezaz_notification_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1000 ";
 

   $notification_sql = $lezaz->db->query("Select * From alert where type=1 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "' ORDER BY id DESC $limit");
  $lezaz_notification_sql_num =  $lezaz->db->num_row("Select * From alert where type=1 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "' ORDER BY id DESC");
 
$lezaz_notification_sql_counter=0 + $page_number;
        if (is_array($notification_sql))
        foreach ($notification_sql as $lezaz_notification_sql) {
            if (is_array($lezaz_notification_sql)){
            $lezaz_notification_sql_x = ($lezaz_notification_sql_x == '') ? '' : '';
            
?>
  
                                   <li>
                                        <a href="<?php echo $lezaz_notification_sql[url]; ?>">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                    <?php echo $lezaz_notification_sql[description]; ?>
                                                </span>
                                                
                                            </div>
                                        </a>
                                    </li>

                                    
<?php
$lezaz_notification_sql_counter++;
        }}
?>        
    


                                </ul>
                            </div></li>								
                    </ul>
                </li>                



                <li class="green">
<?php 

$lezaz_notificationx1_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1000 ";
 

   $notificationx1_sql = $lezaz->db->query("Select * From alert where status=0 and type=2 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "' $limit");
  $lezaz_notificationx1_sql_num =  $lezaz->db->num_row("Select * From alert where status=0 and type=2 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "'");
 
$lezaz_notificationx1_sql_counter=0 + $page_number;
        if (is_array($notificationx1_sql))
        foreach ($notificationx1_sql as $lezaz_notificationx1_sql) {
            if (is_array($lezaz_notificationx1_sql)){
            $lezaz_notificationx1_sql_x = ($lezaz_notificationx1_sql_x == '') ? '' : '';
            
?>

<?php
$lezaz_notificationx1_sql_counter++;
        }}
?>        
    

                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success"><?php echo $lezaz_notificationx1_sql_num; ?></span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            <?php echo $lezaz_notificationx1_sql_num; ?> Messages
                        </li>

                        <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
                                <ul class="dropdown-menu dropdown-navbar">
 <?php 

$lezaz_notificationz_sql_x='';
        
$limit = ''; 
$limit = " LIMIT 1000 ";
 

   $notificationz_sql = $lezaz->db->query("Select * From alert where type=2 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "'  ORDER BY id DESC $limit");
  $lezaz_notificationz_sql_num =  $lezaz->db->num_row("Select * From alert where type=2 and user=$_SESSION[USER_ID] and date='" . date( "d-m-Y" ) . "'  ORDER BY id DESC");
 
$lezaz_notificationz_sql_counter=0 + $page_number;
        if (is_array($notificationz_sql))
        foreach ($notificationz_sql as $lezaz_notificationz_sql) {
            if (is_array($lezaz_notificationz_sql)){
            $lezaz_notificationz_sql_x = ($lezaz_notificationz_sql_x == '') ? '' : '';
            
?>
  
                                    
                               <li>
                                        <a href="<?php echo $lezaz_notificationz_sql[url]; ?>">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                    <?php echo $lezaz_notificationz_sql[description]; ?>
                                                </span>
                                                
                                            </div>
                                        </a>
                                    </li>

                                    
<?php
$lezaz_notificationz_sql_counter++;
        }}
?>        
    


                                </ul>
                            </div>
                        </li>                                                                
                    </ul>
                </li>         

                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="http://fw.cms/uploaded/site/<?php echo $lezaz->setting( "logo1" ); ?>" alt="admin" />
                        <span class="user-info">
                            <small>[Welcome]</small>
                            <?php echo $lezaz->set( "user" ); ?>
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-[right_left] dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="/{{ajxurl}}setting">
                                <i class="ace-icon fa fa-cog"></i>
                                [Settings]
                            </a>
                        </li>

                        <li>
                            <a href="/{{ajxurl}}profile">
                                <i class="ace-icon fa fa-user"></i>
                                [Profile]
                            </a>
                        </li>
                        
   <?php  if ($lezaz->language( "" )=='en') { 

$lezaz_="1";
 ?>      
 
                            <li>
                                <a href="?set_language=ar">
                                    <i class="ace-icon fa fa-globe"></i>
                                    عربي
                                </a>
                            </li>
                            <?php }else{ ?>
                            <li>
                                <a href="?set_language=en">
                                    <i class="ace-icon fa fa-globe"></i>
                                    English
                                </a>
                            </li>
                            
<?php }  ?>

                        <li class="divider"></li>

                        <li>
                            <a href="/logout/">
                                <i class="ace-icon fa fa-power-off"></i>
                                [Logout]
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- /section:basics/navbar.user_menu -->
            </ul>
        </div>

        <!-- /section:basics/navbar.dropdown -->
    </div><!-- /.navbar-container -->
</div>

<!-- /section:basics/navbar.layout -->
