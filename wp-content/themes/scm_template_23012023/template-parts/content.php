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
      Posted on <?php the_time('F jS , Y'); ?>
      Last modified on <?php the_modified_time('F jS, Y'); ?>
      by <?php the_author(); ?>
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <p class="thumbnail-img">
    <?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								}
								else {
									echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) 
										. '/assets/img/img_thumbnail_default.jpg" />';
								}
							?>
  </p><!-- .post-thumbnail -->

  <div class="entry-content">
    <?php the_content(); ?>
  </div><!-- .entry-content -->
  <div class="post-tag">
            <?php the_tags(''); ?>
            </div>

</article><!-- #post-<?php the_ID(); ?> -->