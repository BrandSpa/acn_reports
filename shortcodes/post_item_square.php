<?php 

function bs_post_item_square_sc($atts, $content = null) {
	$attributes = [
    'post' => null
  ];

  $at = shortcode_atts( $attributes , $atts );

	  $query = new Wp_Query( array( 'p' => $at['post'] ) );
	
	$recent_posts = $query->get_posts();
	
  ob_start();
?>


<?php  foreach($recent_posts as $post): ?>

<div class="grid-item" style="width:100%">
	<div class="grid-item__content">
		<a href="<?php echo get_permalink($post->ID) ?>">
			<img src="<?php echo get_post_meta($post->ID, 'image_square_key', true) ?>" alt="">
		</a>

		<div class="grid-item__content__texts">
			<h5>
				<a href="<?php echo get_permalink($post->ID) ?>">
					<?php if(is_mobile()) : ?>
						<?php echo substr($post->post_title, 0, 70) ?>...
					<?php else: ?>
						<?php echo $post->post_title ?>
					<?php endif; ?>
				</a>
				</h5>
			<?php if(is_mobile()) : ?>
						<p><?php echo preg_replace('/\[(.*?)\]/', '', wp_strip_all_tags(substr($post->post_content, 0, 120)) ); ?>...</p>
					<?php else: ?>
						<p><?php echo preg_replace('/\[(.*?)\]/', '', wp_strip_all_tags(substr($post->post_content, 0, 200)) ); ?>...</p>
					<?php endif; ?>
			<a href="<?php echo get_permalink($post->ID) ?>" class="grid-item__content__texts__readmore"> <?php echo gett('Read more') ?>... </a>
		</div>
	</div>
</div>

<?php endforeach; ?>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_post_item_square', 'bs_post_item_square_sc' );
add_action( 'vc_before_init', 'bs_post_item_square_vc' );

  function bs_post_item_square_vc() {
		$params = [
      [
        "type" => "textfield",
        "heading" => "POST ID",
        "param_name" => 'post',
        "value" => ''
      ],
		];

  	vc_map(
      array(
        "name" =>  "BS Post item square []",
        "base" => "bs_post_item_square",
        "category" =>  "BS",
        "params" => $params
      ) 
    );
  }

