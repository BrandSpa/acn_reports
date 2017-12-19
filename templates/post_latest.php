<?php
	$args = array(
		'posts_per_page' => 4,
		'exclude' => isset($post) ? $post->ID : null,
		'post_type' => array('video','gallery','featured','post'),
		'post_status' => 'publish'
	);

  $recent_posts = get_posts( $args );
?>

<div class="l-wrap">
<?php foreach($recent_posts as $recent): ?>
	<div class="bs-post__recent">
		<?php if(get_post_meta($recent->ID, 'image_square_key', true)): ?>
		<a href="<?php echo get_permalink($recent->ID) ?>">
			<img src="<?php echo get_post_meta($recent->ID, 'image_square_key', true) ?>" style="width: 100%" />
			</a>
		<?php endif; ?>

		<div class="bs-post__recent__content">
			<h4>
				<a href="<?php echo get_permalink($recent->ID) ?>">
				<?php if(is_mobile()) : ?>

					<?php echo substr($recent->post_title, 0, 70) ?>...
				<?php else: ?>
					<?php echo $recent->post_title ?>
				<?php endif; ?>
				</a>
			</h4>

			<p><?php echo preg_replace('/\[(.*?)\]/', '', substr(wp_strip_all_tags($recent->post_content), 0, 80)) ?>...</p>
			<a href="<?php echo get_permalink($recent->ID) ?>"><?php echo gett('Read more') ?>...</a>
		</div>
	</div>
<?php endforeach; ?>
 </div>
<div class="l-wrap" style="text-align:center">
 <a href="<?php echo gett('https://acninternational.org/news/') ?>" class='btn bs-see-more' > <?php echo gett('See more') ?> </a>
 </div>
