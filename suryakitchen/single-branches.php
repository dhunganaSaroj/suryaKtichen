<?php
/**
 * @package Single Branches  Page Template
 */
    get_header();
?>
        <!-- Banner Section -->
        <section class="banner-section">
            <div class="banner-container">
                <div class="banner-slider">
                    <?php 
                        $branches_images=get_field('branches_image');
                        if(!empty($branches_images)):
                    ?>
                    <div class="swiper-wrapper">
                        <?php 
                            foreach($branches_images as $images):
                                $image=$images['image'];
                        ?>
                        <!--Slide Item-->
                        <div class="swiper-slide slide-item">
                            <div class="image-layer"
                                style="background-image: url(<?php echo $image['url'] ?>);">
                            </div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        <div class="clearfix">
                                            <div class="inner">
                                                <!-- <h1><span>Flavors Inspired by <br>the Seasons</span></h1> -->
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endforeach;
                        ?>
                    </div>
                    <div class="swiper-button-prev"><span class="fal fa-angle-left"></span></div>
                    <div class="swiper-button-next"><span class="fal fa-angle-right"></span></div>
                    <?php  
                        endif;
                    ?>
                </div>
            </div>
        </section>
        <!--End Banner Section -->
        <!--About Section-->
        <section class="home-about-section about-section">
            <div class="left-bg"><img src="images/background/bg-10.png" alt="" title=""></div>
            <div class="right-bg"><img src="images/background/bg-11.png" alt="" title=""></div>
            <div class="auto-container">
                <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="title-box centered">
                        <h2><?php the_title() ?></h2>
                        <?php 
                            $address=get_field('address'); 
                            if(!empty($address)):
                        ?>
                        <p><span class="fa fa-map-marker-alt"></span><?php echo $address ?> </p>
                        <?php 
                            endif;
                            $phone_number=get_field('phone_number');
                            if(!empty($phone_number)):
                        ?>
                        <p><span class="fa fa-phone"></span> <a href="tel:<?php echo $phone_number ?>"><?php echo $phone_number ?></a></p>
                        <?php 
                            endif;
                        ?>
                        <div class="text mb-40">
                            <?php 
                                echo get_field('description');
                            ?>
                        </div>

                        <div class="open-timing">
                            <?php 
                                $opening_hour=get_field('opening_hours');
                                // var_dump($opening_hour);
                                // exit;
                                if(!empty($opening_hour)):
                            ?>
                            <div class="hours">Opening Hours: <span class="theme_color"><?php echo $opening_hour ?>
                            <?php  
                                endif;
                                $holiday=get_field('holiday');
                                if(!empty($holiday)):
                            ?>
                                </span> <br> Holiday: <span class="theme_color"><?php echo $holiday ?></span>
                            <?php endif; ?>
                            </div>
                        </div>
                        <p class="mt-40"><?php echo get_field('note') ?></p>
                    </div>
                </div>
            </div>
        </section>
        <!--Menu Section-->

       <?php  
        echo get_field('google_map_one');
       ?>

     <!--Menu Section-->
    <section class="menu-section">
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span>Special selection</span></div>
                <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern SVG"></div>
                <h2> Delicious Menu </h2>
            </div>
            
            <div class="tabs-box menu-tabs">
                <div class="buttons">
                    <?php 
                        $terms = get_terms( array(
                            'taxonomy' => 'menu-category',
                            'hide_empty' => false,
                        ) );
                        if(!empty($terms)):
                    ?>
                    <ul class="tab-buttons clearfix">
                        <?php 
                            $count=1;
                            $active="active-btn"; 
                            foreach($terms as $term):
                            if($count>1){
                                $active=" ";
                            }

                        ?>
                        <li class="tab-btn <?php echo $active ?>" data-tab="#tab-<?php echo $count ?>"><span><?php echo $term->name ?></span></li>
                        <?php $count++;endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="tabs-content">
                    <?php
                        $count_tab=1;
                        $active_tab="active-tab"; 
                        foreach($terms as $term):
                            if( $count_tab > 1 ){
                                $active_tab=" ";
                            }  
                    ?>
                    <!--Tab-->
                    <div class="tab <?php echo $active_tab ?>" id="tab-<?php echo $count_tab ?>">
                        <div class="row clearfix">
                            <?php
                                $args = array(
                                    'post_type' => 'menu',
                                    'tax_query' => array(
                                    array(
                                        'taxonomy' => 'menu-category',
                                        'field' => 'slug', // Can also use 'id' or 'name'
                                        'terms' =>$term->name,
                                    ),
                                    ),
                                );
                                
                                $query = new WP_Query( $args );
                                
                                // Check if any posts were found
                                if ( $query->have_posts() ) {
                                    // Loop through each post and output its title and content
                                    while ( $query->have_posts() ) {
                                    $query->the_post();
                                    $post_id=get_the_ID();
                            ?>
                            <div class="menu-col col-lg-6 col-md-12 col-sm-12">
                                <div class="inner">
                                    
                                    <!--Block-->
                                    <div class="dish-block">
                                        <div class="inner-box">

                                            <div class="dish-image">
                                                <?php  
                                                    the_post_thumbnail(  );
                                                ?>
                                            </div>
                                            <div class="title clearfix">
                                                <div class="ttl clearfix">
                                                    <h5><?php echo get_the_title()  ?>
                                                        <?php  
                                                            $badge=get_field('badge',$post_id);
                                                            if(!empty($badge)):
                                                        ?>
                                                    <span class="s-info"><?php echo $badge ?></span>
                                                    <?php
                                                        endif;
                                                    ?>
                                                    </h5>
                                                </div>
                                                <div class="price"><span>Rs <?php echo get_field('price',$post_id)  ?></span></div>
                                            </div>
                                            <div class="text desc">
                                                <?php  
                                                    the_content();
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <?php 
                                    }
                                    // Restore original post data
                                    wp_reset_postdata();
                                } else {
                                    echo 'No posts found';
                                }
                            ?>
                        </div>
                    </div>
                    <?php $count_tab++;endforeach ?>
                </div>
            </div>

        </div>
    </section>

        <?php echo get_field('google_map_two') ?>
<?php 
    get_footer();
?>
