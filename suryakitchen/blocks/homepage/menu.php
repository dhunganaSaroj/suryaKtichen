<!--Menu Section-->
<section class="menu-section">
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?php echo get_field('tag') ?></span></div>
            <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern SVG"></div>
            <h2><?php echo get_field('title') ?></h2>
        </div>
        
        <div class="tabs-box menu-tabs">
            <div class="buttons">
                <?php 
                    $terms = get_terms( array(
                        'taxonomy' => 'menu-category',
                        'hide_empty' => false,
                    ) );
                    if(!empty($terms)):
                ?>
                <ul class="tab-buttons clearfix">
                    <?php 
                        $count=1;
                        $active="active-btn"; 
                        foreach($terms as $term):
                        if($count>1){
                            $active=" ";
                        }

                    ?>
                    <li class="tab-btn <?php echo $active ?>" data-tab="#tab-<?php echo $count ?>"><span><?php echo $term->name ?></span></li>
                    <?php $count++;endforeach; ?>
                </ul>
                <?php endif; ?>
            </div>
            <div class="tabs-content">
                <?php
                    $count_tab=1;
                    $active_tab="active-tab"; 
                    foreach($terms as $term):
                        if( $count_tab > 1 ){
                            $active_tab=" ";
                        }  
                ?>
                <!--Tab-->
                <div class="tab <?php echo $active_tab ?>" id="tab-<?php echo $count_tab ?>">
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
                                            <div class="price"><span>Rs <?php echo get_field('price',$post_id)  ?></span></div>
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
                <?php $count_tab++;endforeach ?>
            </div>
        </div>

        <div class="open-timing">
            <div class="hours">
                <?php 
                    echo get_field('opening_hours')
                ?>
            </div>
            <div class="link-box">
                <a href="<?php echo get_field('button_url') ?>" class="theme-btn btn-style-two clearfix">
                    <span class="btn-wrap">
                        <span class="text-one"><?php echo get_field('button_text') ?></span>
                        <span class="text-two"><?php echo get_field('button_text') ?></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>