<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="container">
				<div class="site-header-main col-md-12">
					<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>
						<div id="site-header-menu" class="site-header-menu">
							<nav class="navbar navbar-default">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
									<div class="site-brand">
										<?php if ( get_header_image() ) : ?>
											<?php
											/**
											 * Filter the default twentysixteen custom header sizes attribute.
											 *
											 * @since Twenty Sixteen 1.0
											 *
											 * @param string $custom_header_sizes sizes attribute
											 * for Custom Header. Default '(max-width: 709px) 85vw,
											 * (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px'.
											 */
											$custom_header_sizes = apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
											?>
											<div class="header-logo">
												<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" sizes="<?php echo esc_attr( $custom_header_sizes ); ?>" width="200px" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
												</a>
											</div><!-- .header-image -->
										<?php endif; ?>
									</div><!-- .site-branding -->
								</div>
								<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
									<?php if ( has_nav_menu( 'primary' ) ) : ?>
										<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
											<?php
											wp_nav_menu( array(
												'theme_location' => 'primary',
												'container' => false,
												'menu_class'     => 'primary-menu nav navbar-nav',
											) );
											?>
										</nav><!-- .main-navigation -->
									<?php endif; ?>
								</div>
							</nav>
						</div><!-- .site-header-menu -->
					<?php endif; ?>
				</div><!-- .site-header-main -->
			</div>
		</header><!-- .site-header -->

		<div id="content" class="site-content">
			<div class="container">
