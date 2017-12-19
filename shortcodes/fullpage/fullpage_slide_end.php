<?php

function acn_fullpage_slide_end_sc( $atts, $content ) {
	$at = shortcode_atts([
    "redirect_url" => "",
		"story_num" => "",
		"index_num" => "",
		"uniq_name" => "slide-" . uniqid() . rand(0, 100)
	], $atts);


	ob_start();
?>

	<div
		class="section section--<?php echo $at['uniq_name'] ?> "
		data-anchor="<?php echo $at['uniq_name'] ?>"
		data-story="<?php echo $at['story_num'] ?>"
		data-index="<?php echo $at['index_num'] ?>"
	>
		<div class="section__content">
			<?php echo do_shortcode($content) ?>
			<button class="section__down section__down--end" data-redirect="<?php echo $at['redirect_url'] ?>"><i class="ion-chevron-down"></i></button>
		</div>

	  <div class="fp-bg section__bg-container" style="background: #000"></div>
	</div>

	<?php
	return ob_get_clean();
}

add_shortcode( 'acn_fullpage_slide_end', 'acn_fullpage_slide_end_sc' );
