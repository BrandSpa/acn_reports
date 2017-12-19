<?php

function bs_lm_form_sc($atts)
{
    $at = shortcode_atts([
        'name_placeholder' => gett('Name'),
        'lastname_placeholder' => gett('Lastname'),
        'email_placeholder' => gett('Email'),
        'country_placeholder' => gett('Country'),
        'postal_code_placeholder' => gett('Postal Code'),
        'province_placeholder' => gett('Province'),
        'name_validation' => gett('Name required'),
        'lastname_validation' => gett('Lastname required'),
        'email_validation' => gett('Email invalid'),
        'country_validation' => gett('Country required'),
        'message_thanks' => gett('Thanks'),
        'btn_text' => gett('Send')
    ], $atts);

    $props = [
        'placeholders' => [
            'name' => $at['name_placeholder'],
            'lastname' => $at['lastname_placeholder'],
            'email' => $at['email_placeholder'],
            'country' => $at['country_placeholder'],
            'postal_code' => $at['postal_code_placeholder'],
            'province' => $at['province_placeholder'],
        ],
        'messages' => [
            'name' => $at['name_validation'],
            'lastname' => $at['lastname_validation'],
            'email' => $at['email_validation'],
            'country' => $at['country_validation'],
            'thanks' => $at['message_thanks']
        ],
        'btnText' => $at['btn_text'],
        'provinces' => array("A Coruña", "Álava", "Albacete", "Alicante", "Almería", "Asturias", "Ávila", "Badajoz", "Baleares", "Barcelona", "Burgos", "Cáceres", "Cádiz", "Cantabria", "Castellón", "Ceuta", "Ciudad Real", "Córdoba", "Cuenca", "Gerona", "Granada", "Guadalajara", "Guipúzcoa", "Huelva", "Huesca", "Jaén", "La Rioja", "Las Palmas", "León", "Lérida", "Lugo", "Madrid", "Málaga", "Melilla", "Murcia", "Navarra", "Orense", "Palencia", "Pontevedra", "Salamanca", "Santa Cruz de Tenerife", "Segovia", "Sevilla", "Soria", "Tarragona", "Teruel", "Toledo", "Valencia", "Valladolid", "Vizcaya", "Zamora", "Zaragoza" )
    ];

    ob_start();
  ?>

    <div class="bs-lm-form" data-props='<?php echo wp_json_encode($props) ?>'></div>
  
	<?php
  return ob_get_clean();
}

add_shortcode('bs_lm_form', 'bs_lm_form_sc');
