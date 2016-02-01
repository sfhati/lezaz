<!-- #section:basics/navbar.layout -->
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

<lezaz:sql id='notificationx_sql' sql="Select * From alert where status=0 and type=1 and user=$_SESSION[USER_ID] and date='{#lezaz~date(d-m-Y)#}' " limit="1000"></lezaz:sql>
                 

                <li class="purple">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-bell icon-animated-bell"></i>
                        <span class="badge badge-important">lezaz#notificationx_sql_num</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-exclamation-triangle"></i>
                            lezaz#notificationx_sql_num Notifications
                        </li>
                        <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
                                <ul class="dropdown-menu dropdown-navbar navbar-pink">
 <lezaz:sql id='notification_sql' sql="Select * From alert where type=1 and user=$_SESSION[USER_ID] and date='{#lezaz~date(d-m-Y)#}' ORDER BY id DESC" limit="1000">  
                                   <li>
                                        <a href="lezaz#notification_sql[url]">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                    lezaz#notification_sql[description]
                                                </span>
                                                
                                            </div>
                                        </a>
                                    </li>

                                    </lezaz:sql>

                                </ul>
                            </div></li>								
                    </ul>
                </li>                



                <li class="green">
<lezaz:sql id='notificationx1_sql' sql="Select * From alert where status=0 and type=2 and user=$_SESSION[USER_ID] and date='{#lezaz~date(d-m-Y)#}'" limit="1000"></lezaz:sql>
                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
                        <span class="badge badge-success">lezaz#notificationx1_sql_num</span>
                    </a>

                    <ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
                        <li class="dropdown-header">
                            <i class="ace-icon fa fa-envelope-o"></i>
                            lezaz#notificationx1_sql_num Messages
                        </li>

                        <li class="dropdown-content ace-scroll" style="position: relative;"><div class="scroll-track" style="display: none;"><div class="scroll-bar"></div></div><div class="scroll-content" style="max-height: 200px;">
                                <ul class="dropdown-menu dropdown-navbar">
 <lezaz:sql id='notificationz_sql' sql="Select * From alert where type=2 and user=$_SESSION[USER_ID] and date='{#lezaz~date(d-m-Y)#}'  ORDER BY id DESC" limit="1000">  
                                    
                               <li>
                                        <a href="lezaz#notificationz_sql[url]">
                                            <div class="clearfix">
                                                <span class="pull-left">
                                                    <i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
                                                    lezaz#notificationz_sql[description]
                                                </span>
                                                
                                            </div>
                                        </a>
                                    </li>

                                    </lezaz:sql>

                                </ul>
                            </div>
                        </li>                                                                
                    </ul>
                </li>         

                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{upload}}site/lezaz:setting(logo1)" alt="admin" />
                        <span class="user-info">
                            <small>[Welcome]</small>
                            lezaz:set(user)
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
                        <lezaz:if condition="lezaz:language()=='en'">
                            <li>
                                <a href="?set_language=ar">
                                    <i class="ace-icon fa fa-globe"></i>
                                    عربي
                                </a>
                            </li>
                            <lezaz_else/>
                            <li>
                                <a href="?set_language=en">
                                    <i class="ace-icon fa fa-globe"></i>
                                    English
                                </a>
                            </li>
                        </lezaz:if>
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
