<?php

add_action( 'vc_before_init', 'bs_contact_call_vc' );

function bs_contact_call_vc() {
	$params = [
		[
      "type" => "textfield",
      "heading" => "redirect page",
      "param_name" => "redirect",
      "value" => ''
		],
		[
      "type" => "textfield",
      "heading" => "name placeholder",
      "param_name" => "name-placeholder",
      "value" => 'Name'
		],
		[
      "type" => "textfield",
      "heading" => "lastname placeholder",
      "param_name" => "lastname-placeholder",
      "value" => 'Lastname'
    ],
    [
      "type" => "textfield",
      "heading" => "email placeholder",
      "param_name" => "email-placeholder",
      "value" => 'Email'
    ],
		[
      "type" => "textfield",
      "heading" => "country placeholder",
      "param_name" => "country-placeholder",
      "value" => 'Country'
		],
		[
        "type" => "textfield",
        "heading" => "city placeholder",
        "param_name" => "city-placeholder",
        "value" => 'City'
		],
		[
        "type" => "textfield",
        "heading" => "phone placeholder",
        "param_name" => "phone-placeholder",
        "value" => 'Phone'
		],
		[
      "type" => "textfield",
      "heading" => "name validation",
      "param_name" => "name-validation",
      "value" => 'Name required'
		],
		[
      "type" => "textfield",
      "heading" => "phone validation",
      "param_name" => "phone-validation",
      "value" => 'Phone required'
		],
		[
			"type" => "textfield",
      "heading" => "convertloop event name",
      "param_name" => "convertloop_event",
      "value" => 'Subscription'
		],
		[
			"type" => "textfield",
      "heading" => "convertloop tags",
      "param_name" => "convertloop_tags",
      "value" => '',
			"description" => "fomart: tag1,tag2"
    ],
    [
      "type" => "textfield",
      "heading" => "button text",
      "param_name" => "btn_text",
      "value" => '',
    ],
    [
      "type" => "textfield",
      "heading" => "loading text",
      "param_name" => "loading_text",
      "value" => 'loading...',
    ]
	];
  vc_map(
    array(
      "name" =>  "BS Contact Call",
      "base" => "bs_contact_call",
      "category" =>  "BS",
      "params" => $params
    )
  );
}
