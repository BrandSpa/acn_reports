<?php

function bs_posts_sc($atts, $content = null) {
	$attributes = [ 'url' => '' ];

  $at = shortcode_atts( $attributes , $atts );

	// $query = new Wp_Query(array(
	// 	'post_type' => array('video','gallery','featured','post'),
	// 	'posts_per_page' => 6,
	// 	'post_status' => 'publish'
	// ));
	//
	// $posts = array_map(function($post) {
	// 		$images = !empty(get_post_meta($post->ID, 'image_square_key', true)) ? get_post_meta($post->ID, 'image_square_key', true) : '';
 // 			$post->post_image = str_replace('http:', '', $images);
	// 		$content = substr($post->post_content, 0, 250) ? substr($post->post_content, 0, 250) : $post->post_content;
	// 		$post->post_short = preg_replace('/\[(.*?)\]/', '', wp_strip_all_tags(substr($post->post_content, 0, 200)) );
	// 		$post->post_content = '';
	// 		$post->post_permalink = get_post_permalink($post->ID);
	// 		return $post;
	// }, $query->get_posts());

	$props = [
    'see_more' => gett('See more'),
    'url' => $at['url'],
    'read_more' => gett('Read more'),
    'see_more_link' => gett('https://acninternational.org/news/')
	];

  ob_start();
?>

<?php if(show_posts()): ?>
<div
	class="bs-posts"
	data-props='<?php echo json_encode($props) ?>'
>
</div>
<?php endif; ?>

<?php
  return ob_get_clean();
}

add_shortcode( 'bs_posts', 'bs_posts_sc' );
