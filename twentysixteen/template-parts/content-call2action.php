<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
// check if post is assigned to category call2action.
if ($cat_id = get_cat_ID('Call2action'))
{
    // wp query arguments to get posts from category call2action,
    // display maximum 1,
    // posts assigned to category call2action.
    $args = array(
        'posts_per_page' => 1,
        'category__in' => array($cat_id)
    );
    $call2action = new WP_Query($args);
    ?>

    <div class="call2action padding">
        <div class="container">
            <div class="row">
                <?php
                // The call2action category post loop
                if ($call2action->have_posts()) :

                    while ($call2action->have_posts()) :

                        $call2action->the_post(); ?>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h2 class="entry-title" ><?php the_title(); ?></h2>
                                </header><!-- .entry-header -->

                                <div class="entry-content">
                                    <?php the_content(); ?>
                                    <p><a class="btn btn-primary btn-lg" href="/wordpress1/contact" role="button">Contact</a></p>
                                </div><!-- .entry-content -->
                            </article><!-- #post-## -->
                        </div>

                        <?php

                        // End of the loop.
                    endwhile;
                endif;
                ?>

        <!--.call2action -->
            </div>
        </div>
    </div>
    <?php wp_reset_postdata();
}
?>
