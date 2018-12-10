<?php

class Helper {
	public static function lowerCamel($value) {
		return lcfirst(static::camelUpperCase($value));
	}

	public static function camel($value) {
		$res = '';
		if (!empty($value)) {
			$segments = explode('-', $value);
			array_walk($segments, function (&$item) {
				$item = ucfirst($item);
			});
			$res = implode('', $segments);
		}
		return $res;
	}

	public static function camelUpperCase($res) {
		if (Helper::base() == "/")
			$res = utf8_decode($res);
		return $res;
	}

	public static function removeAcent($string) {
		$no_permitidas = array(
			"á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬",
			"Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯",
			"Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹"
		);
		$permitidas    = array(
			"a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o",
			"u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I",
			"A", "E"
		);
		$texto         = str_replace($no_permitidas, $permitidas, $string);
		return $texto;
	}

	public static function getVars() {
		echo "<pre>";
		var_dump(get_defined_vars());
		echo "<pre>";
	}

	public static function getDay($dateIn, $dateOut) {
		$dias = (strtotime($dateOut) - strtotime($dateIn)) / 86400;
		$dias = floor($dias);
		return $dias;
	}

	public static function getLastDay($i) {
		$day = 86400;
		return date('Y', time() + $day * $i) . '-' . date('m', time() + $day * $i) . "-" . date('d', time() + $day * $i);
	}

	public static function getMonths() {
		return array(
			array('id' => '01', 'name' => 'Enero'), array('id' => '02', 'name' => 'Febrero'),
			array('id' => '03', 'name' => 'Marzo'), array('id' => '04', 'name' => 'Abril'),
			array('id' => '05', 'name' => 'Mayo'), array('id' => '06', 'name' => 'Junio'),
			array('id' => '07', 'name' => 'Julio'), array('id' => '08', 'name' => 'Agosto'),
			array('id' => '09', 'name' => 'Septiembre'), array('id' => '10', 'name' => 'Octubre'),
			array('id' => '11', 'name' => 'Noviembre'), array('id' => '12', 'name' => 'Diciembre')
		);
	}

