<?php
function bs_breadcrumb_vc() {
		$params = [
			[
        "type" => "textfield",
        "heading" => "Style",
        "param_name" => "style",
        "value" => "margin-top: 20px; text-align: center; color: #b9b9b9"
			]
		];

  	vc_map(
      array(
        "name" =>  "BS Breadcrumb",
        "base" => "bs_breadcrumb",
        "category" =>  "BS",
        "params" => $params
      )
    );
}

add_action( 'vc_before_init', 'bs_breadcrumb_vc' );

 ?>
