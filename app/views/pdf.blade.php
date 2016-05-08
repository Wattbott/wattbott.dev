<?php
$data = $run->run;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/pdf.css">
</head>
<body>
	<div id="content">
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
	<h1><strong>Wattbott Results</strong>
		<br>
		<small><em>{{ strtolower($data['user_input']['run_name']) }}</em></small>
	</h1>
	<h3>
		<em>{{ $data['user_input']['gross_roof_area'] }} sq ft {{strtolower($data['user_input']['bldg_type']) }}<em>
	</h3>
	<div class="datagrid">
		<table>
			<tbody>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr class="alt">
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr class="alt">
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
				<tr>
					<td>data</td>
					<td>data</td>
					<td>data</td>
					<td>data</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>
