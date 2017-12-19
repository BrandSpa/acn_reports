<?php

function bs_section_video_content_sc($atts, $content = null) {
	$attributes = [
		'image' => '',
		'video_url' => '',
		'image_width' => '100%',
		'image_height' => 'auto',
		'image_margin' => '0 auto',
		'full_height' => ''
	];

  $at = shortcode_atts( $attributes , $atts );
	$imgUrl = wp_get_attachment_image_src($at['image'], 'full')[0];

	$props = [
		"url" => $at['video_url'],
		"imgUrl" => $imgUrl,
		"imageStyle" => [
			"width" => $at['image_width'],
			"height" => $at['image_height'],
			"margin" => $at['image_margin']
		],
		"fullHeight" => $at['full_height'],
		"content" => do_shortcode($content)
	];

  ob_start();
?>

<div class="section-video-content" data-props='<?php echo json_encode($props) ?>' ></div>

<?php
  return ob_get_clean();
}

	add_shortcode( 'bs_section_video_content', 'bs_section_video_content_sc' );
	add_action( 'vc_before_init', 'bs_section_video_content_vc' );

  function bs_section_video_content_vc() {
		$params = [
			[
        "type" => "attach_image",
        "heading" => "Image",
        "param_name" => "image",
        "value" => ''
			],
			[
        "type" => "textfield",
        "heading" => "Video url",
        "param_name" => "video_url",
        "value" => ''
			],
			[
        "type" => "textfield",
        "heading" => "Image width",
        "param_name" => "image_width",
        "value" => '100%'
			],
			[
        "type" => "checkbox",
        "heading" => "full height",
        "param_name" => "full_height",
        "value" => ''
			],
			[
        "type" => "textfield",
        "heading" => "Image margin",
        "param_name" => "image_margin",
        "value" => '0 auto'
			],
			[
				"type" => "textarea_html",
				"heading" => "content",
				"param_name" => "content"
			],

		];

  	vc_map(
      array(
        "name" =>  "BS Section video with content",
        "base" => "bs_section_video_content",
        "category" =>  "BS",
        "params" => $params
      ) 
    );
  }

