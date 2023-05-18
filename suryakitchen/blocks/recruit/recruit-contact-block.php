<!--Contact Info Section-->
<section class="career-section mt-20 pb-60">
    <!--Location form Section-->
    <div class="auto-container">
        <div class="row clearfix">
            <!--form Section-->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="title-box mb-30">
                    <h2><?php echo get_field('contact_title') ?></h2>
                </div>
                <div class="default-form text-left">
                    <?php  
                        echo do_shortcode( '[contact-form-7 id="300" title="Recruitment Block"]' );
                    ?>
                </div>
            </div>

            <!--form image Section-->
            <div class="col-lg-6 col-md-12 col-sm-12">
                <?php 
                    $thumbnail_image=get_field('contact_thumbnail_image');
                    if(!empty($thumbnail_image)):
                ?>
                <img src="<?php  echo $thumbnail_image['url'] ?>" alt="Contact Thumbnail Image">
                <?php  
                    endif;
                ?>
            </div>
        </div>
    </div>
</section>