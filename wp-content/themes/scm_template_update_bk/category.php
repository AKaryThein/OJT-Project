<?php
/**
 * The template for displaying category pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package scm_theme
 */

get_header();
?>
<div class="content">
  <div class="inner flex">
    <main id="primary" class="site-main">
      <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <?php
				single_cat_title( '<h1 class="cmn-ttl">', '</h1>' );
				?>
      </header><!-- .page-header -->
      <ul class="list">
        <?php	while ( have_posts() ) : the_post(); ?>
        <li>
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
            <div class="post-content">
              <?php 
              the_content();
               ?>
            </div>
            <div class="post-tag">
            <?php the_tags(''); ?>
            </div>
          </a>
        </li>
        <?php	endwhile; ?>
              </ul>
              <?php	wp_pagenavi(); 
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

    </main><!-- #main -->
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();