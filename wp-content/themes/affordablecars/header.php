<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/fav_icon.png" type="image/x-icon">
    <?php wp_head(); ?>
    <!-- Bootstrap -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animations.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" media="screen" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body <?php body_class(); ?>>


    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="service_header">
                        <h2>Service Scheduling</h2>
                        <p>Enter your details below and we shall contact you with a date and time for your car servicing</p>
                    </div>
                    
                    <?php echo do_shortcode( '[contact-form-7 id="276" title="Service Scheduling"]' ); ?>
                    
                    <!--a class="mdl_sbmt_btn" href="#">SUBMIT FORM</a-->
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
       <header>
       <?php echo '<!-- aaa ' . basename( get_page_template() ) . ' -->'; ?>
        <div class="container">
            <div class="logo-section">
                <a href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"></a>
            </div>
            <div class="full_nav-section">
                <div class="breadcrumb_bar">
                    <ol class="breadcrumb">
                    <?php //$menu = wp_get_nav_menu_object("breadcrumb-menu" ); 
//print_r($menu);
                    ?>
                        <li id="item1"><a href="<?php echo get_site_url(); ?>">HOME PAGE</a></li>
                        <li id="item2"><a href="coming-soon/">Coming Soon</a></li>
                        <li id="item3"><a href="#">Chat with sales rep</a></li>
                    </ol>
                    <div class="schedule_service">
                        <a href="#" data-toggle="modal" data-target="#myModal">Schedule YOUR CAR For servicing <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="nav_menu">
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary'
                                     ) );
                                ?>
                        <?php endif; ?>
       
                </div>
            </div>
        </div>
    </header>
