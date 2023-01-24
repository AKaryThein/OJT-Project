<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package scm_theme
 */

?>
<footer id="colophon" class="site-footer">
  <div class="inner">
    <div class="site-info">
      <div class="footer-widgets">
      <?php
          if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-logo')) :
          endif;
          ?>
        <?php
          if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-widget')) :
          endif;
          ?>
      </div><!-- .footer-widget -->
      <div class="site-copy">
        <?php
          if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('copy')) :?>
            <p>Copyright © Seattle Consulting Myanmar Co., Ltd. All rights reserved.</p>
        <?php endif;
          ?>
      </div>
    </div><!-- .site-info -->
  </div><!-- .inner -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>