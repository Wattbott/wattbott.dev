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
					San Antonio, TX 78212<br>
					<abbr title="Phone">P:</abbr> 832.524.3189
				</address>
			</td>
		</tr>
	</table>
	<h1><strong>Wattbott Results</strong><br><small><em>for {{ strtolower($data['user_input']['run_name']) }}</em></small></h1>
	<h2>Building Specs</h2>
	<table class="table table-striped" style="width:20%">
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
		<tr>
			<td>Gross Roof Area:</td>
			<td>{{ $data['user_input']['gross_roof_area'] }}</td>
		</tr>
	</table>
	<h2>Results</h2>
	<table class="table table-striped" style="width:20%">
		<tr>
			<td>PhotoVoltaic Installation ROI:</td>
			<td><em>{{ $data['user_output']['pv']['roi'] }}</em></td>
		</tr>
		<tr>
			<td>Zip Code:</td>
			<td>{{ $data['user_input']['zipcode'] }}</td>
		</tr>
		<tr>
			<td>Building Type:</td>
			<td>{{ $data['user_input']['bldg_type'] }}</td>
		</tr>
		<tr>
			<td>Gross Roof Area:</td>
			<td>{{ $data['user_input']['gross_roof_area'] }}</td>
		</tr>
	</table>
</body>
</html>
