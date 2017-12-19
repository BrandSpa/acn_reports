<?php

$query = new Wp_Query(array(
  'posts_per_page' => 3,
  'post__not_in' => isset($post) ? [$post->ID] : null,
  'post_type' => array('video','gallery','featured','post'),
  'post_status' => 'publish'
));

$posts = array_map(function($post) {
    $images = !empty(get_post_meta($post->ID, 'image_square_key', true)) ? get_post_meta($post->ID, 'image_square_key', true) : '';
    $post->post_image = str_replace('http:', '', $images);
    $content = substr($post->post_content, 0, 250) ? substr($post->post_content, 0, 250) : $post->post_content;
    $post->post_short = preg_replace('/\[(.*?)\]/', '', wp_strip_all_tags(substr($post->post_content, 0, 200)) );
    $post->post_content = '';
    $post->post_permalink = get_post_permalink($post->ID);
    return $post;
}, $query->get_posts());

$props = [
  'see_more' => gett('See more'),
  'read_more' => gett('Read more'),
  'see_more_link' => gett('https://acninternational.org/news/')
];

 ?>

 <div
 	class="bs-posts"
 	data-props='<?php echo json_encode($props) ?>'
 >
 </div>
