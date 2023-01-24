<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package scm_theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div id="page" class="site">
    <header id="masthead" class="site-header">
      <div class="inner">
        <div class="site-branding">
          <?php
          if ((get_theme_mod('themename_header_logo_placement', 'header_text_only') == 'show_both')) :
            $show_both_class = 'show-both';
          else :
            $show_both_class = '';
          endif;
          ?>
          <div class="header-wrap">
            <?php
              if ((get_theme_mod('themename_header_logo_placement', 'header_text_only') == 'show_both' || get_theme_mod('themename_header_logo_placement', 'header_text_only') == 'header_logo_only')) :
                ?>
            <!-- Display site logo -->
            <div class="logo">
              <?php if (get_theme_mod('themename_logo', '') != '') : ?>
              <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                <img src="<?php echo esc_url(get_theme_mod('themename_logo')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
              </a>
              <?php endif; ?>
              <?php
                  if (function_exists('the_custom_logo') && has_custom_logo($blog_id = 0)) :
                    themename_the_custom_logo();
                  endif;
                  ?>
            </div>
            <?php
              endif;
              $screen_reader = '';
              if (get_theme_mod('themename_header_logo_placement', 'header_text_only') == 'header_logo_only' || (get_theme_mod('themename_header_logo_placement', 'header_text_only') == 'disable')) :
                $screen_reader = 'screen-reader-text';
              endif;
              ?>
            <!-- Display site title -->
            <div id="header-text" class="<?php echo $screen_reader; ?>">
              <?php if (is_front_page() || is_home()) : ?>
              <h1 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                  <?php bloginfo('name'); ?>
                </a>
              </h1>
              <?php else : ?>
              <h3 class="site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                  <?php bloginfo('name'); ?>
                </a>
              </h3>
              <?php endif; ?>
              <!-- Display site description -->
              <!--<?php
                //$description = get_bloginfo('description', 'display');
                //if ($description || is_customize_preview()) : ?>
            <p class="site-description">
            <?php // echo $description; ?>
            </p>
            <?php // endif; ?>-->
            </div>
          </div>
          <nav id="site-navigation" class="main-navigation">
            <?php wp_nav_menu([
       				'theme_location' => 'main_menu',
							'menu'            => '', 
   					]); ?>
          </nav>
        </div>
      </div>
    </header><!-- #masthead -->