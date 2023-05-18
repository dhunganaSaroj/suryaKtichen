<!-- Inner Banner Section -->
<section class="inner-banner">
    <?php  
        $banner_image=get_field('banner_image');
        if(empty($banner_image)){
            $default_image=get_field('default_banner_image','option');
            $banner_image=$default_image;
        }
    ?>
    <div class="image-layer" style="background-image: url(<?php echo $banner_image['url'] ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?php the_field('subtitle') ?></span></div>
            <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" title="Pattern Image"></div>
            <h1><span><?php the_title() ?></span></h1>
        </div>
    </div>
</section>
<!--End Banner Section -->