	public static function getListIdioms() {
		//ISO 639 - idiomas
		return array(
			'aa' => 'Afar', 'ab' => 'Abkhaz', 'ae' => 'Avestan', 'af' => 'Afrikaans', 'ak' => 'Akan', 'am' => 'Amharic',
			'an' => 'Aragonese', 'ar' => 'Arabic', 'as' => 'Assamese', 'av' => 'Avaric', 'ay' => 'Aymara',
			'az' => 'Azerbaijani', 'ba' => 'Bashkir', 'be' => 'Belarusian', 'bg' => 'Bulgarian', 'bh' => 'Bihari',
			'bi' => 'Bislama', 'bm' => 'Bambara', 'bn' => 'Bengali', 'bo' => 'Tibetan Standard, Tibetan, Central',
			'br' => 'Breton', 'bs' => 'Bosnian', 'ca' => 'Catalan; Valencian', 'ce' => 'Chechen', 'ch' => 'Chamorro',
			'co' => 'Corsican', 'cr' => 'Cree', 'cs' => 'Czech',
			'cu' => 'Old Church Slavonic, Church Slavic, Church Slavonic, Old Bulgarian, Old Slavonic',
			'cv' => 'Chuvash', 'cy' => 'Welsh', 'da' => 'Danish', 'de' => 'German',
			'dv' => 'Divehi; Dhivehi; Maldivian;', 'dz' => 'Dzongkha', 'ee' => 'Ewe', 'el' => 'Greek, Modern',
			'en' => 'English', 'eo' => 'Esperanto', 'es' => 'Spanish; Castilian', 'et' => 'Estonian', 'eu' => 'Basque',
			'fa' => 'Persian', 'ff' => 'Fula; Fulah; Pulaar; Pular', 'fi' => 'Finnish', 'fj' => 'Fijian',
			'fo' => 'Faroese', 'fr' => 'French', 'fy' => 'Western Frisian', 'ga' => 'Irish',
			'gd' => 'Scottish Gaelic; Gaelic', 'gl' => 'Galician', 'gn' => 'GuaranÃ­', 'gu' => 'Gujarati',
			'gv' => 'Manx', 'ha' => 'Hausa', 'he' => 'Hebrew (modern)', 'hi' => 'Hindi', 'ho' => 'Hiri Motu',
			'hr' => 'Croatian', 'ht' => 'Haitian; Haitian Creole', 'hu' => 'Hungarian', 'hy' => 'Armenian',
			'hz' => 'Herero', 'ia' => 'Interlingua', 'id' => 'Indonesian', 'ie' => 'Interlingue', 'ig' => 'Igbo',
			'ii' => 'Nuosu', 'ik' => 'Inupiaq', 'io' => 'Ido', 'is' => 'Icelandic', 'it' => 'Italian',
			'iu' => 'Inuktitut', 'ja' => 'Japanese (ja)', 'jv' => 'Javanese (jv)', 'ka' => 'Georgian', 'kg' => 'Kongo',
			'ki' => 'Kikuyu, Gikuyu', 'kj' => 'Kwanyama, Kuanyama', 'kk' => 'Kazakh',
			'kl' => 'Kalaallisut, Greenlandic', 'km' => 'Khmer', 'kn' => 'Kannada', 'ko' => 'Korean', 'kr' => 'Kanuri',
			'ks' => 'Kashmiri', 'ku' => 'Kurdish', 'kv' => 'Komi', 'kw' => 'Cornish', 'ky' => 'Kirghiz, Kyrgyz',
			'la' => 'Latin', 'lb' => 'Luxembourgish, Letzeburgesch', 'lg' => 'Luganda',
			'li' => 'Limburgish, Limburgan, Limburger', 'ln' => 'Lingala', 'lo' => 'Lao', 'lt' => 'Lithuanian',
			'lu' => 'Luba-Katanga', 'lv' => 'Latvian', 'mg' => 'Malagasy', 'mh' => 'Marshallese', 'mi' => 'Maori',
			'mk' => 'Macedonian', 'ml' => 'Malayalam', 'mn' => 'Mongolian', 'mr' => 'Marathi (Marāṭhī)',
			'ms' => 'Malay', 'mt' => 'Maltese', 'my' => 'Burmese', 'na' => 'Nauru', 'nb' => 'Norwegian Bokmål',
			'nd' => 'North Ndebele', 'ne' => 'Nepali', 'ng' => 'Ndonga', 'nl' => 'Dutch', 'nn' => 'Norwegian Nynorsk',
			'no' => 'Norwegian', 'nr' => 'South Ndebele', 'nv' => 'Navajo, Navaho', 'ny' => 'Chichewa; Chewa; Nyanja',
			'oc' => 'Occitan', 'oj' => 'Ojibwe, Ojibwa', 'om' => 'Oromo', 'or' => 'Oriya', 'os' => 'Ossetian, Ossetic',
			'pa' => 'Panjabi, Punjabi', 'pi' => 'Pali', 'pl' => 'Polish', 'ps' => 'Pashto, Pushto',
			'pt' => 'Portuguese', 'qu' => 'Quechua', 'rm' => 'Romansh', 'rn' => 'Kirundi',
			'ro' => 'Romanian, Moldavian, Moldovan', 'ru' => 'Russian', 'rw' => 'Kinyarwanda',
			'sa' => 'Sanskrit (Saṁskṛta)', 'sc' => 'Sardinian', 'sd' => 'Sindhi', 'se' => 'Northern Sami',
			'sg' => 'Sango', 'si' => 'Sinhala, Sinhalese', 'sk' => 'Slovak', 'sl' => 'Slovene', 'sm' => 'Samoan',
			'sn' => 'Shona', 'so' => 'Somali', 'sq' => 'Albanian', 'sr' => 'Serbian', 'ss' => 'Swati',
			'st' => 'Southern Sotho', 'su' => 'Sundanese', 'sv' => 'Swedish', 'sw' => 'Swahili', 'ta' => 'Tamil',
			'te' => 'Telugu', 'tg' => 'Tajik', 'th' => 'Thai', 'ti' => 'Tigrinya', 'tk' => 'Turkmen', 'tl' => 'Tagalog',
			'tn' => 'Tswana', 'to' => 'Tonga (Tonga Islands)', 'tr' => 'Turkish', 'ts' => 'Tsonga', 'tt' => 'Tatar',
			'tw' => 'Twi', 'ty' => 'Tahitian', 'ug' => 'Uighur, Uyghur', 'uk' => 'Ukrainian', 'ur' => 'Urdu',
			'uz' => 'Uzbek', 've' => 'Venda', 'vi' => 'Vietnamese', 'vo' => 'Volapük', 'wa' => 'Walloon',
			'wo' => 'Wolof', 'xh' => 'Xhosa', 'yi' => 'Yiddish', 'yo' => 'Yoruba', 'za' => 'Zhuang, Chuang',
			'zh' => 'Chinese', 'zu' => 'Zulu',
		);
	}

