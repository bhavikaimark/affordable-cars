<?php 
/*
Template Name: Home Page Template
*/
?>

    <?php get_header(); ?>


        <section class="slider">
            <div id="carousel-example-generic" class="carousel slide home_slider" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <?php
              $args = array( 'posts_per_page' => 5, 'order' => '', 'post_type' => 'slider', 'post_status' => 'publish');
              $my_query = null;
              $my_query = new WP_Query($args);
                
                if( $my_query->have_posts() ) {
                $count = 0;
                while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $count; ?>" class="<?php if($count == 0){echo " active "; }?> ">
                            <?php echo $count+1; ?>
                        </li>

                        <?php   
                $count++;
                endwhile;
                }
                wp_reset_query();  // Restore global post data stomped by the_post().
                ?>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <?php
                $args = array( 'posts_per_page' => 5, 'order' => '', 'post_type' => 'slider', 'post_status' => 'publish');
                $my_query = null;
                $my_query = new WP_Query($args);
      
                if( $my_query->have_posts() ) {
                $count = 0;
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php 
                        $id = get_the_ID();
                        if (has_post_thumbnail() ): 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                        endif; 
                    ?>
                            <div class="item <?php if ($count == 0){echo " active ";}else{} ?>" style="background: url(<?php echo $image[0]; ?>);">
                                <div class="caption">
                                    <h1><?php the_title(); ?></h1>
                                    <?php the_content(); ?>
                                </div>
                                <a href="<?php the_field('button_link'); ?>" class="choice_btn">
                                    <?php the_field('button_text'); ?>
                                </a>
                            </div>
                            <?php 
                $count++;
                endwhile;
                }
                wp_reset_query();  // Restore global post data stomped by the_post().
                ?>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>
        <div class="btn_arrow" id="top">
            <a href="#scroll" class="floating"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow_btm.png" alt=""></a>
        </div>
        <section class="about_info" id="scroll">
            <div class="services_bar">
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
                        <li>

                            <a href="<?php echo $url[3]; ?>" data-toggle="modal" data-target="#myModal">
             <img class="s_icon" src="<?php echo get_template_directory_uri(); ?>/images/service_icon.png"><?php echo $title[3]; ?></a></li>
                    </ul>
            </div>
            <h2><?php the_field('what_makes_us'); ?></h2>
            <div class="our_box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box">
                                <?php the_field('our_mission'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box">
                                <?php the_field('our_vision'); ?>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="box">
                                <?php the_field('our_values'); ?>
                            </div>
                        </div>
                    </div>
                    <a class="read_more_btn floating" id="object" href="about-us/">Click here to read more about us <i class="fa fa-angle-up" aria-hidden="true"></i></a>
                </div>
            </div>
        </section>
        <section class="explore_vehicals">
            <h2>EXPLORE OUR VEHICLES</h2>
            <ul>
                <?php
            $args = array( 'taxonomy' => 'vehicles_category', 'hide_empty'=>0 );
            $terms = get_terms('vehicles_category', $args);
            //print_r($args);
            //print_r($terms);

            foreach ($terms as $term) 
                {
                ?>
                    <li>
                        <a href="show-room/">
                            <h4><?php echo  $term->name; ?></h4>
                            <img src="<?php echo z_taxonomy_image_url($term->term_id); ?>">
                        </a>
                    </li>
                    <?php } ?>
            </ul>

        </section>
        <section class="featured_plus_finance_section">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="ftrd_vehical">
                            <h2><?php the_field('vehicle_of_month'); ?></h2>
                            <div class="car_box">
                                <?php $vehicle = get_field('vehicle'); 
                            //print_r($vehicle); 
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($vehicle->ID), 'single-post-thumbnail' );
                            ?>
                                    <a href="coming-soon/"><img src="<?php echo $image[0]; ?>"></a>
                                    <div class="info">
                                        <h3><?php echo $vehicle->post_title; ?></h3>
                                        <p>
                                            <?php echo $vehicle->post_content; ?>
                                        </p>
                                    </div>
                            </div>
                            <a class="view_detail" href="coming-soon/">View More Details</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="finance_detail">
                            <h2><?php the_field('car_finance_scheme'); ?></h2>
                            <div class="f_box">
                                <div class="left_img">
                                    <img src="<?php the_field('car_finance_image'); ?>">
                                </div>
                                <div class="right_info">
                                    <div class="outer">
                                        <h4><?php the_field('payment_plan'); ?></h4>
                                        <p>
                                            <?php the_field('payment_plan_content'); ?>
                                        </p>
                                    </div>
                                    <a class="v_btn" href="<?php the_field('view_more_link'); ?>">View More</a>
                                </div>
                            </div>
                            <div class="testimonial_section">
                                <h2>testimonials</h2>
                                <div id="testimonial">
                                    <?php query_posts('post_type=testimonial&showposts=5'); ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                            <div class="item">
                                                <div class="testim-box">
                                                    <?php the_content(); ?>
                                                </div>
                                            </div>
                                            <?php endwhile;  
                                wp_reset_query(); ?>
                                </div>
                            </div>
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
            <h2><?php the_field('auto_care', 5); ?></h2>
            <div class="autocare">
                <img class="point floating" id="object" src="<?php echo get_template_directory_uri(); ?>/images/point_arrow.png">
                <div class="text_caption">
                    <p>
                        <?php the_field('auto_care_text', 5); ?>
                    </p>
                    <a href="<?php the_field('auto_care_button_link', 5); ?>">
                        <?php the_field('auto_care_button_text', 5); ?>
                    </a>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>