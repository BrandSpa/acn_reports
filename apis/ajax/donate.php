<?php
$dir_base =  str_replace('apis/ajax', '', __DIR__);

function donate_cache() {
    $cache = array('cache' => get_option('enable_cache'));
    header('Content-type: application/json');
    echo $cache;
    die();
}

add_action( 'wp_ajax_nopriv_donate_cache', 'donate_cache' );
add_action( 'wp_ajax_donate_cache', 'donate_cache' );