<!--About Section-->
<section class="home-about-section about-section">
    <!-- <div class="left-bg"><img src="images/background/bg-10.png" alt="" title=""></div>
    <div class="right-bg"><img src="images/background/bg-11.png" alt="" title=""></div> -->
    <div class="auto-container">
        <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
            <div class="title-box centered">
                <div class="subtitle"><span><?php echo get_field('tag') ?></span></div>
                <div class="pattern-image">
                    <img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern">
                </div>
                <h2><?php echo get_field('title') ?></h2>
                <div class="text">
                    <?php  
                        echo get_field('content');
                    ?>
                </div>
                <div class="link-box m-top-20">
                    <a href="<?php echo get_field('button_url') ?>" class="theme-btn btn-style-two clearfix">
                        <span class="btn-wrap">
                            <span class="text-one"><?php echo get_field('button_text') ?></span>
                            <span class="text-two"><?php echo get_field('button_text') ?></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>