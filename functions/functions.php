<?php // Cette fonction s'occupe de vérifier qu'une variable n'est pas vide et supprimme des espaces au début et à la fin de chaine

function getVersion( $path ) {
	$array = (array) get_option( 'active_plugins', array() );
	foreach( $array as $el ) {
		if( strpos( $el , $path) !== false ) {
			$path = '/' . $el;
		}
	}
	$fichier = fopen( PLUGINS_PATH . $path ,"r");
			$trouve = false;
			// On récupère la version
			while( !feof( $fichier ) && !$trouve ) {
			 // On récupère une ligne
			  $ligne = fgets( $fichier );
				if ( strpos( $ligne , 'Version:' ) !== false ) {
					$trouve = true;
					$i = strpos( $ligne, 'Version:' ) + strlen('Version:') + 1;
					$j = $i;
					while ( $i<=strlen( $ligne ) && substr( $ligne, $i, 2) != "\n" ) {
						$i++;
					}
					$toReturn = substr( $ligne, $j, $i - $j);
				}			
			 }
			 // On ferme le fichier
			 fclose($fichier);
	return $toReturn;
}

function filtreString($var) {
	$var = trim($var);
	$var = htmlspecialchars( $var );
	$var = strip_tags( $var );
	if (empty($var)) {
		return '';
	} else {
		return trim($var);	
	}
}

function filtreAttribut($var) {
	$var = trim($var);
	if (empty($var)) {
		return '';
	} else {
		return trim($var);	
	}
}

function filtreFloat($var) {
	$var = trim($var);
	if (empty($var)) {
		return 0;
	}
	else if (!is_numeric($var)) {
		return 0;	
	}
	else {
		return trim($var);	
	}
}

function filtreEntier($var) {
	if (is_int($var)) {
		return $var;	
	}
	else if (is_numeric($var)) {
		return (int)$var;
	}
	else {
		return (int)$var;	
	}
}

function is_plugin_active_custom( $plugin ) {
	$array = (array) get_option( 'active_plugins', array() );
	$toReturn = false;
	foreach( $array as $el ) {
		if( strpos( $el , $plugin ) !== false ) {
			$toReturn = true;
		}
	}
	return $toReturn;
	/*return in_array( $plugin, (array) get_option( 'active_plugins', array() ) ) ;*/
}

// function add_secb_settings_menu() {
// 	add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
// }
// add_action("admin_menu", "add_secb_settings_menu");


