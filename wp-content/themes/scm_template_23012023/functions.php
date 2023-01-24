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

	// regular size
	add_image_size( 'regular', 400, 350, true );

	// medium size
	add_image_size( 'medium', 650, 500, true );
		
	// large thumbnails
	add_image_size( 'large', 960, '' );

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
  
	wp_enqueue_script( 'jquery-min-js',  get_template_directory_uri() . '/assets/js/lib/jquery-3.2.1.min.js', array(), _S_VERSION, true );

	if ( is_front_page() || is_home() ) {
		wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/assets/css/slick.css', array(), _S_VERSION );
    wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/assets/css/slick-theme.css', array(), _S_VERSION );
		wp_enqueue_script( 'slick-min-js',  get_template_directory_uri() . '/assets/js/lib/slick-1.6.0.min.js', array(), _S_VERSION, true );
		wp_enqueue_script( 'slider-js',  get_template_directory_uri() . '/assets/js/slider.js', array(), _S_VERSION, true );
	}

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
 * Top page content management creation (custom post)
 */
add_action( 'init', 'create_content_post' );
function create_content_post() {
	register_post_type( 'topContent',
		array(
			'labels' => array(
				'name' => _('トップコンテンツ管理'),
				'singular_name' => _( 'トップコンテンツ管理' )
			),
			'public' => true,
			'show_ui' => true,
			'menu_position' =>5,
		)
	);
}


/* Editor Style */
add_action( 'enqueue_block_editor_assets', 'gutenberg_stylesheets' );
function gutenberg_stylesheets() {
	// CSS Setting
	$editor_style_url = get_theme_file_uri('/assets/css/editor.css');
	wp_enqueue_style('theme-editor-style', $editor_style_url );
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
	// JavaScript Setting
	// wp_enqueue_script( 'theme-gutenberg-js', get_theme_file_uri('/js/gutenberg.js'), array( 'jquery' ), false, true );
}


/**
 * Register ACF Block Types
 */
function register_acf_block_types() {

  // block columns
  acf_register_block_type(array(
      'name'              => 'acf/testimonial',
      'title'             => __('Testimonial'),
      'description'       => __('A custom column block.'),
      'render_template'   => 'blocks/testimonial.php',
      'category'          => 'layout',
      'icon'              => 'book-alt',
      'keywords'          => array( 'box', 'quote' ),
  ));
	  // Testing columns
		acf_register_block_type(array(
      'name'              => 'acf/testing',
      'title'             => __('Testing'),
      'description'       => __('A custom column block.'),
      'render_template'   => 'blocks/testing.php',
      'category'          => 'layout',
      'icon'              => 'clipboard',
      'keywords'          => array( 'box', 'quote' ),
  ));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
  add_action('acf/init', 'register_acf_block_types');
}

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
 * Add Post Format
 */
function add_post_formats() {
	add_theme_support( 'post-formats', array( 'gallery', 'quote', 'video', 'aside', 'image', 'link' ) );
}

add_action( 'after_setup_theme', 'add_post_formats', 20 );


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


function get_lang_page_content($name = null)
{
	global $post;
	$post_slug=$post->post_name;
	if(isset($name)) {
		$post_slug = $name;
	}

	$current_language = pll_current_language('locale');
	 if ($current_language == 'ja') {
			 get_template_part('jp_pages/page',$post_slug);
	 } elseif($current_language == 'en_US') {
			 get_template_part('en_pages/page',$post_slug);
	 } elseif($current_language == 'my_MM') {
		 get_template_part('mm_pages/page',$post_slug);
	 }
}