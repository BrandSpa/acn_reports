<?php

function geolify($post) {
	if($post) {
		$countries = get_post_meta($post->ID, 'geolify_countries_key', true) 
		? get_post_meta($post->ID, 'geolify_countries_key', true) 
		: [];
		$urls = get_post_meta($post->ID, 'geolify_urls_key', true);
		$key = array_search(getCountry(), $countries);
		
		if(isset($urls[$key]) && !empty($urls[$key])) {
			header('Location:'. $urls[$key]);
			exit;
		}
	}
}