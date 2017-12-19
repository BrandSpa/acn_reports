<?php
  function acn_fullpage_slide_video_layers_vc() {
    $params = [
      [
				"heading" => "Background image",
        "type" => "attach_image",
        "param_name" => "bg_img"
      ],
      [
				"heading" => "Background image mobile",
        "type" => "attach_image",
        "param_name" => "bg_img_mobile"
      ],
			[
				"heading" => "Overlay image",
        "type" => "attach_image",
        "param_name" => "overlay_img"
      ],
      [
				"heading" => "Overlay image mobile",
        "type" => "attach_image",
        "param_name" => "overlay_img_mobile"
      ],
      [
        "heading" => "Anchor",
        "type" => "textfield",
        "param_name" => "uniq_name"
      ],
      [
        "heading" => "Story num",
        "type" => "textfield",
        "param_name" => "story_num"
      ],
      [
        "heading" => "Slide num",
        "type" => "textfield",
        "param_name" => "index_num"
      ],
      [
        "heading" => "Video url embed",
        "type" => "textfield",
        "param_name" => "video_url"
      ],
			[
        "heading" => "Content",
				"type" => "textarea_html",
				"param_name" => "content"
			]
		];

    vc_map(
      array(
        "name" =>  "FullPage Slide Video layers",
        "base" => "acn_fullpage_slide_video_layers",
        "category" =>  "ACN",
				"content_element" => true,
        "params" => $params
      )
    );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_acn_fullpage_slide_video_layers extends WPBakeryShortCode {}
		}
  }

add_action( 'vc_before_init', 'acn_fullpage_slide_video_layers_vc' );
