<?php 	
var_dump($run);
var_dump($run->run);
	
?>

@extends('layouts/master')
@section('content')
<h1>Here we are!</h1>
{{{ $run->run['user_output']['eui']['design_site_intensity'] }}}
{{{ $run->run['user_output']['eui']['design_energy_cost'] }}}
{{{ $run->run['user_output']['eui']['median_site_intensity'] }}}
{{{ $run->run['user_output']['eui']['median_energy_cost'] }}}
{{{ $run->run['user_output']['pv']['roi'] }}}
{{{ $run->run['user_output']['pv']['percent_savings'] }}}
@stop