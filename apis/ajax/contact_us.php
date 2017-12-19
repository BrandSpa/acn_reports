<?php

function send_contact_us() {
  $data = $_POST['data'];
  $smtp = [
    'url' => get_option('smtp_url'),
    'port' => get_option('smtp_port'),
    'username' => get_option('smtp_username'),
    'password' => get_option('smtp_password')
  ];

  $res = contact_us($data, $smtp);
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_send_contact_us', 'send_contact_us' );
add_action( 'wp_ajax_send_contact_us', 'send_contact_us' );
