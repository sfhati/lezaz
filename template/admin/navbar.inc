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
                <!-- #section:basics/navbar.user_menu -->
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" src="{{upload}}site/lezaz:setting(logo1)" alt="admin" />
                        <span class="user-info">
                            <small>[Welcome]</small>
lezaz:get(user)
                        </span>

                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>

                    <ul class="user-menu dropdown-menu-[right_left] dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                        <li>
                            <a href="/admin/{{ajxurl}}setting">
                                <i class="ace-icon fa fa-cog"></i>
                                [Settings]
                            </a>
                        </li>

                        <li>
                            <a href="/admin/{{ajxurl}}profile">
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
                            <a href="/admin/logout/">
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
