<?php

class Api extends Eloquent {

    static public $url_pv = "http://api.data.gov/nrel/pvwatts/v5.json?";
    static public $url_geo = "http://api.data.gov/nrel/pvwatts/v5.json?";

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
    	$result = [
			'design_site_intensity' => 0,
			'design_energy_cost' => 0,
			'median_site_intensity' => 0,
			'median_energy_cost' => 0
		];
	
		return $result;
    }

}