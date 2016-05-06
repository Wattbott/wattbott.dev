<?php

class Api extends Eloquent {

    static public $url_pv = "http://api.data.gov/nrel/pvwatts/v5.json?";
    static public $url_eui = "https://portfoliomanager.energystar.gov/ws/targetFinder?measurementSystem=EPA";

    public static function setLocation($zipcode)
    {
		$results = [];
		$geocode = Geocoder::geocode($zipcode);
		$results['lat']= $geocode->getLatitude();
		$results['lon']= $geocode->getLongitude();
		$results['state'] = $geocode->getRegion();
		$results['country'] = $geocode->getCountry();
		return $results;
   
    }
    public function pv()
    {	
		$ch = curl_init();
    	
		// query builder
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

    public function eui()
    {
    	// build xml request with object
    	$filename = public_path() . "/xml/targetfinder.xml";
		$query = simplexml_load_file($filename);
		// return $query;
		$xml_query = $query->asXML();
		
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

    	$result = [
			'design_site_intensity' => $response->metric[11],
			'design_energy_cost' => $response->metric[17],
			'median_site_intensity' => $response->metric[1],
			'median_energy_cost' => $response->metric[7],
		];
	
		return $result;
    }

}