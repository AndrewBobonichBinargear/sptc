<?php
/**
 * seattlepremiumtowncarservice functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package seattlepremiumtowncarservice
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

// Load the .env file in functions.php
// if (file_exists(get_template_directory() . '/vendor/autoload.php')) {
// 	require_once get_template_directory() . '/vendor/autoload.php';
// 	$dotenv = Dotenv\Dotenv::createImmutable(get_template_directory());
// 	$dotenv->load();
// 	// to see env value use $_ENV['TEST_NAME']
// }

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function seattlepremiumtowncarservice_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on seattlepremiumtowncarservice, use a find and replace
		* to change 'seattlepremiumtowncarservice' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'seattlepremiumtowncarservice', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'seattlepremiumtowncarservice' ),
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
			'seattlepremiumtowncarservice_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add Image Sizes
	add_image_size( 'post-col-1', 542, 362, true );

	/**
	 * Remove WordPress Meta Generator
	 */
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10);
	remove_action('wp_head', 'parent_post_rel_link', 10);
	remove_action('wp_head', 'wp_shortlink_wp_head', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10);
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
	remove_action('wp_head', 'print_emoji_detection_script', 7);
}
add_action( 'after_setup_theme', 'seattlepremiumtowncarservice_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function seattlepremiumtowncarservice_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'seattlepremiumtowncarservice' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'seattlepremiumtowncarservice' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(array(
    'name' => esc_html__( 'Footer Widget 1', 'seattlepremiumtowncarservice' ),
    'id' => 'footer-1',
    'description' => esc_html__( 'First area', 'seattlepremiumtowncarservice' ),
    'before_widget' => '<div class="wsfooterwdget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));

    register_sidebar(array(
    'name' => esc_html__( 'Footer Widget 2', 'seattlepremiumtowncarservice' ),
    'id' => 'footer-2',
    'description' => esc_html__( 'Second area', 'seattlepremiumtowncarservice' ),
    'before_widget' => '<div class="wsfooterwdget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));

    register_sidebar(array(
    'name' => esc_html__( 'Footer Widget 3', 'seattlepremiumtowncarservice' ),
    'id' => 'footer-3',
    'description' => esc_html__( 'Third area', 'seattlepremiumtowncarservice' ),
    'before_widget' => '<div class="wsfooterwdget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
    ));

  register_sidebar(array(
    'name' => esc_html__( 'Footer Widget 4', 'seattlepremiumtowncarservice' ),
    'id' => 'footer-4',
    'description' => esc_html__( 'Fourth area', 'seattlepremiumtowncarservice' ),
    'before_widget' => '<div class="wsfooterwdget">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>',
  ));
}
add_action( 'widgets_init', 'seattlepremiumtowncarservice_widgets_init' );

function seattlepremiumtowncarservice_scripts() {
    wp_enqueue_style('seattlepremiumtowncarservice-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('seattlepremiumtowncarservice-style', 'rtl', 'replace');

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-validate', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos-next/aos.js', array(), _S_VERSION, true);
    wp_enqueue_script('seattlepremiumtowncarservice-header', get_template_directory_uri() . '/assets/js/header.js', array(), _S_VERSION, true);
    wp_enqueue_script('counterup', get_template_directory_uri() . '/assets/js/jquery.counterup.min.js', array('jquery'), _S_VERSION, true);
    wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick/slick.min.js', array('jquery'), _S_VERSION, true);

    wp_enqueue_style('swiper-style', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), null, true);

    wp_register_script('countup', 'https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.umd.js', array(), null, true);
    wp_enqueue_script('countup');

    wp_register_script('blocks', get_template_directory_uri() . '/inc/acf/js/blocks.js', array('jquery', 'countup'), '1.0.0', true);
    wp_enqueue_script('blocks');

		wp_register_script('popup', get_template_directory_uri() . '/assets/js/popup.js', array('jquery'), '1.0.0', true);
		wp_enqueue_script('popup');

    wp_enqueue_script('seattlepremiumtowncarservice-script', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_localize_script('seattlepremiumtowncarservice-script', 'seattlepremiumtowncarservice', [
        'ajax_url' => admin_url('admin-ajax.php'),
        'site_url' => get_home_url(),
    ]);

    wp_enqueue_style('seattlepremiumtowncarservice-blocks', get_template_directory_uri() . '/inc/acf/css/blocks.css', array(), _S_VERSION);

    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
}
add_action('wp_enqueue_scripts', 'seattlepremiumtowncarservice_scripts');


require_once get_template_directory() . '/inc/acf/blocks.php';


/**
 * Add attributes to SCRIPT link
 *
 * @param [type] $tag
 * @param [type] $handle
 * @param [type] $src
 * @return void
 */
function add_attribs_to_scripts( $tag, $handle, $src ) {

	// The handles of the enqueued scripts we want to defer
	$async_scripts = array(
		'jquery-migrate',
		'sharethis',
	);

	$defer_scripts = array(
		// 'contact-form-7',
		'jquery-form',
		'wpdm-bootstrap',
		'frontjs',
		'jquery-choosen',
		'fancybox',
		'jquery-colorbox',
		'search'
	);

	$jquery = array(
		'jquery'
	);

	if ( in_array( $handle, $defer_scripts ) ) {
		return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
	}
	if ( in_array( $handle, $async_scripts ) ) {
		return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
	}
	if ( in_array( $handle, $jquery ) ) {
		return '<script src="' . $src . '" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous" type="text/javascript"></script>' . "\n";
	}

	return $tag;
}
add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );

/**
 * Actions.
 */
require get_template_directory() . '/inc/__actions.php';

/**
 * Filters.
 */
require get_template_directory() . '/inc/__filters.php';

/**
 * Ajax.
 */
require get_template_directory() . '/inc/__ajax.php';

/**
 * ACF functionality.
 */
require get_template_directory() . '/inc/__acf.php';

/**
 * Custom functionality.
 */
require get_template_directory() . '/inc/__custom-functions.php';

/**
 * Customizer.
 */
require get_template_directory() . '/inc/__customizer.php';
