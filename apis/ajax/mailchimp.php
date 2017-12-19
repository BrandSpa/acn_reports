<?php

function mailchimp_subscribe() {
  $data = $_POST['data'];
  $listId = get_option('mailchimp_list_id');
  $apiKey = get_option('mailchimp_api');
  $res = mc_subscribe($data, $listId, $apiKey);
  echo $res;
  die();
}

add_action( 'wp_ajax_nopriv_mailchimp_subscribe', 'mailchimp_subscribe' );
add_action( 'wp_ajax_mailchimp_subscribe', 'mailchimp_subscribe' );
