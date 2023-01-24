<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
    <div id="mainvisual">
			<?php
			$i = 0;
			$page = get_page_by_path('slider', null, 'topcontent');
			$page_id = $page->ID;
			if(have_rows('add_slider', $page_id)): ?>
			<div class="slider">
				<?php while(have_rows('add_slider', $page_id)): the_row(); $i++;  ?> 
					<img src="<?php echo the_sub_field('add_slider_image'); ?>" alt="<?php echo the_sub_field('alt_name'); ?>" />
				<?php endwhile; ?>
			</div>
			<?php else: ?>
			<div class="slider">
				<img src="<?php print get_template_directory_uri(); ?>/assets/img/slider_default_01.jpg" alt="slider_default_01" />
				<img src="<?php print get_template_directory_uri(); ?>/assets/img/slider_default_02.jpg" alt="slider_default_02" />
        <img src="<?php print get_template_directory_uri(); ?>/assets/img/slider_default_01.jpg" alt="slider_default_01" />
			</div>
      <?php endif; ?>
	  </div>
	  <!-- #mainvisual -->
    <section>
      <!-- Start Top Page Content Coding.... -->
			<?php  get_lang_page_content("index"); ?>
    </section>
		</main><!-- #main -->
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();