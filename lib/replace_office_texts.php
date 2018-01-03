<?php

function replace_office_texts() {
	$text = gett('ACN, during 70 years helping Christians in need');

	if(bs_in_office(getCountry())) {
		$text = gett('LEARN MORE ABOUT AID TO THE CHURCH IN NEED');
		$text = str_replace('[office_url]', get_option('url_' . space_to_lodash( getCountry() ) ), $text);
		$text = str_replace('[office_name]', get_option('name_' . space_to_lodash( getCountry() ) ), $text);
	}

	return $text;
}