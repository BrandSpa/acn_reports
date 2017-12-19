<?php
add_action( 'init', 'create_post_type' );

function create_post_type() {

  register_post_type( 'video',
    [
      'labels' => [
        'name' => __( 'Posts video' ),
        'singular_name' => __( 'Post video' )
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category'],
      'public' => true,
      'has_archive' => true,
		]
  );

	register_post_type( 'gallery',
    [
      'labels' => [
        'name' => __( 'Posts gallery' ),
        'singular_name' => __( 'Post gallery' )
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category'],
      'public' => true,
      'has_archive' => true,
		]
  );

  register_post_type( 'featured',
    [
      'labels' => [
        'name' => __( 'Posts featured' ),
        'singular_name' => __( 'Post featured' )
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category'],
      'public' => true,
      'has_archive' => true,
		]
  );

  register_post_type( 'contact',
    [
      'labels' => [
        'name' => __( 'Contact' ),
        'singular_name' => __( 'Contact' )
			],
			'supports' => [ 'title', 'editor', 'excerpt', 'thumbnail', 'revisions','page_image_square'],
			'taxonomies' => [ 'category' ],
      'public' => true,
      'has_archive' => true,
		]
  );
}
