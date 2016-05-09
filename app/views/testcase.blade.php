<?php  
	require public_path() . "/bldg_type.php";
?>
@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/testcase.css">
@stop

@section('content')

<div class="sideformbody font3">
	<div id="accrating" class=" fontcolor1 fontlarge">Completeness:
		<div>
			<span id="accnumber">0</span>%
		</div>
	</div>
	<div id="gassystuff" class="font3 fontcolor1 fontmidsmall">
		<span>Do you have gas in your building?</span>
		<div class="fakecheck" id="check2">
			<div class="checkback">
			</div>
		</div>
	</div>
	<ul id="fakeselectC">
		<div id="fsnumtres" class="fakeselectitem">
		</div>
		<li>kBTUs</li>
		<li>Therms</li>
		<li>cff</li>
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
	<div>
		{{ Form::hidden('user_input[energy_data][elec][energy][total]', $user_input['energy_data']['elec']['energy']['total'], $attributes = ['id' => 'annualpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][total]', $user_input['energy_data']['elec']['cost']['total'], $attributes = ['id' => 'annualpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][total]', $user_input['energy_data']['gas']['energy']['total'], $attributes = ['id' => 'annualgas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][total]', $user_input['energy_data']['gas']['cost']['total'], $attributes = ['id' => 'annualgascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][jan]', $user_input['energy_data']['elec']['energy']['jan'], $attributes = ['id' => 'januarypower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][jan]', $user_input['energy_data']['elec']['cost']['jan'], $attributes = ['id' => 'januarypowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][jan]', $user_input['energy_data']['gas']['energy']['jan'], $attributes = ['id' => 'januarygas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][jan]', $user_input['energy_data']['gas']['cost']['jan'], $attributes = ['id' => 'januarygascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][feb]', 0, $attributes = ['id' => 'februarypower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][feb]', 0, $attributes = ['id' => 'februarypowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][feb]', 0, $attributes = ['id' => 'februarygas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][feb]', 0, $attributes = ['id' => 'februarygascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][mar]', 0, $attributes = ['id' => 'marchpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][mar]', 0, $attributes = ['id' => 'marchpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][mar]', 0, $attributes = ['id' => 'marchgas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][mar]', 0, $attributes = ['id' => 'marchgascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][apr]', 0, $attributes = ['id' => 'aprilpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][apr]', 0, $attributes = ['id' => 'aprilpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][apr]', 0, $attributes = ['id' => 'aprilgas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][apr]', 0, $attributes = ['id' => 'aprilgascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][may]', 0, $attributes = ['id' => 'decemberpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][may]', 0, $attributes = ['id' => 'decemberpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][may]', 0, $attributes = ['id' => 'decembergas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][may]', 0, $attributes = ['id' => 'decembergascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][jun]', 0, $attributes = ['id' => 'maypower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][jun]', 0, $attributes = ['id' => 'maypowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][jun]', 0, $attributes = ['id' => 'maygas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][jun]', 0, $attributes = ['id' => 'maygascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][jul]', 0, $attributes = ['id' => 'junepower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][jul]', 0, $attributes = ['id' => 'junepowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][jul]', 0, $attributes = ['id' => 'junegas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][jul]', 0, $attributes = ['id' => 'junegascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][aug]', 0, $attributes = ['id' => 'julypower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][aug]', 0, $attributes = ['id' => 'julypowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][aug]', 0, $attributes = ['id' => 'julygas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][aug]', 0, $attributes = ['id' => 'julygascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][sep]', 0, $attributes = ['id' => 'augustpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][sep]', 0, $attributes = ['id' => 'augustpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][sep]', 0, $attributes = ['id' => 'augustgas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][sep]', 0, $attributes = ['id' => 'augustgascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][oct]', 0, $attributes = ['id' => 'septemberpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][oct]', 0, $attributes = ['id' => 'septemberpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][oct]', 0, $attributes = ['id' => 'septembergas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][oct]', 0, $attributes = ['id' => 'septembergascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][nov]', 0, $attributes = ['id' => 'octoberpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][nov]', 0, $attributes = ['id' => 'octoberpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][nov]', 0, $attributes = ['id' => 'octobergas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][nov]', 0, $attributes = ['id' => 'octobergascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][dec]', 0, $attributes = ['id' => 'novemberpower'])}}
		{{ Form::hidden('user_input[energy_data][elec][cost][dec]', 0, $attributes = ['id' => 'novemberpowercost'])}}
		{{ Form::hidden('user_input[energy_data][gas][energy][dec]', 0, $attributes = ['id' => 'novembergas'])}}
		{{ Form::hidden('user_input[energy_data][gas][cost][dec]', 0, $attributes = ['id' => 'novembergascost'])}}
		{{ Form::hidden('user_input[energy_data][elec][energy][units]','kWh')}}
		{{ Form::hidden('user_input[energy_data][gas][energy][units]', 0, $attributes = ['id' => 'hiddenstuff3'])}}
	</div>
	<div class="formsegment font3 fontmidlarge" id="emailseg">
		{{ Form::label('email', 'E-Mail Address', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('email', $user_input['email'], $attributes = ['class' => 'coolformtext font3 fontmidlarge', "id" => 'email'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('email', '<span class="alert">:message<br></span>') }}
	</div>
	<div class="formsegment font3 fontmidlarge" id="zipseg">
		{{ Form::label('zipcode', 'Zip Code', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('zipcode', 
		$user_input['zipcode'], $attributes = ['class' => 'coolformtext font3 fontmidlarge', "id" => 'zipcode'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('zipcode', '<span class="alert">:message<br></span>') }}
	</div>
	<div class="formsegment font3 fontmidlarge" id="calcnameseg">
		{{ Form::label('calcname', 'Project Name', $attributes = [ 'class' => 'labeltext'])}}
		{{ Form::text('calcname', $user_input['run_name'], $attributes = ['class' => 'coolformtext font3 fontmidlarge', 'id' => 'calcname'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('calcname', '<span class="alert">:message<br></span>') }}
	</div>
	<div class="formsegment font3 fontmidlarge" id="buildnameseg">
		{{Form::label('buildtype', 'Building Type', $attributes = [ 'class' => 'labeltext'])}}
		<ul id="fakeselect">
			<div id="fsnumone" class="fakeselectitem"></div>
				@foreach($propertyuses as $key=>$bldg_type) 
				{{'<li id="buildsel'.$key.'">'.$bldg_type[0].'</li>'}}
				@endforeach
				<span id="buildlisttri" class="triangledown"></span>
		</ul>

		{{ Form::hidden('buildtype', $user_input['bldg_type'], $attributes = ['id' => 'hiddenstuff'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('buildtype', '<span class="alert"><br>:message<br></span>') }}
	</div>
	<div class="formsegment font3 fontmidlarge" id="ewwgrossseg">
		{{ Form::label('grossfloorarea', 'Gross Floor Area', $attributes = [ 'class' => 'labeltext']) }}
		{{ Form::text('grossfloorarea', $user_input['gross_flr_area'], $attributes = ['class' => 'coolformtext font3 fontmidlarge', 'id' => 'grossfloorarea'])}}
		{{-- alert if input failed validation: --}}
		{{ $errors->first('grossfloorarea', '<span class="alert">:message<br></span>') }}
	</div>
	<div class="formsegment foscheck font3 fontmidlarge" id="grosscheckseg">
		<span class="fontcolor1 fontmid easymargin">Is roof area different from floor area?</span>
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
<div class="mainformbody">
	{{ Form::submit('Let\'s Go!',$attributes = ['class' => 'submitbutton']) }}
	{{ Form::close() }}
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/form.js"></script>
@stop