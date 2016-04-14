<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
	get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php

			// id of the home page
			if (get_the_ID() == 7)
			{
				// include the 2posts template.
				get_template_part('template-parts/content', '2posts');

				get_template_part('template-parts/content', 'parallaximage');

				// include the home services template.
				get_template_part('template-parts/content', 'homeservices');

				// include the call2action template.
				get_template_part('template-parts/content', 'call2action');

				// include the testimonial template
				get_template_part('template-parts/content', 'testimonials');
			}

			// id of the services page
			elseif (get_the_ID() == 21)
			{
				// include the services template.
				get_template_part('template-parts/content', 'frontservices');
			}

			// id of the services page
			elseif (get_the_ID() == 57)
			{
				// include the services template.
				get_template_part('template-parts/content', 'services');
			}

			// id of the portfolio page
			elseif (get_the_ID() == 32)
			{
				// include the portfolio template.
				get_template_part('template-parts/content', 'portfolio');
			}

			// id of the about us page
			elseif (get_the_ID() == 38)
			{
				// include the about us template.
				get_template_part('template-parts/content', 'overons');
			}

			// id of the contact page
			elseif (get_the_ID() == 35)
			{
				// include the contact template.
				get_template_part('template-parts/content', 'contact');
			}

			// template for any new standard page
			else
			{
				// include a no content template.
				get_template_part('template-parts/content');
			}
			?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
