<?php global $lezaz;?>
<ul class="nav nav-list">






    <li class="<?php echo $lezaz->set( "index" ); ?>">
        <a href="/{{ajxurl}}index">
            <i class="menu-icon fa fa-tachometer"></i>
            <span class="menu-text"> [Dashboard] </span>
        </a>

        <b class="arrow"></b>
    </li> 



    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "1" ); ?> ">
        <a href="/1" class="">
            <i class="menu-icon fa ">1</i>
            <span class="menu-text"> Scope </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 
<?php } ?>
    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "2" ); ?> ">
        <a href="/2" class="">
            <i class="menu-icon fa ">2</i>
            <span class="menu-text"> Normative references </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 
<?php } ?>
    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "3" ); ?> ">
        <a href="/3" class="">
            <i class="menu-icon fa ">3</i>
            <span class="menu-text"> Terms and definition </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 
<?php } ?>

    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "4" ); ?> <?php echo $lezaz->set( "41" ); ?> <?php echo $lezaz->set( "42" ); ?> <?php echo $lezaz->set( "43" ); ?> <?php echo $lezaz->set( "44" ); ?> ">
        <a href="/4" class="dropdown-toggle">
            <i class="menu-icon fa ">4</i>
            <span class="menu-text"> Context of the organization </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "41" ); ?> ">
        <a href="/41" class="">
            <i class="menu-icon fa ">4.1</i>
            <span class="menu-text"> Organization context </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "42" ); ?> ">
        <a href="/42" class="">
            <i class="menu-icon fa ">4.2</i>
            <span class="menu-text"> needs & expectations </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "43" ); ?> ">
        <a href="/43" class="">
            <i class="menu-icon fa ">4.3</i>
            <span class="menu-text"> Scope of the OH&S </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "44" ); ?> ">
        <a href="/44" class="">
            <i class="menu-icon fa ">4.4</i>
            <span class="menu-text"> Oh&S management system </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>

    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "5" ); ?> <?php echo $lezaz->set( "51" ); ?> <?php echo $lezaz->set( "52" ); ?> <?php echo $lezaz->set( "53" ); ?> ">
        <a href="/5" class="dropdown-toggle">
            <i class="menu-icon fa ">5</i>
            <span class="menu-text"> Leadership </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "51" ); ?> ">
        <a href="/51" class="">
            <i class="menu-icon fa ">5.1</i>
            <span class="menu-text"> Leadership & commitment </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "52" ); ?> ">
        <a href="/52" class="">
            <i class="menu-icon fa ">5.2</i>
            <span class="menu-text"> Policy </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "53" ); ?> ">
        <a href="/53" class="">
            <i class="menu-icon fa ">5.3</i>
            <span class="menu-text"> Roles & authorities </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>

    <?php if(is_root() || is_editor() ||  is_department()){ ?>
    <li class="<?php echo $lezaz->set( "6" ); ?> <?php echo $lezaz->set( "61" ); ?> <?php echo $lezaz->set( "62" ); ?> ">
        <a href="/6" class="dropdown-toggle">
            <i class="menu-icon fa ">6</i>
            <span class="menu-text"> Planning </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'> 
        
    <li class="<?php echo $lezaz->set( "61" ); ?> <?php echo $lezaz->set( "611" ); ?> <?php echo $lezaz->set( "612" ); ?> <?php echo $lezaz->set( "613" ); ?> <?php echo $lezaz->set( "614" ); ?> <?php echo $lezaz->set( "615" ); ?> <?php echo $lezaz->set( "616" ); ?> ">
        <a href="/61" class="dropdown-toggle">
            <i class="menu-icon fa ">6.1</i>
            <span class="menu-text"> Action & opportunities </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
            
    <li class="<?php echo $lezaz->set( "611" ); ?> ">
        <a href="/611" class="">
            <i class="menu-icon fa ">6.1.1</i>
            <span class="menu-text"> General </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "612" ); ?> ">
        <a href="/612" class="">
            <i class="menu-icon fa ">6.1.2</i>
            <span class="menu-text"> Hazard identification </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "613" ); ?> ">
        <a href="/613" class="">
            <i class="menu-icon fa ">6.1.3</i>
            <span class="menu-text"> Determination of legal </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "614" ); ?> ">
        <a href="/614" class="">
            <i class="menu-icon fa ">6.1.4</i>
            <span class="menu-text"> Assessment of risks </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "615" ); ?> ">
        <a href="/615" class="">
            <i class="menu-icon fa ">6.1.5</i>
            <span class="menu-text"> Planning for change </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "616" ); ?> ">
        <a href="/616" class="">
            <i class="menu-icon fa ">6.1.6</i>
            <span class="menu-text"> Planning to take action </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        </ul>
    </li> 

        
    <li class="<?php echo $lezaz->set( "62" ); ?> ">
        <a href="/62" class="">
            <i class="menu-icon fa ">6.2</i>
            <span class="menu-text"> OH&S objectives </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>


    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "7" ); ?> <?php echo $lezaz->set( "71" ); ?> <?php echo $lezaz->set( "72" ); ?> <?php echo $lezaz->set( "73" ); ?> <?php echo $lezaz->set( "74" ); ?> <?php echo $lezaz->set( "75" ); ?> ">
        <a href="/7" class="dropdown-toggle">
            <i class="menu-icon fa ">7</i>
            <span class="menu-text"> Support </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "71" ); ?> ">
        <a href="/71" class="">
            <i class="menu-icon fa ">7.1</i>
            <span class="menu-text"> Resources </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "72" ); ?> ">
        <a href="/72" class="">
            <i class="menu-icon fa ">7.2</i>
            <span class="menu-text"> Competence </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "73" ); ?> ">
        <a href="/73" class="">
            <i class="menu-icon fa ">7.3</i>
            <span class="menu-text"> Awareness </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "74" ); ?> ">
        <a href="/74" class="">
            <i class="menu-icon fa ">7.4</i>
            <span class="menu-text"> Information & consultation </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "75" ); ?> ">
        <a href="/75" class="">
            <i class="menu-icon fa ">7.5</i>
            <span class="menu-text"> Documented </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>

    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "8" ); ?> <?php echo $lezaz->set( "81" ); ?> <?php echo $lezaz->set( "82" ); ?> <?php echo $lezaz->set( "83" ); ?> <?php echo $lezaz->set( "84" ); ?> <?php echo $lezaz->set( "85" ); ?> <?php echo $lezaz->set( "86" ); ?> ">
        <a href="/8" class="dropdown-toggle">
            <i class="menu-icon fa ">8</i>
            <span class="menu-text"> Operations </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "81" ); ?> <?php echo $lezaz->set( "811" ); ?> <?php echo $lezaz->set( "812" ); ?> ">
        <a href="/81" class="dropdown-toggle">
            <i class="menu-icon fa ">8.1</i>
            <span class="menu-text"> Operational planning & control </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
            
    <li class="<?php echo $lezaz->set( "811" ); ?> ">
        <a href="/811" class="">
            <i class="menu-icon fa ">8.1.1</i>
            <span class="menu-text"> General </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "812" ); ?> ">
        <a href="/812" class="">
            <i class="menu-icon fa ">8.1.2</i>
            <span class="menu-text"> Hierarchy of control </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        </ul>
    </li> 
    
        
    <li class="<?php echo $lezaz->set( "82" ); ?> ">
        <a href="/82" class="">
            <i class="menu-icon fa ">8.2</i>
            <span class="menu-text"> Management of change </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "83" ); ?> ">
        <a href="/83" class="">
            <i class="menu-icon fa ">8.3</i>
            <span class="menu-text"> Outsourcing </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "84" ); ?> ">
        <a href="/84" class="">
            <i class="menu-icon fa ">8.4</i>
            <span class="menu-text"> Procurement </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "85" ); ?> ">
        <a href="/85" class="">
            <i class="menu-icon fa ">8.5</i>
            <span class="menu-text"> Contractors </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "86" ); ?> ">
        <a href="/86" class="">
            <i class="menu-icon fa ">8.6</i>
            <span class="menu-text"> Emergency & response </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>
  
 
    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "9" ); ?> <?php echo $lezaz->set( "91" ); ?> <?php echo $lezaz->set( "92" ); ?> <?php echo $lezaz->set( "93" ); ?> ">
        <a href="/9" class="dropdown-toggle">
            <i class="menu-icon fa ">9</i>
            <span class="menu-text"> Performance evaluation </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "91" ); ?> <?php echo $lezaz->set( "911" ); ?> <?php echo $lezaz->set( "912" ); ?> ">
        <a href="/91" class="dropdown-toggle">
            <i class="menu-icon fa ">9.1</i>
            <span class="menu-text"> Monitoring </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
            
    <li class="<?php echo $lezaz->set( "911" ); ?> ">
        <a href="/911" class="">
            <i class="menu-icon fa ">9.1.1</i>
            <span class="menu-text"> General </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "912" ); ?> ">
        <a href="/912" class="">
            <i class="menu-icon fa ">9.1.2</i>
            <span class="menu-text"> Evaluation of compliance </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        </ul>
    </li> 
 
        
    <li class="<?php echo $lezaz->set( "92" ); ?> <?php echo $lezaz->set( "921" ); ?> <?php echo $lezaz->set( "922" ); ?> ">
        <a href="/92" class="dropdown-toggle">
            <i class="menu-icon fa ">9.2</i>
            <span class="menu-text"> Internal audit </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
            
    <li class="<?php echo $lezaz->set( "921" ); ?> ">
        <a href="/921" class="">
            <i class="menu-icon fa ">9.2.1</i>
            <span class="menu-text"> Objective </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

            
    <li class="<?php echo $lezaz->set( "922" ); ?> ">
        <a href="/922" class="">
            <i class="menu-icon fa ">9.2.2</i>
            <span class="menu-text"> Process </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        </ul>
    </li> 

        
    <li class="<?php echo $lezaz->set( "93" ); ?> ">
        <a href="/93" class="">
            <i class="menu-icon fa ">9.3</i>
            <span class="menu-text"> Management review </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>  

    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "10" ); ?> <?php echo $lezaz->set( "101" ); ?> <?php echo $lezaz->set( "102" ); ?> ">
        <a href="/10" class="dropdown-toggle">
            <i class="menu-icon fa ">10</i>
            <span class="menu-text"> Improvement </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "101" ); ?> ">
        <a href="/101" class="">
            <i class="menu-icon fa ">10.1</i>
            <span class="menu-text"> Incident & corrective action </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "102" ); ?> ">
        <a href="/102" class="">
            <i class="menu-icon fa ">10.2</i>
            <span class="menu-text"> Continual improvement </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>

    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "system" ); ?> <?php echo $lezaz->set( "101" ); ?> <?php echo $lezaz->set( "102" ); ?> ">
        <a href="/#" class="dropdown-toggle">
            <i class="menu-icon fa fa-gear"></i>
            <span class="menu-text"> System </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "101" ); ?> ">
        <a href="/system" class="">
            <i class="menu-icon fa fa-tree"></i>
            <span class="menu-text"> Levels </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "102" ); ?> ">
        <a href="/102" class="">
            <i class="menu-icon fa ">10.2</i>
            <span class="menu-text"> Continual improvement </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>

    <?php if(is_root()){ ?>
    <li class="<?php echo $lezaz->set( "member" ); ?> <?php echo $lezaz->set( "add_member" ); ?> <?php echo $lezaz->set( "managment_members" ); ?> <?php echo $lezaz->set( "member_department" ); ?> ">
        <a href="/#" class="dropdown-toggle">
            <i class="menu-icon fa fa-user-md"></i>
            <span class="menu-text"> [members] </span>
            <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>
        <ul class='submenu'>
        
    <li class="<?php echo $lezaz->set( "add_member" ); ?> ">
        <a href="/add_member" class="">
            <i class="menu-icon fa fa-plus"></i>
            <span class="menu-text"> [add member] </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "managment_members" ); ?> ">
        <a href="/managment_members" class="">
            <i class="menu-icon fa fa-users"></i>
            <span class="menu-text"> [manage members] </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

        
    <li class="<?php echo $lezaz->set( "member_department" ); ?> ">
        <a href="/member_department" class="">
            <i class="menu-icon fa fa-user"></i>
            <span class="menu-text"> [department] </span>
            
        </a>
        <b class="arrow"></b>
        
    </li> 

    </ul>
    </li> 
<?php } ?>
       

</ul><!-- /.nav-list -->
