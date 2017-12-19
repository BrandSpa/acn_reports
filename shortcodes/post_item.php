<?php 

function bs_post_item_sc($atts, $content = null) {
	$attributes = [
    'post' => null
  ];

  $at = shortcode_atts( $attributes , $atts );

	  $query = new Wp_Query( array( 'p' => $at['post'] ) );
	
	$recent_posts = $query->get_posts();
	
  ob_start();
?>


<?php  foreach($recent_posts as $post): ?>

	<div class="bs-posts-list__item">
				<?php if(!empty(get_post_meta($post->ID, 'image_square_key', true))): ?>
					<a href="<?php echo get_permalink($post->ID) ?>">
					<div
						class="bs-posts-list__item__img" 
						style="background-image: url(<?php echo get_post_meta($post->ID, 'image_square_key', true) ?>);">
					</div>
					</a>
						<?php $itemStyle = ''; ?>
				<?php else: ?>
					<?php $itemStyle = 'bs-posts-list__item__content--without'; ?>
				<?php endif; ?>

				<div class="bs-posts-list__item__content <?php echo $itemStyle; ?>">
					<h2>
						<a href="<?php echo get_permalink($post->ID) ?>">
						<?php if(is_mobile()) : ?>
							<?php echo substr($post->post_title, 0, 70) ?>...
							<?php else: ?>
							<?php echo $post->post_title ?>
						<?php endif; ?>
						</a>
					</h2>

					<?php if(is_mobile()) : ?>
						<p><?php echo preg_replace('/\[(.*?)\]/', '', wp_strip_all_tags(substr($post->post_content, 0, 120)) ); ?>...</p>
					<?php else: ?>
						<p><?php echo preg_replace('/\[(.*?)\]/', '', wp_strip_all_tags(substr($post->post_content, 0, 200)) ); ?>...</p>
					<?php endif; ?>
					<a class="bs-posts-list__item__readmore" href="<?php echo get_permalink($post->ID) ?>"><?php echo gett('Read more') ?>...</a>
				</div>
		</div>

		<?php endforeach; ?>


<?php

  return ob_get_clean();
}

add_shortcode( 'bs_post_item', 'bs_post_item_sc' );
add_action( 'vc_before_init', 'bs_post_item_vc' );

  function bs_post_item_vc() {
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
        "name" =>  "BS Post item",
        "base" => "bs_post_item",
        "category" =>  "BS",
        "params" => $params
      ) 
    );
  }

