<?php 
/*
Template Name: Autocare
*/
?>

    <?php get_header(); ?>


        <section class="dual_banner">
            <div class="left-side" style="background: url(<?php the_field('left_image'); ?>) no-repeat scroll 0 0;">
                <a href="<?php the_field('left_page_link'); ?>" class="transparent_box">
                    <h1><?php the_field('left_heading'); ?></h1>
                    <h2><small><?php the_field('left_subheading'); ?></small> <i class="fa fa-angle-down" aria-hidden="true"></i></h2>
                </a>
            </div>
            <div class="right-side" style="background: url(<?php the_field('right_image'); ?>) no-repeat scroll 0 0;">
                <a href="<?php the_field('right_page_link'); ?>" class="transparent_box">
                    <h1><?php the_field('right_heading'); ?></h1>
                    <h2><small><?php the_field('right_subheading'); ?></small> <i class="fa fa-angle-down" aria-hidden="true"></i></h2>
                </a>
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
            </div>
        </section>

        <section class="engine_repair">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="heding_info_part">
                            <h3><?php the_field('engine_diagnostics'); ?></h3>
                            <h2>& <span><?php the_field('repairs'); ?></span></h2>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="engine_part_slider">
                            <div id="engine" class="owl-carousel">
                                <?php //$gal1 = get_field('gallery_1'); 
                            //print_r($gal1);
                               /* The loop */

                            /*while ( have_posts() ) : the_post();
                                if ( get_post_gallery() ) :
                                 $gallery = get_post_gallery_images();
                             $gallery1 = get_post_gallery_images();
                             //echo $gallery;
                                endif; 
                            endwhile; 
                            print_r($gallery);
                            print_r($gallery1);
                            foreach ($gallery as $gal) {
                                ?>
                                    <div class="item">
                                        <a class="gallery_block fancybox" href="<?php echo $gal; ?>" data-fancybox-group="gallery">
                                        <img src="<?php echo $gal; ?>">
                                    </a>
                                    </div>
                                    <?php 
                                //echo $gal;
                            }*/

                            while ( have_posts() ) : the_post();
                                //if ( get_post_gallery() ) :
                                 $galleries = get_post_galleries_images( $post ); 
                              $gal1 = $galleries[0];
                              $gal2 = $galleries[1];
                                //endif; 
                            endwhile; 
                            //print_r($gal1);
                            //print_r($gal2);

                            foreach ($gal1 as $gal) {
                                ?>
                                        <div class="item">
                                            <a class="gallery_block fancybox" href="<?php echo $gal; ?>" data-fancybox-group="gallery">
                                        <img src="<?php echo $gal; ?>">
                                    </a>
                                        </div>
                                        <?php 
                            } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="engine_repair bodyworks">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 pull-right">
                        <div class="heding_info_part">
                            <h3><?php the_field('body_works'); ?></h3>
                            <h2>& <span><?php the_field('painting'); ?></span></h2>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 pull-left">
                        <div class="engine_part_slider">
                            <div id="engine1" class="owl-carousel">
                                <?php 
                             foreach ($gal2 as $gal) {
                                ?>
                                    <div class="item">
                                        <a class="gallery_block fancybox" href="<?php echo $gal; ?>" data-fancybox-group="gallery1">
                                        <img src="<?php echo $gal; ?>">
                                    </a>
                                    </div>
                                    <?php 
                                //echo $gal;
                            }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="vehicle_service_scheduling">
            <div class="container">
                <div class="scheduling_area">
                    <?php the_field('scheduling_section'); ?>
                        <a class="schedule_btn" href="#" data-toggle="modal" data-target="#myModal">Schedule Here</a>
                </div>
            </div>
        </section>
        <section class="car_moving_Section">
            <div class="container">
                <div class="left_info_region">
                    <?php the_field('read_blog_section'); ?>
                </div>
            </div>
        </section>


        <?php get_footer(); ?>