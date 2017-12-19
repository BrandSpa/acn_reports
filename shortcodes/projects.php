<?php

function bs_projects_sc($atts, $content = null) {
	$attributes = ['images' => ''];
  $arrAtts = [1,2,3,4,5,6,7,8,9];

  foreach($arrAtts as $i) {
    $attributes =  array_merge($attributes, ['title_' .$i => '' ]);
    $attributes =  array_merge($attributes, ['content_' .$i => '' ]);
  }

  $at = shortcode_atts( $attributes , $atts );
  $slides = [];

  foreach($arrAtts as $i) {
    $images = explode(',', $at['images']);
    $indexImg = $i - 1;

    if(isset($images[$indexImg])) {
      array_push($slides, [
        'title' => cleanQuote($at['title_' .$i]),
        'text' =>  cleanQuote($at['content_' .$i]),
        'imgUrl' => wp_get_attachment_image_src($images[$indexImg], 'full')[0],
      ]);
    }

  }

	$props = [
		"contents" => $slides,
		"donate" => gett('Donate')
	];

  ob_start();
?>

<div
  class="projects-container"
  data-props='<?php echo json_encode($props); ?>'
></div>

<?php

  return ob_get_clean();
}

  add_shortcode( 'bs_projects', 'bs_projects_sc' );

  function bs_projects_vc() {
    $arrAtts = [1,2,3,4,5,6,7,8,9];
    $params = [
      array(
        "type" => "attach_images",
        "param_name" => "images"
      ),
    ];

    foreach($arrAtts as $i) {
      array_push($params,
        [
          'type' => 'textfield',
          'param_name' => 'title_' .$i,
          'heading' => 'title ' .$i,
          'value' => ''
        ],
         [
          'type' => 'textarea',
          'param_name' => 'content_' .$i,
          'heading' => 'content ' .$i,
          'value' => ''
        ]
      );
    }

    vc_map(
      array(
        "name" =>  "BS Projects",
        "base" => "bs_projects",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }

  add_action( 'vc_before_init', 'bs_projects_vc' );
