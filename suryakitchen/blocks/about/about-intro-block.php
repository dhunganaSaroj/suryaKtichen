<!--About Section-->
<section class="about-section">
    <div class="left-bg"><img src="images/background/bg-10.png" alt="" title=""></div>
    <div class="right-bg"><img src="images/background/bg-11.png" alt="" title=""></div>
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?php the_field('title') ?></span></div>
            <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" title="Pattern Image"></div>
            <h4>
                <?php 
                    the_field('content')
                ?>
            </h4>
        </div>
    </div>
</section>