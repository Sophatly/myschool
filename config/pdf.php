<?php

// return [
	
// 	'mode'                  => 'khm',
// 	'format'                => 'A4',
// 	'author'                => '',
// 	'subject'               => '',
// 	'keywords'              => '',
// 	'creator'               => 'Laravel Pdf',
// 	'display_mode'          => 'fullpage',
// 	'tempDir'               => base_path('../temp/'),
// 	'pdf_a'                 => false,
// 	'pdf_a_auto'            => false,
// 	'icc_profile_path'      => ''
// ];

return [
	'font_path' => base_path('resources/fonts/'),
	'font_data' => [
		"khmerosmoul" => [
			/* Khmer */
			'R' => "KhmerOSmuol.ttf",
			'useOTL' => 0xFF,
		],
		"khmerosmoullight" => [
			/* Khmer */
			'R' => "KhmerOSmuollight.ttf",
			'useOTL' => 0xFF,
		],
		"khmerosbokor" => [
			/* Khmer */
			'R' => "KhmerOSBokor.ttf",
			'useOTL' => 0xFF,
		],
		"khmerosmoulpali" => [
			/* Khmer */
			'R' => "KhmerOSmuolpali.ttf",
			'useOTL' => 0xFF,
			'useKashida' => 75
		],

		"khmerossiemreap"=>[
			/* Khmer */
			'R' => "KhmerOSsiemreap.ttf",
			'useOTL' => 0xFF,
			'useKashida' => 75
		],

		// ...add as many as you want.
	]
];