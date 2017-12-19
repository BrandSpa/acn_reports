<?php

add_action( 'vc_before_init', 'bs_contact_us_form_vc' );

function bs_contact_us_form_vc() {
		$params = [
			[
        "type" => "textfield",
        "heading" => "name placeholder",
        "param_name" => "name_placeholder",
        "value" => 'Name'
			],
			[
        "type" => "textfield",
        "heading" => "lastname placeholder",
        "param_name" => "lastname_placeholder",
        "value" => 'Lastname'
			],
			[
        "type" => "textfield",
        "heading" => "email placeholder",
        "param_name" => "email_placeholder",
        "value" => 'Email'
			],
      [
        "type" => "textfield",
        "heading" => "message placeholder",
        "param_name" => "message_placeholder",
        "value" => 'Message'
			],
			[
        "type" => "textfield",
        "heading" => "name validation",
        "param_name" => "name_validation",
        "value" => 'Name required'
			],
			[
        "type" => "textfield",
        "heading" => "lastname validation",
        "param_name" => "lastname_validation",
        "value" => 'Lastname required'
			],
			[
        "type" => "textfield",
        "heading" => "email validation",
        "param_name" => "email_validation",
        "value" => 'Email required'
			],
      [
        "type" => "textfield",
        "heading" => "message validation",
        "param_name" => "message_validation",
        "value" => 'Email required'
			],
      [
        "type" => "textfield",
        "heading" => "message thanks",
        "param_name" => "message_thanks",
        "value" => 'Thank you very much for joining ACN'
			],
			[
				"type" => "textfield",
				"heading" => "Button text",
				"param_name" => "btn_text",
				"value" => gett('Send')
			]
	];

  	vc_map(
      array(
        "name" =>  "BS Contact Us Form",
        "base" => "bs_contact_us_form",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
