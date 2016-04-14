<div class="teammembers">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <header class="entry-header">
                    <h2 class="entry-title" >Team</h2>
                </header><!-- .entry-header -->

                <?php
                // wp query arguments to get posts from post type team,
                // display all,
                // order ascending.
                $args = array(
                    'post_type' => 'team',
                    'posts_per_page' => -1,
                    'orderby' => 'ASC'
                );
                $teammembers = new WP_Query($args);

                // The testimonial post loop
                if ($teammembers->have_posts()) :

                    while ($teammembers->have_posts()) :

                        $teammembers->the_post();

                        // get the member's name, function, linkedin and email from metabox data
                        $member_name = get_post_meta(get_the_ID(), 'member_name', true);
                        $function = get_post_meta(get_the_ID(), 'function', true);
                        $linkedin = get_post_meta(get_the_ID(), 'linkedin', true);
                        $email = get_post_meta(get_the_ID(), 'email', true);?>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="entry-content">
                                    <?php
                                    // get post thumbnail and add class client-photo
                                    the_post_thumbnail('thumbnail', array('class' => 'client-photo'));

                                    // the content
                                    the_content();

                                    if (!empty($member_name) && !empty($function) && !empty($linkedin) && !empty($email)):
                                        ?>
                                        <p class="member_name">
                                            <?php echo $member_name; ?>
                                        </p>
                                        <p class="function">
                                            <?php echo $function; ?>
                                        </p>
                                        <p class="social">
                                            <a href="https://<?php echo $linkedin; ?>"><i class="fa fa-linkedin-square"></i></a>
                                            <a href="mailto:<?php echo antispambot($email); ?>"><i class="fa fa-envelope-o""></i></a>
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
                    <h3>No team members found</h3>
                    <?php
                endif;

                wp_reset_postdata();?>
            </div>
        </div>
    </div>
</div>
