<div class="testimonials padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header class="entry-header">
                    <h2 class="entry-title" >Testimonials</h2>
                </header><!-- .entry-header -->

                <?php
                // wp query arguments to get posts from post type testimonials,
                // display maximum 2,
                // order random.
                $args = array(
                    'post_type' => 'testimonials',
                    'posts_per_page' => 2,
                    'orderby' => 'rand'
                );
                $testimonials = new WP_Query($args);

                // The testimonial post loop
                if ($testimonials->have_posts()) :

                    while ($testimonials->have_posts()) :

                        $testimonials->the_post(); ?>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <?php
                                    // get post thumbnail and add class client-photo
                                    the_post_thumbnail('thumbnail', array('class' => 'client-photo'));

                                    // the content
                                    the_content();

                                    // get the client name from metabox data
                                    $client_name = get_post_meta(get_the_ID(), 'client_name', true);
                                    $company = get_post_meta(get_the_ID(), 'company', true);

                                    if (!empty($client_name) && !empty($company)):
                                        ?>
                                        <p class="client">
                                            <?php echo $client_name; ?>
                                        </p>
                                        <p class="company">
                                            <?php echo $company; ?>
                                        </p>
                                        <?php
                                    endif;
                                    ?>
                                </div>
                            </article>
                        </div>

                        <?php
                    endwhile;

                else : ?>
                    <h3>No testimonials found</h3>
                    <?php
                endif;

                wp_reset_postdata();?>
            </div>
        </div>
    </div>
</div>
