<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<style type="text/css">
	
	.entry-title{display: none;}
</style>
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
    <section class="banner2" style="background: url(<?php echo get_template_directory_uri(); ?>/images/blogspot_banner.jpg) no-repeat scroll 0 0;">
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
             <li><a href="<?php echo $url[3]; ?>">
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

        <div class="single_post">
            <div class="container">
            <?php 
                            if (has_post_thumbnail() ): 
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
                            endif; 
                            ?>
                <img src="<?php echo $image[0]; ?>">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
        </div>
        <div class="bar">
            <div class="container">
            <?php 
$nepo=get_next_post(); if($nepo) { $nepoid=$nepo->ID;
$next_post_url = get_permalink($nepoid); } else { $next_post_url = '#'; }

$prpo=get_previous_post(); $prpoid=$prpo->ID;
$prev_post_url = get_permalink($prpoid); 
?>
<a class="nxt_page" href="<?php echo $next_post_url; ?>">Next Post <i class="fa fa-caret-right"></i></a>
	<a class="nxt_page back_blog" href="<?php echo $prev_post_url; ?>"><i class="fa fa-caret-left"></i>Previous Post</a> 
	

                <!--a class="nxt_page" href="#">next page <i class="fa fa-caret-right"></i></a>
                <a class="nxt_page back_blog" href="#"><i class="fa fa-caret-left"></i>BLOG LIST</a-->
            </div>
        </div>
        <div class="comment_section">
            <div class="container">
                <?php 

// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
?>
            </div>
        </div>
    </section>


<?php endwhile; ?>

		<?php

			// Include the single post content template.
			//get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			//if ( comments_open() || get_comments_number() ) {
			//	comments_template();
			//}

?>

	<?php // get_sidebar( 'content-bottom' ); ?>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
