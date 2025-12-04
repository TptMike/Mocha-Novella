<?php
/**
 * The template for displaying single posts
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */

get_header();
?>

<div class="content-wrapper">
	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="post-thumbnail">
						<?php the_post_thumbnail( 'mike-personal-featured' ); ?>
					</div>
				<?php endif; ?>

				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

					<div class="entry-meta">
						<?php
						mike_personal_posted_on();
						mike_personal_posted_by();
						mike_personal_reading_time();
						?>
					</div>
				</header>

				<div class="entry-content">
					<?php
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mike-personal' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						)
					);

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mike-personal' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>

				<footer class="entry-footer">
					<?php
					// Show updated date if post was modified
					mike_personal_updated_on();
					
					$categories_list = get_the_category_list( esc_html__( ', ', 'mike-personal' ) );
					if ( $categories_list ) {
						printf(
							/* translators: 1: list of categories. */
							'<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'mike-personal' ) . '</span>',
							$categories_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						);
					}

					$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'mike-personal' ) );
					if ( $tags_list ) {
						printf(
							/* translators: 1: list of tags. */
							'<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'mike-personal' ) . '</span>',
							$tags_list // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						);
					}
					?>
				</footer>
			</article>

			<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'mike-personal' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'mike-personal' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

	</main><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- .content-wrapper -->

<?php
get_footer();

