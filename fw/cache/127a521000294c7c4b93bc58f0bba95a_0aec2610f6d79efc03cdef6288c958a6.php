
                                

				<ul class="nav nav-list">
					<li class="
   <?php if ($_SESSION[noajaxpage]=='index') { ?>
 active     
<?php } ?>
">
						<a href="/admin/{{ajxurl}}page/index">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> [Dashboard] </span>
						</a>

						<b class="arrow"></b>
					</li>

 					<li class="
   <?php if ($_SESSION[noajaxpage]=='configuration') { ?>
 active     
<?php } ?>
">
						<a href="/admin/{{ajxurl}}page/configuration">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> [configuration] </span>
						</a>

						<b class="arrow"></b>
					</li>
                                        
					<li class=' 
   <?php if ($_SESSION[noajaxpage]=='add_member' ||  $_SESSION[noajaxpage]=='managment_members') { ?>
 open     
<?php } ?>
 '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [members] </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="
   <?php if ($_SESSION[noajaxpage]=='add_member') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/add_member">
									<i class="menu-icon fa fa-caret-right"></i>
									[add member]
								</a>

								<b class="arrow"></b>
							</li>

							<li class="
   <?php if ($_SESSION[noajaxpage]=='managment_members') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/managment_members">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage members]
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
                                        
					<li class=' 
   <?php if ($_SESSION[noajaxpage]=='add_building' ||  $_SESSION[noajaxpage]=='managment_buildings') { ?>
 open     
<?php } ?>
 '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [buildings] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="
   <?php if ($_SESSION[noajaxpage]=='add_building') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/add_building">
									<i class="menu-icon fa fa-caret-right"></i>
									[add building]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="
   <?php if ($_SESSION[noajaxpage]=='managment_buildings') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/managment_buildings">
									<i class="menu-icon fa fa-caret-right"></i>
									[manage buildings]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
                                        
                  
					<li class=' 
   <?php if ($_SESSION[noajaxpage]=='add_owner' ||  $_SESSION[noajaxpage]=='managment_owner') { ?>
 open     
<?php } ?>
 '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [owners] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="
   <?php if ($_SESSION[noajaxpage]=='add_owner') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/add_owner">
									<i class="menu-icon fa fa-caret-right"></i>
									[add owner]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="
   <?php if ($_SESSION[noajaxpage]=='managment_owner') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/managment_owner">
									<i class="menu-icon fa fa-caret-right"></i>
									[management owners]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
                                      
                  
					<li class=' 
   <?php if ($_SESSION[noajaxpage]=='add_client' ||  $_SESSION[noajaxpage]=='managment_client') { ?>
 open     
<?php } ?>
 '>
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-list"></i>
							<span class="menu-text"> [clients] </span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu">
							<li class="
   <?php if ($_SESSION[noajaxpage]=='add_client') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/add_client">
									<i class="menu-icon fa fa-caret-right"></i>
									[add client]
								</a>
								<b class="arrow"></b>
							</li>
							<li class="
   <?php if ($_SESSION[noajaxpage]=='managment_client') { ?>
 active     
<?php } ?>
">
								<a href="/admin/{{ajxurl}}page/managment_client">
									<i class="menu-icon fa fa-caret-right"></i>
									[management clients]
								</a>
								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
                                      
				                                      
                                        

				</ul><!-- /.nav-list -->

               
  