<?php


  function bs_offices_info_vc() {
		$params = [];

  	vc_map(
      array(
        "name" =>  "BS Offices info",
        "base" => "bs_offices_info",
        "category" =>  "BS",
        "params" => $params
      )
    );
  };

add_action( 'vc_before_init', 'bs_offices_info_vc' );

?>
