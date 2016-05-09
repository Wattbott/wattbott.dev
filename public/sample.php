<?php

 $run = [

        	'user_input' => [
        		'run_name' => 'first try for my building',
        		'email' => 'annajmorton@gmail.com',
        		'zipcode' => 78248,
				'bldg_type' => 'K-12 School',
				'gross_flr_area' => 12000,
				'gross_roof_area' => 12000,
				'energy_data' => [
					'elec' => [
						'cost' => [
							'total' => 8000,
							'jan' => 665,
							'feb' => 665,
							'mar' => 665,
							'apr' => 665,
							'may' => 665,
							'jun' => 675,
							'jul' => 675,
							'aug' => 665,
							'sep' => 665,
							'oct' => 665,
							'nov' => 665,
							'dec' => 665
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
							'total' => 1152,
							'jan' => 96,
							'feb' => 96,
							'mar' => 96,
							'apr' => 96,
							'may' => 96,
							'jun' => 96,
							'jul' => 96,
							'aug' => 96,
							'sep' => 96,
							'oct' => 96,
							'nov' => 96,
							'dec' => 96
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
        		'lat' => 29.424122,
        		'lon' => -98.493629,
        		'city' => 'San Antonio',
        		'state' => 'TX',
        		'country'=> 'US',
        		'zipcode' => 78248,
        		'gross_flr_area'=> 12000,
        		'bldg_type' => 'K-12 School',
				'system_capacity' => 19.8,
				'utility_rate' => [
					'elec' => [23.803715,'$/mmBtu'],
					'gas' => [8.0,'$/mmBt']
				],
				'energy' => [
					'elec' => 336,
					'gas' => 144
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
