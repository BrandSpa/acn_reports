<?php

function cleanQuote($val) {
	return str_replace("'", "\u0027", $val);
}
