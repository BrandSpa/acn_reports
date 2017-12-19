<?php

function bs_in_office($country) {
	return in_array($country, getOfficesCountries());
}
