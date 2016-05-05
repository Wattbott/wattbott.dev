<?php 	
	var_dump($run->run['user_input']['energy_data']);
	var_dump($run->run);
?>

@extends('layouts.master')
@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/results.css">
@stop
@section('content')

<div class="mainresultscontainer">
	<div id="resultstext">Alright the results are in for {{{ $run->run['user_input']['run_name']}}}!</div>
	<div id="graph0" class="dagraph">
		<span class="graphlabel">EUI</span>
		<div id="bar1" class="graphbar">
			<span class="bartext">{{{ $run->run['user_output']['eui']['design_site_intensity'] }}}</span>
		</div>
		<div id="bar3" class="graphbar theirbar">
			<span class="bartext">{{{ $run->run['user_output']['eui']['median_site_intensity'] }}}</span>
		</div>
	</div>
	<div id="graph1" class="dagraph">
		<span class="graphlabel">Energy Cost</span>
		<div id="bar2" class="graphbar">
			<span class="bartext">{{{ $run->run['user_output']['eui']['design_energy_cost'] }}}</span>
		</div>
		<div id="bar4" class="graphbar theirbar">
			<span class="bartext">{{{ $run->run['user_output']['eui']['median_energy_cost'] }}}</span>
		</div>
	</div>
	<div id="graph2" class="dagraph">
		<span class="graphlabel">Savings from photovoltaic</span>
		<div id="bar5" class="graphbar">
			<span class="bartext">{{{ $run->run['user_output']['pv']['roi'] }}}</span>
		</div>
		<div id="bar6" class="graphbar">
			<span class="bartext">{{{ $run->run['user_output']['pv']['percent_savings'] }}}
			</span>
		</div>
	</div>
</div>
@stop
@section('scripts')
<script type="text/javascript" src="/js/results.js"></script>
@stop
