@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="/css/testcase.css">
@stop

@section('content')
<div id="mainformbody">
	{{ Form::open(array(
		'action' => 'PostsController@index',
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
		{{ Form::select('buildtype', array('Skool' => 'K-12 School', 'Office' => 'Office'), 'Skool', $attributes = ['class' => 'coolformtext font3 fontmidlarge'])}}
		</div>
		<div class="formsegment font3 fontmidlarge" id="ewwgrossseg">
			{{ Form::label('grossfloorarea', 'Gross Floor Area (Total)', $attributes = [ 'class' => 'labeltext']) }}
			{{ Form::text('grossfloorarea', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', 'id' => 'grossfloorarea'])}}
		</div>
		<div class="formsegment foscheck font3 fontmidlarge" id="ewwgrossseg">
				<label for="roofsame"></label>
				{{ Form::checkbox('roofsame', 'true', $attributes = ['class' => 'coolformcbox font3 fontmidlarge', 'id' => 'roofsame'])}}
		</div>
	{{ Form::close() }}
	</div>

</div>
@stop