<?php
function bs_home_url() {
	$home = '/';
	if(function_exists('pll_home_url')) {
		$home = pll_home_url();
	}
	return $home;
}