<?php

function bs_projects_about_sc($atts, $content = null) {
	$attributes = [
    'projects' => ''
	];

  $at = shortcode_atts( $attributes , $atts );

	$projects = array_map(function($project) {
		$project['imgUrl'] = isset($project['image']) ?  wp_get_attachment_url($project['image']) : '';
		return $project;
	}, vc_param_group_parse_atts( $at['projects'] ));

  ob_start();
?>

<div
  class="bs-projects-about"
  data-props='{
    "projects": <?php echo str_replace('\n', '<br/>', cleanQuote(json_encode($projects)))  ?>,
		"donate": "<?php echo gett('Donate') ?>",
    "texts": {
      "stories": "<?php echo gett('stories') ?>"
    }
  }'
>
</div>

<?php
  return ob_get_clean();
}

  add_shortcode( 'bs_projects_about', 'bs_projects_about_sc' );

  
