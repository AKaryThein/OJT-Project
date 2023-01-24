<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scm_theme
 */

?>


<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <a href="<?php the_permalink(); ?>">
            <h2 class="post-ttl"><?php the_title(); ?></h2>
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
            </p>
							</a>
							</li><!-- #post-<?php the_ID(); ?> -->