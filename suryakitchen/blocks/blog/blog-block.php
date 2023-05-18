<!--Recnt Updates Section-->
<section class="news-section">
            <div class="auto-container">
                <div class="row justify-content-center clearfix">
                    <?php 
                        $args=array(
                            'post_status'           =>'publish',
                            'post_type'             =>'post',
                            'posts_per_page'        =>6,
                            'ignore_sticky_posts'   =>1
                        );
                        $blog_query=new WP_Query($args);
                        while($blog_query->have_posts()):
                            $blog_query->the_post();
                    ?>
                    <div class="news-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                            <div class="image-box">
                                <div class="date"><span><?php echo get_the_date() ?></span></div>
                                <div class="image">
                                    <a href="<?php the_permalink() ?>">
                                        <?php  
                                            if(has_post_thumbnail()):
                                                the_post_thumbnail( );
                                            endif;
                                        ?>
                                    </a>
                                </div>
                                <div class="over-content">
                                    <?php  
                                        $category=get_the_category(get_the_ID());
                                        if(!empty($category)):
                                    ?>
                                    <div class="cat">
                                        <?php  
                                            foreach($category as $item):
                                                echo $item->title.',';
                                            endforeach;
                                        ?>
                                    </div>
                                    <?php  
                                        endif;
                                    ?>
                                    <h4><a href="<?php the_permalink() ?>"><?php the_title()  ?></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        endwhile;
                    ?>
                </div>

                <div class="lower-link-box text-center">
                  
                </div>

            </div>
        </section>