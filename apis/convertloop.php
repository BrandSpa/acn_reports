<?php
$dir_base =  str_replace('apis', '', __DIR__);

/**
** Documentation
** convertloop docs: https://convertloop.co/docs/developers/getting-started
** Library to make the request: https://github.com/rmccue/Requests
**/

require $dir_base . 'vendor/autoload.php';

	function cl_create_person($appId, $apiKey, $data, $endpoint = 'https://api.convertloop.co/v1/people') {
		try {
			if(empty($data['pid'])) {
				$data['pid'] = isset($_COOKIE['dp_pid']) ? $_COOKIE['dp_pid'] : '';
			}

			// $data: { "email": "alejandro@convertloop.co", "pid": "3eb13b25", "add_tags": ["ENGLISH"] }
			$data = json_encode($data);
			$auth_string = $appId . ":" . $apiKey;
      $auth = base64_encode($auth_string);

			$headers = array(
				"Authorization" => "Basic " . $auth,
				'Accept' => 'application/json',
				'content-type' => 'application/json'
			);

			$req = Requests::post($endpoint, $headers, $data);
			return $req->body;
		} catch(Exception $e) {
			return ['error' => $e];
		}

	}

	// $data: { "name": "Signed Up", "person": { "email": "german.escobar@convertloop.co" } }
	function cl_create_event($appId, $apiKey, $data, $endpoint = 'https://api.convertloop.co/v1/event_logs') {
		try {

			// add pid via cookies if doesn't came from front
			if(empty($data['person']['pid'])) {
		    $data['person']['pid'] = isset($_COOKIE['dp_pid']) ? $_COOKIE['dp_pid'] : '';
		  }

			$data = json_encode($data);
			$auth_string = $appId . ":" . $apiKey;
      $auth = base64_encode($auth_string);

			$headers = array(
				"Authorization" => "Basic " . $auth,
				'Accept' => 'application/json',
				'content-type' => 'application/json'
			);

			$req = Requests::post($endpoint, $headers, $data);
			return $req->body;
		} catch(Exception $e) {
			return ['error' => $e];
		}
	}



?>
