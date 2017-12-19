<?php

function bs_campaigns_slider_vc() {
	$params = array(
		[
			'type' => 'textfield',
			'heading' => 'Enter interval',
			'value' => '3000',
			'param_name' => 'interval'
		],
    array(
      'type' => 'param_group',
      'value' => '',
      'param_name' => 'slides',
				'params' => array(
					array(
						'type' => 'attach_image',
						'heading' => 'Enter image',
            'param_name' => 'image',
					),
					array(
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Enter url',
            'param_name' => 'url',
          ),
        	array(
            'type' => 'textfield',
            'value' => '',
            'heading' => 'Enter title',
            'param_name' => 'title',
          ),
					array(
          	'type' => 'textarea',
            'value' => '',
            'heading' => 'Enter content',
            'param_name' => 'content',
          ),
					array(
						'type' => 'textfield',
						'heading' => 'url embed video',
						'param_name' => 'url'
					),
					array(
						'type' => 'colorpicker',
						'heading' => 'color',
						'param_name' => 'bg'
					),
    	)
  	)
);

	vc_map(
    [
      "name" =>  "BS Campaign Slider",
      "base" => "bs_campaigns_slider",
      "category" =>  "BS",
      'params' => $params
		]
	);
};

add_action( 'vc_before_init', 'bs_campaigns_slider_vc' );
