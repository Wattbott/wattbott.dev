<?php

 $run = (object) [

        	'user_input' => [
        		'run_name' => 'first try for my building',
        		'email' => 'annajmorton@gmail.com',
        		'zipcode' => 78248,
				'bldg_type' => 'School',
				'gross_flr_area' => 12000,
				'gross_roof_area' => 12000,
				'energy data' => [
					'elec' => [
						'cost' => [
							'total' => 8000
						],
						'energy' => [
							'total' =>  98500,
							'jan' => 8208,
							'feb' => 8208,
							'mar' => 8208,
							'apr' => 8208,
							'may' => 8208,
							'jun' => 8210,
							'jul' => 8210,
							'aug' => 8208,
							'sep' => 8208,
							'oct' => 8208,
							'nov' => 8208,
							'dec' => 8208,
							'units' => 'kWh'
						]
					],
					'gas' =>[
						'cost' => [
						'total' => 1152
						],
						'energy' => [
							'total' =>  1440,
							'jan' => 120,
							'feb' => 120,
							'mar' => 120,
							'apr' => 120,
							'may' => 120,
							'jun' => 120,
							'jul' => 120,
							'aug' => 120,
							'sep' => 120,
							'oct' => 120,
							'nov' => 120,
							'dec' => 120,
							'units' => 'therms'
						]
					]
				]
			],
			'api_input' => [
        		'postal_code' => 78248,
        		'lat' => 29.424122,
        		'lon' => -98.493629,
        		'state' => 'Texas',
        		'country'=> 'United States',
				'system_capacity' => 20,
				'utility_rate' => [
					'elec' => [0.08121827,'$/kWh'],
					'gas' => [0.8,'$/therm']
				]
			],
			'api_output' => [
	        	'eui' => [
	        		'design_site_intensity' => 40,
					'design_energy_cost' => 9152,
					'median_site_intensity' => 70,
					'median_energy_cost' => 16016
				],
				'pv' => [
					'ac_annual' => 9850
				]
			],
			'user_output' => [
        		'eui' => [
        			'design_site_intensity' => 40,
					'design_energy_cost' => 9152,
					'median_site_intensity' => 70,
					'median_energy_cost' => 16016
        		],
				'pv' => [
					'roi' => 10,
					'percent_savings' => 0.1
				]
			]
    ];

var_dump($run);
