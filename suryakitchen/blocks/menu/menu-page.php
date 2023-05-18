
       <?php  
             $terms = get_terms( array(
                'taxonomy' => 'menu-category',
                'hide_empty' => false,
            ) );
            if(!empty($terms)):
                foreach($terms as $term):
       ?>
       <!--Menu Section 1-->
        <section class="menu-two">
            <div class="right-bg"><img src="images/background/bg-19.png" alt="" title=""></div>
            <div class="auto-container">
                <div class="title-box centered">
                    <?php  
                        $subtitle=get_field('subtitle', $term->taxonomy . '_' . $term->term_id);
                        if(!empty($subtitle)):
                    ?>
                    <div class="subtitle"><span><?php echo $subtitle ?></span></div>
                    <?php endif; ?>
                    <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image" title="Pattern Image"></div>
                    <h2><?php echo $term->name ?></h2>
                </div>
                <div class="row clearfix">
                <?php
                            $args = array(
                                'post_type' => 'menu',
                                'tax_query' => array(
                                array(
                                    'taxonomy' => 'menu-category',
                                    'field' => 'slug', // Can also use 'id' or 'name'
                                    'terms' =>$term->name,
                                ),
                                ),
                            );
                            
                            $query = new WP_Query( $args );
                            
                            // Check if any posts were found
                            if ( $query->have_posts() ) {
                                // Loop through each post and output its title and content
                                while ( $query->have_posts() ) {
                                $query->the_post();
                                $post_id=get_the_ID();
                        ?>
                        <div class="menu-col col-lg-6 col-md-12 col-sm-12">
                            <div class="inner">
                                
                                <!--Block-->
                                <div class="dish-block">
                                    <div class="inner-box">

                                        <div class="dish-image">
                                            <?php  
                                                the_post_thumbnail(  );
                                            ?>
                                        </div>
                                        <div class="title clearfix">
                                            <div class="ttl clearfix">
                                                <h5><?php echo get_the_title()  ?>
                                                <?php  
                                                        $badge=get_field('badge',$post_id);
                                                        if(!empty($badge)):
                                                    ?>
                                                 <span class="s-info"><?php echo $badge ?></span>
                                                 <?php
                                                    endif;
                                                 ?>
                                                </h5>
                                            </div>
                                            <div class="price"><span>Rs <?php echo get_field('price',get_the_ID())  ?></span></div>
                                        </div>
                                        <div class="text desc">
                                            <?php  
                                                the_content();
                                            ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <?php 
                                }
                                // Restore original post data
                                wp_reset_postdata();
                            } else {
                                echo 'No posts found';
                            }
                        ?>
                </div>
            </div>
        </section>
       <?php 
        endforeach;
        endif;
       ?>