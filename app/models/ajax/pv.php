
<!DOCTYPE html>

<html>

	<head>
	
		<title></title>
		
		<meta charset="utf8">

	</head>



	<body>
		<h1>Some stuff - this is gonna be great!</h1>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
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
				}

			}).done(function(data){
				console.log("this is the shit!");
				console.log(data);

			});


		</script>
	</body>

</html>

