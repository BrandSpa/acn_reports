<?php

function bs_campaigns_slider_sc($atts, $content = null) {
  $attributes = [
    'slides' => '',
		'interval' => '3000'
	];

  $at = shortcode_atts( $attributes , $atts );

	$slides = array_map(function($slide) {
		$slide['image'] = wp_get_attachment_url($slide['image']);
		return $slide;
	}, vc_param_group_parse_atts( $at['slides'] ));

  ob_start();
?>

<div
	class="bs-campaings-slider"
	data-props='{"slides": <?php echo cleanQuote(json_encode( $slides )); ?>, "interval": <?php echo $at["interval"] ?>}'
>
</div>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_campaigns_slider', 'bs_campaigns_slider_sc' );
