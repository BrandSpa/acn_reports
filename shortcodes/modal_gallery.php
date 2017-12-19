<?php
add_shortcode( 'bs_modal_gallery', 'bs_modal_gallery_sc' );

function bs_modal_gallery_sc($atts, $content = null) {
	$attributes = [
    'groupname' => '',
    'images' => ''
  ];

  $at = shortcode_atts( $attributes , $atts );

  ob_start();
?>

<?php

?>

<!-- Place somewhere in the <body> of your page -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.9.0/css/lightbox.min.css" rel="stylesheet">

<div class="modal_gallery" style="margin:20px 0; position: relative">
    <?php $countmodal=0;?>
		<?php foreach(explode(',', $at['images']) as $image): ?>

      <a
				href="<?php echo wp_get_attachment_url($image) ?>"
				data-lightbox="<?php echo $at['groupname'] ?>"
				data-title="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
			>
      <?php if($countmodal == 0): ?>
        <img
					style="max-width:100%;"
					src="<?php echo wp_get_attachment_url($image) ?>"
					alt="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true) ?>"
				/>
        <div class="modal_text" style="position:absolute; top:15px; padding:20px; color:#FFF;"><h5>+ Photo Gallery</h5></div>
      <?php else: ?>
        <img style="display:none;" src="<?php echo wp_get_attachment_url($image) ?>" alt="<?php echo get_post_meta($image, '_wp_attachment_image_alt', true) ?>"  />
      <?php endif; ?>
      </a>
		<?php
    $countmodal++;
		endforeach;
		?>
</div>


<script>
	onLoad(function() {

	});
</script>


<?php

  return ob_get_clean();
}
