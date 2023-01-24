<?php
/**
 * scm_theme Theme Customizer
 *
 * @package scm_theme
 */

if (!function_exists('scm_theme_style')) :
  /**
   * Styles the header image and text displayed on the blog
   *
   * @see scm_theme_custom_header_setup().
   */
  function scm_theme_style()
  {
    // Theme color
    $header_text_color    = get_header_textcolor();
    $body_bg_image        = get_background_image();
    $body_bg_color        = get_background_color();
    $header_bg_color      = get_theme_mod('header_bgcolor');
    $footer_bg_color      = get_theme_mod('footer_bgcolor');
    $txt_color            = get_theme_mod('txtcolor');

    // If we get this far, we have custom styles. Let's do this.
    ?>
    <style type="text/css">
      <?php
      // Has the text been hidden?
      if ('blank' === $header_text_color) :
      ?>
        .site-title,
        .site-description {
          position: absolute;
          clip: rect(1px, 1px, 1px, 1px);
        }
      <?php
      // If the user has set a custom color for the text use that.
      else :
      ?>
        .site-title a,
        .site-description {
          color: #<?php echo esc_attr($header_text_color); ?>;
        }
      <?php endif;?>
      .site .site-header {
        background-color: <?php echo esc_attr($header_bg_color); ?>;
      }
      footer.site-footer {
        background-color: <?php echo esc_attr($footer_bg_color); ?>;
      }
      body {
        color: <?php echo esc_attr($txt_color); ?>;
        background-color: #<?php echo esc_attr($body_bg_color); ?>;
        background-image: url(<?php echo esc_attr($body_bg_image); ?>);
      }
    </style>
    <?php
  }
endif; // scm_theme_style

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function scm_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'scm_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'scm_theme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'scm_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function scm_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function scm_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function scm_theme_customize_preview_js() {
	wp_enqueue_script( 'scm_theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'scm_theme_customize_preview_js' );
