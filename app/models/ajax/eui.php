<?php  
	header("Access-Control-Allow-Origin: POST, GET");
	$filename = "xmlsample.xsd";
	$xml_info = file_get_contents($filename);
	$object = simplexml_load_file($filename);
	// var_dump($object);

	$xml_info = str_replace(PHP_EOL, ' ', $xml_info);
    //PHP_EOL = PHP_End_Of_Line - would remove new lines too
	$xml_info = preg_replace('/[\r\n]+/', "\n", $xml_info);
	$xml_info = preg_replace('/[ \t]+/', ' ', $xml_info);
	var_dump($xml_info);
	// var_dump($object->asXML());


	

	//extract data from the post
	// //set POST variables
	// $fields = array(
	// 	'lname' => urlencode($_POST['last_name']),
	// 	'fname' => urlencode($_POST['first_name']),
	// 	'title' => urlencode($_POST['title']),
	// 	'company' => urlencode($_POST['institution']),
	// 	'age' => urlencode($_POST['age']),
	// 	'email' => urlencode($_POST['email']),
	// 	'phone' => urlencode($_POST['phone'])
	// );

	// //url-ify the data for the POST
	// foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	// rtrim($fields_string, '&');
	// password: 86o586O5
	// username: annajmorton
	// open connection
	$ch = curl_init();
	$url = "https://portfoliomanager.energystar.gov/ws/targetFinder?measurementSystem=EPA";
	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_FAILONERROR, true);
	curl_setopt($ch,CURLINFO_HEADER_OUT, true);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_HTTPHEADER,['Content-Type: application/xml']);
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST,true);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $xml_info);

	

	//execute post
	$result = curl_exec($ch);
	$info = curl_getinfo($ch);
	$error = curl_error($ch);

	//close connection
	curl_close($ch);


	var_dump($result);
	var_dump($info);
	var_dump($error);
?>


<!DOCTYPE html>

<html>

	<head>
	
		<title></title>
		
		<meta charset="utf8">

	</head>



	<body>
		<h1>ememememmmm... this could be rough</h1>
		<div id="shit">
			<?= $xml_info; ?>
		</div>
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">
			// "use strict"
			// var xmlDocument = $('#shit').html();
			

			$.ajax({
			    type: "POST",
			    url: "https://portfoliomanager.energystar.gov/ws/targetFinder/",
			    headers: { 
			    	'Content-Type': 'application/x-www-form-urlencoded',
			    	'Access-Control-Allow-Origin': '*'
			    },

			    accepts: {xml: "text/xml", text: "text/plain"},
			    converters: {"text xml": jQuery.parseXML},
			    dataType: "jsonp",
			    contentType: "application/xml",
			    crossDomain: true,
			    data: xmlDocument
			}).done(function(data){
				console.log("this is the shit!");

			}).fail(function(data){
				console.log(data);
			});

			// // maybe try this with js...
			// // var request = new XMLHttpRequest();
			// // var params = xmlDocument;
			// // request.open('POST', "https://portfoliomanager.energystar.gov/ws/targetFinder", true);
			// // request.onreadystatechange = function() {if (request.readyState==4) alert("It worked!");};
			// // request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			// // request.setRequestHeader("Content-length", params.length);
			// // request.setRequestHeader("Connection", "close");
			// // request.send(params);

		</script>

	</body>

</html>

