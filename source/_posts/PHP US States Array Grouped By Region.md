---
title: "PHP US States Array Grouped By Region"
date: 2012-06-14 23:35:11
---

I needed a PHP array of the US states grouped by region, Since i did not find something like that i just made one real quick and thought i should share it in case someone else will need to do the same.

&nbsp;

[php]
/**
 * Return list of states grouped by region
 * @return array
 */
function getStatesByRegion() {
	return array(
		'Eastern' => array(
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'DC' => 'District Of Columbia',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'IN' => 'Indiana',
            'KY' => 'Kentucky',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'OH' => 'Ohio',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WV' => 'West Virginia',
		),
		'Central' => array(
			'AL' => 'Alabama',
            'AR' => 'Arkansas',
            'IL' => 'Illinois',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'LA' => 'Louisiana',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'NE' => 'Nebraska',
            'ND' => 'North Dakota',
            'OK' => 'Oklahoma',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'WI' => 'Wisconsin',
		),
		'Mountain' => array(
			'AZ' => 'Arizona',
			'CO' => 'Colorado',
			'ID' => 'Idaho',
			'MT' => 'Montana',
			'NM' => 'New Mexico',
			'UT' => 'Utah',
			'WY' => 'Wyoming'
		),
		'Pacific' => array(
			'CA' => 'California',
			'NV' => 'Nevada',
			'OR' => 'Oregon',
			'WA' => 'Washington',
		),
		'Other' => array(
			'AK' => 'Alaska',
			'HI' => 'Hawaii',
		),
	);
}
[/php]
