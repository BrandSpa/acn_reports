<?php

add_action( 'vc_before_init', 'bs_contact_spain_vc' );

function bs_contact_spain_vc() {
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
      "value" => 'Nombre'
		],
		[
      "type" => "textfield",
      "heading" => "lastname placeholder",
      "param_name" => "lastname-placeholder",
      "value" => 'Apellidos'
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
      "value" => 'País'
		],
		[
        "type" => "textfield",
        "heading" => "city placeholder",
        "param_name" => "city-placeholder",
        "value" => 'Ciudad'
		],
		[
			"type" => "textfield",
			"heading" => "province placeholder",
			"param_name" => "province-placeholder",
			"value" => 'Provincia'
	],
	[
    "type" => "textfield",
    "heading" => "postal code placeholder",
    "param_name" => "postal-code-placeholder",
    "value" => 'Código postal'
	],
	[
    "type" => "textfield",
    "heading" => "terms placeholder",
    "param_name" => "terms-placeholder",
    "value" => 'He leído y acepto el “Aviso de Privacidad” y la “Política de Privacidad” de Ayuda a la Iglesia Necesitada.'
	],
		// [
    //   "type" => "textfield",
    //   "heading" => "name validation",
    //   "param_name" => "name-validation",
    //   "value" => 'Name required'
		// ],
		[
      "type" => "textfield",
      "heading" => "terms validation",
      "param_name" => "terms-validation",
      "value" => 'Debe aceptar'
		],
		[
			"type" => "textfield",
      "heading" => "convertloop event name",
      "param_name" => "convertloop_event",
      "value" => 'Subscription_spain'
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
      "value" => 'Rezar',
    ],
    [
      "type" => "textfield",
      "heading" => "loading text",
      "param_name" => "loading_text",
      "value" => 'Enviando...',
    ]
	];
  vc_map(
    array(
      "name" =>  "BS Contact Spain",
      "base" => "bs_contact_spain",
      "category" =>  "BS",
      "params" => $params
    )
  );
}
