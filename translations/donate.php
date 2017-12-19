<?php
$donationTrans = [
	'Not now',
	'Yes',
	'Other',
	'Monthly',
	'Once',
	'Donate',
	'Next',
	'Back',
	'Amount',
	'Credit Card Number',
	'MM',
	'YY',
	'CVC',
	'Name',
	'Email',
	'Country',
	'Your transaction was not accepted, try again',
	'Incorrect card',
	'Incorrect month',
	'Incorrect year',
	'Incorrect cvc',
	'Incorrect name',
	'Incorrect email',
	'Incorrect country',
	'SUPPORT A PERSECUTED CHRISTIAN',
	'My gift to support the ACN',
	'YOUR DONATION WAS SUCCESSFUL',
	'THANK YOU FOR YOUR GENEROSITY!.',
	'ACN has a bigger impact when due to the generosity of benefactors can count on an stable budget.',
	'Your donation will be charged to your credit card. You can cancel your contribution anytime you want.'
];

foreach($donationTrans as $key => $trans) {
	register_translation('bs-' . $key, $trans, 'BS donate');
}
