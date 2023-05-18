<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package suryaKitchen
 */

?>
 		<!--Main Footer-->
 		<footer class="main-footer">
            <div class="image-layer" style="background-image: url(<?php echo get_site_url() ?>'/wp-content/uploads/2023/04/footer-bg-scaled.jpg');"></div>
            <div class="upper-section">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Footer Col-->
                        <div class="footer-col info-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="content">
                                    <div class="logo">
                                        <?php  
                                            $restro_one=get_field('restaurant_one','option');
                                            $restro_two=get_field('restaurant_two','option');
                                        ?>
                                        <a href="<?php echo get_site_url() ?>" title="<?php echo $restro_one['logo']['name'] ?>">
										<img
                                        src="<?php echo $restro_one['logo']['url'] ?>" alt="<?php echo $restro_one['logo']['alt'] ?>" title="<?php echo $restro_one['logo']['name'] ?>">
									</a>
                                    </div>
                                    <div class="info mb-20">
                                        <ul>
                                            <li><?php echo $restro_one['name'] ?></li>
                                            <li><?php echo $restro_one['sequence_number'] ?></li>
                                            <li><?php echo $restro_one['address'] ?></li>
                                            <li><a href="mailto:<?php echo $restro_one['email_address'] ?>"><?php echo $restro_one['email_address'] ?></a></li>
                                            <li>TEL:<a href="tel:<?php echo $restro_one['contact_number']  ?>"> <?php echo $restro_one['contact_number']  ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="logo">
                                    <a href="<?php echo get_site_url() ?>" title="<?php echo $restro_two['logo']['name'] ?>">
										<img
                                        src="<?php echo $restro_two['logo']['url'] ?>" alt="<?php echo $restro_two['logo']['alt'] ?>" title="<?php echo $restro_two['logo']['name'] ?>"></a>
                                            </div>
                                    <div class="info">
                                        <ul>
                                            <li><?php echo $restro_two['name'] ?></li>
                                            <li><?php echo $restro_two['sequence_number'] ?></li>
                                            <li><?php echo $restro_two['address'] ?></li>
                                            <li><a href="mailto:<?php echo $restro_two['email_address'] ?>"><?php echo $restro_two['email_address'] ?></a></li>
                                            <li>TEL:<a href="tel:<?php echo $restro_two['contact_number']  ?>"> <?php echo $restro_two['contact_number']  ?></a></li>
                                        </ul>
                                    </div>
                                    <div class="separator"><span></span><span></span><span></span></div>
                                    <div class="newsletter">
                                        <h3><?php echo get_field('subscribe_section_title','option') ?></h3>
                                        <div class="text">
                                            <?php 
                                                echo get_field('subscribe_section_subtitle','option')
                                            ?>
                                        </div>
                                        <div class="newsletter-form">
                                            <?php 
                                                echo do_shortcode( '[contact-form-7 id="191" title="Newsletter"]' );
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Footer Col-->
                        <div class="footer-col links-col col-lg-3 col-md-6 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <?php  
                                    wp_nav_menu(
                                        array(
                                            'location'          =>"footer-menu",
                                        'container'         =>false,
                                        'menu_class'        =>'links',
                                        )
                                    )
                                ?>
                                <!-- <ul class="links">
                                    <li><a href="top.html">Top</a></li>
                                    <li><a href="concept.html">Concept</a></li>
                                    <li><a href="menu.html">Menus</a></li>
                                    <li><a href="shop-info.html">Shop Info</a></li>
                                    <li><a href="recruit.html">Recruit</a></li>
                                </ul> -->
                            </div>
                        </div>
                        <!--Footer Col-->
                        <div class="footer-col links-col last col-lg-3 col-md-6 col-sm-12">
                            <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <?php  
                                    $social_medias=get_field('social_medias','option');
                                    if(!empty($social_medias)):
                                ?>
                                <ul class="links">
                                    <?php 
                                        foreach($social_medias as $media):
                                    ?>
                                    <li><a href="<?php echo $media['url'] ?>" target="_blank"><?php echo $media['name'] ?></a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php 
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="copyright">&copy; 2023 Soup Curry & Nepalese (CurrySurya/Pokhara dining). All Rights
                        Reserved | Developed by <a href="#" target="blank">Smart Tech</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!--End pagewrapper-->

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>
	<?php wp_footer() ?>
</body>

</html>