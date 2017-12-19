<?php

function get_lang() {
	if(function_exists('pll_current_language')) {
		return pll_current_language();
	}
	
	return '';
}