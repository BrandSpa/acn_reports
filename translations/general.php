<?php

$general = [
	'“I invite you all, together with ACN, to do everywhere in the world, a work of mercy.”',
	'ABOUT US',
	'LEARN MORE ABOUT AID TO THE CHURCH IN NEED',
	'Founded in 1947 as a Catholic aid organization for war refugees and recognized as a papal foundation since 2011, ACN is dedicated to the service of Christians around the world, through information, prayer and action, wherever they are persecuted or oppressed or suffering material need. ACN supports every year an average of 6000 projects in close to 150 countries, thanks to private donations, as the foundation receives no public funding.',
	'ACN – Aid to the Church in Need gGmbH, HRB 8446 is non-profit organization officially registered in Germany and audited internationally by KPMG.',
	'Contact',
	'PRIVACY POLICY',
	'TERMS & CONDITIONS',
	'Read more',
	'Latest news',
	'ACN International in the world',
	'TO LEARN MORE ABOUT [office_name], VISIT [office_url]',
	'ACN, during 70 years helping Christians in need',
	'See more',
	'Pray',
	'next',
	'prev',
	'Latest news',
	'All the latest',
	'Select country',
	'¿Quiéres que el mundo conozca la realidad de la Iglesia que Sufre en el Mundo?',
	'Comparte este artículo',
	'stories',
	'The last 3 digits displayed on the back of your credit card.',
	'Thank you very much for joining ACN'
];

foreach($general as $key => $trans) {
	register_translation('bs-' . $key, $trans, 'BS general');
}
