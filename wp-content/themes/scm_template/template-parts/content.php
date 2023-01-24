<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package scm_template
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h2 class="entry-title">
      <a href="<?php the_permalink();?>" rel="bookmark">
        <?php echo mb_strimwidth(get_the_title(), 0, 40, '...'); ?>
      </a>
    </h2>
  </header><!-- .entry-header -->

  <div class="entry-thumbnail">
    <?php
    if (has_post_thumbnail()) :
      the_post_thumbnail();
    else :
      the_dummy_thumbnail();
    endif;
    ?>
  </div>

  <div class="entry-summary">
    <?php dynamic_excerpt(); ?>
  </div><!-- .entry-summary -->

  <footer class="entry-footer">
    <?php scm_template_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-## -->
