<?php
/**
 * Template Name: Page Fullpage
 *
 * @package WordPress
 * @since acn_int 1.0
 */
?>

<?php get_header('fullpage') ?>

  <?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content() ?>
		<?php  endwhile; ?>
  <?php else : ?>
    <h1> <?php echo gett('404') ?> </h1>
  <?php endif; ?>

<?php get_footer('fullpage') ?>
