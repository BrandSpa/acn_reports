<?php

function acn_fullpage_slide_bgs_sc( $atts, $content ) {
	$at = shortcode_atts([
		"bg_img" => "",
		"bg_img_mobile" => "",
		"overlay_img" => "",
		"overlay_img_mobile" => "",
		"bg_color" => "#000",
		"bg-animation" => "bg-left",
		"overlay-animation" => "bg-left",
		"story_num" => "",
		"index_num" => "",
		"uniq_name" => "slide-" . uniqid() . rand(0, 100)
	], $atts);

	$bgUrl = wp_get_attachment_url( $at['bg_img'] );
	$bgUrlMobile = wp_get_attachment_url( $at['bg_img_mobile'] );
	$overlayUrl = wp_get_attachment_url( $at['overlay_img'] );
	$overlayUrlMobile = wp_get_attachment_url( $at['overlay_img_mobile'] );

	ob_start();
	?>

	<div
		class="section section--<?php echo $at['uniq_name'] ?>"
		data-anchor="slide-<?php echo $at['uniq_name'] ?>"
		data-story="<?php echo $at['story_num'] ?>"
		data-index="<?php echo $at['index_num'] ?>"
	>
		<style>
			.section--<?php echo $at['uniq_name'] ?>.active .layer-bg-animation {
				animation: <?php echo $at['bg-animation'] ?> 2.5s;
				opacity: 1;
			}

			.section--<?php echo $at['uniq_name'] ?>.active .layer-overlay-animation {
				animation: overlay-left 2.5s;
				opacity: 1;
				background-color: transparent;
			}

			@media (max-width: 600px) {
				.section--<?php echo $at['uniq_name'] ?>.active .layer-bg-animation {
					animation: <?php echo $at['bg-animation'] ?>-mobile 2.5s;
					opacity: 1;
				}

				.section--<?php echo $at['uniq_name'] ?>.active .layer-overlay-animation {
					animation: <?php echo $at['overlay-animation'] ?>-mobile 2.5s;
				}
			}

	</style>

	<div class="section__content">
			<?php echo do_shortcode($content) ?>
			<button class="section__down" ><i class="ion-chevron-down"></i></button>
	</div>

	<div class="section__layers">
		<div
				class="layer-overlay-animation section__layers__layer lazyload"
				data-src="<?php echo $overlayUrl ?>"
				data-bgset="<?php echo $overlayUrlMobile ?> [(max-width: 767px)] | <?php echo $overlayUrl ?>"
				data-sizes="auto"
				style=" z-index: 2"
		>
		</div>
		<div
				class="layer-bg-animation section__layers__layer lazyload"
				data-src="<?php echo $bgUrl ?>"
				data-bgset=" <?php echo $bgUrlMobile ?> [(max-width: 767px)] | <?php echo $bgUrl ?>"
				data-sizes="auto"
				style=" z-index: 1"
		>
		</div>

	</div>

</div>
	<?php
	return ob_get_clean();
}

add_shortcode( 'acn_fullpage_slide_bgs', 'acn_fullpage_slide_bgs_sc' );
