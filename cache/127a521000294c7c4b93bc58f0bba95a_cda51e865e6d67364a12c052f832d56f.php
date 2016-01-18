<?php global $lezaz;?>
                                

				<ul class="nav nav-list">
					<li class="<?php echo $lezaz->set( "index" ); ?>">
						<a href="/admin/{{ajxurl}}index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> [Dashboard] </span>
						</a>

						<b class="arrow"></b>
					</li> 

                                      
					<li class='<?php echo $lezaz->set( "add_member_m" ); ?> <?php echo $lezaz->set( "managment_members_m" ); ?>'>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [members] </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="<?php echo $lezaz->set( "add_member" ); ?>">
								<a href="/admin/{{ajxurl}}add_member">
									<i class="menu-icon fa fa-caret-right"></i>
									[add member]
								</a>

								<b class="arrow"></b>
							</li>

							<li class="<?php echo $lezaz->set( "managment_members" ); ?>">
								<a href="/admin/{{ajxurl}}managment_members">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage members]
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
					<li class='<?php echo $lezaz->set( "add_page_m" ); ?> <?php echo $lezaz->set( "managment_pages_m" ); ?>'>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [pages] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?php echo $lezaz->set( "add_page" ); ?>">
								<a href="/admin/{{ajxurl}}add_page">
									<i class="menu-icon fa fa-caret-right"></i>
									[add page]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="<?php echo $lezaz->set( "managment_pages" ); ?>">
								<a href="/admin/{{ajxurl}}managment_pages">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage pages]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class='<?php echo $lezaz->set( "add_slider_m" ); ?> <?php echo $lezaz->set( "managment_sliders_m" ); ?>'>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [sliders] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?php echo $lezaz->set( "add_slider" ); ?>">
								<a href="/admin/{{ajxurl}}add_slider">
									<i class="menu-icon fa fa-caret-right"></i>
									[add slider]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="<?php echo $lezaz->set( "managment_sliders" ); ?>">
								<a href="/admin/{{ajxurl}}managment_sliders">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage sliders]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
    
					<li class='<?php echo $lezaz->set( "add_media_m" ); ?> <?php echo $lezaz->set( "managment_medias_m" ); ?>'>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [medias] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="<?php echo $lezaz->set( "add_media" ); ?>">
								<a href="/admin/{{ajxurl}}add_media">
									<i class="menu-icon fa fa-caret-right"></i>
									[add media]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="<?php echo $lezaz->set( "managment_medias" ); ?>">
								<a href="/admin/{{ajxurl}}managment_medias">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage medias]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
        
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_project' ||  [var:"noajaxpage-var-sess"end var]=='managment_projects'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [projects] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_project'","active"end if]">
								<a href="/admin/{{ajxurl}}add_project">
									<i class="menu-icon fa fa-caret-right"></i>
									[add project]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_projects'","active"end if]">
								<a href="/admin/{{ajxurl}}managment_projects">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage projects]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
                                        
               		<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_client' ||  [var:"noajaxpage-var-sess"end var]=='managment_clients'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [clients] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_client'","active"end if]">
								<a href="/admin/{{ajxurl}}add_client">
									<i class="menu-icon fa fa-caret-right"></i>
									[add client]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_clients'","active"end if]">
								<a href="/admin/{{ajxurl}}managment_clients">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage clients]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
    
                                        
<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_portfolio' ||  [var:"noajaxpage-var-sess"end var]=='managment_portfolios' ||  [var:"noajaxpage-var-sess"end var]=='section'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [portfolios] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_portfolio'","active"end if]">
								<a href="/admin/{{ajxurl}}add_portfolio">
									<i class="menu-icon fa fa-caret-right"></i>
									[add portfolio]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_portfolios'","active"end if]">
								<a href="/admin/{{ajxurl}}managment_portfolios">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage portfolios]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='section'","active"end if]">
								<a href="/admin/{{ajxurl}}section">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage section]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                            
              		<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_career' ||  [var:"noajaxpage-var-sess"end var]=='managment_careers'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [careers] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_career'","active"end if]">
								<a href="/admin/{{ajxurl}}add_career">
									<i class="menu-icon fa fa-caret-right"></i>
									[add career]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_careers'","active"end if]">
								<a href="/admin/{{ajxurl}}managment_careers">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage careers]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                  

				</ul><!-- /.nav-list -->
