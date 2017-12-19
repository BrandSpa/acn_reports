<?php

function bs_contact_spain_sc($atts, $content = null) {

	$attributes = [
		'name-placeholder' => 'Nombre',
		'lastname-placeholder' => 'Apellidos',
		'email-placeholder' => 'Email',
		'country-placeholder' => 'País',
		'city-placeholder' => 'Ciudad',
		'phone-placeholder' => 'Teléfono',
		"province-placeholder" => 'Provincia',
		"postal-code-placeholder" => 'Código postal',
		"terms-placeholder" => "He leído y acepto el “Aviso de Privacidad” y la “Política de Privacidad” de Ayuda a la Iglesia Necesitada.",
		'btn-placeholder' => 'Rezar',
		'name-validation' => 'Nombre required',
		'email-validation' => 'Email required',
		'redirect' => '',
		'convertloop_tags' => '',
		'convertloop_event' => 'Subscription_spain',
		'btn_text' => 'Rezar',
		'loading_text' => 'Enviando...',
		'terms-validation' => 'Debes aceptar',
	];

  $at = shortcode_atts( $attributes , $atts );

	$getLang = getLangTag() . ',';

	$props = [
		"convertloop" => [
			"tags" => $getLang . $at['convertloop_tags'],
			"event" =>  empty($at['convertloop_event']) ? 'Subscription' : $at['convertloop_event']
		],
		"texts" => [
			"btn" => $at['btn_text'],
			"loading" => $at['loading_text']
		],
		"placeholder" => [
			"name" => $at['name-placeholder'],
			"lastname" => $at['lastname-placeholder'],
			"email" => $at['email-placeholder'],
			"country" => $at['country-placeholder'],
			"province" => $at['province-placeholder'],
			"postal-code" => $at['postal-code-placeholder'],
			"terms" => $at['terms-placeholder'],
		],
		"validation" => [
			"name" => $at['name-validation'],
			"email" => $at['email-validation'],
			"terms" => $at['terms-validation']
		],
		"redirect" => $at['redirect'] ? $at['redirect'] : get_option('subscribe_redirect'),
		"country" => getCountry(),
		"countries" => function_exists('getCountries') ? getCountries() : []
	];

  ob_start();
?>

<div
	class="bs-contact-spain"
	data-props='<?php echo json_encode($props) ?>'
>
</div>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_contact_spain', 'bs_contact_spain_sc' );
