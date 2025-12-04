<?php
/**
 * The main template file
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */

get_header();
?>

<div class="content-wrapper">
	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
			?>

			<ul class="post-list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<li class="post-item">
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<?php if ( has_post_thumbnail() ) : ?>
								<div class="post-thumbnail">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail( 'mike-personal-featured' ); ?>
									</a>
								</div>
							<?php endif; ?>

							<header class="entry-header">
								<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

								<div class="entry-meta">
									<?php
									mike_personal_posted_on();
									mike_personal_posted_by();
									mike_personal_reading_time();
									?>
								</div>
							</header>

							<div class="entry-content">
								<?php mike_personal_post_content(); ?>
							</div>
						</article>
					</li>
					<?php
				endwhile;
				?>
			</ul>

			<?php
			the_posts_navigation(
				array(
					'prev_text' => esc_html__( '&larr; Older posts', 'mike-personal' ),
					'next_text' => esc_html__( 'Newer posts &rarr;', 'mike-personal' ),
				)
			);

		else :
			?>
			<section class="no-results not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'mike-personal' ); ?></h1>
				</header>

				<div class="page-content">
					<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
						<p>
							<?php
							printf(
								wp_kses(
									/* translators: 1: link to WP admin new post page. */
									__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'mike-personal' ),
									array(
										'a' => array(
											'href' => array(),
										),
									)
								),
								esc_url( admin_url( 'post-new.php' ) )
							);
							?>
						</p>
					<?php elseif ( is_search() ) : ?>
						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'mike-personal' ); ?></p>
						<?php get_search_form(); ?>
					<?php else : ?>
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'mike-personal' ); ?></p>
						<?php get_search_form(); ?>
					<?php endif; ?>
				</div>
			</section>
			<?php
		endif;
		?>

	</main><!-- #primary -->

<?php get_sidebar(); ?>
</div><!-- .content-wrapper -->

<?php
get_footer();

