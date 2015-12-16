
                                

				<ul class="nav nav-list">
					<li class="[if:"[var:"noajaxpage-var-sess"end var]=='index'","active"end if]">
						<a href="/admin/{{ajxurl}}page/index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> [Dashboard] </span>
						</a>

						<b class="arrow"></b>
					</li> 

                                      
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_member' ||  [var:"noajaxpage-var-sess"end var]=='managment_members'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [members] </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_member'","active"end if]">
								<a href="/admin/{{ajxurl}}page/add_member">
									<i class="menu-icon fa fa-caret-right"></i>
									[add member]
								</a>

								<b class="arrow"></b>
							</li>

							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_members'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_members">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage members]
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_page' ||  [var:"noajaxpage-var-sess"end var]=='managment_pages'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [pages] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_page'","active"end if]">
								<a href="/admin/{{ajxurl}}page/add_page">
									<i class="menu-icon fa fa-caret-right"></i>
									[add page]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_pages'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_pages">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage pages]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_slider' ||  [var:"noajaxpage-var-sess"end var]=='managment_sliders'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [sliders] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_slider'","active"end if]">
								<a href="/admin/{{ajxurl}}page/add_slider">
									<i class="menu-icon fa fa-caret-right"></i>
									[add slider]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_sliders'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_sliders">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage sliders]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
    
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_media' ||  [var:"noajaxpage-var-sess"end var]=='managment_medias'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [medias] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_media'","active"end if]">
								<a href="/admin/{{ajxurl}}page/add_media">
									<i class="menu-icon fa fa-caret-right"></i>
									[add media]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_medias'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_medias">
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
								<a href="/admin/{{ajxurl}}page/add_project">
									<i class="menu-icon fa fa-caret-right"></i>
									[add project]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_projects'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_projects">
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
								<a href="/admin/{{ajxurl}}page/add_client">
									<i class="menu-icon fa fa-caret-right"></i>
									[add client]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_clients'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_clients">
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
								<a href="/admin/{{ajxurl}}page/add_portfolio">
									<i class="menu-icon fa fa-caret-right"></i>
									[add portfolio]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_portfolios'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_portfolios">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage portfolios]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='section'","active"end if]">
								<a href="/admin/{{ajxurl}}page/section">
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
								<a href="/admin/{{ajxurl}}page/add_career">
									<i class="menu-icon fa fa-caret-right"></i>
									[add career]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_careers'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_careers">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage careers]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                  

				</ul><!-- /.nav-list -->
