<!--Special Offer Section-->
<section class="special-offer-two">
    <div class="left-bg"><img src="images/background/bg-20.png" alt="" title=""></div>
    <div class="right-bg"><img src="images/background/bg-19.png" alt="" title=""></div>
    <div class="auto-container">
        <div class="row clearfix">
            <?php  
                $args=array(
                    'posts_per_page'        =>-1,
                    'post_status'           =>'publish',
                    'post_type'             =>'branches',
                );
                // print_r($args);
                // exit;
                $branch_query=new WP_Query($args);
                while($branch_query->have_posts()):
                    $branch_query->the_post();

                // print_r($branch_query);
                // exit;

            ?>
            <!--Item-->
            <div class="offer-block-three col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="image">
                        <?php 
                            if(has_post_thumbnail()):
                                the_post_thumbnail();
                            endif;
                        ?>
                    </div>
                    <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                </div>
            </div>
            <?php endwhile;  ?>
        </div>
    </div>
</section>