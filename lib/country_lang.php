<?php
function getCountryLang($name) {
    $json = file_get_contents(__DIR__ . '/countries_lang.json');
    $countries = json_decode($json);

    $country = array_filter($countries, function($arr) use($name) {
      return $arr->name == $name;
    });

		if(array_keys($country)) {
			return $country[array_keys($country)[0]] ? $country[array_keys($country)[0]]->languages[0] : 'en';
		} else {
			return 'en';
		}
	
}