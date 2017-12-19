<?php


add_shortcode( 'bs_latest_news', 'bs_latest_news_sc' );

function bs_latest_news_sc($atts, $content = null) {
	$attributes = [ ];

  $at = shortcode_atts( $attributes , $atts );
	$dir_base =  str_replace('shortcodes', '', __DIR__);
	
  ob_start();
?>

<div class="l-wrap" style="margin: 40px auto">
	<h3 style="font-size: 28px; font-weight: normal; display: block; margin: 40px 0;color: #3C515F"><?php echo gett('Latest news'); ?></h3>
	<?php require($dir_base . 'templates/post_latest.php') ?>
</div>

<?php

  return ob_get_clean();
}
