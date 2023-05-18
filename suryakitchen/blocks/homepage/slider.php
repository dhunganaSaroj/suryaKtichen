<!-- Banner Section -->
    <section class="banner-section">
        <div class="banner-container">
            <div class="banner-slider">
                <div class="swiper-wrapper">
                    <?php 
                        $slider_item=get_field('slider_content');
                        // wp_print($slider_item);
                        // exit;
                            if(!empty($slider_item)):
                                foreach($slider_item as $item):
                    ?>
                    <!--Slide Item-->
                    <div class="swiper-slide slide-item">
                        <?php 
                            if(!empty($item['image'])){
                        ?>
                            <div class="image-layer" style="background-image: url(<?php echo $item['image']['url'] ?>);">
                            </div>
                        <?php
                            }
                        ?>
                       
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <div class="subtitle"><span><?php echo $item['tag'] ?></span></div>
                                            <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image"
                                                    title=""></div>
                                            <h1><span><?php echo $item['title'] ?></span></h1>
                                            <div class="text">
                                                <?php echo $item['content'] ?>
                                            </div>
                                            <div class="links-box wow fadeInUp" data-wow-delay="0ms"
                                                data-wow-duration="1500ms">
                                                <div class="link">
                                                    <a href="<?php echo $item['button_url'] ?>"
                                                        class="theme-btn btn-style-one clearfix">
                                                        <span class="btn-wrap">
                                                            <span class="text-one"><?php echo $item['button_text'] ?></span>
                                                            <span class="text-two"><?php echo $item['button_text'] ?></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  
                        endforeach;
                        endif;
                    ?>
                </div>
                <div class="swiper-button-prev"><span class="fal fa-angle-left"></span></div>
                <div class="swiper-button-next"><span class="fal fa-angle-right"></span></div>
            </div>
        </div>
    </section>
<!--End Banner Section -->