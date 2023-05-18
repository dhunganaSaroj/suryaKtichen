<!--Fluid Section-->
<section class="concept-section fluid-section">
    <div class="title-box centered mb-40">
        <div class="subtitle"><span><?php  the_field('tag') ?></span></div>
        <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" title="Pattern Image"></div>
        <h2><?php the_field('title') ?></h2>
    </div>
    <div class="outer-container">
        <?php  
                $why_us_content=get_field('why_choose_us_content');
                if(!empty($why_us_content)):
                    $count=1;
                    foreach($why_us_content as $content):
                        if($count%2==0){
            ?>
        <div class="row clearfix">
            <?php 
                if(!empty($content['image'])):
            ?>
            <!--Col-->
            <div class="image-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    
                    <div class="image-layer" style="background-image: url(<?php echo $content['image']['url'] ?>);">
                    </div>
                    <div class="image"><img src="<?php echo $content['image']['url'] ?>" alt="<?php echo $content['image']['alt'] ?>"></div>
                </div>
            </div>
            <?php 
                endif;
            ?>
            <!--Col-->
            <div class="content-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="left-bg"><img src="images/background/bg-12.png" alt="" title=""></div>
                <div class="inner clearfix wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="content-box">
                        <div class="title-box centered">
                            <div class="subtitle"><span><?php echo $content['tag'] ?></span></div>
                            <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" title="Pattern Image">
                            </div>
                            <h3><?php echo $content['title'] ?></h3>
                            <div class="text">
                                <?php  
                                    echo $content['content']
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php  
                        }else{
        ?>
        <div class="row clearfix">
            <!--Col-->
            <div class="image-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    
                    <div class="image-layer" style="background-image: url(<?php echo $content['image']['url'] ?>);">
                    </div>
                    <div class="image"><img src="<?php echo $content['image']['url'] ?>" alt="<?php echo $content['image']['alt'] ?>"></div>
                </div>
            </div>
            <!--Col-->
            <div class="content-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="left-bg"><img src="images/background/bg-13.png" alt="" title=""></div>
                <div class="inner clearfix wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="content-box">
                        <div class="title-box centered">
                            <div class="subtitle"><span>Concept</span></div>
                            <div class="pattern-image"><img src="images/icons/separator.svg" alt="" title="">
                            </div>
                            <h3>Variety of spices directly imported from India</h3>
                            <div class="text">You can enjoy a luxurious curry by using plenty of spices directly
                                imported from India such as turmeric, cumin, garam masala.</div>
                        </div>
                        <figure class="flex">
                            <img
                                src="http://pokhara-dining.com/wp-content/themes/surya/img/consept/sec02_01_img.jpg">
                            <img
                                src="http://pokhara-dining.com/wp-content/themes/surya/img/consept/sec02_02_img.jpg">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <?php }; $count++; endforeach;endif; ?>
    </div>
</section>