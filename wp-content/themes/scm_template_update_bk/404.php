<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package scm_theme
 */

get_header();
?>
<div class="content">
  <div class="inner flex">

    <main id="primary" class="site-main">

      <section class="error-404 not-found">
        <header class="page-header">
          <h1 class="cmn-ttl">Oops! That page can&rsquo;t be found.</h1>
        </header><!-- .page-header -->

        <div class="page-content">
          <p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
          <?php get_search_form(); ?>
        </div><!-- .page-content -->
      </section><!-- .error-404 -->

    </main><!-- #main -->
    <?php get_sidebar(); ?>
  </div>
</div>

<?php
get_footer();