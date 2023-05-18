<!--Testimonials Section-->
<section class="testimonials-section">
            <div class="image-layer" style="background-image: url(<?php echo get_site_url() ?>/wp-content/uploads/2023/04/image-2-scaled.jpg);"></div>
            <div class="auto-container">
                <div class="carousel-box">
                    <div class="testi-top owl-theme owl-carousel">
                        <?php 
                            $args=array(
                                'post_type'             =>'testimonials',
                                'post_status'           =>'publish',
                                'post_per_page'         =>5,
                            );
                            $query=new WP_Query($args);
                            while($query->have_posts()):
                                $query->the_post();
                        ?>
                        <div class="slide-item">
                            <div class="slide-content">
                                <div class="quotes">”</div>
                                <div class="text quote-text">
                                    <?php the_content() ?>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endwhile;
                        ?>
                    </div>
                    <div class="separator"><span></span><span></span><span></span></div>
                    <div class="thumbs-carousel-box">
                        <div class="testi-thumbs owl-theme owl-carousel">
                            <?php 
                                while($query->have_posts()):
                                    $query->the_post();
                            ?>
                            <div class="slide-item">
                                <div class="image">
                                    <?php  
                                        if(has_post_thumbnail()):
                                            the_post_thumbnail();
                                        endif;
                                    ?>
                                </div>
                                <div class="auth-title"><?php the_title() ?></div>
                            </div>
                            <?php 
                                endwhile;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>