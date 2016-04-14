<div class="services">
    <div class="container">
        <div class="row">
            <?php
            // wp query arguments to get posts from post type services,
            // display all,
            // order from old to new.
            $args = array(
                'post_type' => 'services',
                'posts_per_page' => -1,
                'order' => 'asc'
            );
            $services = new WP_Query($args); ?>

            <div class="col-md-12 col-sm-12 col-xs-12">

                <?php
                // The services post loop
                if ($services->have_posts()):

                    // function to get all posts and count the number of posts.
                    while ($services->have_posts()):

                        // get all posts belonging to the wp query.
                        $services->the_post();

                        // Check if the post has a Post Thumbnail assigned to it.
                        if (has_post_thumbnail()) :
                            $urlImg = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID() ) );
                        endif;

                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 service">
                            <a href="<?php echo get_page_link(57) ?>" rel="bookmark">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                    <div class="serviceimg" style="background-image: url('<?php echo $urlImg ?>')">
                                        <h2 class="entry-title"><?php the_title(); ?></h2>
                                    </div>
                                </article>
                            </a>
                        </div>
                        <?php

                    endwhile;

                endif;
                wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</div>