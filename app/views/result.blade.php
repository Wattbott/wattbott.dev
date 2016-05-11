
<?php 	
	
?>

@extends('layouts.master')
@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/results.css">
@stop
@section('content')

<div class="mainresultscontainer">
	<div id="resultstext">Results for {{{ $run->run['user_input']['run_name'] }}}</div>
	<div id="superselect"></div>
	<div id="graph0" class="dagraph">
		<span  class="graphlabel">EUI</span>
		<div id="bar1" class="graphbar yourbar">
			your building: <span class="bartext">{{{ round($run->run['user_output']['eui']['design_site_intensity'],0) }}}</span> kBtu/ft<sup>2</sup>
		</div>
		<div id="bar3" class="graphbar theirbar">
			median: <span class="bartext">{{{ round($run->run['user_output']['eui']['median_site_intensity'],0) }}}</span> kBtu/ft<sup>2</sup>
		</div>
	</div>
	<div id="graph1" class="dagraph">
		<span class="graphlabel">Energy Cost</span>
		<div id="bar2" class="graphbar yourbar">
			your building: $<span class="bartext">{{{ round($run->run['user_output']['eui']['design_energy_cost'],0) }}}</span>
		</div>
		<div id="bar4" class="graphbar theirbar">
			median: $<span class="bartext">{{{ round($run->run['user_output']['eui']['median_energy_cost'],0) }}}</span>
		</div>
	</div>
	<div id="graph2" class="dagraph">
		<span class="graphlabel">Savings from Photovoltaic</span>
		<div id="bar5" class="graphbar">
			ROI: <span class="bartext">{{{ round($run->run['user_output']['pv']['roi'], 0) }}}</span> years
		</div>
		<div id="bar6" class="graphbar">
			<span class="bartext">{{{ round(($run->run['user_output']['pv']['percent_savings'])*100, 0) }}} annual savings
			</span>
		</div>
	</div>
	<div id="kewlkontainer">
		<div class="infocontainer">
			<p class="infoheader fontmidlarge">Energy Use Intensity (EUI)</p>
			<p class="kewlkontents fontmid">EUI is expressed as energy per square foot per year. It’s calculated by dividing the total energy consumed by the building in one year (measured in kBtu) by the total gross floor area of the building. Generally, a low EUI signifies good energy performance.
			</p>
		</div>
		<div class="infocontainer">
			<p class="infoheader fontmidlarge">Energy Cost</p>
			<p class="kewlkontents fontmid">Here, we compare your annual energy expenses with the median for buildings of your type and size. How do you compare?</p>
		</div>
		<div class="infocontainer">
			<p class="infoheader fontmidlarge">Photovoltaic</p>
			<p class="kewlkontents fontmid">A photovoltaic system on your building could save you ${{ round($run->run['user_output']['pv']['percent_savings'] * $run->run['user_output']['eui']['design_energy_cost'],0) }} per year, and pay for itself in {{{ round($run->run['user_output']['pv']['roi'], 0) }}} years.</p>
		</div>
	</div>
	<div class="littlecontainer">
		<a href="{{ action('RunsController@show',$run->id)}}"><div class="buttonlink"><p>Edit This Building</p></div></a>
		<a href="{{ action('RunsController@create')}}"><div class="buttonlink"><p>New Building</p></div></a>
	</div>
</div>
@stop
@section('scripts')
<script type="text/javascript" src="/js/results.js"></script>
@stop
