<?php

function bs_banner_donation_vc() {
		$params = [
			[
        "type" => "textfield",
        "heading" => "Banner url",
        "param_name" => "banner",
        "value" => ''
			]
		];

		$atts = [
      "other" => "Other",
      "monthly" => "Monthly",
      "once" => "Once",
      "placeholder_amount" => "Amount",
      "placeholder_credit_card" => "Credit Card Number",
      "placeholder_month" => "MM",
      "placeholder_year" => "YY",
      "placeholder_cvc" => "CVC",
      "placeholder_name" => "Name",
      "placeholder_email" => "Email",
      "placeholder_country" => "Country",
      "validation_declined" => "Your transaction was not accepted, try again",
      "validation_card" => "Incorrect card",
      "validation_month" => "Incorrect month",
      "validation_year" => "Incorrect year",
      "validation_cvc" => "Incorrect cvc",
      "validation_name" => "Incorrect name",
      "validation_email" => "Incorrect email",
      "validation_country" => "Incorrect country"
    ];

    foreach($atts as $key => $val) {
      array_push($params, [
         "type" => "textfield",
         "heading" =>  str_replace('_', ' ', $key),
         "param_name" => $key,
         "value" => $val
      ]);
    }

  	vc_map(
      array(
        "name" =>  "BS banner & donation",
        "base" => "bs_banner_donation",
        "category" =>  "BS",
        "params" => $params
      )
    );
};

add_action( 'vc_before_init', 'bs_banner_donation_vc' );

 ?>
