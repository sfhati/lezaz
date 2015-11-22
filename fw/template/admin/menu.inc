
                                

				<ul class="nav nav-list">
					<li class="[if:"[var:"noajaxpage-var-sess"end var]=='index'","active"end if]">
						<a href="/admin/{{ajxurl}}page/index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> [Dashboard] </span>
						</a>

						<b class="arrow"></b>
					</li>

 					<li class="[if:"[var:"noajaxpage-var-sess"end var]=='configuration'","active"end if]">
						<a href="/admin/{{ajxurl}}page/configuration">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> [configuration] </span>
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
                                        
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_building' ||  [var:"noajaxpage-var-sess"end var]=='managment_buildings'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [buildings] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_building'","active"end if]">
								<a href="/admin/{{ajxurl}}page/add_building">
									<i class="menu-icon fa fa-caret-right"></i>
									[add building]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_buildings'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_buildings">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage buildings]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
                                        
                  
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_owner' ||  [var:"noajaxpage-var-sess"end var]=='managment_owner'","open"end if] '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [owners] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='add_owner'","active"end if]">
								<a href="/admin/{{ajxurl}}page/add_owner">
									<i class="menu-icon fa fa-caret-right"></i>
									[add owner]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_owner'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_owner">
									<i class="menu-icon fa fa-caret-right"></i>
									[management owners]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
                                      
                  
					<li class=' [if:"[var:"noajaxpage-var-sess"end var]=='add_client' ||  [var:"noajaxpage-var-sess"end var]=='managment_client'","open"end if] '>
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
							<li class="[if:"[var:"noajaxpage-var-sess"end var]=='managment_client'","active"end if]">
								<a href="/admin/{{ajxurl}}page/managment_client">
									<i class="menu-icon fa fa-caret-right"></i>
									[management clients]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
                                      
				                                      
                                        

				</ul><!-- /.nav-list -->

               
  