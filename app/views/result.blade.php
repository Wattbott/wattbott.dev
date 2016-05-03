<?php 	
var_dump($run);
var_dump($run->run);
	
?>

@extends('layouts.master')
@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/results.css">
@stop
@section('content')

<div class="mainresultscontainer">
	<span id="resultstext">Alright the results are in!</span>
	<div id="dagraph">
	{{{ $run->run['user_output']['eui']['design_site_intensity'] }}}
	{{{ $run->run['user_output']['eui']['design_energy_cost'] }}}
	{{{ $run->run['user_output']['eui']['median_site_intensity'] }}}
	{{{ $run->run['user_output']['eui']['median_energy_cost'] }}}
	</div>
	{{{ $run->run['user_output']['pv']['roi'] }}}
	{{{ $run->run['user_output']['pv']['percent_savings'] }}}
</div>
@stop
@section('scripts')
<script type="text/javascript" src="/js/results.js"></script>
