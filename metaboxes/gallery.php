<?php
include_once str_replace('metaboxes', '', __DIR__) . '/lib/update_field.php';

function bs_type_gallery_metabox() {
	add_meta_box('bs_gallery', 'BS gallery', 'bs_type_gallery_cb', 'gallery', 'normal', 'high', null);
}

add_action('add_meta_boxes', 'bs_type_gallery_metabox');

function bs_type_gallery_cb($post) {
  wp_nonce_field('bs_type_gallery_meta', 'bs_type_gallery_nonce');
	$images = get_post_meta($post->ID, 'type_gallery_images_key', true);
	$excerpts = get_post_meta($post->ID, 'type_gallery_excerpts_key', true);
	$props = ["images" => $images, "excerpts" => $excerpts];
?>

	<div
		class="bs-gallery-metabox"
		data-props='<?php echo cleanQuote(json_encode($props)) ?>'>
	</div>


	<script src="<?php echo get_template_directory_uri() ?>/public/js/admin.js"></script>

<?php
}

function bs_type_gallery_save($post_id) {
  update_field(array(
    'field_key' => 'type_gallery_images_key',
    'field_name' => 'images',
    'post_id' => $post_id
  ));

	update_field(array(
    'field_key' => 'type_gallery_excerpts_key',
    'field_name' => 'excerpts',
    'post_id' => $post_id
  ));
}

add_action( 'save_post', 'bs_type_gallery_save');
