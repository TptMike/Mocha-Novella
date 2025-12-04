<?php
/**
 * Mocha Novella Theme Functions
 *
 * @package Mocha_Novella
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Theme Setup
 */
function mike_personal_setup() {
	// Add theme support for title tag
	add_theme_support( 'title-tag' );

	// Add theme support for post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Set default thumbnail size
	set_post_thumbnail_size( 1200, 630, true );

	// Add custom image sizes - Featured images scaled to match 1523x1024 aspect ratio (3:2)
	add_image_size( 'mike-personal-featured', 1300, 874, false );
	add_image_size( 'mike-personal-thumbnail', 400, 300, true );

	// Add theme support for custom logo
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Add theme support for HTML5 markup
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	) );

	// Add theme support for automatic feed links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for responsive embeds
	add_theme_support( 'responsive-embeds' );

	// Add theme support for wide and full alignments
	add_theme_support( 'align-wide' );

	// Add theme support for editor styles
	add_theme_support( 'editor-styles' );
	add_editor_style( 'editor-style.css' );

	// Register navigation menus
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'mike-personal' ),
		'footer'  => esc_html__( 'Footer Menu', 'mike-personal' ),
	) );

	// Add theme support for custom background
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );

	// Load text domain for translations
	load_theme_textdomain( 'mike-personal', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'mike_personal_setup' );

/**
 * Set content width
 */
function mike_personal_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mike_personal_content_width', 700 );
}
add_action( 'after_setup_theme', 'mike_personal_content_width', 0 );

/**
 * Enqueue scripts and styles
 */
