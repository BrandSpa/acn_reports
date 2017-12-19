<?php
  function acn_fullpage_slide_bgs_vc() {
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
        "heading" => "Content",
				"type" => "textarea_html",
				"param_name" => "content"
			]
		];

    vc_map(
      array(
        "name" =>  "FullPage Slide layers",
        "base" => "acn_fullpage_slide_bgs",
        "category" =>  "ACN",
				"content_element" => true,
        "params" => $params
      ) 
    );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_acn_fullpage_slide_bgs extends WPBakeryShortCode {}
		}
  }

add_action( 'vc_before_init', 'acn_fullpage_slide_bgs_vc' );