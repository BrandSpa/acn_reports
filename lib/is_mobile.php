<?php
$dir_base =  str_replace('lib', '', __DIR__);
require $dir_base . '/vendor/autoload.php';

function is_mobile() {
	if (class_exists('Mobile_Detect')) {
		$detect = new Mobile_Detect;
		return $detect->isMobile();
	}
	
	return false;
}

