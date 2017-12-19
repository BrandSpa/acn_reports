<?php

function bs_section_video_vc() {  
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
        "type" => "textfield",
        "heading" => "Image height",
        "param_name" => "image_height",
        "value" => 'auto'
			],
			[
        "type" => "textfield",
        "heading" => "Image margin",
        "param_name" => "image_margin",
        "value" => '0 auto'
			]
	];

  	vc_map(
      array(
        "name" =>  "BS Section video",
        "base" => "bs_section_video",
        "category" =>  "BS",
        "params" => $params
      ) 
    );
}

add_action( 'vc_before_init', 'bs_section_video_vc' );