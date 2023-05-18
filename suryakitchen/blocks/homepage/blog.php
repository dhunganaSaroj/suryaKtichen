<!--Recnt Updates Section-->
<section class="news-section">
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?php echo get_field('tag') ?></span></div>
            <div class="pattern-image">
                <img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image">
            </div>
            <h2><?php echo get_field('title') ?></h2>
        </div>
        <div class="row justify-content-center clearfix">
            <?php  
                $args=array(
                    'posts_per_page'            =>3,
                    'post_status'               =>'publish',
                    'post_type'                 =>'post',
                    'ignore_sticky_posts'       =>1,
                );
                $query=new WP_Query($args);
                while($query->have_posts()):
                    $query->the_post();
            ?>
            <div class="news-block col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="image-box">
                        <div class="date"><span><?php echo get_the_date(); ?></span></div>
                        <div class="image">
                            <?php  
                                if(has_post_thumbnail()):
                                    the_post_thumbnail();
                                endif;
                            ?>
                        </div>
                        <div class="over-content">
                            <?php  
                                $category=get_the_category(get_the_ID());
                            ?>
                            <div class="cat">
                                <?php 
                                    if(!empty($category)):
                                        $counter=count($category);
                                        foreach($category as $cat):
                                            echo $cat->name;
                                            if($counter==0):
                                                break;
                                            endif;
                                            $counter--;
                                        endforeach;
                                    endif;
                                ?>
                                Food, flavour
                            </div>
                            <h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>

        <div class="lower-link-box text-center">
            <a href="<?php echo get_field('button_url') ?>" class="theme-btn btn-style-two clearfix">
                <span class="btn-wrap">
                    <span class="text-one"><?php echo get_field('button_text') ?></span>
                    <span class="text-two"><?php echo get_field('button_text') ?></span>
                </span>
            </a>
        </div>

    </div>
</section>