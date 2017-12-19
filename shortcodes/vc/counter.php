<?php

add_action( 'vc_before_init', 'bs_counter_vc' );

  function bs_counter_vc() {
		$params = [
      [
        "type" => "textfield",
        "heading" => "Number",
        "param_name" => 'num',
        "value" => '1000'
      ],
      [
        "type" => "textfield",
        "heading" => "Style",
        "param_name" => 'style',
        "value" => ''
      ],
      [
        "type" => "textfield",
        "heading" => "Custom classes",
        "param_name" => 'classes',
        "value" => ''
      ]
		];

  	vc_map(
      array(
        "name" =>  "BS Counter",
        "base" => "bs_counter",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
