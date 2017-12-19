<?php
  include_once str_replace('metaboxes', '', __DIR__) . '/lib/update_field.php';

  function bs_page_image_square_metabox() {

    $post_id = null;
		if(isset($_GET['post'])) $post_id =  $_GET['post'] ? $_GET['post'] : null;
		if(isset($_POST['post_ID']) && $post_id == null) $post_id = $_POST['post_ID'] ? $_POST['post_ID']: null;

    add_meta_box('page_image_square', 'Square Image', 'bs_page_image_square_cb', 'post', 'normal', 'high', null);
    add_meta_box('page_image_square', 'Square Image', 'bs_page_image_square_cb', 'video', 'normal', 'high', null);
    add_meta_box('page_image_square', 'Square Image', 'bs_page_image_square_cb', 'gallery', 'normal', 'high', null);
    add_meta_box('page_image_square', 'Square Image', 'bs_page_image_square_cb', 'featured', 'normal', 'high', null);
  }

  add_action('add_meta_boxes', 'bs_page_image_square_metabox');

  function bs_page_image_square_cb($post) {
    wp_nonce_field('bs_page_image_square_meta', 'bs_image_square_nonce');
    $value = get_post_meta($post->ID, 'image_square_key', true);
?>

<div>
	<p>
		<input
			type="text"
			class="uploader"
			name="image_square_name"
			placeholder="Image Square"
			value="<?php echo $value ?>"
			style="height: 35px; width: 100%;"
		/>
	</p>

</div>

<script>
const open_media_uploader_image = () => {
	let media_uploader = wp.media({ frame: 'post', state: 'insert', multiple: false });

	let promise = new Promise((resolve) => {
		media_uploader.on('insert', () => {
			let json = media_uploader.state().get('selection').first().toJSON();
			return resolve(json);
		});
	});

	media_uploader.open();

	return promise;
};

const section = () => {

	jQuery('.uploader').on('click', (e) => {
		open_media_uploader_image() .then(res => { jQuery(e.currentTarget).attr('value', res.url); });
	});
};

section();
</script>
<?php
	} //end bs_page_image_square_cb


function bs_save_image_square_meta($post_id) {
  update_field(array(
    'field_key' => 'image_square_key',
    'field_name' => 'image_square_name',
    'post_id' => $post_id
  ));
}

add_action( 'save_post', 'bs_save_image_square_meta');
