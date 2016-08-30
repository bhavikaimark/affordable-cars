<?php 
/*
Template Name: Contact Us
*/
?>

    <?php get_header(); ?>



        <section class="banner" style="background: url(<?php the_field('top_banner_image'); ?>) no-repeat scroll 0 0;">
            <div class="services_bar onbanner">
                <?php 
                $menu_items = wp_get_nav_menu_items(3);
                $title; $url;
                foreach ( (array) $menu_items as $key => $menu_item ) {
                    $title[] = $menu_item->title;
                    $url[] = $menu_item->url;   
            }
          ?>
                    <ul>
                        <li><a href="<?php echo $url[0]; ?>">
             <img src="<?php echo get_template_directory_uri(); ?>/images/car_icon.png"><?php echo $title[0]; ?></a></li>
                        <li><a href="<?php echo $url[1]; ?>">
             <img src="<?php echo get_template_directory_uri(); ?>/images/chat_icon.png"><?php echo $title[1]; ?></a></li>
                        <li><a href="<?php echo $url[2]; ?>">
             <img class="find_i" src="<?php echo get_template_directory_uri(); ?>/images/find_icon.png"><?php echo $title[2]; ?></a></li>
                        <li><a href="<?php echo $url[3]; ?>" data-toggle="modal" data-target="#myModal">
             <img class="s_icon" src="<?php echo get_template_directory_uri(); ?>/images/service_icon.png"><?php echo $title[3]; ?></a></li>
                    </ul>
            </div>
        </section>
        <section class="get_in_touch">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="heading_about">
                            <h3><?php the_field('wed_appreciate'); ?></h3>
                            <h2><?php the_field('get_in_touch'); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="get_in_touch_details">
                            <?php 
                    if (have_posts()) :
                       while (have_posts()) :
                          the_post();
                             the_content();
                       endwhile;
                    endif;
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact_form_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="contact_form">
                            <?php echo do_shortcode( '[contact-form-7 id="201" title="Contact Us"]' ); ?>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="contact_right_section">
                            <img class="bg_img" src="<?php the_field('contact_background'); ?>">
                            <h3><?php the_field('lets_know'); ?></h3>
                            <h2><?php the_field('what_you_need'); ?></h2>
                            <img class="wow slideInRight" src="<?php the_field('contact_side_image'); ?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our_products">
            <div class="container">
                <div id="brand" class="owl-carousel">

                    <?php 
                query_posts('post_type=brand_logo'); 
                while (have_posts()) : the_post(); ?>
                        <div class="item">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                        </div>

                        <?php 
                endwhile; ?>
                </div>
            </div>
        </section>
        <section class="care">
            <h2>OUR LOCATION</h2>
            <!--div class="map"-->
            <img src="<?php echo get_template_directory_uri(); ?>/images/point_arrow.png" id="object" class="point floating">

            <?php 
            //$location=get_post_meta($post->ID, 'contact_us_google_map', TRUE);
            //$location1 = get_field('address_1', 17);

            //if( !empty($location) ):
            ?>
                <!--div class="acf-map">
            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
            </div-->
                <?php //endif; ?>
                    <?php if( have_rows('locs', 17) ): ?>
                        <div class="acf-map">
                            <?php while ( have_rows('locs', 17) ) : the_row(); 

			$location = get_sub_field('loc', 17);
			//print_r($location);

			?>
                                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">

                                </div>
                                <?php endwhile; ?>
                        </div>
                        <?php 
else:
	echo 'Nothing';
endif; ?>

                            <!--/div-->


        </section>


        <!--**************START SCRIPT FOR GOOGLE MAP*****************-->
        <style type="text/css">
            .acf-map {
                border: 1px solid #ccc;
                height: 427px;
                margin: 0;
            }
            /* fixes potential theme css conflict */
            
            .acf-map img {
                max-width: inherit !important;
            }
        </style>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDBIcFO2VABRgPtL50NnWbSk_7NbjZkxAI&callback=initMap" type="text/javascript"></script>


        <script type="text/javascript">
            (function ($) {
                /*
                 *  render_map
                 *
                 *  This function will render a Google Map onto the selected jQuery element
                 *
                 *  @type    function
                 *  @date    8/11/2013
                 *  @since   4.3.0
                 *
                 *  @param   $el (jQuery element)
                 *  @return  n/a
                 */
                function render_map($el) {
                    // var
                    var $markers = $el.find('.marker');
                    // vars
                    var args = {
                        zoom: 30,
                        center: new google.maps.LatLng(0, 0),
                        mapTypeId: google.maps.MapTypeId.ROADMAP
                    };
                    // create map            
                    var map = new google.maps.Map($el[0], args);
                    // add a markers reference
                    map.markers = [];
                    // add markers
                    $markers.each(function () {
                        add_marker($(this), map);
                    });
                    // center map
                    center_map(map);
                }
                /*
                 *  add_marker
                 *
                 *  This function will add a marker to the selected Google Map
                 *
                 *  @type    function
                 *  @date    8/11/2013
                 *  @since   4.3.0
                 *
                 *  @param   $marker (jQuery element)
                 *  @param   map (Google Map object)
                 *  @return  n/a
                 */
                function add_marker($marker, map) {
                    // var
                    var latlng = new google.maps.LatLng($marker.attr('data-lat'), $marker.attr('data-lng'));
                    // create marker
                    var marker = new google.maps.Marker({
                        position: latlng,
                        map: map
                    });
                    // add to array
                    map.markers.push(marker);
                    // if marker contains HTML, add it to an infoWindow
                    if ($marker.html()) {
                        // create info window
                        var infowindow = new google.maps.InfoWindow({
                            content: $marker.html()
                        });
                        // show info window when marker is clicked
                        google.maps.event.addListener(marker, 'click', function () {
                            infowindow.open(map, marker);
                        });
                    }
                }
                /*
                 *  center_map
                 *
                 *  This function will center the map, showing all markers attached to this map
                 *
                 *  @type    function
                 *  @date    8/11/2013
                 *  @since   4.3.0
                 *
                 *  @param   map (Google Map object)
                 *  @return  n/a
                 */
                function center_map(map) {
                    // vars
                    var bounds = new google.maps.LatLngBounds();
                    // loop through all markers and create bounds
                    $.each(map.markers, function (i, marker) {
                        var latlng = new google.maps.LatLng(marker.position.lat(), marker.position.lng());
                        bounds.extend(latlng);
                    });
                    // only 1 marker?
                    if (map.markers.length == 1) {
                        // set center of map
                        map.setCenter(bounds.getCenter());
                        map.setZoom(15);
                    } else {
                        // fit to bounds
                        map.fitBounds(bounds);
                    }
                }
                /*
                 *  document ready
                 *
                 *  This function will render each map when the document is ready (page has loaded)
                 *
                 *  @type    function
                 *  @date    8/11/2013
                 *  @since   5.0.0
                 *
                 *  @param   n/a
                 *  @return  n/a
                 */
                $(document).ready(function () {
                    $('.acf-map').each(function () {
                        render_map($(this));
                    });
                });
            })(jQuery);
        </script>
        <!--**************END OF SCRIPT FOR GOOGLE MAP*****************-->

        <?php get_footer(); ?>