<?php

function bs_section_video_sc($atts, $content = null) {
	$attributes = [
		'image' => '',
		'video_url' => '',
		'image_width' => '100%',
		'image_height' => 'auto',
		'image_margin' => '0 auto'
	];

  $at = shortcode_atts( $attributes , $atts );
	$imgUrl = wp_get_attachment_image_src($at['image'], 'full')[0];

	$props = [
		"url" =>  $at['video_url'], 
		"imgUrl" =>  $imgUrl,
		"imageStyle" => [
			"width" =>  $at['image_width'],
			"height" =>  $at['image_height'],
			"margin" =>  $at['image_margin']
		]
	];

  ob_start();
?>

<div 
	class="section-video" 
	data-props='<?php echo json_encode($props) ?>'
>
</div>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_section_video', 'bs_section_video_sc' );
