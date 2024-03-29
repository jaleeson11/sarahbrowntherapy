<?php
/**
 * sarahbrowntherapy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sarahbrowntherapy
 */

if ( ! defined( 'SARAH_BROWN_THERAPY_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'SARAH_BROWN_THERAPY_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sarahbrowntherapy_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sarahbrowntherapy, use a find and replace
		* to change 'sarahbrowntherapy' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sarahbrowntherapy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sarahbrowntherapy' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sarahbrowntherapy_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sarahbrowntherapy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sarahbrowntherapy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sarahbrowntherapy_content_width', 640 );
}
add_action( 'after_setup_theme', 'sarahbrowntherapy_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sarahbrowntherapy_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sarahbrowntherapy' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sarahbrowntherapy' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sarahbrowntherapy_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sarahbrowntherapy_scripts() {
	wp_enqueue_style( 'sarahbrowntherapy-fonts', get_template_directory_uri() . '/fonts/fonts.css', array(), SARAH_BROWN_THERAPY_VERSION );
	wp_enqueue_style( 'sarahbrowntherapy-style', get_stylesheet_uri(), array(), SARAH_BROWN_THERAPY_VERSION );

	wp_enqueue_script( 'sarahbrowntherapy-scripts', get_template_directory_uri() . '/app.js', array( 'jquery' ), SARAH_BROWN_THERAPY_VERSION, true );

	wp_enqueue_style( 'dashicons' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sarahbrowntherapy_scripts' );

/**
 * Implement the Custom Header feature.
 */
// require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
// if ( defined( 'JETPACK__VERSION' ) ) {
// 	require get_template_directory() . '/inc/jetpack.php';
// }

/**
 * Add ellipses to end of post excerpt.
 */
function sarahbrowntherapy_excerpt_more() {
	return '...';
}
add_filter( 'excerpt_more', 'sarahbrowntherapy_excerpt_more' );

/**
 * Redirect templates.
 */
function sarahbrowntherapy_redirect() {
	if ( is_author() || is_tag() || is_archive() || is_attachment() ) {
		wp_safe_redirect( home_url(), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'sarahbrowntherapy_redirect' );

/**
 * Disable search functionality.
 */
function sarahbrowntherapy_disable_search( $query, $error = true ) {
	if ( is_search() ) {
		$query->is_search = false;   
		$query->query_vars['s'] = false;
		$query->query['s'] = false;

		if ( $error ) {
			$query->is_404 = true;
		}
	}
}
add_action( 'parse_query', 'sarahbrowntherapy_disable_search' ); 

/**
 * Replace default login error message.
 */
function  sarahbrowntherapy_login_error() {
	return 'Your username or password is incorrect';
}
add_filter( 'login_errors', 'sarahbrowntherapy_login_error' );

/**
 * Disable comments.
 */
function sarahbrowntherapy_disable_comments() {
	// Redirect any user trying to access comments page
    global $pagenow;
     
    if ( $pagenow === 'edit-comments.php' ) {
        wp_safe_redirect( admin_url() );
        exit;
    }
 
    // Remove comments metabox from dashboard
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
 
    // Disable support for comments and trackbacks in post types
    foreach ( get_post_types() as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}
add_action( 'admin_init', 'sarahbrowntherapy_disable_comments' );

/**
 * Remove comments page in menu.
 */
function sarahbrowntherapy_remove_comments_from_menu() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'sarahbrowntherapy_remove_comments_from_menu' );

/**
 * Remove comments links from admin bar.
 */
function sarahbrowntherapy_remove_comments_from_admin_bar() {
	if ( is_admin_bar_showing() ) {
        remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
    }
}
add_action( 'init', 'sarahbrowntherapy_remove_comments_from_admin_bar' );

/**
 * Prevents reCAPTCHA scripts from loading on all pages apart from contact.
 */
function sarahbrowntherapy_block_recaptcha() {
	if ( !is_page( array( 'contact' ) ) ) {
		wp_dequeue_script( 'google-recaptcha' );
		wp_deregister_script( 'google-recaptcha' );
		add_filter( 'wpcf7_load_js', '__return_false' );
		add_filter( 'wpcf7_load_css', '__return_false' );
	}
}
add_action( 'wp_print_scripts', 'sarahbrowntherapy_block_recaptcha' );

/**
 * Pre-loads fonts.
 */
function sarahbrowntherapy_preload_fonts() {
	$fonts = [
		'SourceSansPro-Regular',
		'LibreBaskerville-Regular',
		'LibreBaskerville-Italic',
		'SourceSansPro-SemiBold',
		'SourceSansPro-Bold',
		'SourceSansPro-Italic',
	];

	foreach ($fonts as $font) {
		?>
		<link rel="preload" href="<?php echo get_template_directory_uri() . '/fonts/' . $font . '.woff' ?>" as="font" type="font/woff" crossorigin>
		<?php
	}
}
