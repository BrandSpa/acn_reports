<?php
add_shortcode( 'bs_candle', 'bs_candle_sc' );

function bs_candle_sc($atts, $content = null) {
	$attributes = [
		"width" => "150px",
		"style" => "margin: 80px auto -100px auto; position: relative",
		"flame_top" => "-75px"
	];

  $at = shortcode_atts( $attributes , $atts );

  ob_start();
?>

<style>

.candle {
	animation: show 8s ease-in;
}

@keyframes show {
  0%{ opacity: 0;}
  100%{ opacity: 1}
}

</style>

<div class="candle-container" style="width: <?php echo $at['width'] ?>;<?php echo $at['style'] ?>">
	<img style="width: 100%; position: absolute; top: <?php echo $at['flame_top'] ?>" src="<?php echo get_template_directory_uri() ?>/public/img/candle_flame.png" class="candle" alt="">
	<img style="width: 100%" src="<?php echo get_template_directory_uri() ?>/public/img/candle_base.png" alt="">
</div>

<script>
	onLoad(function() {
		//jquery stuff

	});
</script>
<?php

  return ob_get_clean();
}
