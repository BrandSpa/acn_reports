<?php

function bs_projects_info_sc($atts, $content = null) {
	$attributes = [ 
    'projects' => ''
	];

  $at = shortcode_atts( $attributes , $atts );
	
	$projects = vc_param_group_parse_atts( $at['projects'] );

  ob_start();
?>

<div
  class="bs-projects-info" 
  data-props='{
    "projects": <?php echo str_replace('\n', '<br/>', cleanQuote(json_encode($projects)))  ?>
  }'
>
</div>

<?php
  return ob_get_clean();
}

  add_shortcode( 'bs_projects_info', 'bs_projects_info_sc' );

  function bs_projects_info_vc() {
    $subparams = [
			[
				"type" => "textfield",
        "heading" => "enter number",
        "param_name" => "number"
			],
			[
				"type" => "textfield",
        "heading" => "enter text",
        "param_name" => "number_text"
			]
    ];

    $params = [
      [
        'type' => 'param_group',
        'param_name' => 'projects',
        'params' => $subparams,
				'value' => ''
      ]
    ];

    vc_map(
      array(
        "name" =>  "BS Projects Info",
        "base" => "bs_projects_info",
        "category" =>  "BS",
        "params" => $params
      ) 
    );
  }

  add_action( 'vc_before_init', 'bs_projects_info_vc' );