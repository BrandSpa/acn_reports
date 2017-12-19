<?php
$dir_base =  str_replace('apis', '', __DIR__);

/**
** Documentation
** Mailchimp endpoint: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/
** Library to make the request: https://github.com/rmccue/Requests
**/

require $dir_base . 'vendor/autoload.php';

  function mc_subscribe($data, $listId, $apiKey) {

    $data = json_encode($data);

    $options = [
      'auth' => ['user', $apiKey]
    ];

    $headers = [
      'Accept' => 'application/json',
      'content-type' => 'application/json'
    ];

    // it's always necessary set the datacenter,
    // without it isn't going to store the list register

    $datacenter =  explode("-", $apiKey)[1];
    $urlBase = 'http://'. $datacenter .'.api.mailchimp.com/3.0/';
    $endpoint = $urlBase . 'lists/' . $listId . '/members';
    $req = Requests::post($endpoint, $headers, $data, $options);

    return $req->body;
  }
