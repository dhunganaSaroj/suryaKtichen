<!--End Banner Section -->
<section class="recruit-section">
    <div class="auto-container">
        <div class="row">
            <?php  
                $job_vacancy=get_field('job_vacancy');
                if(!empty($job_vacancy)):
                    foreach($job_vacancy as $item):
            ?>
            <div class="col-md-4">
                <div class="job-card">
                    <h4><?php echo $item['job_title'] ?></h4>
                    <?php 
                    $vacancy_features=$item['vacancy_features']; 
                        if(!empty($vacancy_features)):
                    ?>
                    <ul>
                        <?php
                            foreach($vacancy_features as $vacancy):
                        ?>
                        <li><strong><?php echo $vacancy['title'] ?>:</strong> <?php echo $vacancy['content'] ?></li>
                        <?php  
                            endforeach;
                        ?>
                    </ul>
                    <?php  endif; ?>
                </div>
            </div>
            <?php 
                endforeach;endif;
            ?>
        </div>
        <hr>
        <div class="contact-info-box mt-20">
            <?php 
                $recruitment_contact_details=get_field('recruitment_contact_details');
                if(!empty($recruitment_contact_details)):
            ?>
            <h5 class="mb-10"><strong><?php echo $recruitment_contact_details['title']  ?></strong></h5>
            <?php  
                echo $recruitment_contact_details['content'];
            ?>
            <?php 
                endif;
            ?>
        </div>
        <hr>
    </div>
</section>