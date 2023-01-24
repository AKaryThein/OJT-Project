<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scm_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php the_title( '<h1 class="cmn-ttl">', '</h1>' ); ?>
  </header><!-- .entry-header -->

  <p>
    <?php the_post_thumbnail(); ?>
  </p>

  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->