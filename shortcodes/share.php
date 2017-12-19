<?php
function bs_share_sc($atts, $content = null) {
	$attributes = [];
  $at = shortcode_atts( $attributes , $atts );
	$current_url = str_replace('//', 'https://', esc_url($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
  ob_start();
?>

<div class="bs-share">
	<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url ?>" target="blank">
		<i class="ion-social-facebook"></i>
	</a>

	<a href="https://twitter.com/intent/tweet?text=<?php echo $current_url ?>&hashtags=VIACRUCISPORAFRICA" target="blank">
		<i class="ion-social-twitter"></i>
	</a>
</div>

<?php
  return ob_get_clean();
}

add_shortcode( 'bs_share', 'bs_share_sc' );
add_action( 'vc_before_init', 'bs_share_vc' );

  function bs_share_vc() {
		$params = [];

  	vc_map(
      array(
        "name" =>  "BS share",
        "base" => "bs_share",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
