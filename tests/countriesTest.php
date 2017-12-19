<?php
use PHPUnit\Framework\TestCase;
require str_replace('tests', '', __DIR__) .'/lib/countries.php';

class CountriesTest extends TestCase 
{
	public function testGetCountry() 
	{
		$country = getCountries();
		$this->assertEquals(gettype($country), 'array');
	}
}


