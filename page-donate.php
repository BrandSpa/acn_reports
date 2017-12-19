<?php
/**
 * Template Name: Page Donate
 *
 * @package WordPress
 * @since acn_int 1.0
 */
?>

<?php get_header('donate') ?>

<div id="acn_int" class="l-wrap" >
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <?php the_content() ?>
    
  <?php endwhile; else : ?>
    <h1>
    <?php echo gett('404') ?>
    </h1>
  <?php endif; ?>
</div>

<?php get_footer('donate') ?>
