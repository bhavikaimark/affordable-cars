<?php 
/*
Template Name: About Us Template
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
        <section class="abous_us_details">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="heading_about">
                            <h3>What makes us </h3>
                            <h2>who we are</h2>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <div class="row">
                            <div class="col-md-7 col-sm-12">
                                <div class="m_plus_v">
                                    <div class="mission">
                                        <?php the_field('our_mission'); ?>
                                    </div>
                                    <div class="vision">
                                        <?php the_field('our_vision'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="core_values">
                                    <?php the_field('our_values'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="about_our_service">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <?php 
                    if (have_posts()) :
                       while (have_posts()) :
                          the_post();
                             the_content();
                       endwhile;
                    endif;
                    ?>
                    </div>
                    <div class="col-md-7 col-sm-12">
                        <div class="right_image_section">
                            <div class="" id="revealAnim">
                                <img class="front" src="<?php the_field('side_image_1'); ?>">
                                <img class="side" src="<?php the_field('side_image_2'); ?>">
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
            <h2><?php the_field('auto_care', 7); ?></h2>
            <div class="autocare">
                <img class="point floating" id="object" src="<?php echo get_template_directory_uri(); ?>/images/point_arrow.png">
                <div class="text_caption">
                    <p>
                        <?php the_field('auto_care_text', 7); ?>
                    </p>
                    <a href="<?php the_field('auto_care_button_link', 7); ?>">
                        <?php the_field('auto_care_button_text', 7); ?>
                    </a>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>