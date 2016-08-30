<?php 
/*
Template Name: Upcoming Vehicle
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
        <section class="preowned_vehicle">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="heading_about">
                            <h3>up-coming </h3>
                            <h2>VEHICLES</h2>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="pre_vehical">
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
        <section class="upcoming_vehicle_showroom">
            <div class="container">
                <h2><?php the_field('upcoming_vehicles'); ?></h2>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="left_part">
                            <div class="img_brdr">
                                <img src="<?php the_field('vehicle_1_image'); ?>">
                            </div>
                            <div class="related_info">
                                <?php the_field('vehicle_1_description'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="right_part">
                            <div class="img_brdr">
                                <img src="<?php the_field('vehicle_2_image'); ?>">
                            </div>
                            <div class="related_info">
                                <?php the_field('vehicle_2_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="our_products">
            <div class="container">
                <ul>
                    <?php 
                query_posts('post_type=brand_logo&showposts=8'); 
                while (have_posts()) : the_post(); ?>
                        <li>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail(); ?>
                                    <?php endif; ?>
                        </li>
                        <?php 
                endwhile; ?>
                </ul>
            </div>
        </section>
        <section class="care">
            <h2><?php the_field('auto_care', 23); ?></h2>
            <div class="autocare">
                <img class="point floating" id="object" src="<?php echo get_template_directory_uri(); ?>/images/point_arrow.png">
                <div class="text_caption">
                    <p>
                        <?php the_field('auto_care_text', 23); ?>
                    </p>
                    <a href="<?php the_field('auto_care_button_link', 23); ?>">
                        <?php the_field('auto_care_button_text', 23); ?>
                    </a>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>