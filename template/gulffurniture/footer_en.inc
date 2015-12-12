
<footer>
    <div class="footer-wrapper">
        <div class="footer-content">
            <ul id="menu-footer-menu" class="footercontent-cols"><li id="menu-item-67" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-67"><a href="/services/">Services</a>
                    <ul class="sub-menu">
                        [sql:"services_sql","Select * From project where url=11 ORDER BY sort ASC","8","    
                        <li id="menu-item-74" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-74"><a href="/services/%services_sql:id%">%services_sql:title_en%</a></li>
                        "end sql]
                    </ul>
                </li>
                <li id="menu-item-93" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-93"><a href="/projects/">Projects</a>
                    <ul class="sub-menu">
                        [sql:"services_sql","Select * From project where url=12 ORDER BY sort ASC","8","    
                        <li id="menu-item-74" class="menu-item menu-item-type-post_type menu-item-object-post menu-item-74"><a href="/projects/%services_sql:id%">%services_sql:title_en%</a></li>
                        "end sql]
                    </ul>
                </li>
                <li id="menu-item-58" class="nolink menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-58"><a>Contact</a>
                    <ul class="sub-menu">
                        <li id="menu-item-62" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-62"><a href="javascript:">E-mail: [cache:"site_email"end cache]</a></li>
                        <li id="menu-item-63" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-63"><a href="javascript:">[cache:"site_title"end cache]</a></li>
                        <li id="menu-item-64" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-64"><a href="javascript:">[cache:"address"end cache]</a></li>
                        <li id="menu-item-65" class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-65"><a href="javascript:"><span>Telephone:</span> [cache:"site_phone"end cache]</a></li>
                    </ul>
                </li>
            </ul>            <div class="footer-social">
                <div class="footer-logo"><img src="{{upload}}/site/[cache:"logo2"end cache]"></div>
                <ul class="social">
                    <li>
                        <a href="[cache:"facebook"end cache]" class="animation"><img src="{{this}}images/facebook.png"></a>
                    </li>
                    <li>
                        <a href="[cache:"instagram"end cache]" class="animation"><img src="{{this}}images/googleplus.png"></a>
                    </li>
                    <li>
                        <a href="[cache:"youtube"end cache]" class="animation"><img src="{{this}}images/youtube.png"></a>
                    </li>
                    <li>
                        <a href="[cache:"twiter"end cache]" class="animation"><img src="{{this}}images/twitter.png"></a>
                    </li>       
                </ul>

            </div><!--footer-social end here-->
        </div><!--footer-content end here-->

        <div class="clear"></div>
        <div class="footer-bar">
            <div class="footer-small">
                <ul id="menu-top-menu-1" class="menu">
                    [sql:"topmenu_sql","Select * From pages where page_active=1 and (page_place=2 or page_place=3) and linklabel='en' ORDER BY page_sort ASC","1000","                                
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-20"><a href="[if:"%topmenu_sql:url-var%","%topmenu_sql:url%[else]/page/%topmenu_sql:id%/%topmenu_sql:page_name%"end if]">%topmenu_sql:page_name%</a></li>                                                                  
                    "end sql]        
                </ul>                    </div>
            <div class="footer-copy">Copyright © [cache:"site_title"end cache]</div>
        </div><!--footern bar end here--->
    </div><!--footer-wrapper end here-->
    <div class="clear"></div>
</footer>														

</div>
</body>
</html>