<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
				<h1 class="cmn-ttl">
					<?php
					printf( esc_html__( 'Search Results for: %s', 'scm_theme' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->
			<ul class="list">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'search' );
				endwhile;
				?>
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
