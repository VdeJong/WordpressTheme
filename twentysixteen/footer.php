<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

</div><!-- .container -->
	</div><!-- .site-content -->

		<footer id="colophon" class="site-footer container" role="contentinfo">

			<!-- function to display footer sitebars in the footer -->
			<?php get_sidebar( 'content-bottom' ); ?>

				<div class="col-md-12 site-footer-info">
					<div class="site-info col-md-12">
						<?php
							/**
							 * Fires before the twentysixteen footer text for footer customization.
							 *
							 * @since Twenty Sixteen 1.0
							 */
							do_action( 'twentysixteen_credits' );
						?>
						<span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentysixteen' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentysixteen' ), 'VINMA' ); ?></a>
					</div>

					<div class="col-md-12 social menu">
						<?php if ( has_nav_menu( 'social' ) ) : ?>
							<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>">
								<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
								?>
							</nav><!-- .social-navigation -->
						<?php endif; ?>
					</div>
				</div><!-- .site-info -->

		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->
</div><!-- .container -->

<?php wp_footer(); ?>
</body>
</html>
