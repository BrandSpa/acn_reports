<?php

function acn_fullpage_slide_video_sc( $atts, $content ) {
	$at = shortcode_atts([
		"bg_img" => "",
		"bg_img_mobile" => "",
		"bg_color" => "#fff",
		"video_url" => "",
		"story_num" => "",
		"index_num" => "",
		"btn_title" => "",
		"uniq_name" => "slide-" . uniqid() . rand(0, 100)
	], $atts);

	$bgUrl = wp_get_attachment_url( $at['bg_img'] );
	$bgUrlMobile = wp_get_attachment_url( $at['bg_img_mobile'] );
	ob_start();
	?>

		<div
			class="section section--<?php echo $at['uniq_name'] ?>"
			data-anchor="slide-<?php echo $at['uniq_name'] ?>"
			data-story="<?php echo $at['story_num'] ?>"
			data-index="<?php echo $at['index_num'] ?>"
		>

			<div class="section__content">
				<?php echo do_shortcode($content) ?>

				<div class="section__open-container">
					<h5><?php echo $at['btn_title'] ?></h5>
					<button class="section__open section__open-video"><i class="ion-social-youtube"></i></button>
				</div>
			</div>

			<div class="section__video" >

				<button class="section__video__close section__open-video">
					<i class="ion-close-round"></i>
				</button>

				<div class="embed-container">
					<iframe data-src="<?php echo $at['video_url'] ?>?autoplay=1" frameborder="0" allowfullscreen ></iframe>
				</div>
			</div>

			<div class="section__bg-container">
				<?php if(!empty($bgUrlMobile) && !empty($bgUrl)): ?>
					<div class="section__bg lazyload" data-src="<?php echo $bgUrl ?>" data-bgset="<?php echo $bgUrlMobile ?> [(max-width: 767px)] | <?php echo $bgUrl ?>" data-sizes="auto"></div>
				<?php endif; ?>
			</div>

		</div>

	<?php
	return ob_get_clean();
}

add_shortcode( 'acn_fullpage_slide_video', 'acn_fullpage_slide_video_sc' );
