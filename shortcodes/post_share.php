<?php

function bs_share_post_sc($atts, $content = null) {
	$attributes = [
		'title' => gett('¿Quiéres que el mundo conozca la realidad de la Iglesia que Sufre en el Mundo?'),
		'subtitle' => gett('Comparte este artículo'),
	];

  $at = shortcode_atts( $attributes , $atts );

  ob_start();
?>
	<div class="bs-post-share" data-props='{
		"title":  <?php echo $at['title'] ?>,
	  "subtitle": <?php echo $at['subtitle'] ?>
	}'></div>
<?php

  return ob_get_clean();
}

add_shortcode( 'bs_share_post', 'bs_share_post_sc' );
