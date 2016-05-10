<?php

class Api extends Eloquent {

    static public $url_utility_rate = "http://api.data.gov/nrel/utility_rates/v3.json?";
    static public $url_pv = "http://api.data.gov/nrel/pvwatts/v5.json?";
    static public $url_eui = "https://portfoliomanager.energystar.gov/ws/targetFinder?measurementSystem=EPA";

    public static function setLocation($zipcode)
    {
		// get additional location info from zipcode
		// gecode is a php framework that accesses other spatial data apis
		$results = [];
		$geocode = Geocoder::geocode($zipcode);
		if (!empty($geocode->getLatitude())) {
			$results['lat']= $geocode->getLatitude();
			$results['lon']= $geocode->getLongitude();
			$results['city'] = $geocode->getCity();
			$results['state'] = $geocode->getRegionCode();
			$results['country'] = $geocode->getCountryCode();
		} else {
			$results = false;
			Log::error('geocoder failed');
		}
		return $results;
    }

    public static function utilityRate($lat, $lon)
    {
    	// query string builder
		$query = [
		    "api_key"=> $_ENV['PV_PVwatts_APIkey'],
		    "lat" => $lat,
		    "lon" => $lon
		];
		$url_utility_rate = static::$url_utility_rate . http_build_query($query);

    	// set variables for curl http request
		$ch = curl_init();
    	$options = [
    		CURLOPT_URL => $url_utility_rate,
    		CURLOPT_FAILONERROR => true,
			CURLINFO_HEADER_OUT => true,
			CURLOPT_RETURNTRANSFER => true,
    	];
    	curl_setopt_array($ch, $options);

		//execute post
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		$error = curl_error($ch);

		//close connection
		curl_close($ch);
		

		if (!$error) {
			$result = json_decode($result,true);
			$result = $result['outputs']['commercial'];
		} else {
			$result = false;
			Log::error('api utility rate:' . $error);
		}
		return $result;
    }

    public function pv()
    {	
    	
		// query string builder
		$query = [
		    "api_key"=> $_ENV['PV_PVwatts_APIkey'],
		    "system_capacity" => $this->input['system_capacity'],
		    "module_type" => "1",
		    "losses" => "10",
		    "array_type" => "1",
		    "tilt" => "40",
		    "azimuth" => "180",
		    "lat" => $this->input['lat'],
		    "lon" => $this->input['lon']
		];
		$url_pv = static::$url_pv . http_build_query($query);

    	// set variables for curl http request
		$ch = curl_init();
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

		//close connection
		curl_close($ch);
		

		if (!$error) {
			$result = json_decode($result,true);
			$result = $result['outputs']['ac_annual'];
		} else {
			$result = false;
			Log::error('api pv:' . $error);
		}
		return $result;
    }

    public function eui()
    {
		// xml query body builder from targetfinder view saved in views folder
		$xml_query = View::make('targetfinder',['input'=>$this->input])->render();

		// set variables for curl http request
		$ch = curl_init();
		$options = [
    		CURLOPT_URL => static::$url_eui,
    		CURLOPT_FAILONERROR => true,
			CURLINFO_HEADER_OUT => false,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS =>  $xml_query,
			CURLOPT_HTTPHEADER => ['Content-Type: application/xml'],
			CURLOPT_HTTP200ALIASES => [-200,-100],
    	];
    	curl_setopt_array($ch, $options);
		
		// catch response and convert it to object
		$xml_response = curl_exec($ch);
		$response = simplexml_load_string($xml_response);
		// info and error catching on response
		$info = curl_getinfo($ch);
		$error = curl_error($ch);
		//close connection
		curl_close($ch);

		if (!$error) {
	    	$result = [
				'design_site_intensity' => (string)$response->metric[11]->value,
				'design_energy_cost' => (string)$response->metric[17]->value,
				'median_site_intensity' => (string)$response->metric[1]->value,
				'median_energy_cost' => (string)$response->metric[7]->value,
			];
		} else {
			$result = false;
			Log::error('api eui:' . $error);
		}
		return $result;
    }

}