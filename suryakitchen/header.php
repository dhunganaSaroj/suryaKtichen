<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package suryaKitchen
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> -->
    <?php  
        $favicon_image=get_field('favicon_image','option');
        if(!empty($favicon_image)):
    ?>
    <link rel="icon" href="<?php echo $favicon_image['url'] ?>" type="image/x-icon">
    <?php endif; ?>
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="page-wrapper">


        <!-- Main Header-->
        <header class="main-header header-down">
            <div class="header-upper">
                <div class="auto-container">
                    <!-- Main Box -->
                    <div class="main-box d-flex justify-content-between align-items-center flex-wrap">
                        <!-- Links Box -->
                        <div class="links-box clearfix">
                            <!-- Hidden Nav Toggler -->
                            <div class="nav-toggler">
                                <button class="hidden-bar-opener">
                                    <span>Menu</span>
                                    <span class="hamburger">
                                        <span class="top-bun"></span>
                                        <span class="meat"></span>
                                        <span class="bottom-bun"></span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo">
									<?php 
										$restro_one=get_field('restaurant_one','option');
										$restro_two=get_field('restaurant_two','option');
									?>
									<a href="<?php echo get_site_url() ?>" title="<?php echo $restro_two['logo']['name'] ?>">
										<img
                                        src="<?php echo $restro_two['logo']['url'] ?>" alt="<?php echo $restro_two['logo']['alt'] ?>" title="<?php echo $restro_two['logo']['name'] ?>">
									</a>
									<a href="<?php echo get_site_url() ?>" title="<?php echo $restro_one['logo']['name'] ?>">
										<img src="<?php echo $restro_one['logo']['url'] ?>"
                                        alt="<?php echo $restro_one['logo']['alt'] ?>" title="<?php echo $restro_one['logo']['name'] ?>">
									</a>
										
									
							</div>
                        </div>
                        <?php  
                            $contact_text=get_field('header_button_text','option');
                            $contact_url=get_field('header_button_url','option');
                            if(!empty($contact_url)):
                        ?>
                        <div class="link link-btn">
                            <a href="<?php echo $contact_url ?>" class="theme-btn btn-style-one clearfix">
                                <span class="btn-wrap">
                                    <span class="text-one"><?php echo $contact_text ?></span>
                                    <span class="text-two"><?php echo $contact_text ?></span>
                                </span>
                            </a>
                        </div>
                        <?php  
                            endif;
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <!--End Main Header -->

        <!--Menu Backdrop-->
        <div class="menu-backdrop"></div>

        <!-- Hidden Navigation Bar -->
        <section class="hidden-bar">
            <!-- Hidden Bar Wrapper -->
            <div class="inner-box">
                <div class="cross-icon hidden-bar-closer"><span class="far fa-close"></span></div>
                <!--Logo-->
                <div class="logo-box">
                    <div class="logo">
                    <a href="<?php echo get_site_url() ?>" title="<?php echo $restro_one['logo']['name'] ?>">
										<img
                                        src="<?php echo $restro_one['logo']['url'] ?>" alt="<?php echo $restro_one['logo']['alt'] ?>" title="<?php echo $restro_one['logo']['name'] ?>">
                    <a href="<?php echo get_site_url() ?>" title="<?php echo $restro_two['logo']['name'] ?>">
                        <img src="<?php echo $restro_two['logo']['url'] ?>"
                        alt="<?php echo $restro_two['logo']['alt'] ?>" title="<?php echo $restro_two['logo']['name'] ?>">
                    </a>
						</a>
					</div>
                </div>

                <!-- .Side-menu -->
                <div class="side-menu">
                <?php  
                                    wp_nav_menu(
                                        array(
                                            'location'          =>"menu-1",
                                        'container'         =>false,
                                        'menu_class'        =>'navigation clearfix',
                                        )
                                    )
                                ?>
                    
                </div><!-- /.Side-menu -->
                <?php  /*
                <h2>Visit Us</h2>
               
                <ul class="info">
                    <div>
                        <h5 class="mb-20">
                            <?php echo $restro_one['name'] ?>
                        </h5>
                        <div>
                            <p><?php echo $restro_one['sequence_number'] ?> </p>
                            <p><?php echo $restro_one['address'] ?> 
                            </p>
                            <p>TEL:<a href="tel:<?php echo $restro_one['contact_number']  ?>"> <?php echo $restro_one['contact_number']  ?></a></p>
                        </div>
                    </div>
                </ul>
                <div class="separator"><span></span></div>
                <ul class="info">
                    <div>
                        <h5 class="mb-20">
                            <?php echo $restro_two['name'] ?>
                        </h5>
                        <div>
                            <p><?php echo $restro_two['sequence_number'] ?> </p>
                            <p><?php echo $restro_two['address'] ?> 
                            </p>
                            <p>TEL:<a href="tel:<?php echo $restro_two['contact_number']  ?>"> <?php echo $restro_two['contact_number']  ?></a></p>
                        </div>
                    </div>
                </ul>
                <div class="separator"><span></span></div>
                */ ?>
            </div><!-- / Hidden Bar Wrapper -->
        </section>
        <!-- / Hidden Bar -->

        <!--Info Back Drop-->
        <div class="info-back-drop"></div>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    
 </body>
 </html>