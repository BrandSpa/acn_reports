<?php

function show_donate() {
	$country = getCountry();
	
	if( !in_array($country, getOfficesCountries()) ) return true;

	return false;
}