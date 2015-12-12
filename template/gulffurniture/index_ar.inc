[include:"header_ar"end include]

            <div id="header">
                <div class="moduletable "><div class="module_container"><div id="camera-slideshow_92" class=" camera_wrap pattern_1">
    [sql:"slider_sql","Select * From slider ORDER BY sort ASC","1000","                     
                            <div class="camera-item" data-src="{{upload}}slider/%slider_sql:image%">
                                <div class="camera_caption fadeIn">
                                    <div class="item_content">
                                        <div class="custom_title">%slider_sql:title1%</div>
                                        <span>%slider_sql:title2%</span>

                                        <a class="btn btn-info readmore" href="%slider_sql:url%" target="_self"><span>%slider_sql:title_url%</span></a>
                                    </div>
                                </div>
                            </div>		                           
    "end sql]                               
                        </div>
                        <script>
                            jQuery(function () {
                                jQuery('#camera-slideshow_92').camera({
                                    alignment: "topCenter", //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                                    autoAdvance: 1, //true, false
                                    mobileAutoAdvance: 1, //true, false. Auto-advancing for mobile devices
                                    barDirection: "leftToRight", //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                                    barPosition: "bottom", //'bottom', 'left', 'top', 'right'
                                    cols: 6,
                                    easing: "swing", //for the complete list http://jqueryui.com/demos/effect/easing.html
                                    mobileEasing: "swing", //leave empty if you want to display the same easing on mobile devices and on desktop etc.
                                    fx: "simpleFade",
                                    mobileFx: "simpleFade", //leave empty if you want to display the same effect on mobile devices and on desktop etc.
                                    gridDifference: 250, //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
                                    height: "27.5609756097561%", //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
                                    imagePath: 'http://livedemo00.template-help.com{{this}}images/', //the path to the image folder (it serves for the blank.gif, when you want to display videos)
                                    hover: 0, //true, false. Puase on state hover. Not available for mobile devices
                                    loader: "none", //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
                                    loaderColor: "#eeeeee",
                                    loaderBgColor: "#222222",
                                    loaderOpacity: .8, //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
                                    loaderPadding: 2, //how many empty pixels you want to display between the loader and its background
                                    loaderStroke: 7, //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
                                    minHeight: "320px", //you can also leave it blank
                                    navigation: 1, //true or false, to display or not the navigation buttons
                                    navigationHover: 0, //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be 	visible always
                                    mobileNavHover: 0, //same as above, but only for mobile devices
                                    opacityOnGrid: 0, //true, false. Decide to apply a fade effect to blocks and slices: if your slideshow is fullscreen or simply big, I recommend to set it false to have a smoother effect 
                                    overlayer: 0, //a layer on the images to prevent the users grab them simply by clicking the right button of their mouse (.camera_overlayer)
                                    pagination: 0,
                                    playPause: 0, //true or false, to display or not the play/pause buttons
                                    pauseOnClick: 0, //true, false. It stops the slideshow when you click the sliders.
                                    pieDiameter: 38,
                                    piePosition: "rightTop", //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
                                    portrait: 0, //true, false. Select true if you don't want that your images are cropped
                                    rows: 4,
                                    slicedCols: 6, //if 0 the same value of cols
                                    slicedRows: 4, //if 0 the same value of rows
                                    // slideOn				: "",	//next, prev, random: decide if the transition effect will be applied to the current (prev) or the next slide
                                    thumbnails: 0,
                                    time: 7000, //milliseconds between the end of the sliding effect and the start of the nex one
                                    transPeriod: 1500	//lenght of the sliding effect in milliseconds
                                            // onEndTransition		: function() {  },	//this callback is invoked when the transition effect ends
                                            // onLoaded					: function() {  },	//this callback is invoked when the image on a slide has completely loaded
                                            // onStartLoading		: function() {  },	//this callback is invoked when the image on a slide start loading
                                            // onStartTransition	: function() {  }	//this callback is invoked when the transition effect starts
                                });
                            });
                        </script></div></div>
            </div>

            <div id="navigation" role="navigation">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable   span12"><div class="module_container"><header><h1 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Welcome!</span></h1></header><div class="mod-newsflash-adv mod-newsflash-adv__ cols-3" id="module_120">
                                        <div class="pretext">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa. </div>
                                        <div class="row-fluid">
                               [sql:"product_sql","Select * From media ORDER BY sort ASC","4","                     
                                            <article class="span4 item item_num0 item__module  " id="item_134">
                                                <div class="item_content">
                                                    <figure class="item_img img-intro img-intro__none">
                                                        <img src="{{upload}}media/%product_sql:image%" alt="">
                                                    </figure>
                                                    <h4 class="item_title item_title__">                                                        
                                                        <span class="item_title_part_1 item_title_part_even item_title_part_first_half">
                                                            %product_sql:title_ar%
                                                        </span>
                                                    </h4>
                                                    <div class="item_introtext">
                                                        <p>%product_sql:more_ar%</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div> 
                                            </article>
                                 "end sql] 				
                                            
                                                                                        
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="showcase">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable   span7"><div class="module_container">
                             <img src="{{this}}images/img7.jpg"/>
                                    
                                    <div class="clearfix"></div></div></div><div class="moduletable   span5"><div class="module_container"><script type="text/javascript">
                                        jQuery(document).ready(function ($) {
                                            jQuery('#accordion-1').dcAccordion({
                                                eventType: 'click',
                                                autoClose: true,
                                                saveState: true,
                                                disableLink: true,
                                                speed: 'fast',
                                                showCount: false,
                                                autoExpand: true,
                                                cookie: 'dcjq-accordion-1',
                                                classExpand: 'dcjq-current-parent'
                                            });
                                        });
                                    </script>
                                    <div class="mod-scroll-menu">
                                        <div class="clean demo-container">
                                            <ul class="accordion" id="accordion-1">
                                                [sql:"users_sql","Select * From career","1000","              
                                                <li class="item-247 deeper parent">
                                                    <a href="#">%users_sql:title_ar%</a>
                                                    <ul class="nav-child unstyled small">
                                                        <li class="item-%users_sql:id% divider">
                                                            <span class="separator">%users_sql:more_ar%</span>
                                                        </li>
                                                    </ul>
                                                </li> 
                                                "end sql]
                                            </ul>
                                        </div>
                                        <div style="clear:both"></div>
                                    </div></div></div>
                                    <div class="moduletable   span12">
                                        <div class="module_container">
                                            <div class="mod-menu">
                                            <ul class="nav menu partners">
                                                [sql:"client_sql","Select * From client ORDER BY sort ASC","1000","
                                                <li class="item-255">
                                                    <a href="%client_sql:url%">
                                                        <img src="{{upload}}client/%client_sql:image%" alt="%client_sql:title_ar%"/>
                                                    </a>
                                                </li>
                                                "end sql]
                                            </ul>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="feature">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable center  span12"><div class="module_container"><header><h1 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">News</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">&</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">events</span></h1></header><div class="mod_caroufredsel default mod_caroufredsel__center" id="module_151">
                                        <div class="pretext">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa. </div>
                                        <div id="list_carousel_151" class="list_carousel">
                                            <ul id="caroufredsel_151">
                                                <li class="item" id="item_126">
                                                    <div class="item_content"> 
                                                        <figure class="item_img img-intro img-intro__left">
                                                            <a href="/joomla_55285/index.php/47-news-events/126-sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem">
                                                                <img src="{{this}}images/page1-img4.jpg" alt="">
                                                            </a>
                                                        </figure>
                                                        <time datetime="2015-07-10 09:57" class="item_published">
                                                            Jul 10, 2015 </time>
                                                        <h6 class="item_title item_title__center"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Sed</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">ut</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">perspiciatis</span> <span class="item_title_part_3 item_title_part_even item_title_part_first_half">unde</span> <span class="item_title_part_4 item_title_part_odd item_title_part_first_half">omnis</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half">iste</span> <span class="item_title_part_6 item_title_part_odd item_title_part_second_half">natus</span> <span class="item_title_part_7 item_title_part_even item_title_part_second_half">error</span> <span class="item_title_part_8 item_title_part_odd item_title_part_second_half">sit</span> <span class="item_title_part_9 item_title_part_even item_title_part_second_half item_title_part_last">voluptatem</span></h6>
                                                        <div class="clearfix"></div>
                                                        <p>Sed ut perspiciatis unde omnis iste tus error sit voluptatem accusantium doloremque.</p>
                                                        <p>Laudantium, totam rem aperiam, eaque ipsa quae anventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. voluptatem quia voluptas sit aspernatur aut odit aut.</p>

                                                        <a class="btn btn-info readmore" href="/joomla_55285/index.php/47-news-events/126-sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem"><span>read more >></span></a></div>
                                                </li>
                                                <li class="item" id="item_127">
                                                    <div class="item_content"> 
                                                        <figure class="item_img img-intro img-intro__left">
                                                            <a href="/joomla_55285/index.php/47-news-events/127-sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem-2">
                                                                <img src="{{this}}images/page1-img5.jpg" alt="">
                                                            </a>
                                                        </figure>
                                                        <time datetime="2015-07-10 09:57" class="item_published">
                                                            Jul 10, 2015 </time>
                                                        <h6 class="item_title item_title__center"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Sed</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">ut</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">perspiciatis</span> <span class="item_title_part_3 item_title_part_even item_title_part_first_half">unde</span> <span class="item_title_part_4 item_title_part_odd item_title_part_first_half">omnis</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half">iste</span> <span class="item_title_part_6 item_title_part_odd item_title_part_second_half">natus</span> <span class="item_title_part_7 item_title_part_even item_title_part_second_half">error</span> <span class="item_title_part_8 item_title_part_odd item_title_part_second_half">sit</span> <span class="item_title_part_9 item_title_part_even item_title_part_second_half item_title_part_last">voluptatem</span></h6>
                                                        <div class="clearfix"></div>
                                                        <p>Sed ut perspiciatis unde omnis iste tus error sit voluptatem accusantium doloremque.</p>
                                                        <p>Laudantium, totam rem aperiam, eaque ipsa quae anventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. voluptatem quia voluptas sit aspernatur aut odit aut.</p>

                                                        <a class="btn btn-info readmore" href="/joomla_55285/index.php/47-news-events/127-sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem-2"><span>read more >></span></a></div>
                                                </li>
                                                <li class="item" id="item_128">
                                                    <div class="item_content"> 
                                                        <figure class="item_img img-intro img-intro__left">
                                                            <a href="/joomla_55285/index.php/47-news-events/128-sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem-3">
                                                                <img src="{{this}}images/page1-img6.jpg" alt="">
                                                            </a>
                                                        </figure>
                                                        <time datetime="2015-07-10 09:57" class="item_published">
                                                            Jul 10, 2015 </time>
                                                        <h6 class="item_title item_title__center"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Sed</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">ut</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">perspiciatis</span> <span class="item_title_part_3 item_title_part_even item_title_part_first_half">unde</span> <span class="item_title_part_4 item_title_part_odd item_title_part_first_half">omnis</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half">iste</span> <span class="item_title_part_6 item_title_part_odd item_title_part_second_half">natus</span> <span class="item_title_part_7 item_title_part_even item_title_part_second_half">error</span> <span class="item_title_part_8 item_title_part_odd item_title_part_second_half">sit</span> <span class="item_title_part_9 item_title_part_even item_title_part_second_half item_title_part_last">voluptatem</span></h6>
                                                        <div class="clearfix"></div>
                                                        <p>Sed ut perspiciatis unde omnis iste tus error sit voluptatem accusantium doloremque.</p>
                                                        <p>Laudantium, totam rem aperiam, eaque ipsa quae anventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam. voluptatem quia voluptas sit aspernatur aut odit aut.</p>

                                                        <a class="btn btn-info readmore" href="/joomla_55285/index.php/47-news-events/128-sed-ut-perspiciatis-unde-omnis-iste-natus-error-sit-voluptatem-3"><span>read more >></span></a></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="carousel_151_pag" class="caroufredsel_pagination"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <script>
                                        jQuery(function ($) {
                                            var carousel = $("#caroufredsel_151")
                                            carousel.carouFredSel({
                                                responsive: true,
                                                width: '100%',
                                                items: {
                                                    width: 480,
                                                    height: 'variable',
                                                    visible: {
                                                        min: 1,
                                                        max: 3},
                                                    minimum: 1
                                                },
                                                scroll: {
                                                    items: 1,
                                                    fx: "scroll",
                                                    easing: "swing",
                                                    duration: 500,
                                                    queue: true
                                                },
                                                auto: false,
                                                pagination: "#carousel_151_pag",
                                                swipe: {
                                                    onTouch: true
                                                }
                                            });
                                            $(window).load(function () {
                                                setTimeout(function () {
                                                    carousel.trigger('configuration', {reInit: true})
                                                }, 100);
                                            });
                                        });
                                    </script>
                                </div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="maintop">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable center  span12"><div class="module_container"><div class="mod-custom mod-custom__center">
                                        <div class="custom_title"><p><strong>Science research and development for</strong> future generations</p></div>
                                        <a class="link" href="/joomla_55285/index.php/2-uncategorised/102-science-research-and-development-for-future-generations">Click here</a></div></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="content">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="content-inner row-fluid">
                            <div id="component" class="span12">
                                <main role="main">
                                    <div id="system-message-container">
                                    </div>
                                    <section class="page-category page-category__page1">
                                    </section>

                                    <div id="content-bottom-row" class="row-fluid">
                                        <div id="content-bottom">
                                            <div class="moduletable center programs  span12"><div class="module_container"><header><h1 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">What</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">we</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half item_title_part_last">do</span></h1></header><div class="mod-newsflash-adv mod-newsflash-adv__center programs cols-4" id="module_136">
                                                        <div class="pretext">
                                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa. </div>
                                                        <div class="row-fluid">
                                                            <article class="span3 item item_num0 item__module  " id="item_122">
                                                                <div class="item_content">

                                                                    <figure class="item_img img-intro img-intro__none">
                                                                        <img src="{{this}}images/icon1.png" alt="">
                                                                    </figure>

                                                                    <h4 class="item_title item_title__center programs"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Unde</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">omnis</span></h4>

                                                                    <div class="item_introtext">
                                                                        <p>Sed ut perspis iste tus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab anventore</p>
                                                                    </div>

                                                                    <a class="btn btn-info readmore" href="/joomla_55285/index.php/46-what-we-do/122-unde-omnis"><span>learn more >></span></a></div>
                                                                <div class="clearfix"></div> </article>
                                                            <article class="span3 item item_num1 item__module  " id="item_123">
                                                                <div class="item_content">

                                                                    <figure class="item_img img-intro img-intro__none">
                                                                        <img src="{{this}}images/icon2.png" alt="">
                                                                    </figure>

                                                                    <h4 class="item_title item_title__center programs"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Omnis</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">iste</span></h4>

                                                                    <div class="item_introtext">
                                                                        <p>Sed ut perspis iste tus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab anventore</p>
                                                                    </div>

                                                                    <a class="btn btn-info readmore" href="/joomla_55285/index.php/46-what-we-do/123-omnis-iste"><span>learn more >></span></a></div>
                                                                <div class="clearfix"></div> </article>
                                                            <article class="span3 item item_num2 item__module  " id="item_124">
                                                                <div class="item_content">

                                                                    <figure class="item_img img-intro img-intro__none">
                                                                        <img src="{{this}}images/icon3.png" alt="">
                                                                    </figure>

                                                                    <h4 class="item_title item_title__center programs"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Iste</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">natus</span></h4>

                                                                    <div class="item_introtext">
                                                                        <p>Sed ut perspis iste tus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab anventore</p>
                                                                    </div>

                                                                    <a class="btn btn-info readmore" href="/joomla_55285/index.php/46-what-we-do/124-iste-natus"><span>learn more >></span></a></div>
                                                                <div class="clearfix"></div> </article>
                                                            <article class="span3 item item_num3 item__module  lastItem" id="item_125">
                                                                <div class="item_content">

                                                                    <figure class="item_img img-intro img-intro__none">
                                                                        <img src="{{this}}images/icon4.png" alt="">
                                                                    </figure>

                                                                    <h4 class="item_title item_title__center programs"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first item_title_part_last">Voluptatem</span></h4>

                                                                    <div class="item_introtext">
                                                                        <p>Sed ut perspis iste tus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab anventore</p>
                                                                    </div>

                                                                    <a class="btn btn-info readmore" href="/joomla_55285/index.php/46-what-we-do/125-voluptatem"><span>learn more >></span></a></div>
                                                                <div class="clearfix"></div> </article>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div></div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mainbottom">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <section class="moduletable video  span12"><div class="module_container"><div class="mod-article-single mod-article-single__video" id="module_125">
                                        <div class="item__module" id="item_121">

                                            <div class="item_introtext">
                                                <div class="video_outer">
                                                    <div class="video">
                                                        <div class="video_inner">
                                                            <iframe width="1116" height="635" src="http://www.youtube.com/embed/Ok2VamxrYAY" frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Our</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">experience</span> <span class="item_title_part_2 item_title_part_odd item_title_part_first_half">working</span> <span class="item_title_part_3 item_title_part_even item_title_part_first_half">for</span> <span class="item_title_part_4 item_title_part_odd item_title_part_first_half">you.</span> <span class="item_title_part_5 item_title_part_even item_title_part_second_half">Always</span> <span class="item_title_part_6 item_title_part_odd item_title_part_second_half">ahead</span> <span class="item_title_part_7 item_title_part_even item_title_part_second_half">facing</span> <span class="item_title_part_8 item_title_part_odd item_title_part_second_half">the</span> <span class="item_title_part_9 item_title_part_even item_title_part_second_half item_title_part_last">unknown</span></h3>
                                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Praesent veum moltie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit vam sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                                <p>Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gida at, curs nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna. Donec accumsan malesuada orci. Donec sit amet eros.</p>
                                                <a href="#" class="custom_link">view all videos>></a> </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div></div></section>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mainbottom-2">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable center  span12"><div class="module_container"><div class="mod-custom mod-custom__center">
                                        <div class="custom_title"><p><strong>Leading to answers.</strong> Building insights. <strong>Breaking boundaries</strong></p></div>
                                        <a class="link" href="/joomla_55285/index.php/2-uncategorised/103-leading-to-answers-building-insights-breaking-boundaries">Click here</a></div></div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mainbottom-3">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable   span12"><div class="module_container"><header><h1 class="moduleTitle "><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Latest</span> <span class="item_title_part_1 item_title_part_even item_title_part_second_half item_title_part_last">projects</span></h1></header><div class="mod-newsflash-adv projects mod-newsflash-adv__ cols-4" id="module_119">
                                        <div class="pretext">
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa. </div>
                                        <div class="row-fluid">
                                            <article class="span3 item item_num0 item__module  " id="item_113">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img1.jpg">
                                                            <img src="{{this}}images/img1.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                            <article class="span3 item item_num1 item__module  " id="item_114">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img2.jpg">
                                                            <img src="{{this}}images/img2.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                            <article class="span3 item item_num2 item__module  " id="item_115">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img3.jpg">
                                                            <img src="{{this}}images/img3.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                            <article class="span3 item item_num3 item__module  " id="item_116">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img4.jpg">
                                                            <img src="{{this}}images/img4.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                        </div><div class="row-fluid"> <article class="span3 item item_num4 item__module  " id="item_117">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img5.jpg">
                                                            <img src="{{this}}images/img5.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                            <article class="span3 item item_num5 item__module  " id="item_118">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img6.jpg">
                                                            <img src="{{this}}images/img6.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                            <article class="span3 item item_num6 item__module  " id="item_119">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img7.jpg">
                                                            <img src="{{this}}images/img7.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                            <article class="span3 item item_num7 item__module  lastItem" id="item_120">
                                                <div class="item_content">

                                                    <figure class="item_img img-intro img-intro__none">
                                                        <a class="fancybox-thumb zoom articleGalleryZoom" data-fancybox-group="portfolio" data-fancybox-type="image" data-fancybox="fancybox" href="{{this}}images/img8.jpg">
                                                            <img src="{{this}}images/img8.jpg" alt="">
                                                        </a>
                                                    </figure>


                                                </div>
                                                <div class="clearfix"></div>
                                                <script>
                                                    jQuery(function ($) {
                                                        $('a[data-fancybox="fancybox"]').fancybox({
                                                            padding: 0,
                                                            margin: 0,
                                                            loop: true,
                                                            openSpeed: 500,
                                                            closeSpeed: 500,
                                                            nextSpeed: 500,
                                                            prevSpeed: 500,
                                                            afterLoad: function () {
                                                                $('.fancybox-inner').click(function () {
                                                                    if (click == true) {
                                                                        $('body').toggleClass('fancybox-full');
                                                                    }
                                                                })
                                                            },
                                                            beforeShow: function () {
                                                                $('body').addClass('fancybox-lock');
                                                            },
                                                            afterClose: function () {
                                                                $('body').removeClass('fancybox-lock');
                                                            },
                                                            tpl: {
                                                                image: '<div class="fancybox-image" style="background-image: url(\'{href}\');"/>',
                                                                iframe: '<span class="iframe-before"/><iframe id="fancybox-frame{rnd}" width="60%" height="60%" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '/>'
                                                            },
                                                            helpers: {
                                                                title: null,
                                                                thumbs: {
                                                                    height: 50,
                                                                    width: 80
                                                                },
                                                                overlay: {
                                                                    css: {
                                                                        'background': '#191919'
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    })
                                                </script> </article>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="mod-newsflash-adv_custom-link">
                                            <a class="btn btn-info" href="/joomla_55285/index.php/products">view all projects >></a> </div>
                                    </div>
                                </div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="mainbottom-4">
                <div class="row-container">
                    <div class="container-fluid">
                        <div class="row-fluid">
                            <div class="moduletable   span12"><div class="module_container"><div class="mod_caroufredsel testimonials mod_caroufredsel__" id="module_91">
                                        <div id="list_carousel_91" class="list_carousel">
                                            <ul id="caroufredsel_91">
                                                <li class="item" id="item_19">
                                                    <div class="item_content"> 
                                                        <figure class="item_img img-intro img-intro__left">
                                                            <img src="{{this}}images/carousel-1.jpg" alt="">
                                                        </figure>
                                                        <div class="overflow">
                                                            <p>Quisque nulla. Vestibulum libero nisl, porta vel, scele, maleneque. Vivamus eget nibh. Etiam cursus leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae spened leo. Ut phaa augue nec augue. Nam elit maa, hendrerit sit amincidunt ac, viverra sed, nulla.</p>
                                                            <h3 class="item_title item_title__"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Victor</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Pitcher,</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half">Dexter</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half item_title_part_last">Inc.</span></h3>

                                                        </div></div>
                                                </li>
                                                <li class="item" id="item_20">
                                                    <div class="item_content"> 
                                                        <figure class="item_img img-intro img-intro__left">
                                                            <img src="{{this}}images/carousel-2.jpg" alt="">
                                                        </figure>
                                                        <div class="overflow">
                                                            <p>Maecenas et laoreet neque. Aenean tempus feugiat eros, eu convallis ligula tincidunt a. Nam facilisis enim at augue viverra ultrices. Etiam nec mollis est, non pulvinar arcu. Cras adipiscing nisi leo, non faucibus est commodo in. Integer nec erat convallis, cursus magna et, egestas odio. Donec nec quam nibh.</p>
                                                            <h3 class="item_title item_title__"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Caroline</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Beek,</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half">Dexter</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half item_title_part_last">Inc.</span></h3>

                                                        </div></div>
                                                </li>
                                                <li class="item" id="item_21">
                                                    <div class="item_content"> 
                                                        <figure class="item_img img-intro img-intro__left">
                                                            <img src="{{this}}images/carousel-3.jpg" alt="">
                                                        </figure>
                                                        <div class="overflow">
                                                            <p>Nunc ornare, justo eget volutpat porttitor, massa felis rhoncus dui, eu convallis enim lectus vel velit. Nam ac aliquam ligula, ultrices blandit leo. Suspendisse sed semper libero. Integer bibendum orci non mauris pharetra scelerisque. Nunc vitae tempor augue, in condimentum mi. In eu velit hendrerit, tempor tortor at, hendrerit erat.</p>
                                                            <h3 class="item_title item_title__"><span class="item_title_part_0 item_title_part_odd item_title_part_first_half item_title_part_first">Alan</span> <span class="item_title_part_1 item_title_part_even item_title_part_first_half">Pitcher,</span> <span class="item_title_part_2 item_title_part_odd item_title_part_second_half">Dexter</span> <span class="item_title_part_3 item_title_part_even item_title_part_second_half item_title_part_last">Inc.</span></h3>

                                                        </div></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div id="carousel_91_pag" class="caroufredsel_pagination"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <script>
                                        jQuery(function ($) {
                                            var carousel = $("#caroufredsel_91")
                                            carousel.carouFredSel({
                                                responsive: true,
                                                width: '100%',
                                                items: {
                                                    width: 1116,
                                                    height: 'variable',
                                                    visible: {
                                                        min: 1,
                                                        max: 1},
                                                    minimum: 1
                                                },
                                                scroll: {
                                                    items: 1,
                                                    fx: "fade",
                                                    easing: "swing",
                                                    duration: 500,
                                                    queue: true
                                                },
                                                auto: false,
                                                pagination: "#carousel_91_pag",
                                                swipe: {
                                                    onTouch: true
                                                }
                                            });
                                            $(window).load(function () {
                                                setTimeout(function () {
                                                    carousel.trigger('configuration', {reInit: true})
                                                }, 100);
                                            });
                                        });
                                    </script>
                                </div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="bottom">
                <div class="moduletable map"><div class="module_container"><div class="mod-article-single mod-article-single__map" id="module_123">
                            <div class="item__module" id="item_108">

                                <div class="item_introtext">
                                    <div class="map_wrapper">

                                        <noscript><blockquote class='warning'><p><b>JavaScript must be enabled in order for you to use Google Maps.</b> <br/>However, it seems JavaScript is either disabled or not supported by your browser. <br/>To view Google Maps, enable JavaScript by changing your browser options, and then try again.</p></blockquote></noscript><a href="#" title="Print" onclick="javascript:googlemap8_b3fst_0.gmapPrint();
        return false;" rel="nofollow" class="mapprint"> </a><div id='mapplaceholder8_b3fst_0'><div id='mapbody8_b3fst_0' style="display: none; text-align:center"><div id="googlemap8_b3fst_0" class="map" style="margin-right: auto; margin-left: auto; width:100%; height:358px;"></div></div></div>
                                        <img src='{{this}}images/marker.png' style='display:none' alt='icon'/>
                                        <script type='text/javascript'>/*<![CDATA[*/
                                            var mapconfig8_b3fst_0 = {"debug": "0", "visualrefresh": "1", "signedin": "0", "show": "1", "mapclass": "", "mapprint": " ", "loadmootools": "0", "timeinterval": "500", "googlewebsite": "maps.google.com", "align": "center", "width": "100%", "height": "358px", "effect": "none", "deflatitude": "40.579591", "deflongitude": "-73.970668", "centerlat": "", "centerlon": "", "address": "", "geoloc": "0", "geocenter": "0", "controltype": "user", "zoomtype": "Small", "svcontrol": "1", "returncontrol": "1", "zoom": "10", "corzoom": "0", "minzoom": "0", "maxzoom": "21", "rotation": "1", "zoomnew": "1", "zoomwheel": "0", "keyboard": "1", "maptype": "Normal", "showmaptype": "1", "shownormalmaptype": "1", "showsatellitemaptype": "1", "showhybridmaptype": "1", "showterrainmaptype": "1", "showscale": "1", "overview": "0", "dragging": "0", "marker": "1", "traffic": "0", "transit": "0", "bicycle": "0", "panoramio": "0", "panominzoom": "none", "panomaxzoom": "none", "pano_userid": "", "pano_tag": "", "weather": "0", "weathercloud": "0", "weatherinfo": "1", "weathertempunit": "celsius", "weatherwindunit": "km", "dir": "0", "dirtype": "D", "formdirtype": "0", "avoidhighways": "0", "avoidtoll": "0", "diroptimize": "0", "diralternatives": "0", "showdir": "1", "animdir": "0", "animspeed": "1", "animautostart": "0", "animunit": "kilometers", "formspeed": "0", "formaddress": "0", "formdir": "0", "autocompl": "both", "txtdir": "Directions: ", "txtgetdir": "Get Directions", "txtfrom": "From here", "txtto": "To here", "txtdiraddr": "Address: ", "txt_driving": "", "txt_avhighways": "", "txt_avtoll": "", "txt_walking": "", "txt_bicycle": "", "txt_transit": "", "txt_optimize": "", "txt_alternatives": "", "dirdefault": "0", "gotoaddr": "0", "gotoaddrzoom": "0", "gotoaddrtimeout": "5000", "txtaddr": "Address: ##", "erraddr": "Address ## not found!", "txtgotoaddr": "Goto", "clientgeotype": "google", "lightbox": "0", "txtlightbox": "Open lightbox", "lbxcaption": "", "lbxwidth": "1600px", "lbxheight": "800px", "lbxcenterlat": "", "lbxcenterlon": "", "lbxzoom": "", "sv": "none", "svpano": "", "svwidth": "100%", "svheight": "300px", "svautorotate": "0", "svaddress": "1", "kmlrenderer": "google", "kmlsidebar": "none", "kmlsbwidth": "200px", "kmllightbox": "0", "kmlhighlite": "{ \"color\": \"#aaffff\", \"opacity\": 0.3,  \"textcolor\": \"#000000\" }", "proxy": "0", "tilelayer": "", "tilemethod": "", "tileopacity": "1", "tilebounds": "", "tileminzoom": "0", "tilemaxzoom": "19", "twittername": "", "twittertweets": "15", "twittericon": "\/media\/plugin_googlemap3\/site\/Twitter\/twitter_map_icon.png", "twitterline": "#ff0000ff", "twitterlinewidth": "4", "twitterstartloc": "0,0,0", "lang": "en-GB", "mapType": "normal", "geocoded": 0, "tolat": "", "tolon": "", "toaddress": "", "description": "", "tooltip": "", "kml": [], "kmlsb": [], "layer": [], "lookat": [], "camera": [], "searchtext": "", "latitude": "[cache:"lat"end cache]", "longitude": "[cache:"lng"end cache]", "waypoints": [], "mapnm": "8_b3fst_0", "descr": "0", "geoxmloptions": {"titlestyle": " class=kmlinfoheader ", "descstyle": " class=kmlinfodesc ", "veryquiet": true, "quiet": true, "iwmethod": "click", "sortbyname": null, "linktarget": "_self", "linkmethod": "dblclick", "hilite": {"color": "#aaffff", "opacity": 0.3, "textcolor": "#000000"}, "baseicon": "A", "lang": {"txtdir": "Directions: ", "txtto": "To here", "txtfrom": "From here", "txtsrchnrby": "Search nearby", "txtzoomhere": "Zoom Here", "txtaddrstart": "Start address:", "txtgetdir": "Go", "txtback": "\u00ab Back", "txtsearchnearby": "Search nearby: e.g. pizza", "txtsearch": "Go"}, "inputsize": "25"}, "markericon": [{"name": "A", "imageurl": "\/template\/khadamatcom\/images\/marker.png", "iconwidth": "", "iconheight": "", "iconshadow": "", "iconshadowwidth": "", "iconshadowheight": "", "iconanchorx": "", "iconanchory": "", "iconimagemap": "13,0,15,1,16,2,17,3,18,4,18,5,19,6,19,7,19,8,19,9,19,10,19,11,19,12,19,13,18,14,18,15,17,16,16,17,15,18,14,19,14,20,13,21,13,22,12,23,12,24,12,25,12,26,11,27,11,28,11,29,11,30,11,31,11,32,11,33,8,33,8,32,8,31,8,30,8,29,8,28,8,27,8,26,7,25,7,24,7,23,6,22,6,21,5,20,5,19,4,18,3,17,2,16,1,15,1,14,0,13,0,12,0,11,0,10,0,9,0,8,0,7,0,6,1,5,1,4,2,3,3,2,4,1,6,0,13,0"}], "icontype": "A"};
                                            var mapstyled8_b3fst_0 = [{"featureType": "landscape", "stylers": [{"saturation": -100}, {"lightness": 65}, {"visibility": "on"}]}, {"featureType": "poi", "stylers": [{"saturation": -100}, {"lightness": 51}, {"visibility": "simplified"}]}, {"featureType": "road.highway", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "road.arterial", "stylers": [{"saturation": -100}, {"lightness": 30}, {"visibility": "on"}]}, {"featureType": "road.local", "stylers": [{"saturation": -100}, {"lightness": 40}, {"visibility": "on"}]}, {"featureType": "transit", "stylers": [{"saturation": -100}, {"visibility": "simplified"}]}, {"featureType": "administrative.province", "stylers": [{"visibility": "off"}]}, {"featureType": "water", "elementType": "labels", "stylers": [{"visibility": "on"}, {"lightness": -25}, {"saturation": -100}]}, {"featureType": "water", "elementType": "geometry", "stylers": [{"hue": "#ffff00"}, {"lightness": -25}, {"saturation": -97}]}];
                                            var googlemap8_b3fst_0 = new GoogleMaps('8_b3fst_0', mapconfig8_b3fst_0, mapstyled8_b3fst_0);
                                            /*]]>*/</script></div> </div>
                                <div class="clearfix"></div>
                            </div>
                        </div></div></div>
            </div>

[include:"footer_ar"end include] 