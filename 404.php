<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */

get_header();
?>

<?php get_sidebar(); ?>

<div class="content-wrapper">
	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( '404', 'mike-personal' ); ?></h1>
				<p class="page-subtitle"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mike-personal' ); ?></p>
			</header>

			<div class="page-content">
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'mike-personal' ); ?></p>

				<?php get_search_form(); ?>

				<div class="error-404-widgets">
					<?php
					the_widget(
						'WP_Widget_Recent_Posts',
						array(
							'title'  => esc_html__( 'Recent Posts', 'mike-personal' ),
							'number' => 5,
						)
					);
					?>

					<?php
					the_widget(
						'WP_Widget_Archives',
						array(
							'title'    => esc_html__( 'Archives', 'mike-personal' ),
							'dropdown' => 1,
						)
					);
					?>
				</div>
			</div>
		</section>

	</main><!-- #primary -->
</div><!-- .content-wrapper -->

<?php
get_footer();

