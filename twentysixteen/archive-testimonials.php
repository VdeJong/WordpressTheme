<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="testimonial-wrap">

            <!-- client thumbnail image -->
            <?php the_post_thumbnail('thumbnail', array('class' => 'client-photo')); ?>

            <!-- testimonial -->
            <div class="post-excerpt">
                <?php the_content(); ?>
            </div>

            <!-- client name -->
            <?php $client_name = get_post_meta(get_the_ID(), 'client_name', true);
            if (!empty($client_name)):
                ?>
                <div class="client_name">
                    <?php echo $client_name; ?>
                </div>
            <?php endif; ?>

            <!-- company name -->
            <?php $company = get_post_meta(get_the_ID(), 'company', true);
            if (!empty($company)):
                ?>
                <div class="company">
                    <?php echo $company; ?>
                </div>
            <?php endif; ?>

        </div>
    <?php endwhile; ?>
<?php endif; ?>