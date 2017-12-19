<?php

function acn_fullpage_spot_content_sc( $atts, $content ) {
	$at = shortcode_atts([
		"name" => ""
	], $atts);
	ob_start();
?>

<div class="spot-content <?php echo $at['name'] ?>">
  <div class="spot-content__container">
  	<?php echo do_shortcode($content) ?>
  </div>
</div>

<?php
	return ob_get_clean();
}

add_shortcode( 'acn_fullpage_spot_content', 'acn_fullpage_spot_content_sc' );
