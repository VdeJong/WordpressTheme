<div class="homeposts">
	<div class="container">
		<div class="row">

			<?php
			/**
			 * The template used for displaying page content
			 *
			 * @package WordPress
			 * @subpackage Twenty_Sixteen
			 * @since Twenty Sixteen 1.0
			 */
			// check if post is assigned to category homeposts.
			if ($cat_id = get_cat_ID('Home posts'))
			{
				// wp query arguments to get posts from category homeposts,
				// display maximum 2,
				// posts assigned to category homeposts.
				$args = array(
					'posts_per_page' => 2,
					'category__in' => array($cat_id)
				);
				$homeposts = new WP_Query($args);

				// The homeposts category post loop
				if ($homeposts->have_posts()) :

					while ($homeposts->have_posts()) :

						$homeposts->the_post(); ?>

						<div class="col-md-6 col-sm-6 col-xs-12 homepost">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<h2 class="entry-title" ><?php the_title(); ?></h2>
								</header><!-- .entry-header -->

								<div class="entry-content">
									<?php the_content(); ?>
								</div><!-- .entry-content -->
							</article><!-- #post-## -->
						</div>

						<?php
					endwhile;
				endif;
			}
			wp_reset_postdata(); ?>

			<!--.homeposts -->
		</div>
	</div>
</div>