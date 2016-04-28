@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="/css/testcase.css">
@stop

@section('content')
<div id="formbody1" class="mainformbody">
	{{ Form::open(array(
		'action' => 'HomeController@testForm',
		'method' => 'GET',
		"id" => "thisform"))}}
		<div class="formsegment font3 fontmidlarge" id="emailseg">
		{{ Form::label('email', 'E-Mail Address', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('email', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', "id" => 'email'])}}
		</div>
		<div class="formsegment font3 fontmidlarge" id="zipseg">
		{{ Form::label('zipcode', 'Zipcode', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('zipcode', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', "id" => 'zipcode'])}}
		</div>
		<div class="formsegment font3 fontmidlarge" id="calcnameseg">
		{{ Form::label('calcname', 'Project Name', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('calcname', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', 'id' => 'calcname'])}}
		</div>
		<div class="formsegment font3 fontmidlarge" id="buildnameseg">
		{{Form::label('buildtype', 'Building Type', $attributes = [ 'class' => 'labeltext'])}}
		<ul id="fakeselect">
			<li id="buildsel1">K-12 School</li>
			<li id="buildsel2">Supermarket</li>
			<li id="buildsel3">Hospital</li>
			<li id="buildsel4">Bank</li>
			<li id="buildsel5">Medical Office</li>
			<span id="buildlisttri" class="triangledown"></span>
		</ul>
		{{ Form::hidden('buildtype', 'Skool', $attributes = ['id' => 'hiddenstuff'])}}
		</div>
		<div class="formsegment font3 fontmidlarge" id="ewwgrossseg">
			{{ Form::label('grossfloorarea', 'Gross Floor Area (Total)', $attributes = [ 'class' => 'labeltext']) }}
			{{ Form::text('grossfloorarea', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', 'id' => 'grossfloorarea'])}}
		</div>
		<div class="formsegment foscheck font3 fontmidlarge" id="grosscheckseg">
				<span class="fontcolor1 fontmid easymargin">Is roof size not the same as floor size?</span>
				<div class="fakecheck">
					<div class="checkback">
					</div>
				</div>
		</div>
		<div class="formsegment foscheck font3 fontmidlarge" id="grosscheckseg">
				<span class="fontcolor1 fontmid easymargin">Do You Have Your Utility Bills?</span>
				<div class="fakecheck">
					<div class="checkback">
					</div>
				</div>
		</div>
	</div>
	<div class="mainformbody">
	{{ Form::submit() }}
	{{ Form::close() }}
	</div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/form.js"></script>
@stop