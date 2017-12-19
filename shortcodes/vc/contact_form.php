<?php

add_action( 'vc_before_init', 'bs_contact_form_vc' );

function bs_contact_form_vc() {
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
        "heading" => "name validation",
        "param_name" => "name-validation",
        "value" => 'Name required'
			],
			[
        "type" => "textfield",
        "heading" => "lastname validation",
        "param_name" => "lastname-validation",
        "value" => 'Lastname required'
			],
			[
        "type" => "textfield",
        "heading" => "email validation",
        "param_name" => "email-validation",
        "value" => 'Email required'
			],
			[
				"type" => "textfield",
				"heading" => "terms text",
				"param_name" => "terms-text",
				"value" => "I want to receive information about ACN, its projects and updated, and I accept the terms and conditions"
			],
			[
				"type" => "textfield",
				"heading" => "Button text",
				"param_name" => "button-text",
				"value" => gett('Pray')
			],
			[
        "type" => "colorpicker",
        "heading" => "button color",
        "param_name" => "btn-bg",
        "value" => '#F4334A'
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
			"type" => "checkbox",
			"param_name" => "vertical",
			"heading" => "Vertical",
			"value" => ""
		],
		[
			"type" => "checkbox",
			"param_name" => "terms",
			"heading" => "Show checkbox",
			"value" => false
		]
	];

  	vc_map(
      array(
        "name" =>  "BS Contact Form",
        "base" => "bs_contact_form",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
