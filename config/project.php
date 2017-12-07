<?php

return [

	/**
	 * Name of the application
	 */
	'name'			=> env('APP_NAME', 'Mistral Air'),

	/**
	 * Date format used in output for datatables
	 *
	 * Must be a valid SQL date format string
	 */
	'date_format'   => '%d %M %Y %H:%i',
	'datepicker'	=> 'yy-mm-dd',
	'formatAPI'		=> 'U',
	'formatUI'      => 'Y-m-d',
	'uploadPath'	=> 'uploads/',
	'faIconsPath'	=> 'fa-icons/png/256/',
	//TODO Change Links
	'sociallinks'	=> array(
		'facebook'	=> 'http://www.facebook.com/Mistral_Air',
		'twitter'	=> 'http://twitter.com/?lang=en',
		'google'	=> 'http://plus.google.com/u/0/106143897724281778300'
	),
	'contcat_info' => array(
		'email' => 'Mistral_Air@gmail.com',
		'phone' => '+39 0536 941 018',
		'site'	=> 'www.Mistral_Air.it',
	),

	'terms_link'	=> '',
	'privacy_link'	=> '',

	'recovery_email_subject'	=> 'hello'
];