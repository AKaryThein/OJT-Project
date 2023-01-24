<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package scm_theme
 */

get_header();
?>
<div class="content">
  <div class="inner flex">
    <main id="primary" class="site-main">
      <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			?>
      <ul class="pagination">
        <li class="page-l">
          <?php previous_post('&laquo; % | ','Previous Post','TRUE') ?>
        </li>
        <li class="single_list">
          <?php
           $categories_list = get_the_category_list( esc_html__( ', ', 'scm_theme' ) );
						if ( $categories_list ) {
							printf(' &nbsp;' . $categories_list . '&nbsp;'); 
						}    
						?>
        </li>
        <li class="page-r">
          <?php next_post(' | % &raquo;','Next Post','TRUE') ?>
        </li>
      </ul>
      <?php
		endwhile; // End of the loop.
		?>

    </main><!-- #main -->
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();