<?php
  function acn_fullpage_slide_end_vc() {
    $params = [
      [
        "heading" => "Redirect url",
        "type" => "textfield",
        "param_name" => "redirect_url"
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
      ]
		];

    vc_map(
      array(
        "name" =>  "FullPage Slide end",
        "base" => "acn_fullpage_slide_end",
        "category" =>  "ACN",
				"content_element" => true,
        "params" => $params
      )
    );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_acn_fullpage_slide_end extends WPBakeryShortCode {}
		}
  }

add_action( 'vc_before_init', 'acn_fullpage_slide_end_vc' );
