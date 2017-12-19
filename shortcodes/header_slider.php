<?php

function bs_header_slider_sc($atts, $content = null) {
	$attributes = [
    'slides' => '',
		'interval' => 5000
	];

  $at = shortcode_atts( $attributes , $atts );

	$slides = array_map(function($slide) {
		$slide['image'] = wp_get_attachment_url($slide['image']);
		return $slide;
	}, vc_param_group_parse_atts( $atts['slides'] ));

	$props = [
		"slides" => $slides,
    "interval" => $at["interval"]
	];

  ob_start();
?>

<div
  class="header-slider"
  data-props='<?php echo json_encode($props) ?>'
>
</div>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_header_slider', 'bs_header_slider_sc' );
