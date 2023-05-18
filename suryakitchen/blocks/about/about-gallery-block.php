<!--Gallery Section-->
<section class="image-gallery">
    <div class="title-box centered mb-40">
        <div class="subtitle"><span><?php the_field('tag')  ?></span></div>
        <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" title="Pattern Image"></div>
        <h2><?php the_field('title') ?> </h2>
    </div>
    <div class="carousel-box">
        <div class="auto-container">
            <div class="image-gallery-slider owl-theme owl-carousel">
                <?php 
                    $gallery=get_field('gallery');
                    if(!empty($gallery)):
                        foreach($gallery as $item):
                            // print_r($item);
                            // exit;
                ?>
                <!--Slide Item-->
                <div class="gallery-block">
                    <div class="image"><a href="<?php echo $item['url'] ?>" class="lightbox-image"
                            data-fancybox="gallery"><img src="<?php echo $item['url'] ?>" alt="<?php echo $item['alt'] ?>"></a></div>
                </div>
                <?php 
                    endforeach;endif;
                ?>
            </div>
        </div>
    </div>
</section>