<?php

function gett($text) {
	if(function_exists('pll__') ) {
		return pll__($text);
	}

	return $text;
}

function register_translation($name ='', $text, $group = 'BS', $multiline = true) {
	if(function_exists('pll_register_string')) {
		$name = str_replace(' ', '_', strtolower(substr($text, 0, 25)));

		pll_register_string( $name, $text, $group, $multiline );
	}
}
