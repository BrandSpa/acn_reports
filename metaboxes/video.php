<?php
  include_once str_replace('metaboxes', '', __DIR__) . '/lib/update_field.php';

  function bs_type_video_metabox() {
    add_meta_box('type_video', 'Video url Embed', 'bs_type_video_cb', 'video', 'normal', 'high', null);
  }

  add_action('add_meta_boxes', 'bs_type_video_metabox');

  function bs_type_video_cb($post) {
    wp_nonce_field('bs_type_video_meta', 'bs_image_square_nonce'); 
    $value = get_post_meta($post->ID, 'video_url_key', true);
?>

<div>
	<p>
		<input
			type="text" 
			class="uploader" 
			name="video_url"
			placeholder="Video url Embed" 
			value="<?php echo $value ?>" 
			style="height: 35px; width: 100%;"
		/>
	</p>

</div>

<?php 
	} //end bs_type_video_cb


function bs_save_type_video_meta($post_id) {
  update_field(array(
    'field_key' => 'video_url_key',
    'field_name' => 'video_url',
    'post_id' => $post_id
  ));
}

add_action( 'save_post', 'bs_save_type_video_meta');