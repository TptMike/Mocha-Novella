<?php
/**
 * The header template
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site" id="page">
	<a class="screen-reader-text skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'mike-personal' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-wrapper">
			<div class="site-branding">
				<?php
				if ( has_custom_logo() ) {
					the_custom_logo();
				} else {
					?>
					<h1 class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php bloginfo( 'name' ); ?>
						</a>
					</h1>
					<?php
				}
				?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'mike-personal' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => false,
						'depth'          => 0, // 0 = unlimited nesting
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div><!-- .header-wrapper -->
	</header><!-- #masthead -->

	<div class="site-wrapper">
		<div class="site-content">

