
<!DOCTYPE html>

<html>

	<head>
	
		<title></title>
		
		<meta charset="utf8">

	</head>



	<body>
		<h1>Some stuff - this is gonna be great!</h1>
		<script   src="https://code.jquery.com/jquery-1.12.3.min.js"   integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="   crossorigin="anonymous"></script>
		<script type="text/javascript">
			"use strict"
			$.ajax({
				url: "http://api.data.gov/nrel/pvwatts/v5.json",
				type: "GET",
				data: {
				    "api_key": "epygjNFfrIC05clFKjVGX2aOH91D4inWYkvaxAxJ",
				    "system_capacity" : "4",
				    "module_type" : "1",
				    "losses" : "10",
				    "array_type" : "1",
				    "tilt" : "40",
				    "azimuth" : "180",
				    "lat" : "40",
				    "lon" : "-105"
				},
				async: true

			}).done(function(data){
				console.log(data);

			});


		</script>
	</body>

</html>

