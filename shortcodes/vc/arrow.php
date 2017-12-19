<?php


  function bs_arrow_vc() {
		$params = [
      [
        "type" => "textfield",
        "heading" => "style",
        "param_name" => 'style',
        "value" => ''
      ],
			[
        "type" => "textfield",
        "heading" => "anchor",
        "param_name" => 'anchor',
        "value" => '#'
      ],
			[
        "type" => "textfield",
        "heading" => "Icon width",
        "param_name" => 'icon_width',
        "value" => '20px'
      ],
			[
        "type" => "textfield",
        "heading" => "Icon height",
        "param_name" => 'icon_height',
        "value" => '27px'
      ]
		];

  	vc_map(
      array(
        "name" =>  "BS Arrow",
        "base" => "bs_arrow",
        "category" =>  "BS",
        "params" => $params
      )
    );
  };

add_action( 'vc_before_init', 'bs_arrow_vc' );

 ?>
