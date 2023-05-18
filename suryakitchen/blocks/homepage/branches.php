<!--Branches Section-->
<section class="branches-section special-offer  orange-bg">
    <div class="outer-container">
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span><?php echo get_field('tag') ?></span></div>
                <div class="pattern-image"><img src="<?php echo get_site_url() ?>/wp-content/uploads/2023/03/separator.svg" alt="Pattern Image"></div>
                <h2><?php echo get_field('title') ?></h2>
            </div>
            <?php 
                    $terms = get_terms( array(
                        'taxonomy' => 'super-branches',
                        'hide_empty' => false,
                    ) );
                    
                    
                    if(!empty($terms)):
                ?>
            <div class="tabs-box menu-tabs">
                <div class="buttons">
                    <ul class="tab-buttons clearfix">
                        <?php 
                            $tax_count=1;
                            $active="active-btn";
                            foreach($terms as $term):
                                if($tax_count>1):
                                    $active=" ";
                                endif;
                        ?>
                        <li class="tab-btn <?php echo $active ?>" data-tab="#branches-tab-<?php echo $tax_count ?>">
                                <?php  
                                    $super_branch_image=get_field('thumbnail', $term->taxonomy . '_' . $term->term_id);
                                    if(!empty($super_branch_image)):
                                ?>
                            <span>
                                <img src="<?php echo $super_branch_image['url'] ?>" alt="<?php echo $super_branch_image['alt'] ?>">
                            </span>
                            <?php endif; ?>
                        </li>
                        <?php 
                            $tax_count++;endforeach
                        ?>
                    </ul>
                </div>
                <div class="tabs-content">
                    <?php  
                        $tax_counter=1;
                        $active_tab="active-tab";
                        foreach($terms as $term):
                            if($tax_counter>1):
                                $active_tab=" ";
                            endif;
                    ?>
                    <!--Tab-->
                    <div class="tab <?php echo $active_tab ?>" id="branches-tab-<?php echo $tax_counter ?>">
                        <div class="dish-gallery-slider owl-theme owl-carousel">
                                <?php  
                                    $args=array(
                                        'post_type'         =>'branches',
                                        'post_status'       =>'publish',
                                        'posts_per_page'    =>8,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'super-branches',
                                                'field' => 'slug', // Can also use 'id' or 'name'
                                                'terms' =>$term->name,
                                            ),
                                        )
                                    );
                                    $margin_count=1;
                                    $margin_class=" ";
                                    $query=new WP_Query($args);
                                    while($query->have_posts()):
                                        $query->the_post();
                                    if($margin_count%2==0){
                                        $margin_class=" ";
                                    }else{
                                        $margin_class="margin-top";
                                    }
                                ?>
                                <!--Slide Item-->
                                <div class="offer-block-two <?php echo $margin_class ?>">
                                    <div class="inner-box">
                                        <div class="image">
                                            <?php 
                                                the_post_thumbnail(  );
                                            ?>
                                        </div>
                                        <h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
                                    </div>
                                </div>
                                <?php  
                                    $margin_count++;endwhile;
                                ?>

                            </div>
                    </div>
                    <?php 
                      $tax_counter++; endforeach;
                    ?>
                </div>
                
            </div>
            <?php endif; ?>
            <div class="lower-link-box text-center">
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