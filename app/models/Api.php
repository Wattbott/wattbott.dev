<?php

class Api extends Eloquent {

    static public $url_pv = "http://api.data.gov/nrel/pvwatts/v5.json?";
    static public $url_geo = "http://api.data.gov/nrel/pvwatts/v5.json?";


    public function pv()
    {	
		$ch = curl_init();
    	
		// query builder
		$query = [
		    "api_key"=> "epygjNFfrIC05clFKjVGX2aOH91D4inWYkvaxAxJ",
		    "system_capacity" => "4",
		    "module_type" => "1",
		    "losses" => "10",
		    "array_type" => "1",
		    "tilt" => "40",
		    "azimuth" => "180",
		    "lat" => "40",
		    "lon" => "-105"
		];
		$url_pv = static::$url_pv . http_build_query($query);

    	$options = [
    		CURLOPT_URL => $url_pv,
    		CURLOPT_FAILONERROR => true,
			CURLINFO_HEADER_OUT => true,
			CURLOPT_RETURNTRANSFER => true,
    	];
		
    	curl_setopt_array($ch, $options);

		//execute post
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		$error = curl_error($ch);
		$errno = curl_errno($ch);

		//close connection
		curl_close($ch);
		$result = json_decode($result,true);
		return $result['outputs']['ac_annual'];
    }

    public function geo()
    {
  // //   	$curl     = new \Ivory\HttpAdapter\CurlHttpAdapter();
		// // $geocoder = new \Geocoder\Provider\GoogleMaps($curl);

		// // $geocoder->geocode(...);
		// // $geocoder->reverse(...);
  //   	// dd($this->input['postal_code']);
  //   	$httpAdapter = 'google_maps';
		// // $locale,
		// // $region,
		// $useSsl = true;
  //   	$apiKey = 'AIzaSyA5fV8LgO_EWYnBeU3C2ErFTEo6pmrHJcU';

		// $geocoder = new \Geocoder\Provider\GoogleMaps(
		//     $httpAdapter,
		//     // $locale,
		//     // $region,
		//     $useSsl, // true|false
		//     $apiKey 
		// );

		// dd($geocoder->all());

    }

}