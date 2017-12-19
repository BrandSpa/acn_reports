<?php

add_action( 'vc_before_init', 'bs_posts_vc' );

  function bs_posts_vc() {
		$params = [
      [
        "type" => "textfield",
        "heading" => "See More url",
        "param_name" => "url",
        "value" => ''
			]
		];

  	vc_map(
      array(
        "name" =>  "BS posts",
        "base" => "bs_posts",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