function get_country_array() {
  $countries = array(
    'AD' => 'Andorra',
    'AE' => 'United Arab Emirates',
    'AF' => 'Afghanistan',
    'AG' => 'Antigua & Barbuda',
    'AI' => 'Anguilla',
    'AL' => 'Albania',
    'AM' => 'Armenia',
    'AN' => 'Netherlands Antilles',
    'AO' => 'Angola',
    'AQ' => 'Antarctica',
    'AR' => 'Argentina',
    'AS' => 'American Samoa',
    'AT' => 'Austria',
    'AU' => 'Australia',
    'AW' => 'Aruba',
    'AZ' => 'Azerbaijan',
    'BA' => 'Bosnia and Herzegovina',
    'BB' => 'Barbados',
    'BD' => 'Bangladesh',
    'BE' => 'Belgium',
    'BF' => 'Burkina Faso',
    'BG' => 'Bulgaria',
    'BH' => 'Bahrain',
    'BI' => 'Burundi',
    'BJ' => 'Benin',
    'BM' => 'Bermuda',
    'BN' => 'Brunei Darussalam',
    'BO' => 'Bolivia',
    'BR' => 'Brazil',
    'BS' => 'Bahamas, The',
    'BT' => 'Bhutan',
    'BV' => 'Bouvet Island',
    'BW' => 'Botswana',
    'BY' => 'Belarus',
    'BZ' => 'Belize',
    'CA' => 'Canada',
    'CC' => 'Cocos Islands',
    'CD' => 'Congo, Democratic Rep. of the',
    'CF' => 'Central African Republic',
    'CG' => 'Congo',
    'CH' => 'Switzerland',
    'CI' => 'Ivory Coast',
    'CK' => 'Cook Islands',
    'CL' => 'Chile',
    'CM' => 'Cameroon',
    'CN' => 'China',
    'CO' => 'Colombia',
    'CR' => 'Costa Rica',
    'CU' => 'Cuba',
    'CV' => 'Cape Verde',
    'CX' => 'Christmas Island',
    'CY' => 'Cyprus',
    'CZ' => 'Czech Republic',
    'DE' => 'Germany',
    'DJ' => 'Djibouti',
    'DK' => 'Denmark',
    'DM' => 'Dominica',
    'DO' => 'Dominican Republic',
    'DZ' => 'Algeria',
    'EC' => 'Ecuador',
    'EE' => 'Estonia',
    'EG' => 'Egypt',
    'EH' => 'Western Sahara',
    'ER' => 'Eritrea',
    'ES' => 'Spain',
    'ET' => 'Ethiopia',
    'FI' => 'Finland',
    'FJ' => 'Fiji',
    'FK' => 'Falkland Islands',
    'FM' => 'Micronesia, Federated States of',
    'FO' => 'Faroe Islands',
    'FR' => 'France',
    'GA' => 'Gabon',
    'GB' => 'United Kingdom',
    'GD' => 'Grenada',
    'GE' => 'Georgia',
    'GF' => 'Guiana, French',
    'GH' => 'Ghana',
    'GI' => 'Gibraltar',
    'GL' => 'Greenland',
    'GM' => 'Gambia, the',
    'GN' => 'Guinea',
    'GP' => 'Guadeloupe',
    'GQ' => 'Equatorial Guinea',
    'GR' => 'Greece',
    'GS' => 'S. Georgia and S. Sandwich Is.',
    'GT' => 'Guatemala',
    'GU' => 'Guam',
    'GW' => 'Guinea-Bissau',
    'GY' => 'Guyana',
    'HK' => 'Hong Kong',
    'HM' => 'Heard and McDonald Islands',
    'HN' => 'Honduras',
    'HR' => 'Croatia',
    'HT' => 'Haiti',
    'HU' => 'Hungary',
    'IC' => 'Canary Iland',
    'ID' => 'Indonesia',
    'IE' => 'Ireland',
    'IL' => 'Israel',
    'IN' => 'India',
    'IO' => 'British Indian Ocean Territory',
    'IQ' => 'Iraq',
    'IR' => 'Iran, Islamic Republic of',
    'IS' => 'Iceland',
    'IT' => 'Italy',
    'JM' => 'Jamaica',
    'JO' => 'Jordan',
    'JP' => 'Japan',
    'KE' => 'Kenya',
    'KG' => 'Kyrgyzstan',
    'KH' => 'Cambodia',
    'KI' => 'Kiribati',
    'KM' => 'Comoros',
    'KN' => 'Saint Kitts and Nevis',
    'KP' => 'Korea, Demo. People\'s Rep. of',
    'KR' => 'Korea South Republic of',
    'KV' => 'Kosovo',
    'KW' => 'Kuwait',
    'KY' => 'Cayman Islands',
    'KZ' => 'Kazakhstan',
    'LA' => 'Lao People\'s Democratic Republic',
    'LB' => 'Lebanon',
    'LC' => 'Saint Lucia',
    'LI' => 'Liechtenstein',
    'LK' => 'Sri Lanka',
    'LR' => 'Liberia',
    'LS' => 'Lesotho',
    'LT' => 'Lithuania',
    'LU' => 'Luxembourg',
    'LV' => 'Latvia',
    'LY' => 'Libyan Arab Jamahiriya',
    'MA' => 'Morocco',
    'MC' => 'Monaco',
    'MD' => 'Moldova, Republic of',
    'ME' => 'Montenegro',
    'MG' => 'Madagascar',
    'MH' => 'Marshall Islands',
    'MK' => 'Macedonia, TFYR',
    'ML' => 'Mali',
    'MM' => 'Myanmar',
    'MN' => 'Mongolia',
    'MO' => 'Macao',
    'MP' => 'Northern Mariana Islands',
    'MQ' => 'Martinique',
    'MR' => 'Mauritania',
    'MS' => 'Montserrat',
    'MT' => 'Malta',
    'MU' => 'Mauritius',
    'MV' => 'Maldives',
    'MW' => 'Malawi',
    'MX' => 'Mexico',
    'MY' => 'Malaysia',
    'MZ' => 'Mozambique',
    'NA' => 'Namibia',
    'NC' => 'New Caledonia',
    'NE' => 'Niger',
    'NF' => 'Norfolk Island',
    'NG' => 'Nigeria',
    'NI' => 'Nicaragua',
    'NL' => 'Netherlands',
    'NO' => 'Norway',
    'NP' => 'Nepal',
    'NR' => 'Nauru',
    'NU' => 'Niue',
    'NZ' => 'New Zealand',
    'OM' => 'Oman',
    'PA' => 'Panama',
    'PE' => 'Peru',
    'PF' => 'French Polynesia',
    'PG' => 'Papua New Guinea',
    'PH' => 'Philippines',
    'PK' => 'Pakistan',
    'PL' => 'Poland',
    'PM' => 'Saint Pierre and Miquelon',
    'PN' => 'Pitcairn Island',
    'PR' => 'Puerto Rico',
    'PT' => 'Portugal',
    'PW' => 'Palau',
    'PY' => 'Paraguay',
    'QA' => 'Qatar',
    'RE' => 'Reunion',
    'RO' => 'Romania',
    'RS' => 'Serbia',
    'RU' => 'Russia',
    'RW' => 'Rwanda',
    'SA' => 'Saudi Arabia',
    'SB' => 'Solomon Islands',
    'SC' => 'Seychelles',
    'SD' => 'Sudan',
    'SE' => 'Sweden',
    'SG' => 'Singapore',
    'SH' => 'Saint Helena',
    'SI' => 'Slovenia',
    'SJ' => 'Svalbard and Jan Mayen Islands',
    'SK' => 'Slovakia',
    'SL' => 'Sierra Leone',
    'SM' => 'San Marino',
    'SN' => 'Senegal',
    'SO' => 'Somalia',
    'SR' => 'Suriname',
    'ST' => 'Sao Tome and Principe',
    'SV' => 'El Salvador',
    'SY' => 'Syrian Arab Republic',
    'SZ' => 'Swaziland',
    'TC' => 'Turks and Caicos Islands',
    'TD' => 'Chad',
    'TF' => 'French Southern Territories - TF',
    'TG' => 'Togo',
    'TH' => 'Thailand',
    'TJ' => 'Tajikistan',
    'TK' => 'Tokelau',
    'TL' => 'Timor-Leste',
    'TM' => 'Turkmenistan',
    'TN' => 'Tunisia',
    'TO' => 'Tonga',
    'TR' => 'Turkey',
    'TT' => 'Trinidad & Tobago',
    'TV' => 'Tuvalu',
    'TW' => 'Taiwan',
    'TZ' => 'Tanzania, United Republic of',
    'UA' => 'Ukraine',
    'UG' => 'Uganda',
    'UM' => 'US Minor Outlying Islands',
    'US' => 'United States',
    'UY' => 'Uruguay',
    'UZ' => 'Uzbekistan',
    'VA' => 'Vatican',
    'VC' => 'Saint Vincent and the Grenadines',
    'VE' => 'Venezuela',
    'VG' => 'Virgin Islands, British',
    'VI' => 'Virgin Islands, U.S.',
    'VN' => 'Viet Nam',
    'VU' => 'Vanuatu',
    'WF' => 'Wallis and Futuna',
    'WS' => 'Samoa',
    'XC' => 'CuraÃ§ao',
    'XM' => 'Sint-Maarten',
    'XY' => 'Saint Barthelemy',
    'YE' => 'Yemen',
    'YT' => 'Mayotte',
    'ZA' => 'South Africa',
    'ZM' => 'Zambia',
    'ZW' => 'Zimbabwe',
  );
  asort($countries);
  return $countries;
}

function get_country_name($code) {
  $countries = get_country_array();
  if (isset($countries[$code])) {
    return $countries[$code];
  }
  return $code;
}
