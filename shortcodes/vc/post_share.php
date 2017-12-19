<?php

add_action( 'vc_before_init', 'bs_share_post_vc' );

  function bs_share_post_vc() {
		$params = [];

  	vc_map(
      array(
        "name" =>  "BS Post Share Style",
        "base" => "bs_share_post",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
