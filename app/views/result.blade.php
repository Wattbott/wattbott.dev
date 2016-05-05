
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
	<div id="superselect"></div>
	<div id="graph0" class="dagraph">
		<span  class="graphlabel">EUI</span>
		<div id="bar1" class="graphbar yourbar">
			<span class="bartext">{{{ $run->run['user_output']['eui']['design_site_intensity'] }}}</span>
		</div>
		<div id="bar3" class="graphbar theirbar">
			<span class="bartext">{{{ $run->run['user_output']['eui']['median_site_intensity'] }}}</span>
		</div>
	</div>
	<div id="graph1" class="dagraph">
		<span class="graphlabel">Energy Cost</span>
		<div id="bar2" class="graphbar yourbar">
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
	<div id="kewlkontainer">
		<div class="infocontainer">
			<p class="infoheader fontmidlarge">Energy Use Intensity</p>
			<p class="kewlkontents fontmid">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>
		<div class="infocontainer">
			<p class="infoheader fontmidlarge">Energy Cost</p>
			<p class="kewlkontents fontmid">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="infocontainer">
			<p class="infoheader fontmidlarge">Photovoltaic</p>
			<p class="kewlkontents fontmid">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
	</div>
	<div class="littlecontainer">
		<p>Not satisfied with just one</p>
		<a href="{{{ action('HomeController@testForm')}}}">Do another one!</a>
	</div>
</div>
@stop
@section('scripts')
<script type="text/javascript" src="/js/results.js"></script>
@stop
