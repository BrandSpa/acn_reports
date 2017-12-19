<?php

function acn_fullpage_slide_points_vc() {

    $spots_content_subparams = [
      [
        "type" => "attach_image",
        "heading" => "header image",
        "param_name" => "header_img"
      ],
      [
        "type" => "textfield",
        "heading" => "City",
        "param_name" => "city",
        "value" => ""
      ],
      [
        "type" => "textfield",
        "heading" => "subtitle",
        "param_name" => "city_subtitle",
        "value" => "Restoration Process and Returnees"
      ],
      [
        "type" => "textfield",
        "heading" => "Families already returned number",
        "param_name" => "families_already_returned_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Families already returned text",
        "param_name" => "families_already_returned_text",
        "value" => "Families already returned"
      ],
      [
        "type" => "textfield",
        "heading" => "Damaged number",
        "param_name" => "damaged_houses_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Damaged title 1",
        "param_name" => "damaged_houses_title_1",
        "value" => "Damaged"
      ],
      [
        "type" => "textfield",
        "heading" => "Damaged title 2",
        "param_name" => "damaged_houses_title_2",
        "value" => "houses"
      ],
      [
        "type" => "textfield",
        "heading" => "percentage",
        "param_name" => "percentage",
        "value" => "2%"
      ],
      [
        "type" => "textfield",
        "heading" => "Number of houses registered to be renovated number",
        "param_name" => "number_of_houses_registered_to_be_renovated_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Number of houses registered to be renovated text",
        "param_name" => "number_of_houses_registered_to_be_renovated_text",
        "value" => "Number of houses registered to be renovated"
      ],
      [
          "type" => "textfield",
          "heading" => "Christians already returned num",
          "param_name" => "christians_already_returned_num",
          "value" => "12970"
      ],
      [
          "type" => "textfield",
          "heading" => "Christians already returned text",
          "param_name" => "christians_already_returned_text",
          "value" => "Christians already returned"
      ],
      [
        "type" => "textfield",
        "heading" => "Houses Totally Destroyed number",
        "param_name" => "houses_totally_destroyed_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Houses Totally Destroyed text",
        "param_name" => "houses_totally_destroyed_text",
        "value" => "Houses Totally Destroyed",
      ],
      [
        "type" => "textfield",
        "heading" => "Houses Burnt number",
        "param_name" => "houses_burnt_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Houses Burnt text",
        "param_name" => "houses_burnt_text",
        "value" => "Houses Burnt"
      ],
      [
        "type" => "textfield",
        "heading" => "Houses Partially Damaged num",
        "param_name" => "houses_partially_damaged_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Houses Partially Damaged text",
        "param_name" => "houses_partially_damaged_text",
        "value" => "Houses Partially Damaged"
      ],
      [
        "type" => "textfield",
        "heading" => "Number of houses actually being renovated number",
        "param_name" => "number_of_houses_actually_being_renovated_num",
        "value" => "12970"
      ],
      [
        "type" => "textfield",
        "heading" => "Number of houses actually being renovated text",
        "param_name" => "number_of_houses_actually_being_renovated_text",
        "value" => "Number of houses actually being renovated"
      ]
    ];

    $params = [
      [
        "heading" => "Background image",
        "type" => "attach_image",
        "param_name" => "bg_img"
      ],
      [
        "heading" => "Button title 1",
        "type" => "textfield",
        "param_name" => "btn_title_1"
      ],
      [
        "heading" => "Button title position x 1",
        "type" => "textfield",
        "param_name" => "btn_title_1_x",
        "value" => "1080.77246"
      ],
      [
        "heading" => "Button title 2",
        "type" => "textfield",
        "param_name" => "btn_title_2"
      ],
      [
        "heading" => "Button title position x 2",
        "type" => "textfield",
        "param_name" => "btn_title_2_x",
        "value" => "1079"
      ],
      [
        "heading" => "Button title 3",
        "type" => "textfield",
        "param_name" => "btn_title_3"
      ],
      [
        "heading" => "Button title position x 3",
        "type" => "textfield",
        "param_name" => "btn_title_3_x",
        "value" => "1099.07715"
      ],
      [
        "heading" => "Title",
        "type" => "textfield",
        "param_name" => "title"
      ],
      [
        "heading" => "Anchor",
        "type" => "textfield",
        "param_name" => "uniq_name"
      ],
      [
        "heading" => "Story num",
        "type" => "textfield",
        "param_name" => "story_num"
      ],
      [
        "heading" => "Slide num",
        "type" => "textfield",
        "param_name" => "index_num"
      ],
      [
        'type' => 'param_group',
        'param_name' => 'contents',
        'heading' => 'Spots Content',
        'params' =>  $spots_content_subparams
      ],
			[
        "heading" => "Post Content",
				"type" => "textarea_html",
				"param_name" => "content"
			]
		];

    $titles = [
      'Damaged Houses',
      'Totally Destroyed',
      'Burnt',
      'Partially Damaged',
      'Number of Houses Actually Being Renovated',
      'Number of families prior to 2014',
      'Number of Houses Registered to be Renovated',
      'Number of Christians Returned',
      'Families returned to Nineveh Plains',
      'Properties already restored'
    ];

    $points = [
  		'Telleskuf' => [
  			'x' => '1219.55',
  			'y' => '155.68',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		// 'Alqosh' => [
  		// 	'x' => '1422.68',
  		// 	'y' => '125',
  		// 	'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		// ],
  		'Baqofa' => [
  			'x' => '1302.85',
  			'y' => '225.32',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		'Batnaya' => [
  			'x' => '1219.66',
  			'y' => '275.41',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		'Telekef' => [
  			'x' => '1139.8',
  			'y' => '352.83',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		// 'Mosul' => [
  		// 	'x' => '1013',
  		// 	'y' => '411.91',
  		// 	'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		// ],
  		'Bahzani' => [
  			'x' => '1439.68',
  			'y' => '409.84',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		'Bashiqua' => [
  			'x' => '1351.85',
  			'y' => '466.08',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		'Bartella' => [
  			'x' => '1276.32',
  			'y' => '625.78',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		'Karamless' => [
  			'x' => '1236.11',
  			'y' => '786.49',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		],
  		'Bakhdida' => [
  			'x' => '1072.1',
  			'y' => '774.85',
  			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
  		]
  	];

    foreach ($points as $name => $point) {
      $params[] = [
          "type" => "textfield",
          "heading" => $name . ' name',
          "param_name" => strtolower($name) . '_name'
      ];
    }

    foreach ($titles as $title) {
      $params[] = [
        "type" => "textfield",
        "heading" => $title,
        "param_name" => get_att_name($title),
        "value" =>  $title
      ];

      $params[] = [
        "type" => "textfield",
        "heading" => $title . ' num',
        "param_name" => get_att_name($title) . '_num',
        "value" =>  ""
      ];
    }

    $params[] = [
      "type" => "textfield",
      "heading" => 'Properties already restored percentage',
      "param_name" => get_att_name('Properties already restored') . '_percentage',
      "value" => "2%"
    ];

    $params[] = [
      "type" => "attach_image",
      "heading" => 'Properties already restored graph',
      "param_name" => get_att_name('Properties already restored') . '_graph',
      "value" => "",
      "description" => "graph size: 300px width and 30px height"
    ];

    $params[] = [
      "type" => "textfield",
      "heading" => "Families returned to Nineveh Plains percentage",
      "param_name" => get_att_name("Families returned to Nineveh Plains") . '_percentage',
      "value" => "4%"
    ];

    $params[] = [
      "type" => "attach_image",
      "heading" => "Families returned to Nineveh Plains graph",
      "param_name" => get_att_name("Families returned to Nineveh Plains") . '_graph',
      "value" => "",
      "description" => "graph size: 300px width and 30px height"
    ];

    vc_map(
      array(
        "name" =>  "FullPage Slide Points",
        "base" => "acn_fullpage_slide_points",
        "category" =>  "ACN",
				"content_element" => true,
        "params" => $params
      )
    );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_acn_fullpage_slide_points extends WPBakeryShortCode {}
		}
  }

add_action( 'vc_before_init', 'acn_fullpage_slide_points_vc' );
