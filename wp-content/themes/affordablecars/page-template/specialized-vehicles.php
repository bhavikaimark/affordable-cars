<?php 
/*
Template Name: Specialized vehicle
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
        <section class="preowned_vehicle specialized">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="heading_about">
                            <h3><?php the_field('specialized'); ?></h3>
                            <h2><?php the_field('vehicles'); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
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
        <section class="vehical_details">
            <div class="container">
                <div id="special">
                    <?php
                  $args = array( 'posts_per_page' => -1, 'order' => '', 'post_type' => 'specialized_vehicle', 'post_status' => 'publish');
                  $my_query = null;
                  $my_query = new WP_Query($args);
              
                  if( $my_query->have_posts() ) {
                    //$count = 0;
                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <div class="item">
                            <div class="pre_vehical_box">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <?php the_post_thumbnail(); ?>
                                        <?php endif; ?>
                                            <div class="dtl">
                                                <h2><?php the_title(); ?></h2>
                                                <?php the_content(); ?>
                                            </div>
                                            <a class="cntct_rep" href="#">Interested? Contact Sales Rep</a>
                            </div>
                        </div>
                        <?php 
                    endwhile;
                  }
                  wp_reset_query();  // Restore global post data stomped by the_post().
                ?>



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
            <h2><?php the_field('auto_care', 21); ?></h2>
            <div class="autocare">
                <img class="point floating" id="object" src="<?php echo get_template_directory_uri(); ?>/images/point_arrow.png">
                <div class="text_caption">
                    <p>
                        <?php the_field('auto_care_text', 21); ?>
                    </p>
                    <a href="<?php the_field('auto_care_button_link', 21); ?>">
                        <?php the_field('auto_care_button_text', 21); ?>
                    </a>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>