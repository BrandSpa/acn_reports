<?php

function getContinents() {
  $continents = array(
    "Africa" => array(
      "Algeria",
      "Angola",
      "Benin",
      "Botswana",
      "Burkina Faso",
      "Burundi",
      "Cameroon",
      "Cape Verde",
      "Central African Republic",
      "Chad",
      "Comoros",
      "Congo",
      "Djibouti",
      "Equatorial Guinea",
      "Eritrea",
      "Ethiopia",
      "Gabon",
      "Gambia",
      "Ghana",
      "Guinea-Bissau",
      "Guinea Conakry",
      "Ivory Coast",
      "Kenya",
      "Lesotho",
      "Liberia",
      "Libya",
      "Madagascar",
      "Malawi",
      "Mali",
      "Mauritania",
      "Mauritius",
      "Morocco",
      "Mozambique",
      "Namibia",
      "Niger",
      "Nigeria",
      "Rwanda",
      "Sao Tome Principe",
      "Senegal",
      "Seychelles",
      "Sierra Leone",
      "Somalia",
      "South Africa",
      "South Sudan",
      "Sudan",
      "Swaziland",
      "Tanzania",
      "Togo",
      "Tunisia",
      "Uganda",
      "Zambia",
      "Zimbabwe"
    ),

    "Asia" => array(
      "Afghanistan",
      "Azerbaijan",
      "Bangladesh",
      "Bhutan",
      "Brunei",
      "Myanmar [Burma]",
      "Cambodia",
      "China",
      "East Timor",
      "India",
      "Indonesia",
      "Japan",
      "Kazakhstan",
      "Kyrgyzstan",
      "Laos",
      "Malaysia",
      "Maldives",
      "Mongolia",
      "Nepal",
      "North Korea",
      "Pakistan",
      "Philippines",
      "Russia",
      "Singapore",
      "Republic of Korea",
      "Sri Lanka",
      "Taiwan",
      "Tajikistan",
      "Thailand",
      "Turkmenistan",
      "Vietnam"
    ),
    
    "Eastern Europe" => array(
      "Albania",
      "Armenia",
      "Belarus",
      "Bosnia and Herzegovina",
      "Bulgaria",
      "Croatia",
      "Czech Republic",
      "Estonia",
      "Georgia",
      "Hungary",
      "Kosovo",
      "Latvia",
      "Lithuania",
      "Macedonia",
      "Moldova",
      "Montenegro",
      "Poland",
      "Romania",
      "Serbia",
      "Slovak Republic",
      "Slovenia",
      "Ukraine",
    ),

    "Latin America" => array(
      "Argentina",
      "Belize",
      "Bolivia",
      "Brazil",
      "Chile",
      "Colombia",
      "Costa Rica",
      "Ecuador",
      "El Salvador",
      "Guatemala",
      "Guyana",
      "Honduras",
      "Mexico",
      "Nicaragua",
      "Panama",
      "Paraguay",
      "Peru",
      "Suriname",
      "Uruguay",
      "Venezuela",
    ),

    "Middle East" => array(
      "Bahrain",
      "Egypt",
      "Iran",
      "Iraq",
      "Israel",
      "Jordan",
      "Kuwait",
      "Lebanon",
      "Oman",
      "Palestine",
      "Qatar",
      "Saudi Arabia",
      "Syria",
      "Turkey",
      "United Arab Emirates",
      "Yemen"
    ),

    "Caribbean" => array(
      "Antigua and Barbuda",
      "Bahamas",
      "Barbados",
      "Dominica",
      "Dominican Republic",
      "Cuba",
      "Grenada",
      "Haiti",
      "Jamaica",
      "Saint Kitts and Nevis",
      "Saint Lucia",
      "Saint Vincent and the Grenadines",
      "Trinidad and Tobago",
    ),

    "Oceania" => array(
      "Fiji",
      "Kiribati",
      "Marshall Islands",
      "Micronesia",
      "Nauru",
      "Palau",
      "Papua New Guinea",
      "Samoa",
      "Solomon Islands",
      "Tonga",
      "Tuvalu",
      "Vanuatu",
    ),
    "Russia & Central Asia" => [
      "Kazakhstan",
      "Kyrgyzstan",
      "Russia",
      "Tajikistan",
      "Turkmenistan",
      "Uzbekistan"
    ]
);

  return $continents;
}

function getContinentsList() {
  return array_keys(getContinents());
}

function getContinentsTranslated() {
  $continents = getContinentsList();
  $continentsWithCountries = getContinents();
  $translations = [];

  foreach($continents as $continent) {
    $countries = [];
    
     foreach( getContinents()[$continent] as $country) {
       array_push($countries, gett($country));
     }
     
     $translations[gett($continent)] = $countries;
  }
  return $translations;
}

?>
