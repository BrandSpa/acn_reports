<?php

function bs_contact_form_sc($atts, $content = null) {
	$attributes = [
		'name-placeholder' => 'Name',
		'lastname-placeholder' => 'Lastname',
		'email-placeholder' => 'Email',
		'country-placeholder' => 'Select country',
		'name-validation' => 'Name required',
		'lastname-validation' => 'lastname required',
		'email-validation' => 'Email required',
		'terms-validation' => 'You must accept',
		'button-text' => gett('Pray'),
		'terms-text' => 'I want to receive information about ACN, its projects and updated, and I accept the terms and conditions',
		'redirect' => '',
		'btn-text' => 'PRAY',
		'btn-bg' => '#F4334A',
		'convertloop_tags' => '',
		'convertloop_event' => 'Subscription',
		'vertical' => false,
		'terms' => false
	];

  $at = shortcode_atts( $attributes , $atts );

	$getLang = getLangTag() . ',';

	$props = [
		"cl" => [
			"tags" => $getLang . $at['convertloop_tags'],
			"event" =>  empty($at['convertloop_event']) ? 'Subscription' : $at['convertloop_event']
		],
		"texts" => [
			"button" => $at['button-text'],
			"select_country" => gett('Select country'),
			"terms" => $at['terms-text']
		],
		"placeholders" => [
			"name" => $at['name-placeholder'],
			"lastname" => $at['lastname-placeholder'],
			"email" => $at['email-placeholder'],
			"country" => $at['country-placeholder']
		],
		"validationMessages" => [
			"name" => $at['name-validation'],
			"lastname" => $at['lastname-validation'],
			"email" => $at['email-validation'],
			"terms" => $at['terms-validation']
		],
		"redirect" => $at['redirect'] ? $at['redirect'] : get_option('subscribe_redirect'),
		"btnBg" => $at['btn-bg'],
		"vertical" => $at['vertical'],
		"terms" => $at['terms'],
		"country" => getCountry(),
		"countries" => function_exists('getCountries') ? getCountries() : []
	];

  ob_start();
?>

<div
	class="contact-form"
	data-props='<?php echo json_encode($props) ?>'
>
</div>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_contact_form', 'bs_contact_form_sc' );
