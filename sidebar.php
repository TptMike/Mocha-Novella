<?php
/**
 * The sidebar template
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */
?>

<aside id="secondary" class="widget-area" role="complementary">
	<!-- Author Profile Section -->
	<div class="author-profile">
	<?php
	// Use the site's primary admin or first user as the author
	$author_id = 1; // Default to admin user
	$author_avatar = mike_personal_get_author_avatar( 150, 'author-avatar', $author_id );
	?>
	
	<div class="author-avatar-wrapper">
		<?php echo $author_avatar; ?>
	</div>
		
		<h2 class="author-name"><?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?></h2>
		
		<?php
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description ) :
			?>
			<p class="author-tagline"><?php echo esc_html( $site_description ); ?></p>
		<?php else : ?>
			<p class="author-tagline"><?php esc_html_e( 'Optimally designed for reading', 'mike-personal' ); ?></p>
		<?php endif; ?>
		
		<div class="author-social">
			<?php
			$social_links = array(
				'twitter'   => get_theme_mod( 'social_twitter', '' ),
				'facebook'  => get_theme_mod( 'social_facebook', '' ),
				'instagram' => get_theme_mod( 'social_instagram', '' ),
				'pinterest' => get_theme_mod( 'social_pinterest', '' ),
				'rss'       => get_theme_mod( 'social_rss', get_feed_link() ),
			);
			
			$social_icons = array(
				'twitter'   => '<i class="fab fa-twitter"></i>',
				'facebook'  => '<i class="fab fa-facebook"></i>',
				'instagram' => '<i class="fab fa-instagram"></i>',
				'pinterest' => '<i class="fab fa-pinterest"></i>',
				'rss'       => '<i class="fas fa-rss"></i>',
			);
			
			foreach ( $social_links as $platform => $url ) {
				if ( ! empty( $url ) ) {
					echo '<a href="' . esc_url( $url ) . '" target="_blank" rel="noopener noreferrer" aria-label="' . esc_attr( ucfirst( $platform ) ) . '">' . ($social_icons[ $platform ] ?? '<i class="fas fa-link"></i>') . '</a>';
				}
			}
			?>
		</div>
	</div>

	<!-- Navigation in Sidebar -->
	<nav class="sidebar-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'mike-personal' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'menu_id'        => 'sidebar-menu',
				'container'      => false,
				'fallback_cb'    => false,
				'depth'          => 0, // 0 = unlimited nesting
			)
		);
		?>
	</nav>

	<!-- About Author Widget -->
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<div class="widget">
			<h3 class="widget-title"><?php esc_html_e( 'About Author', 'mike-personal' ); ?></h3>
			<p><?php esc_html_e( 'Author is designed for publishers who want readers. That\'s why Author is fast, responsive, accessibility-ready, and optimally designed for reading.', 'mike-personal' ); ?></p>
		</div>
	<?php endif; ?>

	<!-- Recent Posts Widget -->
	<?php
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		// Show default recent posts if no widgets
		$recent_posts = wp_get_recent_posts( array( 'numberposts' => 5 ) );
		if ( ! empty( $recent_posts ) ) :
			?>
			<div class="widget">
				<h3 class="widget-title"><?php esc_html_e( 'Recent Posts', 'mike-personal' ); ?></h3>
				<ul>
					<?php foreach ( $recent_posts as $post ) : ?>
						<li><a href="<?php echo esc_url( get_permalink( $post['ID'] ) ); ?>"><?php echo esc_html( $post['post_title'] ); ?></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php
			wp_reset_query();
		endif;
	}
	?>
</aside><!-- #secondary -->
