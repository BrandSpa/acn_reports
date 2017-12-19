<?php
header('Access-Control-Allow-Origin: *');
$main_dir = str_replace('apis', '', __DIR__);
include_once $main_dir . '/lib/countries.php';
include_once $main_dir . '/lib/offices_countries.php';
include_once $main_dir . '/lib/get_geoip.php';
include_once $main_dir . '/lib/location.php';

function responseJson($res = []) {
  header('Content-type: application/json');
  echo json_encode($res);
}

add_action( 'wp_ajax_nopriv_update_geo', 'update_geo' );
add_action( 'wp_ajax_update_geo', 'update_geo' );

function update_geo() {
  $res = geoip_db();
  responseJson($res);
  die();
}

add_action( 'wp_ajax_nopriv_office_countries', 'office_countries' );
add_action( 'wp_ajax_office_countries', 'office_countries' );

function office_countries() {
  $res = getOfficesCountries();
  responseJson($res);
  die();
}


/**
** action: get_menu
**/
add_action( 'wp_ajax_nopriv_get_menu', 'wp_get_menu' );
add_action( 'wp_ajax_get_menu', 'wp_get_menu' );

function wp_get_menu() {
  $name = $_POST['name'];
  $res = wp_get_nav_menu_items($name);
  responseJson($res);
  die();
}

/**
** action: donate_redirect
**/
add_action( 'wp_ajax_nopriv_donate_redirect', 'donate_redirect' );
add_action( 'wp_ajax_donate_redirect', 'donate_redirect' );

function donate_redirect() {
  $country = getCountry();

  if(in_array($country, getOfficesCountries())) {
    $url = get_option('donate_url_'. str_replace(' ', '_', $country));
  } else {
    $url = get_option('donate_url_default');
  }

  responseJson($url);
  die();
}

add_action( 'wp_ajax_nopriv_donate_redirect_2', 'donate_redirect_2' );
add_action( 'wp_ajax_donate_redirect_2', 'donate_redirect_2' );

function donate_redirect_2() {
  $country = getCountry();

  if(in_array($country, getOfficesCountries())) {
    $url = get_option('donate_url_'. str_replace(' ', '_', $country));
    $res = $url;
  } else {
    $url = get_option('donate_url_default');
    $postId = url_to_postid($url);
    $translations = function_exists('pll_get_post_translations') ? pll_get_post_translations($postId) : [];
    $lang = function_exists('pll_current_language') ? pll_current_language() : 'en';
    $res = get_permalink($translations[$lang]) ? get_permalink($translations[$lang]) : get_permalink($translations['en']);
  }

  responseJson($res);
  die();
}

add_action( 'wp_ajax_nopriv_countries', 'countries' );
add_action( 'wp_ajax_countries', 'countries' );

function countries() {
  $res = getCountries();
  header('Access-Control-Allow-Origin: *');
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_location', 'location' );
add_action( 'wp_ajax_location', 'location' );

function location() {
  $res = get_user_location();
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_user_location', 'user_location' );
add_action( 'wp_ajax_user_location', 'user_location' );

function user_location() {
  $res = get_user_location();
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}