	public static function getListCountry() {
		//ISO 3166-1 alpha-2 - países
		return array(
			'AF' => 'Afghanistan', 'AX' => 'Aland Islands', 'AL' => 'Albania', 'DZ' => 'Algeria',
			'AS' => 'American Samoa', 'AD' => 'Andorra', 'AO' => 'Angola', 'AI' => 'Anguilla', 'AQ' => 'Antarctica',
			'AG' => 'Antigua And Barbuda', 'AR' => 'Argentina', 'AM' => 'Armenia', 'AW' => 'Aruba', 'AU' => 'Australia',
			'AT' => 'Austria', 'AZ' => 'Azerbaijan', 'BS' => 'Bahamas', 'BH' => 'Bahrain', 'BD' => 'Bangladesh',
			'BB' => 'Barbados', 'BY' => 'Belarus', 'BE' => 'Belgium', 'BZ' => 'Belize', 'BJ' => 'Benin',
			'BM' => 'Bermuda', 'BT' => 'Bhutan', 'BO' => 'Bolivia', 'BA' => 'Bosnia And Herzegovina',
			'BW' => 'Botswana', 'BV' => 'Bouvet Island', 'BR' => 'Brazil', 'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei Darussalam', 'BG' => 'Bulgaria', 'BF' => 'Burkina Faso', 'BI' => 'Burundi',
			'KH' => 'Cambodia', 'CM' => 'Cameroon', 'CA' => 'Canada', 'CV' => 'Cape Verde', 'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic', 'TD' => 'Chad', 'CL' => 'Chile', 'CN' => 'China',
			'CX' => 'Christmas Island', 'CC' => 'Cocos (Keeling) Islands', 'CO' => 'Colombia', 'KM' => 'Comoros',
			'CG' => 'Congo', 'CD' => 'Congo, Democratic Republic', 'CK' => 'Cook Islands', 'CR' => 'Costa Rica',
			'CI' => 'Cote D\'Ivoire', 'HR' => 'Croatia', 'CU' => 'Cuba', 'CY' => 'Cyprus', 'CZ' => 'Czech Republic',
			'DK' => 'Denmark', 'DJ' => 'Djibouti', 'DM' => 'Dominica', 'DO' => 'Dominican Republic', 'EC' => 'Ecuador',
			'EG' => 'Egypt', 'SV' => 'El Salvador', 'GQ' => 'Equatorial Guinea', 'ER' => 'Eritrea', 'EE' => 'Estonia',
			'ET' => 'Ethiopia', 'FK' => 'Falkland Islands (Malvinas)', 'FO' => 'Faroe Islands', 'FJ' => 'Fiji',
			'FI' => 'Finland', 'FR' => 'France', 'GF' => 'French Guiana', 'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories', 'GA' => 'Gabon', 'GM' => 'Gambia', 'GE' => 'Georgia',
			'DE' => 'Germany', 'GH' => 'Ghana', 'GI' => 'Gibraltar', 'GR' => 'Greece', 'GL' => 'Greenland',
			'GD' => 'Grenada', 'GP' => 'Guadeloupe', 'GU' => 'Guam', 'GT' => 'Guatemala', 'GG' => 'Guernsey',
			'GN' => 'Guinea', 'GW' => 'Guinea-Bissau', 'GY' => 'Guyana', 'HT' => 'Haiti',
			'HM' => 'Heard Island & Mcdonald Islands', 'VA' => 'Holy See (Vatican City State)', 'HN' => 'Honduras',
			'HK' => 'Hong Kong', 'HU' => 'Hungary', 'IS' => 'Iceland', 'IN' => 'India', 'ID' => 'Indonesia',
			'IR' => 'Iran, Islamic Republic Of', 'IQ' => 'Iraq', 'IE' => 'Ireland', 'IM' => 'Isle Of Man',
			'IL' => 'Israel', 'IT' => 'Italy', 'JM' => 'Jamaica', 'JP' => 'Japan', 'JE' => 'Jersey', 'JO' => 'Jordan',
			'KZ' => 'Kazakhstan', 'KE' => 'Kenya', 'KI' => 'Kiribati', 'KR' => 'Korea', 'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan', 'LA' => 'Lao People\'s Democratic Republic', 'LV' => 'Latvia', 'LB' => 'Lebanon',
			'LS' => 'Lesotho', 'LR' => 'Liberia', 'LY' => 'Libyan Arab Jamahiriya', 'LI' => 'Liechtenstein',
			'LT' => 'Lithuania', 'LU' => 'Luxembourg', 'MO' => 'Macao', 'MK' => 'Macedonia', 'MG' => 'Madagascar',
			'MW' => 'Malawi', 'MY' => 'Malaysia', 'MV' => 'Maldives', 'ML' => 'Mali', 'MT' => 'Malta',
			'MH' => 'Marshall Islands', 'MQ' => 'Martinique', 'MR' => 'Mauritania', 'MU' => 'Mauritius',
			'YT' => 'Mayotte', 'MX' => 'Mexico', 'FM' => 'Micronesia, Federated States Of', 'MD' => 'Moldova',
			'MC' => 'Monaco', 'MN' => 'Mongolia', 'ME' => 'Montenegro', 'MS' => 'Montserrat', 'MA' => 'Morocco',
			'MZ' => 'Mozambique', 'MM' => 'Myanmar', 'NA' => 'Namibia', 'NR' => 'Nauru', 'NP' => 'Nepal',
			'NL' => 'Netherlands', 'AN' => 'Netherlands Antilles', 'NC' => 'New Caledonia', 'NZ' => 'New Zealand',
			'NI' => 'Nicaragua', 'NE' => 'Niger', 'NG' => 'Nigeria', 'NU' => 'Niue', 'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands', 'NO' => 'Norway', 'OM' => 'Oman', 'PK' => 'Pakistan', 'PW' => 'Palau',
			'PS' => 'Palestinian Territory, Occupied', 'PA' => 'Panama', 'PG' => 'Papua New Guinea', 'PY' => 'Paraguay',
			'PE' => 'Peru', 'PH' => 'Philippines', 'PN' => 'Pitcairn', 'PL' => 'Poland', 'PT' => 'Portugal',
			'PR' => 'Puerto Rico', 'QA' => 'Qatar', 'RE' => 'Reunion', 'RO' => 'Romania', 'RU' => 'Russian Federation',
			'RW' => 'Rwanda', 'BL' => 'Saint Barthelemy', 'SH' => 'Saint Helena', 'KN' => 'Saint Kitts And Nevis',
			'LC' => 'Saint Lucia', 'MF' => 'Saint Martin', 'PM' => 'Saint Pierre And Miquelon',
			'VC' => 'Saint Vincent And Grenadines', 'WS' => 'Samoa', 'SM' => 'San Marino',
			'ST' => 'Sao Tome And Principe', 'SA' => 'Saudi Arabia', 'SN' => 'Senegal', 'RS' => 'Serbia',
			'SC' => 'Seychelles', 'SL' => 'Sierra Leone', 'SG' => 'Singapore', 'SK' => 'Slovakia', 'SI' => 'Slovenia',
			'SB' => 'Solomon Islands', 'SO' => 'Somalia', 'ZA' => 'South Africa',
			'GS' => 'South Georgia And Sandwich Isl.', 'ES' => 'Spain', 'LK' => 'Sri Lanka', 'SD' => 'Sudan',
			'SR' => 'Suriname', 'SJ' => 'Svalbard And Jan Mayen', 'SZ' => 'Swaziland', 'SE' => 'Sweden',
			'CH' => 'Switzerland', 'SY' => 'Syrian Arab Republic', 'TW' => 'Taiwan', 'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania', 'TH' => 'Thailand', 'TL' => 'Timor-Leste', 'TG' => 'Togo', 'TK' => 'Tokelau',
			'TO' => 'Tonga', 'TT' => 'Trinidad And Tobago', 'TN' => 'Tunisia', 'TR' => 'Turkey', 'TM' => 'Turkmenistan',
			'TC' => 'Turks And Caicos Islands', 'TV' => 'Tuvalu', 'UG' => 'Uganda', 'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates', 'GB' => 'United Kingdom', 'US' => 'United States',
			'UM' => 'United States Outlying Islands', 'UY' => 'Uruguay', 'UZ' => 'Uzbekistan', 'VU' => 'Vanuatu',
			'VE' => 'Venezuela', 'VN' => 'Viet Nam', 'VG' => 'Virgin Islands, British', 'VI' => 'Virgin Islands, U.S.',
			'WF' => 'Wallis And Futuna', 'EH' => 'Western Sahara', 'YE' => 'Yemen', 'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);
	}

	public static function getLink() {
		return "https://drive.google.com/file/d/10yMbX7X3LgKOcsdH_7lflgwjJLh5CZvg/view?usp=sharing";
	}

	public static function base() {
		$serverName = $_SERVER['SERVER_NAME'];
		if ($serverName == "localhost" || filter_var($_SERVER['SERVER_NAME'], FILTER_VALIDATE_IP)) {
			$base = "/hotel/";
		} else {
			//cambiar a para probr en servidor real / >> solo se esta usando /hotel/ para probar como servidor en mi celular
			$base = "/";
		}
		return $base;
	}
}
