<?php

add_action( 'vc_before_init', 'bs_contact_gg_vc' );

function bs_contact_gg_vc() {
	$params = [
    [
      "type" => "textfield",
      "heading" => "Title",
      "param_name" => "contactTitle",
      "value" => "The ACN Head of Section for this country is:"
    ],
    [
      "type" => "textfield",
      "heading" => "Search Placeholder",
      "param_name" => "searchPlaceholder",
      "value" => "Search country"
    ]
	];

  	vc_map(
      array(
        "name" =>  "BS Contact Grants",
        "base" => "bs_contact_gg",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
