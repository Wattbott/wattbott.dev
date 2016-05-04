@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/testcase.css">
@stop

@section('content')

<div class="sideformbody font3">
	<div id="accrating" class=" fontcolor1 fontlarge">Accuracy Rating:<div><span id="accnumber">100</span>%</div></div>
	<div id="gassystuff" class="font3 fontcolor1 fontmidsmall">
		<span>Do you have gas in your building?</span>
		<div class="fakecheck" id="check2">
			<div class="checkback">
			</div>
		</div>
	</div>
	<ul id="fakeselectC">
		<div id="fsnumtres" class="fakeselectitem"></div>
		<li>kBTU's</li>
		<li>Therms</li>
		<span id="buildlisttri" class="triangledown"></span>
	</ul>
	
	<div id="dachart" class="fontcolor2 fontright">
	</div>
</div>
{{ Form::open(array(
		'action' => 'RunsController@store',
		'method' => 'POST',
		"id" => "thisform"))}}
<div id="formbody1" class="mainformbody">
<!--Don't Look-->
<div>
{{ Form::hidden('annualpower', 0, $attributes = ['id' => 'annualpower'])}}
{{ Form::hidden('annualpowercost', 0, $attributes = ['id' => 'annualpowercost'])}}
{{ Form::hidden('annualgas', 0, $attributes = ['id' => 'annualgas'])}}
{{ Form::hidden('annualgascost', 0, $attributes = ['id' => 'annualgascost'])}}
{{ Form::hidden('januarypower', 0, $attributes = ['id' => 'januarypower'])}}
{{ Form::hidden('januarypowercost', 0, $attributes = ['id' => 'januarypowercost'])}}
{{ Form::hidden('januarygas', 0, $attributes = ['id' => 'januarygas'])}}
{{ Form::hidden('januarygascost', 0, $attributes = ['id' => 'januarygascost'])}}
{{ Form::hidden('februarypower', 0, $attributes = ['id' => 'februarypower'])}}
{{ Form::hidden('februarypowercost', 0, $attributes = ['id' => 'februarypowercost'])}}
{{ Form::hidden('februarygas', 0, $attributes = ['id' => 'februarygas'])}}
{{ Form::hidden('februarygascost', 0, $attributes = ['id' => 'februarygascost'])}}
{{ Form::hidden('marchpower', 0, $attributes = ['id' => 'marchpower'])}}
{{ Form::hidden('marchpowercost', 0, $attributes = ['id' => 'marchpowercost'])}}
{{ Form::hidden('marchgas', 0, $attributes = ['id' => 'marchgas'])}}
{{ Form::hidden('marchgascost', 0, $attributes = ['id' => 'marchgascost'])}}
{{ Form::hidden('aprilpower', 0, $attributes = ['id' => 'aprilpower'])}}
{{ Form::hidden('aprilpowercost', 0, $attributes = ['id' => 'aprilpowercost'])}}
{{ Form::hidden('aprilgas', 0, $attributes = ['id' => 'aprilgas'])}}
{{ Form::hidden('aprilgascost', 0, $attributes = ['id' => 'aprilgascost'])}}
{{ Form::hidden('maypower', 0, $attributes = ['id' => 'maypower'])}}
{{ Form::hidden('maypowercost', 0, $attributes = ['id' => 'maypowercost'])}}
{{ Form::hidden('maygas', 0, $attributes = ['id' => 'maygas'])}}
{{ Form::hidden('maygascost', 0, $attributes = ['id' => 'maygascost'])}}
{{ Form::hidden('junepower', 0, $attributes = ['id' => 'junepower'])}}
{{ Form::hidden('junepowercost', 0, $attributes = ['id' => 'junepowercost'])}}
{{ Form::hidden('junegas', 0, $attributes = ['id' => 'junegas'])}}
{{ Form::hidden('junegascost', 0, $attributes = ['id' => 'junegascost'])}}
{{ Form::hidden('julypower', 0, $attributes = ['id' => 'julypower'])}}
{{ Form::hidden('julypowercost', 0, $attributes = ['id' => 'julypowercost'])}}
{{ Form::hidden('julygas', 0, $attributes = ['id' => 'julygas'])}}
{{ Form::hidden('julygascost', 0, $attributes = ['id' => 'julygascost'])}}
{{ Form::hidden('augustpower', 0, $attributes = ['id' => 'augustpower'])}}
{{ Form::hidden('augustpowercost', 0, $attributes = ['id' => 'augustpowercost'])}}
{{ Form::hidden('augustgas', 0, $attributes = ['id' => 'augustgas'])}}
{{ Form::hidden('augustgascost', 0, $attributes = ['id' => 'augustgascost'])}}
{{ Form::hidden('septemberpower', 0, $attributes = ['id' => 'septemberpower'])}}
{{ Form::hidden('septemberpowercost', 0, $attributes = ['id' => 'septemberpowercost'])}}
{{ Form::hidden('septembergas', 0, $attributes = ['id' => 'septembergas'])}}
{{ Form::hidden('septembergascost', 0, $attributes = ['id' => 'septembergascost'])}}
{{ Form::hidden('octoberpower', 0, $attributes = ['id' => 'octoberpower'])}}
{{ Form::hidden('octoberpowercost', 0, $attributes = ['id' => 'octoberpowercost'])}}
{{ Form::hidden('octobergas', 0, $attributes = ['id' => 'octobergas'])}}
{{ Form::hidden('octobergascost', 0, $attributes = ['id' => 'octobergascost'])}}
{{ Form::hidden('novemberpower', 0, $attributes = ['id' => 'novemberpower'])}}
{{ Form::hidden('novemberpowercost', 0, $attributes = ['id' => 'novemberpowercost'])}}
{{ Form::hidden('novembergas', 0, $attributes = ['id' => 'novembergas'])}}
{{ Form::hidden('novembergascost', 0, $attributes = ['id' => 'novembergascost'])}}
{{ Form::hidden('decemberpower', 0, $attributes = ['id' => 'decemberpower'])}}
{{ Form::hidden('decemberpowercost', 0, $attributes = ['id' => 'decemberpowercost'])}}
{{ Form::hidden('decembergas', 0, $attributes = ['id' => 'decembergas'])}}
{{ Form::hidden('decembergascost', 0, $attributes = ['id' => 'decembergascost'])}}
{{ Form::hidden('gastype', 0, $attributes = ['id' => 'hiddenstuff3'])}}
</div>
		<div class="formsegment font3 fontmidlarge" id="emailseg">
		{{ Form::label('email', 'E-Mail Address', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('email', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', "id" => 'email'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('zipcode', '<span class="alert">:message<br></span>') }}
		</div>
		<div class="formsegment font3 fontmidlarge" id="zipseg">
		{{ Form::label('zipcode', 'Zipcode', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('zipcode', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', "id" => 'zipcode'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('zipcode', '<span class="alert">:message<br></span>') }}
		</div>
		<div class="formsegment font3 fontmidlarge" id="calcnameseg">
		{{ Form::label('calcname', 'Project Name', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('calcname', null, $attributes = ['class' => 'coolformtext font3 fontmidlarge', 'id' => 'calcname'])}}
		</div>
		<div class="formsegment font3 fontmidlarge" id="buildnameseg">
		{{Form::label('buildtype', 'Building Type', $attributes = [ 'class' => 'labeltext'])}}
		<ul id="fakeselect">
			<div id="fsnumone" class="fakeselectitem"></div>
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
				<div class="fakecheck" id="check0">
					<div class="checkback">
					</div>
				</div>
		</div>
		<div class="formsegment foscheck font3 fontmidlarge" id="grosscheckseg">
				<span class="fontcolor1 fontmid easymargin">Do You Have Your Utility Bills?</span>
				<div class="fakecheck" id="check1">
					<div class="checkback">
					</div>
				</div>
		</div>
	</div>
	{{ Form::submit('submit',$attributes = ['class' => 'submitbutton']) }}
	{{ Form::close() }}
@stop

@section('scripts')
<script type="text/javascript" src="/js/form.js"></script>
@stop