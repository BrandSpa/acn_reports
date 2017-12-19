<?php
add_shortcode( 'bs_single_modal', 'bs_single_modal_sc' );

function bs_single_modal_sc($atts, $content = null) {
  $at = shortcode_atts( [
    'image' => ''
  ] , $atts );

  ob_start();
?>

<!-- Place somewhere in the <body> of your page -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css" rel="stylesheet">

<div class="single_modal" style="margin:20px 0;">
	<?php
		$image = $at['image'];
    $attachment_meta = wp_get_attachment_metadata($image);
	?>

  <a
    href="<?php echo wp_get_attachment_url($image) ?>"
    data-lightbox="sameGroup"
    data-title="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
  >
    <img
      style="max-width:100%;"
      src="<?php echo wp_get_attachment_url($image) ?>"
      alt="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
    >
  </a>
</div>


<script>
	onLoad(function() {

	});
</script>



<?php

  return ob_get_clean();
}


add_action( 'vc_before_init', 'bs_single_modal_vc' );

  function bs_single_modal_vc() {
		$params = [
			[
        "type" => "attach_image",
        "heading" => "Image",
        "param_name" => "image",
        "value" => ''
			],

		];

  	vc_map(
      array(
        "name" =>  "BS single_modal",
        "base" => "bs_single_modal",// igual a add_shortcode( 'bs_flexslider', 'bs_example_sc' );
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
