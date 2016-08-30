<?php 
/*
Template Name: Showroom
*/
?>

    <?php get_header(); ?>

        <section class="showroom_explore">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5">
                        <div class="heading_about">
                            <h3><?php the_field('explore'); ?></h3>
                            <h2><?php the_field('our_vehicles'); ?></h2>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-7">
                        <div class="explore_info">
                            <div class="left_area">
                                <?php the_field('left_area_content'); ?>
                            </div>
                            <div class="right_area">
                                <?php the_field('right_area_content'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="tab_structure">
            <div class="container">
                <div class="all_tabs">
                    <!-- Nav tabs -->

                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a href="#all" aria-controls="home" role="tab" data-toggle="tab">all</a></li>
                        <?php
                            $args = array( 'taxonomy' => 'vehicles_category', 'hide_empty'=>0 );
                            $terms = get_terms('vehicles_category', $args);
                            //print_r($args);
                            //print_r($terms);

                            foreach ($terms as $term) 
                                {
                                ?>
                            <li role="presentation">
                                <a href="#<?php echo $term->slug; ?>" role="tab" data-toggle="tab"><?php echo $term->name; ?></a>
                            </li>
                            <?php } ?>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="all">

                            <?php
                    $args = array( 'posts_per_page' => -1, 'order' => '', 'post_type' => 'vehicles', 'post_status' => 'publish');
                    $my_query = null;
                    $my_query = new WP_Query($args); 

                    if( $my_query->have_posts() ) {
                        
                        while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <div class="car_img">
                                    <?php 
                            if (has_post_thumbnail() ): 
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                            endif; 
                            ?>
                                        <h4><?php the_title(); ?></h4>
                                        <img src="<?php echo $image[0]; ?>">
                                </div>
                                <input type="hidden" value="<?php echo get_the_ID(); ?>" class="post_id">

                                <?php 
                        endwhile;
                    }
                    wp_reset_query();  // Restore global post data stomped by the_post().
                    ?>

                        </div>


                        <?php  
            $args = array( 'taxonomy' => 'vehicles_category');
            $terms = get_categories($args);
       
            foreach ($terms as $term) 
                { ?>
                            <div role="tabpanel" class="tab-pane" id="<?php echo $term->slug; ?>">
                                <?php $args1 = array(
                            'posts_per_page' => -1, // max number of post per category
                            'vehicles_category' => $term->slug,
                            'post_type' => 'vehicles'
                            );
                            $query = new WP_Query($args1);

                    if ( have_posts() ) :
                        while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="car_img">
                                        <h4><?php the_title(); ?></h4>
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php 
                                if (has_post_thumbnail() ): 
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                                endif; 
                                ?>
                                                <?php endif; ?>
                                                    <img src="<?php echo $image[0]; ?>">
                                    </div>

                                    <?php 
                        endwhile;
                    endif;
                    wp_reset_query();
                          ?>
                            </div>
                            <?php 
                } ?>


                    </div>
                </div>
            </div>
            <!-- popup start -->
            <div class="popup_window_slider">

            </div>
            <!-- popup end -->
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
            <h2><?php the_field('auto_care', 11); ?></h2>
            <div class="autocare">
                <img class="point floating" id="object" src="<?php echo get_template_directory_uri(); ?>/images/point_arrow.png">
                <div class="text_caption">
                    <p>
                        <?php the_field('auto_care_text', 11); ?>
                    </p>
                    <a href="<?php the_field('auto_care_button_link', 11); ?>">
                        <?php the_field('auto_care_button_text', 11); ?>
                    </a>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>