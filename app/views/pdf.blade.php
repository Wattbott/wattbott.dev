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
	<div id="title">
		<h1><strong>Wattbott Results</strong>
			<br>
			<small><em>{{ strtolower($data['user_input']['run_name']) }}</em></small>
		</h1>
		<h3>
			<em>{{ $data['user_input']['gross_roof_area'] }} sq ft {{strtolower($data['user_input']['bldg_type']) }}<em>
		</h3>
	</div>
	<div class="datagrid">
		<table>
			<tbody>
				<tr class="alt">
					<td>Your EUI</td>
					<td>{{ $data['user_output']['eui']['design_site_intensity'] }} UNITS</td>
				</tr>
				<tr>
					<td>Median EUI</td>
					<td>{{ $data['api_output']['eui']['design_site_intensity'] }} UNITS</td>
				</tr>
				<tr class="alt">
					<td>Your annual cost</td>
					<td>${{ $data['user_output']['eui']['design_energy_cost'] }}</td>
				</tr>
				<tr>
					<td>Median annual cost for a building like yours</td>
					<td>${{ $data['user_output']['eui']['median_energy_cost'] }}</td>
				</tr>
				<tr class="green">
					<td><strong>PV annual savings</strong></td>
					<td><strong>{{ round($data['user_output']['pv']['percent_savings']) }}%</strong></td>
				</tr>
				<tr class="green">
					<td><strong>ROI on a PV system</strong></td>
					<td><strong>{{ round($data['user_output']['pv']['roi'], 1) }} years</strong></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div id="footnotes">
		<p><strong>EUI: </strong>Energy usage per square foot per year. Calculated by dividing total energy consumed annually by total floor area. A low EUI signifies good energy performance.</p>
		<p><strong>PV annual savings: </strong>Your system will save you ${{ round($data['user_output']['eui']['design_energy_cost'] * $data['user_output']['pv']['percent_savings']) }} each year.</p>
		<p><strong>ROI (Return on Investment): </strong>Your system will pay for itself in {{ round($data['user_output']['pv']['roi']) }} years!</p>
	</div>
</body>
</html>
