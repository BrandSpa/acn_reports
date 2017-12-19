<?php

$links = [
	'https://acninternational.org/news/',
	'https://acninternational.org/privacy-policy/',
	'https://acninternational.org/terms-and-conditions/',	
];

foreach($links as $key => $link) {
	register_translation('bs-' . $key, $link, 'BS links');
}
