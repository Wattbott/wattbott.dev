<!DOCTYPE html>

<html>
<head>
	<title></title>
	<meta charset="utf8">
</head>
<body>
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClgn_du5ACe3oOB91oXDR4wE4GF0rjZPc"></script>
	<script type="text/javascript">
			"use strict"
//geocoder sandbox
	var geocoder = new google.maps.Geocoder();
	var address = 78212
		console.log(address);
		geocoder.geocode({ "address": address }, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				var state = results[0].address_components[3].long_name;
				var country = results[0].address_components[4].long_name;
				var lat = results[0].geometry.bounds.H.H;
				var lon = results[0].geometry.bounds.j.H;
				// BELOW is PV API ajax request
				// var systemCapacity = 4;
				// $.ajax({
				// 	url: "http://api.data.gov/nrel/pvwatts/v5.json",
				// 	type: "GET",
				// 	data: {
				// 		"api_key": "epygjNFfrIC05clFKjVGX2aOH91D4inWYkvaxAxJ",
				// 		"system_capacity" : systemCapacity,
				// 		"module_type" : "0",
				// 		"losses" : "0.5",
				// 		"array_type" : "1",
				// 		"tilt" : "0",
				// 		"azimuth" : "0",
				// 		"lat" : lat,
				// 		"lon" : lon,
				// 		"inv_eff" : "90"
				// 	}
				// }).done(function(data){
				// 	console.log("ac_annual:");
				// 	console.log(data.outputs.ac_annual);
				});
			}
		});
	//end geocoder		
		</script>

<?php
class Geocode extends BaseModel {

	public function getLat()
	{

	}

	public function getLon(){

	}

	public function getState(){

	}

	public function getCountry(){

	}
}