<?php
/**
 * The footer template
 *
 * @package Mocha_Novella
 * @since 1.0.0
*/
?>

		</div><!-- .site-content -->
	</div><!-- .site-wrapper -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="footer-wrapper">
			<div class="footer-content">
				<!-- Footer Bio -->
				<div class="footer-bio">
				<?php
				$author_id = 1;
				$author_name = get_the_author_meta( 'display_name', $author_id );
				$author_avatar = mike_personal_get_author_avatar( 60, 'footer-avatar', $author_id );
				?>
					<div class="footer-bio-content">
						<?php echo $author_avatar; ?>
						<div class="footer-bio-text">
							<h4><?php echo esc_html( $author_name ); ?></h4>
							<?php
							$author_bio = get_the_author_meta( 'description', $author_id );
							if ( $author_bio ) :
								?>
								<p><?php echo esc_html( wp_trim_words( $author_bio, 20 ) ); ?></p>
							<?php endif; ?>
						</div>
					</div>
					<div class="footer-social">
						<?php
						$social_links = array(
							'twitter'   => get_theme_mod( 'social_twitter', '' ),
							'facebook'  => get_theme_mod( 'social_facebook', '' ),
							'instagram' => get_theme_mod( 'social_instagram', '' ),
							'pinterest' => get_theme_mod( 'social_pinterest', '' ),
							'rss'       => get_theme_mod( 'social_rss', get_feed_link() ),
							'linkedin'  => get_theme_mod( 'social_linkedin', '' ),
							'github'    => get_theme_mod( 'social_github', '' ),
							'email'     => get_theme_mod( 'social_email', '' ),
						);
						
						$social_icons = array(
							'twitter'   => '<i class="fab fa-twitter"></i>',
							'facebook'  => '<i class="fab fa-facebook"></i>',
							'instagram' => '<i class="fab fa-instagram"></i>',
							'pinterest' => '<i class="fab fa-pinterest"></i>',
							'rss'       => '<i class="fas fa-rss"></i>',
							'linkedin'  => '<i class="fab fa-linkedin"></i>',
							'github'    => '<i class="fab fa-github"></i>',
							'email'     => '<i class="fas fa-envelope"></i>',
						);
						
						foreach ( $social_links as $platform => $url ) {
							if ( ! empty( $url ) ) {
								$link_url = $url;
								$link_target = 'target="_blank" rel="noopener noreferrer"';
								
								if ( 'email' === $platform ) {
									$link_url = 'mailto:' . sanitize_email( $url );
									$link_target = '';
								}
								
								echo '<a href="' . esc_url( $link_url ) . '" ' . $link_target . ' aria-label="' . esc_attr( ucfirst( $platform ) ) . '">' . ($social_icons[ $platform ] ?? '<i class="fas fa-link"></i>') . '</a>';
							}
						}
						?>
					</div>
				</div>

				<!-- Footer Navigation -->
				<div class="footer-nav">
					<h4><?php esc_html_e( 'Pages', 'mike-personal' ); ?></h4>
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'footer-menu',
							'container'      => false,
							'fallback_cb'    => false,
							'depth'          => 1,
						)
					);
					?>
				</div>

				<!-- Footer Recent Posts -->
				<div class="footer-recent">
					<h4><?php esc_html_e( 'Recent Posts', 'mike-personal' ); ?></h4>
					<?php
					$recent_posts = wp_get_recent_posts( array( 'numberposts' => 5 ) );
					if ( ! empty( $recent_posts ) ) :
						?>
						<ul>
							<?php foreach ( $recent_posts as $post ) : ?>
								<li><a href="<?php echo esc_url( get_permalink( $post['ID'] ) ); ?>"><?php echo esc_html( wp_trim_words( $post['post_title'], 8 ) ); ?></a></li>
							<?php endforeach; ?>
						</ul>
						<?php
						wp_reset_query();
					endif;
					?>
				</div>
			</div>

			<div class="footer-bottom">
				<div class="site-info">
					<p>
						<?php
						$footer_text = get_theme_mod( 'mike_personal_footer_text', '' );
						if ( ! empty( $footer_text ) ) {
							echo esc_html( $footer_text );
						} else {
							?>
							&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. 
							<?php esc_html_e( 'All rights reserved.', 'mike-personal' ); ?>
							<?php
						}
						?>
					</p>
					<p class="theme-credits">
						<?php esc_html_e( 'Mocha Novella Theme', 'mike-personal' ); ?> &copy; <?php echo esc_html( date( 'Y' ) ); ?> 
						<?php esc_html_e( 'by', 'mike-personal' ); ?> <a href="https://tptmike.com" target="_blank" rel="noopener noreferrer"><?php bloginfo( 'name' ); ?></a>
					</p>
				</div><!-- .site-info -->
			</div>
		</div><!-- .footer-wrapper -->
	</footer><!-- #colophon -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
