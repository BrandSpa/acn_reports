<?php

function redirectToLang() {
	$lang = getCountryLang(getCountry());
	
	if(!isset($_COOKIE['bs-lang']) && empty($_COOKIE['bs-lang'])) {
		$url = pll_the_languages( array( 'raw' => 1 ) )[$lang]['url'];
		setcookie('url-nea', $url);
		setcookie('bs-lang', $lang);
		header('Location:'. $url);
		exit;
	} 
}
