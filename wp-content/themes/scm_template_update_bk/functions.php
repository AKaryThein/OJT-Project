<?php
/**
 * scm_theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package scm_theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scm_theme_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on scm_theme, use a find and replace
		* to change 'scm_theme' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'scm_theme', get_template_directory() . '/languages' );

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
			'main_menu' => esc_html__( 'Primary', 'scm_theme' ),
			'secondary_menu' => esc_html__( 'Secondary', 'scm_theme' ),
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
			'scm_theme_custom_background_args',
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
			'height'      => 100,
			'width'       => 100,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

}
add_action( 'after_setup_theme', 'scm_theme_setup' );

// Displays the site logo
if (!function_exists('themename_the_custom_logo')) :
  /**
   * Displays the optional custom logo.
   */
  function themename_the_custom_logo()
  {
    if (function_exists('the_custom_logo') && (get_theme_mod('themename_logo', '') == '')) :
      the_custom_logo();
    endif;
  }
endif;

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scm_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scm_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'scm_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scm_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'scm_theme' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'scm_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
  	)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Logo', 'scm_theme' ),
			'id'            => 'footer-logo',
			'description'   => esc_html__( 'Add widgets here.', 'scm_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
  	)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget', 'scm_theme' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'scm_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
  	)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Copyright ', 'scm_theme' ),
			'id'            => 'copy',
			'description'   => esc_html__( 'Add widgets here.', 'scm_theme' ),
			'before_widget' => '',
			'after_widget'  => '',
  	)
	);
}
add_action( 'widgets_init', 'scm_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scm_theme_scripts() {
	wp_enqueue_style( 'reset-style', get_stylesheet_directory_uri() . '/assets/css/reset.css', array(), _S_VERSION );
	wp_enqueue_style( 'common-style', get_stylesheet_directory_uri() . '/assets/css/style.css', array(), _S_VERSION );

	wp_enqueue_script( 'scm_theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scm_theme_scripts' );

/**
 * Limit Archive Widget
 */
function my_limit_archives($args){
	$args['limit'] = 5;
	return $args;
}
add_filter( 'widget_archives_args', 'my_limit_archives' );

/**
 * Remove "Category:", "Tag:", "Author:" from the_archive_title
 */
function remove_archive_title($title){
	if (is_category()) {
		$title = single_cat_title('', false);
} elseif (is_tag()) {
		$title = single_tag_title('', false);
} elseif (is_author()) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
} elseif (is_tax()) { //for custom post types
		$title = sprintf(__('%1$s'), single_term_title('', false));
} elseif (is_post_type_archive()) {
		$title = post_type_archive_title('', false);
}
return $title;
}
add_filter( 'get_the_archive_title', 'remove_archive_title' );

/**
 * Hide admin bar (during development).
 */
show_admin_bar( false );

/**
 * Redirect after theme activation complete.
 */
if (is_admin() && isset($_GET['activated'])){
	wp_redirect( home_url() );
}

/**
 * Implement the Custom Header Logo feature.
 */
require get_template_directory() . '/inc/custom-header-logo.php';

/**
 * Custom Theme Color.
 */
require get_template_directory() . '/inc/customizer-themecolor.php';

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//if ( !function_exists('add_custom_avatar') ) {
//	function add_custom_avatar( $avatar_defaults ) {
//		$myavatar = get_template_directory() . '/assets/img/img_avatar.jpg';
//		http://localhost/scm_template/wp-content/uploads/2023/01/img_avatar.jpg
//		$avatar_defaults[$myavatar] = 'Custom Avator';
//		return $avatar_defaults;
//	}
//	add_filter( 'avatar_defaults', 'add_custom_avatar' );
//}

add_filter( 'avatar_defaults', 'wpb_new_gravatar' );
function wpb_new_gravatar ($avatar_defaults) {
$myavatar = 'http://localhost/scm_template/wp-content/uploads/2023/01/img_avatar-1.jpg';
$avatar_defaults[$myavatar] = "Default Gravatar";
return $avatar_defaults;
}

/* Custom Default Avatar Start */
add_filter( 'avatar_defaults', 'newCustomGravatar' );
function newCustomGravatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/assets/img/img_avatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Default Avatar";
    return $avatar_defaults;
}
/* Custom Default Avatar End */


//function new_excerpt_more($more) {
//	global $post;
//return '...<br /><br /><a href="'. get_permalink($post->ID) . '" class="read_more">read more →</a>';
//}
//add_filter('excerpt_more', 'new_excerpt_more');

//function wpdocs_custom_excerpt_length( $length ) {
//	return '...';
//}
//add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

//function wpdocs_excerpt_more( $length ) {
//	return '<a href="'.get_the_permalink().'" rel="nofollow">Read More...</a>';
//}
//add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
//
//function modify_read_more_link() {
//	return '<a class="more-link" href="' . get_permalink() . '">Click For More</a>';
// }
// add_filter( 'the_content_more_link', 'modify_read_more_link' );

// function new_excerpt_more($more) {
//	global $post;
//	return '<a class="moretag" 
//	href="'. get_permalink($post->ID) . '">Your Read More Link Text</a>';
// }
// add_filter('excerpt_more', 'new_excerpt_more');