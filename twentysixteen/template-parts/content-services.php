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

            $services = new WP_Query($args);

            // The services post loop
            if ($services->have_posts()):

                // set counter to 0.
                $count = 0;

                // function to get all posts and count the number of posts.
                while ($services->have_posts() && $count <= $services->post_count):

                    // get all posts belonging to the wp query.
                    $services->the_post();

                    // count +1 for each time a new post is added.
                    $count++;

                    // check if count is even or odd, to add a text-right of text-left class
                    if ($count&1):
                        $alignright = 'pull-right';
                        else :
                        $alignright = '';
                    endif;
                    ?>

                        <div class="padding col-md-12 col-sm-12 col-xs-12">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="col-md-4 col-sm-6 col-xs-12 <?php echo $alignright ?>">
                                    <?php
                                    // Check if the post has a Post Thumbnail assigned to it.
                                    if (has_post_thumbnail())
                                    {
                                        the_post_thumbnail('medium');
                                    }
                                    ?>
                                </div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    <header class="entry-header">
                                        <h2 class="entry-title" ><?php the_title(); ?></h2>
                                    </header><!-- .entry-header -->

                                    <div class="entry-content">
                                        <?php
                                        // include the content of service post
                                        the_content();
                                        ?>
                                    </div>
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