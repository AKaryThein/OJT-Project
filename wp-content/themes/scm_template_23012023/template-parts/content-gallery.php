<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scm_theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php
		if ( is_singular() ) :
			the_title( '<h1 class="cmn-ttl">', '</h1>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
    <div class="entry-meta">
      <h3>Post format gallery!</h3>
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->