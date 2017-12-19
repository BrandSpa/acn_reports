<?php

function bs_carousel_item_sc($atts, $content = null) {
	$attributes = [ ];
  $at = shortcode_atts( $attributes , $atts );
  ob_start();
?>

<div class="bs-carousel-item">
<?php echo $content ?>
</div>

<?php
  return ob_get_clean();
}

  add_shortcode( 'bs_carousel_item', 'bs_carousel_item_sc' );


  function bs_carousel_item_vc() {
    $params = [
			[
				"type" => "textarea_html",
				"param_name" => "content"
			]
		];

    vc_map(
      array(
        "name" =>  "BS Carousel item",
        "base" => "bs_carousel_item",
        "category" =>  "BS",
				"content_element" => true,
        "params" => $params
      ) 
    );

		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_bs_carousel_item extends WPBakeryShortCode {}
		}
  }

add_action( 'vc_before_init', 'bs_carousel_item_vc' );