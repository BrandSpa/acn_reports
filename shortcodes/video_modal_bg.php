<?php

function bs_video_modal_bg_sc($atts, $content = null) {
	$attributes = [
		"video_url" => "",
		"name" => "bs-video-modal",
		"image_id" => ""
	];

  $at = shortcode_atts( $attributes , $atts );
  ob_start();
?>

<div style="background: url(<?php echo wp_get_attachment_url($at['image_id']); ?>); background-size: cover">
<a href="#" id="open-<?php echo $at['name'] ?>" style="left: 0; right: 0; bottom: 0; top: 0; width: 100%; position: absolute;"></a>
	<?php echo do_shortcode($content) ?>
</div>

<div id="<?php echo $at['name'] ?>" class="modal">
  <a class="modal__close" href="#"> <i class="ion-close"></i> </a>
  <div class="iframe-container">
  	
  </div>
</div>

<script>
	onLoad(function() {
		var $iframContainer = $("#<?php echo $at['name'] ?>").find('.iframe-container');
		$("#open-<?php echo $at['name'] ?>").on('click', function(e) {
			e.preventDefault();
			var $iframContainer = $("#<?php echo $at['name'] ?>").find('.iframe-container');
			$iframContainer.css({height: '100vh'});
			$iframContainer.append('<iframe src="<?php echo $at["video_url"] ?>?autoplay=1" frameBorder="0" height="315" width="100%" allowFullScreen ></iframe>');
			$("#<?php echo $at['name'] ?>").toggleClass('modal--show');
		});

		$('.modal__close').on('click', function(e) {
			e.preventDefault();
				$("#<?php echo $at['name'] ?>").removeClass('modal--show');
			$iframContainer.css({height: '0'});
			$iframContainer.find('iframe').remove();
		});

	});
</script>

<?php
  return ob_get_clean();
}

add_shortcode( 'bs_video_modal_bg', 'bs_video_modal_bg_sc' );
add_action( 'vc_before_init', 'bs_video_modal_bg_vc' );

function bs_video_modal_bg_vc() {

	vc_map([
		"name" => "Video modal BG",
		"base" => "bs_video_modal_bg",
		"content_element" => true,
		"show_settings_on_create" => true,
		"is_container" => true,
			"params" => array(
					[
						"type" => "textfield",
						"heading" => "video url",
						"param_name" => "video_url",
						"description" => "youtube embed url"
				],
				[
					"type" => "textfield",
					"heading" => "name",
					"param_name" => "name",
					"description" => "it must be unique, if there are more then one in the page"
				],
				[
					"type" => "attach_image",
					"heading" => "background",
					"param_name" => "image_id"
				]
			),
			"js_view" => 'VcColumnView'
	]);

	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  	class WPBakeryShortCode_bs_video_modal_bg extends WPBakeryShortCodesContainer {}
	}

}
