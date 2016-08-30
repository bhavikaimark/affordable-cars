<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-12">
                <div class="footer_nav">
                    <ul>
                        <?php 
                        $menu_items = wp_get_nav_menu_items(4);
                        $title; $url;
                        foreach ( (array) $menu_items as $key => $menu_item ) {
                            $title = $menu_item->title;
                            $url = $menu_item->url;   
                            ?>
                            <li>
                                <a href="<?php echo $url; ?>">
                                    <?php echo $title; ?>
                                </a>
                            </li>
                            <?php 
                        }
                        ?>
                    </ul>

                </div>
            </div>
            <div class="col-md-5 col-sm-4 col-xs-12">
                <div class="social_connect">
                    <!--img src="<?php //echo get_template_directory_uri(); ?>/images/tweet_img.jpg"-->
                    <a class="twitter-timeline" data-width="300" data-height="300" href="https://twitter.com/TwitterDev/timelines/539487832448843776"></a>
                    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

                    <?php //dynamic_sidebar('twitter'); ?>



                        <?php 
                            $menu_items = wp_get_nav_menu_items(5);
                            $title1; $url1;
                            foreach ( (array) $menu_items as $key => $menu_item ) {
                                $title1[] = $menu_item->title;
                                $url1[] = $menu_item->url;   
                            }
                          ?>
                            <ul>
                                <li><a href="<?php echo $url1[0]; ?>" target="_blank" title="<?php echo $title1[0]; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo $url1[1]; ?>" target="_blank" title="<?php echo $title1[1]; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo $url1[2]; ?>" target="_blank" title="<?php echo $title1[2]; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo $url1[3]; ?>" target="_blank" title="<?php echo $title1[3]; ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo $url1[4]; ?>" target="_blank" title="<?php echo $title1[4]; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            </ul>

                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="contact_us">

                    <h2>SIGNUP FOR OUR NEWSLETTER</h2>
                    <p class="updt">Get all the latest updates on sales and deals</p>
                    <div class="signup_here">
                        <?php 
                    global $wpdb;
                    if (isset($_POST['submit'])) {

                        $email_id = $_POST['email_id'];
                        $already_exist = $wpdb->get_var( "SELECT email_id FROM wp_subscribe where email_id = '$email_id' ");
                        //alert($already_exist);
                        if ($email_id == $already_exist) {
                            echo "<b>Alredy Subscribed !!!</b>";
                        }
                        else {
                        $wpdb->insert( 'wp_subscribe', array( 'email_id' => $email_id ) );
                        echo "<b>Subscribed !!!</b>";
                        }

                        ?>
                            <script type="text/javascript">
                                jQuery("html, body").animate({
                                    scrollTop: jQuery("#footer").offset().top
                                }, 500);
                            </script>
                            <?php
                    }
                    ?>
                                <form class="newsletter-form" method="post">

                                    <button type="submit" class="newsletter-btn" name="submit">subscribe</button>
                                    <input type="email" name="email_id" placeholder="Email address" required>
                                </form>
                                <!--button>SIGNUP HERE</button>
                            <input type="text" value="" placeholder=""-->
                    </div>
                    <div class="address">
                        <?php dynamic_sidebar('address'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <p>&copy;
                <?php echo date("Y"); ?> all rights reserved. powered by Affordable Cars Ltd</p>
            <a target="_blank" href="http://www.cogniko.com/">COGNIKO</a>
        </div>
    </div>
    <nav class="social">
        <!--img src="<?php //echo get_template_directory_uri(); ?>/images/social-icon_grid.jpg"-->
        <?php //if (function_exists("DISPLAY_ACURAX_ICONS")) { DISPLAY_ACURAX_ICONS(); } ?>
    </nav>
    <!--div class="chat">
            <img src="<?php //echo get_template_directory_uri(); ?>/images/chat.png">
        </div-->
</footer>
<?php wp_footer(); ?>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.js"></script>


    <script>
        $('.carousel').carousel({
            pause: 'none'
        });
    </script>

    <script>
        // grab the initial top offset of the navigation 
        var stickyNavTop = $('body').offset().top;
        // our function that decides weather the navigation bar should have "fixed" css position or not.
        var stickyNav = function () {
            var scrollTop = $(window).scrollTop(); // our current vertical position from the top

            // if we've scrolled more than the navigation, change its position to fixed to stick to top,
            // otherwise change it back to relative
            if (scrollTop > 10) {
                $('header').addClass('sticky');
            } else {
                $('header').removeClass('sticky');
            }

        };

        stickyNav();
        // and run it again every time you scroll
        $(window).scroll(function () {
            stickyNav();
        });
    </script>


    <script>
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
        });
        wow.init();
    </script>
    <script>
        $(document).ready(function () {

            $("#special").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                navigation: true,
                navigationText: ["", ""],
                items: 3,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]

            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $("#testimonial").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 1,
                itemsDesktop: [1199, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                itemsMobile: [479, 1]
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $("#brand").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                navigation: true,
                navigationText: ["", ""],
                items: 8,
                itemsDesktop: [1199, 8],
                itemsDesktopSmall: [979, 6],
                itemsTablet: [768, 6],
                itemsMobile: [479, 3]

            });

        });
    </script>
    <script>
        $(function () {
            $('#top a').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>


    <script>
        $(document).ready(function () {

            $("#engine").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                navigation: true,
                navigationText: ["", ""],
                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4],
                itemsTablet: [768, 4],
                itemsMobile: [479, 1]

            });



        });
    </script>

    <script>
        jQuery(document).ready(function () {



            jQuery("#engine1").owlCarousel({

                autoPlay: 3000, //Set AutoPlay to 3 seconds
                navigation: true,
                navigationText: ["", ""],
                items: 4,
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 4],
                itemsTablet: [768, 4],
                itemsMobile: [479, 1]

            });


        });
    </script>


    <!-- showroom page -->

    <script>
        $(document).ready(function () {

            $('.car_img').click(function () {

                var post_id = $(this).next('.post_id').val();
                //alert(post_id);

                jQuery.ajax({
                    url: 'http://affordablecars.stagingdevsite.com/dev/wp-content/themes/affordablecars/ajax/get_gallery.php',
                    data: {
                        "post_id": post_id
                    },
                    type: 'post',
                    success: function (result) {
                        //alert(result);
                        $(".popup_window_slider").append(result);
                        $(".popup_window_slider").addClass("show");

                    }
                });
            });
        });
    </script>
    <!-- till here showroom page -->


    <script>
        $(window).load(function () {
            // The slider being synced must be initialized first
            $('#carousel').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 138,
                itemMargin: 10,
                asNavFor: '#slider'
            });

            $('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             *  Simple image gallery. Uses default settings
             */

            $('.fancybox').fancybox();

            /*
             *  Different effects
             */

            // Change title type, overlay closing speed
            $(".fancybox-effects-a").fancybox({
                helpers: {
                    title: {
                        type: 'outside'
                    },
                    overlay: {
                        speedOut: 0
                    }
                }
            });

            // Disable opening and closing animations, change title type
            $(".fancybox-effects-b").fancybox({
                openEffect: 'none',
                closeEffect: 'none',

                helpers: {
                    title: {
                        type: 'over'
                    }
                }
            });

            // Set custom style, close if clicked, change title type and overlay color
            $(".fancybox-effects-c").fancybox({
                wrapCSS: 'fancybox-custom',
                closeClick: true,

                openEffect: 'none',

                helpers: {
                    title: {
                        type: 'inside'
                    },
                    overlay: {
                        css: {
                            'background': 'rgba(238,238,238,0.85)'
                        }
                    }
                }
            });

            // Remove padding, set opening and closing animations, close if clicked and disable overlay
            $(".fancybox-effects-d").fancybox({
                padding: 0,

                openEffect: 'elastic',
                openSpeed: 150,

                closeEffect: 'elastic',
                closeSpeed: 150,

                closeClick: true,

                helpers: {
                    overlay: null
                }
            });

            /*
             *  Button helper. Disable animations, hide close button, change title type and content
             */

            $('.fancybox-buttons').fancybox({
                openEffect: 'none',
                closeEffect: 'none',

                prevEffect: 'none',
                nextEffect: 'none',

                closeBtn: false,

                helpers: {
                    title: {
                        type: 'inside'
                    },
                    buttons: {}
                },

                afterLoad: function () {
                    this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                }
            });


            /*
             *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
             */

            $('.fancybox-thumbs').fancybox({
                prevEffect: 'none',
                nextEffect: 'none',

                closeBtn: false,
                arrows: false,
                nextClick: true,

                helpers: {
                    thumbs: {
                        width: 50,
                        height: 50
                    }
                }
            });

            /*
             *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
             */
            $('.fancybox-media')
                .attr('rel', 'media-gallery')
                .fancybox({
                    openEffect: 'none',
                    closeEffect: 'none',
                    prevEffect: 'none',
                    nextEffect: 'none',

                    arrows: false,
                    helpers: {
                        media: {},
                        buttons: {}
                    }
                });

            /*
             *  Open manually
             */

            $("#fancybox-manual-a").click(function () {
                $.fancybox.open('1_b.jpg');
            });

            $("#fancybox-manual-b").click(function () {
                $.fancybox.open({
                    href: 'iframe.html',
                    type: 'iframe',
                    padding: 5
                });
            });

            $("#fancybox-manual-c").click(function () {
                $.fancybox.open([
                    {
                        href: '1_b.jpg',
                        title: 'My title'
                    }, {
                        href: '2_b.jpg',
                        title: '2nd title'
                    }, {
                        href: '3_b.jpg'
                    }
                ], {
                    helpers: {
                        thumbs: {
                            width: 75,
                            height: 50
                        }
                    }
                });
            });


        });
    </script>


    <script type="text/javascript">
        $(document).ready(function () {
            if ($("body").hasClass("page-id-5")) {
                $("#item1").addClass("active");
            }
            if ($("body").hasClass("page-id-23")) {
                $("#item2").addClass("active");
            }
        });
    </script>

    </body>



    </html>