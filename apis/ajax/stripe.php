<?php

/*
  Stripe token, return created token
*/
function stripe_token() {
  $card = $_POST['data'];
  $apiKey =  get_option('stripe_key_private');
  $res = stripe_create_token( $apiKey, $card);
  responseJson($res);
  die();
}

add_action( 'wp_ajax_nopriv_stripe_token', 'stripe_token' );
add_action( 'wp_ajax_stripe_token', 'stripe_token' );

function get_plan() {
  $card = $_POST['data'];
  $apiKey =  get_option('stripe_key_private');
  $res = stripe_get_plan($apiKey, $card['amount']);
  responseJson($res);
  die();
}

add_action( 'wp_ajax_nopriv_stripe_get_plan', 'get_plan' );
add_action( 'wp_ajax_stripe_get_plan', 'get_plan' );

/*
  Stripe plan, update plan
*/
function stripe_plan() {
  $data = $_POST['data'];
  $api_key =  get_option('stripe_key_private');

  $res = stripe_update_plan($api_key, $data);
  responseJson($res);
  die();
}

add_action( 'wp_ajax_nopriv_stripe_update_plan', 'stripe_plan' );
add_action( 'wp_ajax_stripe_update_plan', 'stripe_plan' );

/*
  Stripe charge, monthly or once
*/
function stripe_charge() {
  $data = $_POST['data'];
  $apiKey =  get_option('stripe_key_private');
  $res = array([ 'err' => 'donation_type fail']);

  if($data['donation_type'] == 'monthly') {
    $res = stripe_monthly($apiKey, $data);
  }

  if($data['donation_type'] == 'once') {
    $res = stripe_once($apiKey, $data);
  }

  responseJson($res);
  die();
}

add_action( 'wp_ajax_nopriv_stripe_charge', 'stripe_charge' );
add_action( 'wp_ajax_stripe_charge', 'stripe_charge' );
