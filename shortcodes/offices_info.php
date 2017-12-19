<?php

function bs_offices_info_sc($atts, $content = null) {
	$attributes = [
		'content' => '',
    'btn_title' => '',
    'background' => '#687f87',
    'btn_title_color' => '#fff'
  ];

  $at = shortcode_atts( $attributes , $atts );

	$props = [];

  ob_start();
?>
<div class="bs-offices-info">
<?php
foreach(getOfficesCountries() as $country):
  $countryName = $country;
  $country = space_to_lodash($country);
  if($country !== 'default'):
?>

<div class="col-3-l">
  <div class="accordion-contact">
  <a class="accordion-contact__title">
    <h4><i class="ion-chevron-down"></i> <?php echo $countryName ?></h4>
  </a>

  <div class="accordion-contact__content">
  <h6><?php echo get_option('name_' . $country) ?></h6>
  <h6><?php echo get_option('contact_info_address_' . $country) ?></h6>
  <h6><?php echo get_option('contact_info_email_' . $country) ?></h6>
  <h6><?php echo get_option('contact_info_phone_' . $country) ?></h6>
  <a target="new" href="<?php echo get_option('url_' . $country)  ?>"><?php echo get_option('url_' . $country)  ?></a>
  <ul class="bs-contact-info__social">
    <?php if( !empty(get_option('contact_facebook_' . $country)) ): ?>
    <li>
      <a href="<?php echo get_option('contact_facebook_' . $country) ?>">
        <i class="ion-social-facebook"></i>
      </a>
    </li>
    <?php endif; ?>
    <?php if( !empty(get_option('contact_twitter_' . $country)) ): ?>
    <li>
      <a href="<?php echo get_option('contact_twitter_' . $country) ?>" target="new">
        <i class="ion-social-twitter"></i>
      </a>
    </li>
    <?php endif; ?>
    <?php if( !empty(get_option('contact_youtube_' . $country)) ): ?>
    <li>
      <a href="<?php echo get_option('contact_youtube_' . $country) ?>" target="new">
        <i class="ion-social-youtube"></i>
      </a>
    </li>
    <?php endif; ?>
    <?php if( !empty(get_option('contact_instagram_' . $country)) ): ?>
    <li>
      <a href="<?php echo get_option('contact_instagram_' . $country) ?>" target="new">
        <i class="ion-social-instagram"></i>
      </a>
    </li>
    <?php endif; ?>
  </ul>
  </div>
</div>
</div>

<?php
  endif;
  endforeach;

?>
</div>
<style>
	.bs-offices-info {
		display: flex;
	  flex-wrap: wrap;
	}

  .accordion-contact {
    width: 100%;
    background: #f8f8f8;
    margin-bottom: 20px;
  }

  .accordion-contact__title {
    display: block;
    padding: 20px;
		cursor: pointer;
  }

  .accordion-contact__content {
    height: 0;
    visibility: hidden;
    transition: all .3s;
  }

  .accordion-contact__content--open {
    padding: 20px;
    height: auto;
    visibility: visible;
  }

</style>
<script>
  onLoad(function() {
    var $ = jQuery;

    $('.accordion-contact__title').on('click', function(e) {
      e.preventDefault();

			var $content = $(this).parent().find('.accordion-contact__content');

			console.log($content, $content.hasClass('accordion-contact__content--open'));

			if($content.hasClass('accordion-contact__content--open')) {
				$content.removeClass('accordion-contact__content--open');
			} else {
				$('.accordion-contact').find('.accordion-contact__content').removeClass('accordion-contact__content--open');
	      $content.addClass('accordion-contact__content--open');

			}
		})
  });
</script>
<?php

  return ob_get_clean();
}

add_shortcode( 'bs_offices_info', 'bs_offices_info_sc' );
