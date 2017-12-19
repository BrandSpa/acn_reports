<?php

function bs_contact_gg_sc($atts, $content = null) {
	$attributes = [
    'contactTitle' => 'The ACN Head of Section for this country is:',
    'searchPlaceholder' => 'Search country'
  ];

  $at = shortcode_atts( $attributes , $atts );

  $query = new Wp_Query([
    'post_type' => ['contact'],
    'post_status' => 'publish',
		'posts_per_page' => -1
  ]);

  $contacts = array_map(function($contact) {
    $contact->countries = get_post_meta($contact->ID, 'contact_gg_countries_key', true);
  	$contact->fields = get_post_meta($contact->ID, 'contact_gg_info_key', true);
    $contact->image = get_the_post_thumbnail_url($contact->ID, 'full');
    $contact->content = do_shortcode($contact->post_content);
    $contact->post_content = '';
    return $contact;
  }, $query->get_posts());

	$props = [
    'contactTitle' => $at['contactTitle'],
    'searchPlaceholder' => $at['searchPlaceholder'],
    'contacts' => $contacts,
    'continents' => getContinentsTranslated(),
    'countries' => getCountries(),
    'countriesTranslated' => getCountriesTranslated()
  ];

  ob_start();
?>

<div
	class="bs-contacts-gg"
	data-props='<?php echo json_encode($props) ?>'
>
</div>


<?php
  return ob_get_clean();
}

add_shortcode( 'bs_contact_gg', 'bs_contact_gg_sc' );
