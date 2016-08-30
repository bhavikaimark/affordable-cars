<?php

include('../../../../wp-config.php');

global $wpdb;
global $post;

    $post_id = $_POST['post_id'];
$content_post = get_post($post_id);
$content = $content_post->post_content;
//$content = apply_filters('the_content', $content);
//$content = str_replace(']]>', ']]&gt;', $content);
?>
                       
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/flexslider.css" type="text/css" media="screen" />    


					<!-- popup slider start -->
                            <!--div class="popup_window_slider"-->
                            <div class="container">
                                <p class="close_div"><i class="fa fa-times" aria-hidden="true"></i> close</p>
                                <?php 
                                if( has_shortcode( $content, 'gallery' ) ) 
        						{ ?>
	                                <div id="slider" class="flexslider">

	                                    <ul class="slides">
	                                    <?php 
	                                         
	                                        $galleries = get_post_galleries_images( $post_id ); 
	                                        $gal1 = $galleries[0];
	                                              //$gal2 = $galleries[1]; 
	                                        
	                                        foreach ($gal1 as $gal) {
	                                            ?>
	                                            <li>
	                                                <img src="<?php echo $gal; ?>">
	                                            </li>
	                                                
	                                            <?php 
	                                            } 
	                                    
                                            ?>
	                                    
	                                    </ul>
	                                </div>
                                <?php 
                                } 

                               if( has_shortcode( $content, 'gallery' ) ) 
								{
                                	?>
	                                <div id="carousel" class="flexslider">
	                                    <ul class="slides">
	                                       <?php 
	                                       $galleries = get_post_galleries_images( $post_id ); 
	                                          $gal1 = $galleries[0];
	                                          //$gal2 = $galleries[1]; 
	                                         
	                                          foreach ($gal1 as $gal) {
	                                            ?>
	                                            <li>
	                                                <img src="<?php echo $gal; ?>">
	                                            </li>
	                                                
	                                            <?php 
	                                            } 
	                                           
	                                            ?>
	                                    </ul>
	                                </div>
                                	<?php 
                                } ?>
                                <div class="specification_Section">
                                    <h3>SPECIFICATION</h3>

                                    <ul>
                                        <?php the_field('specification', $post_id); ?>
                                    </ul>
                                </div>
                            </div>
                        <!--/div-->
                            <!-- popup slider end -->
	

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script defer src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexslider.js"></script>
             <script>
        $(window).ready(function () {
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

     <script>
        $(document).ready(function () {
            //$(".car_img").click(function () {
               // $(".popup_window_slider").addClass("show");
            //});
            $(".close_div").click(function () {
                $(".popup_window_slider").removeClass("show");
                $(".popup_window_slider .container").remove();
            });
        });
    </script>
<?php //echo $content;

	//echo "done";

?>