function mike_personal_scripts() {
	// Enqueue theme stylesheet
	wp_enqueue_style( 'mike-personal-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Enqueue Google Fonts
	wp_enqueue_style(
		'mike-personal-fonts',
		'https://fonts.googleapis.com/css2?family=Rokkitt:wght@400;500;600;700;800;900&display=swap',
		array(),
		null
	);

	// Enqueue Font Awesome for social icons
	wp_enqueue_style(
		'mike-personal-fontawesome',
		'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
		array(),
		'6.4.0'
	);

	// Enqueue theme JavaScript
	wp_enqueue_script(
		'mike-personal-script',
		get_template_directory_uri() . '/js/theme.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);

	// Enqueue comment reply script on single posts
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mike_personal_scripts' );

/**
 * Register widget areas
 */
function mike_personal_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mike-personal' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'mike-personal' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'mike-personal' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'mike-personal' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'mike_personal_widgets_init' );

/**
 * Custom excerpt length - uses Customizer setting
 */
function mike_personal_excerpt_length( $length ) {
	$excerpt_length = get_theme_mod( 'mike_personal_excerpt_length', 30 );
	return absint( $excerpt_length );
}
add_filter( 'excerpt_length', 'mike_personal_excerpt_length', 999 );

/**
 * Custom excerpt more
 */
function mike_personal_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'mike_personal_excerpt_more' );

/**
 * Add custom body classes
 */
function mike_personal_body_classes( $classes ) {
	// Add class if sidebar is active
	if ( is_active_sidebar( 'sidebar-1' ) && ! is_page() ) {
		$classes[] = 'has-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'mike_personal_body_classes' );

/**
 * Custom post meta function
 */
function mike_personal_posted_on() {
	// Only show published date in the header
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'on %s', 'post date', 'mike-personal' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Display updated date (separate from published date)
 */
function mike_personal_updated_on() {
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$updated_on = sprintf(
			/* translators: %s: updated date. */
			esc_html_x( 'Updated %s', 'updated date', 'mike-personal' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="updated-on">' . $updated_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

function mike_personal_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'Published by %s', 'post author', 'mike-personal' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline">' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Add reading time estimate
 */
function mike_personal_reading_time() {
	$content = get_post_field( 'post_content', get_the_ID() );
	$word_count = str_word_count( strip_tags( $content ) );
	$reading_time = ceil( $word_count / 200 ); // Average reading speed: 200 words per minute

	if ( $reading_time < 1 ) {
		$reading_time = 1;
	}

	echo '<span class="reading-time">' . esc_html( $reading_time ) . ' min read</span>';
}

/**
 * Display post content based on Customizer setting
 * Shows full post or excerpt based on theme option
 */
function mike_personal_post_content() {
	$display_type = get_theme_mod( 'mike_personal_excerpt_display', 'excerpt' );
	
	if ( 'full' === $display_type ) {
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
	} else {
		the_excerpt();
		?>
		<p>
			<a href="<?php the_permalink(); ?>" class="creative-accent">
				<?php esc_html_e( 'Continue reading', 'mike-personal' ); ?>
			</a>
		</p>
		<?php
	}
}

/**
 * Get author avatar (custom or fallback to user avatar)
 *
 * @param int    $size Avatar size in pixels.
 * @param string $class CSS class for the avatar image.
 * @param int    $author_id Author user ID (default: 1).
 * @return string Avatar HTML.
 */
function mike_personal_get_author_avatar( $size = 150, $class = 'author-avatar', $author_id = 1 ) {
	$custom_avatar_url = get_theme_mod( 'mike_personal_custom_avatar', '' );
	
	// If custom avatar is set, use it
	if ( ! empty( $custom_avatar_url ) ) {
		// Convert URL to attachment ID if possible
		$attachment_id = attachment_url_to_postid( $custom_avatar_url );
		
		if ( $attachment_id ) {
			// Use attachment ID to get properly sized image
			$avatar_url = wp_get_attachment_image_url( $attachment_id, array( $size, $size ) );
		} else {
			// Use the URL directly if we can't find the attachment
			$avatar_url = $custom_avatar_url;
		}
		
		if ( $avatar_url ) {
			$alt_text = get_the_author_meta( 'display_name', $author_id );
			return sprintf(
				'<img src="%s" alt="%s" class="%s" width="%d" height="%d" />',
				esc_url( $avatar_url ),
				esc_attr( $alt_text ),
				esc_attr( $class ),
				$size,
				$size
			);
		}
	}
	
	// Fallback to WordPress user avatar
	return get_avatar( $author_id, $size, '', '', array( 'class' => $class ) );
}

/**
 * Customizer additions
 */
function mike_personal_customize_register( $wp_customize ) {
	// Add section for theme options
	$wp_customize->add_section( 'mike_personal_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'mike-personal' ),
		'priority' => 130,
	) );

	// Add setting for footer text
	$wp_customize->add_setting( 'mike_personal_footer_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'mike_personal_footer_text', array(
		'label'    => esc_html__( 'Footer Text', 'mike-personal' ),
		'section'  => 'mike_personal_theme_options',
		'type'     => 'text',
	) );

	// Add setting for site title font size
	$wp_customize->add_setting( 'mike_personal_site_title_size', array(
		'default'           => 'clamp(1.75rem, 4vw, 2.5rem)',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'mike_personal_site_title_size', array(
		'label'       => esc_html__( 'Site Title Font Size', 'mike-personal' ),
		'description' => esc_html__( 'Enter a CSS size value (e.g., 2rem, 32px, or clamp(1.75rem, 4vw, 2.5rem))', 'mike-personal' ),
		'section'     => 'mike_personal_theme_options',
		'type'        => 'text',
	) );

	// Add setting for custom avatar image
	$wp_customize->add_setting( 'mike_personal_custom_avatar', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control(
		$wp_customize,
		'mike_personal_custom_avatar',
		array(
			'label'       => esc_html__( 'Author Avatar Image', 'mike-personal' ),
			'description' => esc_html__( 'Upload a custom avatar image for the sidebar and footer. If no image is uploaded, your WordPress user avatar will be used.', 'mike-personal' ),
			'section'     => 'mike_personal_theme_options',
			'settings'    => 'mike_personal_custom_avatar',
		)
	) );

	// Add section for post display options
	$wp_customize->add_section( 'mike_personal_post_display', array(
		'title'    => esc_html__( 'Post Display Options', 'mike-personal' ),
		'priority' => 135,
	) );

	// Excerpt display type
	$wp_customize->add_setting( 'mike_personal_excerpt_display', array(
		'default'           => 'excerpt',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'mike_personal_excerpt_display', array(
		'label'       => esc_html__( 'Archive Display Type', 'mike-personal' ),
		'description' => esc_html__( 'Choose how posts are displayed on archive pages (blog, category, tag, etc.).', 'mike-personal' ),
		'section'     => 'mike_personal_post_display',
		'type'        => 'select',
		'choices'     => array(
			'full'    => esc_html__( 'Full Post', 'mike-personal' ),
			'excerpt' => esc_html__( 'Excerpt', 'mike-personal' ),
		),
	) );

	// Excerpt length (in words)
	$wp_customize->add_setting( 'mike_personal_excerpt_length', array(
		'default'           => 30,
		'sanitize_callback' => 'absint',
	) );

	$wp_customize->add_control( 'mike_personal_excerpt_length', array(
		'label'       => esc_html__( 'Excerpt Length (Words)', 'mike-personal' ),
		'description' => esc_html__( 'Number of words to show in excerpts. Only applies when "Excerpt" is selected above.', 'mike-personal' ),
		'section'     => 'mike_personal_post_display',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 5,
		),
	) );

	// Add section for social links
	$wp_customize->add_section( 'mike_personal_social_links', array(
		'title'    => esc_html__( 'Social Media Links', 'mike-personal' ),
		'priority' => 140,
	) );

	// Social media platforms
	$social_platforms = array(
		'twitter'   => esc_html__( 'Twitter/X URL', 'mike-personal' ),
		'facebook'  => esc_html__( 'Facebook URL', 'mike-personal' ),
		'instagram' => esc_html__( 'Instagram URL', 'mike-personal' ),
		'pinterest' => esc_html__( 'Pinterest URL', 'mike-personal' ),
		'rss'       => esc_html__( 'RSS Feed URL (leave empty for default)', 'mike-personal' ),
		'linkedin'  => esc_html__( 'LinkedIn URL', 'mike-personal' ),
		'github'    => esc_html__( 'GitHub URL', 'mike-personal' ),
		'email'     => esc_html__( 'Email Address', 'mike-personal' ),
	);

	foreach ( $social_platforms as $platform => $label ) {
		$wp_customize->add_setting( 'social_' . $platform, array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );

		$control_type = ( 'email' === $platform ) ? 'email' : 'url';
		
		$wp_customize->add_control( 'social_' . $platform, array(
			'label'   => $label,
			'section' => 'mike_personal_social_links',
			'type'    => $control_type,
		) );
	}
}
add_action( 'customize_register', 'mike_personal_customize_register' );

/**
 * Security: Remove WordPress version from head
 */
remove_action( 'wp_head', 'wp_generator' );

