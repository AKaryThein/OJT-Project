<?php
/*
 * Customizer for header option
 * User can decide display or not (logo, header, description) separately
 */
function themename_header_customizer($wp_customize)
{
  // Start of the Header Options
  $wp_customize->add_panel('themename_options', array(
    'capabitity'  => 'edit_theme_options',
    'description' => __('Change the Header Settings from here as you want.', 'themename'),
    'priority'    => 30,
    'title'       => __('Logo Option', 'themename'),
  ));

  // logo upload options
  $wp_customize->add_section('themename_header_logo', array(
    'priority' => 1,
    'title'    => __('Header Logo', 'themename'),
    'panel'    => 'themename_options',
  ));

  if (!function_exists('the_custom_logo')) :
    $wp_customize->add_setting('themename_logo', array(
      'default'           => '',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'themename_logo', array(
      'label'   => __('Upload logo for your header here.', 'themename'),
      'section' => 'themename_header_logo',
      'setting' => 'themename_logo',
    )));
  endif;

  $wp_customize->add_setting('themename_header_logo_placement', array(
    'default'           => 'show_both',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'themename_radio_select_sanitize',
  ));

  // Create options of logo and title placement
  $wp_customize->add_control('themename_header_logo_placement', array(
      'type'             => 'radio',
      'label'            => __('Please select the logo display from the following.', 'themename'),
      'section'          => 'themename_header_logo',
      'choices'          => array(
      'header_logo_only' => __('Header logo only', 'themename'),
      'header_text_only' => __('Header title only', 'themename'),
      'show_both'        => __('Show Both', 'themename'),
      'disable'          => __('Both Hidden', 'themename'),
    ),
  ));
}
add_action('customize_register', 'themename_header_customizer');

// call back funtion of radio select
function themename_radio_select_sanitize($input, $setting)
{
  // Ensuring that the input is a slug.
  $input = sanitize_key($input);
  // Get the list of choices from the control associated with the setting.
  $choices = $setting->manager->get_control($setting->id)->choices;
  // If the input is a valid key, return it, else, return the default.
  return (array_key_exists($input, $choices) ? $input : $setting->default);
}

