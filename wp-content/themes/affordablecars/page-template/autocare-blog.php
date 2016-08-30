<?php 
/*
Template Name: Autocare Blog
*/
?>

    <?php get_header(); ?>

        <section class="banner2" style="background: url(<?php the_field('top_banner_image'); ?>) no-repeat scroll 0 0;">
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
            <div class="banner-txt">
                <div class="container">
                    <h2>AUTOCARE blog</h2>
                    <p><span>MAINTAINING YOUR AUTOMOBILE </span><i class="fa fa-angle-down" aria-hidden="true"></i></p>
                </div>
            </div>
        </section>



        <section class="blogspot">
            <div class="pagination_bar">
                <div class="container">
                    <!-- testing -->

                    <?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$loopb = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 3, 'paged' => $paged ) ); ?>


                        <?php
if($loopb->max_num_pages>1){
     ?>
                            <ul>
                                <?php 
    for($i=1;$i<=$loopb->max_num_pages;$i++){?>
                                    <li <?php echo ($paged==$i)? 'class="active"': '';?> >
                                        <a href="<?php echo '?paged=' . $i; ?>">
                                            <?php echo $i;?>
                                        </a>
                                    </li>
                                    <?php
    }
    ?>
                            </ul>
                            <p>pages</p>
                            <?php 
} 

?>
                </div>
            </div>



            <?php 
$count = 1; $row = ""; $pull = "";
while ( $loopb->have_posts() ) : $loopb->the_post(); ?>
                <?php if ($count % 2 == 0) { $row = "row-2"; $pull = "pull-right"; } else{ $row = "row-1"; $pull = "pull-left"; } ?>
                    <div class="<?php echo $row; ?>">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-5 col-sm-6 <?php echo $pull; ?>">
                                    <div class="img_cover">
                                        <?php if ( has_post_thumbnail() ) : ?>
                                            <?php the_post_thumbnail(); ?>
                                                <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-6">
                                    <div class="basic_info">
                                        <h2><?php the_title(); ?></h2>
                                        <?php the_excerpt(); ?>
                                            <a href="<?php the_permalink(); ?>" class="read_article">READ MORE OF THE ARTICLE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
$count++;
endwhile; ?>

                        <!-- testing -->

        </section>

        <?php get_footer(); ?>