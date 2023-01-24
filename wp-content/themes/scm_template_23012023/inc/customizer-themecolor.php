<?php
/**
 * scm_theme Theme Color Customizer.
 *
 * @package scm_theme
 */
/**
 * Sets up the WordPress core custom header and custom background features.
 *
 *
 * @see scm_theme_style()
 *
 * @uses scm_theme_style()
 * @uses scm_theme_admin_header_style()
 * @uses scm_theme_admin_header_image()
 */
$bg_image_path = get_template_directory_uri() . '/assets/img/background.gif';
function themename_custom_header_and_background()
{
  $default_body_background_color = "ffffff";
  $default_text_color            = "000000";

  /**
   * Filter the arguments used when adding 'custom-background' support in SCM Template.
   *
   *
   * @param array $args {
   *     An array of custom-background support arguments.
   *
   *     @type string $default-color Default color of the background.
   * }
   */
  add_theme_support('custom-background', apply_filters('themename_custom_background_args', array(
    'default-color'          => $default_body_background_color,
    'default-image'          => $GLOBALS['bg_image_path'],
    'wp-head-callback'       => 'scm_theme_style',
    'admin-preview-callback' => 'scm_theme_admin_background_image',
  )));

  /**
   * Filter the arguments used when adding 'custom-header' support in SCM Template.
   *
   * @param array $args {
   *     An array of custom-header support arguments.
   *
   *     @type string $default-text-color Default color of the header text.
   *     @type int      $width            Width in pixels of the custom header image. Default 1200.
   *     @type int      $height           Height in pixels of the custom header image. Default 280.
   *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
   *     @type callable $wp-head-callback Callback function used to style the header image and text
   *                                      displayed on the blog.
   * }
   */
  add_theme_support('custom-header', apply_filters('themename_custom_header_args', array(
    'default-image'          => '',
    'default-text-color'     => $default_text_color,
    'flex-height'            => true,
    'flex-width'             => true,
    'uploads'                => true,
    'wp-head-callback'       => 'scm_theme_style',
    'admin-head-callback'    => 'scm_theme_admin_header_style',
    'admin-preview-callback' => 'scm_theme_admin_header_image',
  )));
}
add_action('after_setup_theme', 'themename_custom_header_and_background');

function theme_customize_register($wp_customize)
{
  $wp_customize->remove_section('header_image');
}
add_action('customize_register', 'theme_customize_register', 50);



/**
 * Adds color supports for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize The Customizer object.
 */
function header_footer_color_customizer($wp_customize)
{
  // Inlcude the Alpha Color Picker control file.
	require_once( dirname( __FILE__ ) . '/alpha-color-picker/alpha-color-picker.php' );

  $default_header_bgcolor       = "rgba(255,255,255,0)";
  $default_footer_bgcolor       = "rgba(255,255,255,0)";
  $default_txtcolor             = "rgba(0,0,0,1)";

  // Header background color customizer
  $wp_customize->add_setting('header_bgcolor', array(
    'default'          => $default_header_bgcolor,
    'wp-head-callback' => 'scm_theme_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new Customize_Alpha_Color_Control(
    $wp_customize, 'header_bgcolor', array(
    'label'    => 'Header Background Color',
    'section'  => 'colors',
    'settings' => 'header_bgcolor',
    'show_opacity'  => true, 
  )));
  // Footer background color customizer
  $wp_customize->add_setting('footer_bgcolor', array(
    'default'          => $default_footer_bgcolor,
    'wp-head-callback' => 'scm_theme_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new Customize_Alpha_Color_Control(
    $wp_customize, 'footer_bgcolor', array(
    'label'    => 'Footer Background Color',
    'section'  => 'colors',
    'settings' => 'footer_bgcolor',
    'show_opacity'  => true, 
  )));
  // Text color customizer
  $wp_customize->add_setting('txtcolor', array(
    'default'          => $default_txtcolor,
    'wp-head-callback' => 'scm_theme_style',
    'transport'        => 'postMessage',
  ));
  $wp_customize->add_control(new Customize_Alpha_Color_Control(
    $wp_customize, 'txtcolor', array(
    'label'    => 'Text Color',
    'section'  => 'colors',
    'settings' => 'txtcolor',
    'show_opacity'  => true, 
  )));
}
add_action('customize_register', 'header_footer_color_customizer');
/**
 * Add postMessage support for site title and description for the Theme color Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme color Customizer object.
 */
function themename_customize_color_register($wp_customize)
{
  $wp_customize->get_setting('header_bgcolor')->transport       = 'postMessage';
  $wp_customize->get_setting('footer_bgcolor')->transport       = 'postMessage';
  $wp_customize->get_setting('txtcolor')->transport             = 'postMessage';
}
add_action('customize_register', 'themename_customize_color_register');



