<?php

function store_event($content, $title = 'event', $type = 'event') {
  $postarr = [
    'post_title' => $title,
    'post_name' => $title,
    'post_content' => json_encode($content),
    'post_type' => $type
  ];

  $result = wp_insert_post($postarr);

  return [
    'result' => $result,
    'title' => $title,
    'content' => $content,
    'type' => $type
  ];
}

function store_event_ajax() {
  $data = $_POST['data'];
  $res = store_event( $data['content'], $data['title'] );
  header('Content-type: application/json');
  echo json_encode($res);
  die();
}

add_action( 'wp_ajax_nopriv_store_event', 'store_event_ajax' );
add_action( 'wp_ajax_store_event', 'store_event_ajax' );
