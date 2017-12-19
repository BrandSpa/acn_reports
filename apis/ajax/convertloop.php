<?php
$dir_base =  str_replace('apis/ajax', '', __DIR__);

function convertloop_contact() {
  $data = $_POST['data'];
  $lang = getCountryLang($data['country']);

    /**
    ** that data came from this page:
    ** https://acninternational.org/wp-admin/admin.php?page=bs-offices
    **/

  if( in_array($data['country'], getOfficesCountries()) ) {
    $countryKey = str_replace(' ', '_', $data['country']);
    $appId = get_option('convertloop_app_' . $countryKey);
    $apiKey = get_option('convertloop_api_' . $countryKey);
  } else {
    $appId = get_option('convertloop_app_default');
    $apiKey = get_option('convertloop_api_default');
  }

  $res = cl_create_person($appId, $apiKey, $data);
  header('Content-type: application/json');
  echo $res;
  die();
}

add_action( 'wp_ajax_nopriv_convertloop_contact', 'convertloop_contact' );
add_action( 'wp_ajax_convertloop_contact', 'convertloop_contact' );

function convertloop_event() {
  $data = $_POST['data'];

  if(in_array($data['country'], getOfficesCountries())) {
    $countryKey = str_replace(' ', '_', $data['country']);
    $appId = get_option('convertloop_app_' . $countryKey);
    $apiKey = get_option('convertloop_api_' . $countryKey);
  } else {
    $appId = get_option('convertloop_app_default');
    $apiKey = get_option('convertloop_api_default');
  }

  header('Content-type: application/json');
  echo cl_create_event($appId, $apiKey, $data);
  die();
  }

add_action( 'wp_ajax_nopriv_convertloop_event', 'convertloop_event' );
add_action( 'wp_ajax_convertloop_event', 'convertloop_event' );
