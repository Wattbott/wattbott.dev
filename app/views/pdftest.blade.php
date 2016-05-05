<?php
$data = $run->run;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
{{-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> --}}
</head>
<body>
	<title></title>
	<table>
		<tr>
			<td>
				<img src="wattbott.png">
			</td>
			<td>
				<address>
					<strong>Wattbott, Inc.</strong><br>
					127 Princess Pass<br>
					San Tan Tiddle-o, TX<br>
					<abbr title="Phone">P:</abbr> 832.524.3189
				</address>
			</td>
		</tr>
	</table>
	<h1>Your Wattbott Results <small><em>for {{ strtolower($data['user_input']['run_name']) }}</em></small></h1>
{{ $data['user_input']['email'] }}
<table class="table table-striped" style="width:50%">
	<tr>
		<td>Project name:</td>
		<td><em>{{ $data['user_input']['run_name'] }}</em></td>
	</tr>
	<tr>
		<td>Zip Code:</td>
		<td>{{ $data['user_input']['zipcode'] }}</td>
	</tr>
	<tr>
		<td>Building Type:</td>
		<td>{{ $data['user_input']['bldg_type'] }}</td>
	</tr>
</table>

</body>
</html>
