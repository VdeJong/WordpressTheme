<div class="homeservices padding">
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
            $services = new WP_Query($args);

                // The services post loop
                if ($services->have_posts()):

                    // set counter to 0.
                    $count = 0;
                    ?>

                    <div class="col-md-12">
                        <div class="page-header">
                            <h1 style="font-size: 70px;">Diensten <br><small>Dit hebben wij te bieden.</small></h1>
                        </div>
                    </div>

                    <?php

                    // function to get all posts and count the number of posts.
                    while ($services->have_posts()):

                        // get all posts belonging to the wp query.
                        $services->the_post();

                        $count++;

                        // check if count is even or odd, to add a text-right of text-left class
                        if ($count&1):
                            $background = '';
                        else :
                            $background = 'background';
                        endif; ?>

                        <div class="col-md-4 col-sm-6 col-xs-12 service <?php echo $background ?>">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <?php
                                    // Check if the post has a Post Thumbnail assigned to it.
                                    if (has_post_thumbnail()) :
                                        // size of the thumbnail image
                                        the_post_thumbnail(array(70, 70));
                                    endif;
                                    ?>
                                    <h2 class="entry-title"><?php the_title(); ?></h2>
                                    <?php the_content();?>
                                </div>
                            </article>
                        </div>
                        <?php

                    endwhile;

                endif;
                wp_reset_postdata();
                ?>
        </div>
    </div>
</div>