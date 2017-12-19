<?php
  function acn_fullpage_modal_vc() {
    $params = [
      [
        "heading" => "Anchor",
        "type" => "textfield",
        "param_name" => "uniq_name"
      ],
			[
        "heading" => "Post Content",
				"type" => "textarea_html",
				"param_name" => "content"
			]
		];

    vc_map(
      array(
        "name" =>  "FullPage Modal",
        "base" => "acn_fullpage_modal",
        "category" =>  "ACN",
				"content_element" => true,
        "params" => $params
      )
    );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_acn_fullpage_modal extends WPBakeryShortCode {}
		}
  }

add_action( 'vc_before_init', 'acn_fullpage_modal_vc' );
