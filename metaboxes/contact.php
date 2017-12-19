<?php
include_once str_replace('metaboxes', '', __DIR__) . '/lib/update_field.php';

function bs_contact_gg_metabox() {
	$post_id = null;
	if(isset($_GET['post'])) $post_id =  $_GET['post'] ? $_GET['post'] : null;
	if(isset($_POST['post_ID']) && $post_id == null) $post_id = $_POST['post_ID'] ? $_POST['post_ID']: null;

	add_meta_box('contact_gg', 'BS Contact GG', 'bs_contact_gg_cb', 'contact', 'normal', 'high', null);
}

add_action('add_meta_boxes', 'bs_contact_gg_metabox');

function bs_contact_gg_cb($post) {
  wp_nonce_field('bs_contact_gg_meta', 'bs_contact_gg_nonce');
	$countries = get_post_meta($post->ID, 'contact_gg_countries_key', true);
	$info = get_post_meta($post->ID, 'contact_gg_info_key', true);

  $props = [
    "fields" => $info,
    "countries" => $countries
  ]
?>

  <div class="bs-contact-gg" data-props='<?php echo json_encode($props) ?>'></div>

	<script src="<?php echo get_template_directory_uri() ?>/client/dist/admin.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/admin.js') ?>"></script>
<?php
}

function bs_contact_gg_save($post_id) {
  update_field(array(
    'field_key' => 'contact_gg_countries_key',
    'field_name' => 'countries',
    'post_id' => $post_id
  ));

	update_field(array(
    'field_key' => 'contact_gg_info_key',
    'field_name' => 'info',
    'post_id' => $post_id
  ));
}

add_action( 'save_post', 'bs_contact_gg_save');
