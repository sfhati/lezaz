            <div id="footer">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable address  span3"><div class="module_container"><header><h3 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">إبقى على تواصل</span></h3></header><div class="mod-article-single mod-article-single__address" id="module_137">
                                        <div class="item__module" id="item_99">

                                            <div class="item_introtext">
                                                [cache:"site_titlear"end cache]<br/>
                                                [cache:"addressar"end cache]<br/>
                                                <span>هاتف:</span> [cache:"site_phone"end cache]<br/>
                                                <p>بريد إلكتروني: [cache:"site_email"end cache]</p> </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div></div></div><div class="moduletable   span2"><div class="module_container"><div class="mod-menu">
                                        <ul class="nav menu ">
                                            [sql:"users_sql","Select * From pages where page_active=1 and (page_place=2 or page_place=3) and linklabel='ar' ORDER BY page_sort ASC","1000","                                
                                            <li> <a href="/page/%users_sql:id%/%users_sql:page_name%" >%users_sql:page_name%</a></li>                                
                                            "end sql]                                	                                                                                                   
                                        </ul>
                                    </div></div></div><div class="moduletable   span4"><div class="module_container"><header><h3 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">تابعنا</span></h3></header>
                                    <div class="mod-menu mod-menu__social">
                                        <ul class="nav menu social">                            
                                            <li><a href="[cache:"youtube"end cache]" class="fa fa-google-plus hasTooltip" title="Google+"></a></li>
                                            <li><a href="[cache:"facebook"end cache]" class="fa fa-facebook hasTooltip" title="facebook"></a></li>
                                            <li><a href="[cache:"twiter"end cache]" class="fa fa-twitter hasTooltip" title="twitter"></a></li>
                                            <li><a href="[cache:"instagram"end cache]" class="fa fa-pinterest hasTooltip" title="Pinterest"></a></li>
                                            <li><a href="[cache:"rinning"end cache]" class="fa fa-linkedin hasTooltip" title="Linkedin"></a></li>
                                        </ul>
                                    </div></div></div>
                                    <div class="moduletable   span3">
                                        <img class="img-responsive" src="{{upload}}/site/[cache:"logo2"end cache]" alt="logo">
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="push"></div>
        </div>
    </div>
    <div id="footer-wrapper">
        <div class="footer-wrapper-inner">

            <div id="copyright" role="contentinfo">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="copyright span12">
                                <span class="copy">&copy;</span> <span class="year">2015</span> <span class="siteName">[cache:"site_titlear"end cache]</span>                                
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="back-top">
        <a href="#"><span></span> </a>
    </div>

    <script src="{{this}}js/jquery.stellar.min.js"></script>
    <script>
        jQuery(function ($) {
            $(window).load(function () {
                $.stellar({responsive: true, horizontalScrolling: false});
            });
        });
    </script>
    <script src="{{this}}js/jquery.simplr.smoothscroll.min.js"></script>
    <script src="{{this}}js/jquery.BlackAndWhite.min.js"></script>
    <script>
        ;
        (function ($, undefined) {
            $.fn.BlackAndWhite_init = function () {
                var selector = $(this);
                selector.find('img').not(".slide-img").parent().BlackAndWhite({
                    invertHoverEffect: ".$this->params->get('invertHoverEffect').",
                    intensity: 1,
                    responsive: true,
                    speed: {
                        fadeIn: ".$this->params->get('fadeIn').",
                        fadeOut: ".$this->params->get('fadeOut')."
                    }
                });
            }
        })(jQuery);
        jQuery(window).load(function ($) {
            jQuery('.item_img a').find('img').not('.lazy').parent().BlackAndWhite_init();
        });
    </script>
    <script src="{{this}}js/jquery.fancybox.pack.js"></script>
    <script src="{{this}}js/jquery.fancybox-buttons.js"></script>
    <script src="{{this}}js/jquery.fancybox-media.js"></script>
    <script src="{{this}}js/jquery.fancybox-thumbs.js"></script>
    <script src="{{this}}js/jquery.pep.js"></script>
    <script src="{{this}}js/jquery.vide.min.js"></script>
    <script src="{{this}}js/autosize.min.js"></script>
    <script src="{{this}}js/scripts.js"></script>


</body>
</html>
