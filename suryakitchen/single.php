<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package suryaKitchen
 */

get_header();
while(have_posts()):
	the_post();
?>
		<!-- Inner Banner Section -->
        <section class="inner-banner">
			<?php 
				$thumbnail_image=get_field('banner_image'); 
				//$image_url=$thumbnail_image['url'];
				$image_url=empty($thumbnail_image) ? $thumbnail_image['url'] :get_the_post_thumbnail_url(get_the_ID());
				if(empty($image_url)):
					$default_image=get_field('default_banner_image','option');
					$image_url=$default_image['url'];
				endif;
			?>
            <div class="image-layer" style="background-image: url(<?php echo $image_url ?>);"></div>
            <div class="auto-container">
                <div class="inner">
                    <div class="subtitle"><span><?php echo get_field('subtitle') ?></span></div>
                    <div class="pattern-image">
						<img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" >
					</div>
                    <h1><span><?php the_title() ?></span></h1>
                </div>
            </div>
        </section>
        <!--End Banner Section -->

		<!--Recnt Updates Section-->
		<section class="news-section news-detail-page">
            <div class="auto-container">
                <div class="row justify-content-center clearfix">
                    <div class="news-block col-lg-12 col-md-12 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="300ms">
                            <div class="image-box">
                                <div class="image">
									<?php  
										if(has_post_thumbnail()):
											the_post_thumbnail( );
										endif;
									?>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title-box mb-20">
                    <div class="cat"><?php echo get_the_author() ?></div>
                    <h2>
						<?php the_title() ?>
                    </h2>
                    <div class="date"><span><?php echo get_the_date() ?></span></div>
                </div>
                <div class="brief-decription">
                    <?php  
						the_content();
					?>
                </div>
            </div>
        </section>
<?php
	endwhile;
//get_sidebar();
get_footer();
