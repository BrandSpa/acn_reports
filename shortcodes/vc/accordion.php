<?php

function bs_accordion_vc() {
		$params = [
			[
        "type" => "textarea_html",
        "heading" => "Content",
        "param_name" => "content",
        "value" => ''
			],
      [
        "type" => "textfield",
        "heading" => "Title",
        "param_name" => "btn_title",
        "value" => ''
			],
      [
        "type" => "textfield",
        "heading" => "Background",
        "param_name" => "background",
        "value" => '#687f87'
			],
      [
        "type" => "textfield",
        "heading" => "Title color",
        "param_name" => 'btn_title_color',
        "value" => '#fff'
      ]
		];

  	vc_map(
      array(
        "name" =>  "BS Accordion",
        "base" => "bs_accordion",
        "category" =>  "BS",
        "params" => $params
      )
    );
};

add_action( 'vc_before_init', 'bs_accordion_vc' );
