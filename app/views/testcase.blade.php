@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="/css/testcase.css">
@stop

@section('content')
<<<<<<< HEAD

=======
<div>
{{ Form::open(['action' => 'RunsController@store', 'method' => 'POST']) }}
{{ Form::hidden('annualpower', 'kBTU', $attributes = ['id' => 'annualpower'])}}
{{ Form::hidden('annualpowercost', 'kBTU', $attributes = ['id' => 'annualpowercost'])}}
{{ Form::hidden('annualgas', 'kBTU', $attributes = ['id' => 'annualgas'])}}
{{ Form::hidden('annualgascost', 'kBTU', $attributes = ['id' => 'annualgascost'])}}
{{ Form::hidden('januarypower', 'kBTU', $attributes = ['id' => 'januarypower'])}}
{{ Form::hidden('januarypowercost', 'kBTU', $attributes = ['id' => 'januarypowercost'])}}
{{ Form::hidden('januarygas', 'kBTU', $attributes = ['id' => 'januarygas'])}}
{{ Form::hidden('januarygascost', 'kBTU', $attributes = ['id' => 'januarygascost'])}}
{{ Form::hidden('feburarypower', 'kBTU', $attributes = ['id' => 'feburarypower'])}}
{{ Form::hidden('feburarypowercost', 'kBTU', $attributes = ['id' => 'feburarypowercost'])}}
{{ Form::hidden('feburarygas', 'kBTU', $attributes = ['id' => 'feburarygas'])}}
{{ Form::hidden('feburarygascost', 'kBTU', $attributes = ['id' => 'feburarygascost'])}}
{{ Form::hidden('marchpower', 'kBTU', $attributes = ['id' => 'marchpower'])}}
{{ Form::hidden('marchpowercost', 'kBTU', $attributes = ['id' => 'marchpowercost'])}}
{{ Form::hidden('marchgas', 'kBTU', $attributes = ['id' => 'marchgas'])}}
{{ Form::hidden('marchgascost', 'kBTU', $attributes = ['id' => 'marchgascost'])}}
{{ Form::hidden('aprilpower', 'kBTU', $attributes = ['id' => 'aprilpower'])}}
{{ Form::hidden('aprilpowercost', 'kBTU', $attributes = ['id' => 'aprilpowercost'])}}
{{ Form::hidden('aprilgas', 'kBTU', $attributes = ['id' => 'aprilgas'])}}
{{ Form::hidden('aprilgascost', 'kBTU', $attributes = ['id' => 'aprilgascost'])}}
{{ Form::hidden('maypower', 'kBTU', $attributes = ['id' => 'maypower'])}}
{{ Form::hidden('maypowercost', 'kBTU', $attributes = ['id' => 'maypowercost'])}}
{{ Form::hidden('maygas', 'kBTU', $attributes = ['id' => 'maygas'])}}
{{ Form::hidden('maygascost', 'kBTU', $attributes = ['id' => 'maygascost'])}}
{{ Form::hidden('junepower', 'kBTU', $attributes = ['id' => 'junepower'])}}
{{ Form::hidden('junepowercost', 'kBTU', $attributes = ['id' => 'junepowercost'])}}
{{ Form::hidden('junegas', 'kBTU', $attributes = ['id' => 'junegas'])}}
{{ Form::hidden('junegascost', 'kBTU', $attributes = ['id' => 'junegascost'])}}
{{ Form::hidden('julypower', 'kBTU', $attributes = ['id' => 'julypower'])}}
{{ Form::hidden('julypowercost', 'kBTU', $attributes = ['id' => 'julypowercost'])}}
{{ Form::hidden('julygas', 'kBTU', $attributes = ['id' => 'julygas'])}}
{{ Form::hidden('julygascost', 'kBTU', $attributes = ['id' => 'julygascost'])}}
{{ Form::hidden('augustpower', 'kBTU', $attributes = ['id' => 'augustpower'])}}
{{ Form::hidden('augustpowercost', 'kBTU', $attributes = ['id' => 'augustpowercost'])}}
{{ Form::hidden('augustgas', 'kBTU', $attributes = ['id' => 'augustgas'])}}
{{ Form::hidden('augustgascost', 'kBTU', $attributes = ['id' => 'augustgascost'])}}
{{ Form::hidden('septemberpower', 'kBTU', $attributes = ['id' => 'septemberpower'])}}
{{ Form::hidden('septemberpowercost', 'kBTU', $attributes = ['id' => 'septemberpowercost'])}}
{{ Form::hidden('septembergas', 'kBTU', $attributes = ['id' => 'septembergas'])}}
{{ Form::hidden('septembergascost', 'kBTU', $attributes = ['id' => 'septembergascost'])}}
{{ Form::hidden('octoberpower', 'kBTU', $attributes = ['id' => 'octoberpower'])}}
{{ Form::hidden('octoberpowercost', 'kBTU', $attributes = ['id' => 'octoberpowercost'])}}
{{ Form::hidden('octobergas', 'kBTU', $attributes = ['id' => 'octobergas'])}}
{{ Form::hidden('octobergascost', 'kBTU', $attributes = ['id' => 'octobergascost'])}}
{{ Form::hidden('novemberpower', 'kBTU', $attributes = ['id' => 'novemberpower'])}}
{{ Form::hidden('novemberpowercost', 'kBTU', $attributes = ['id' => 'novemberpowercost'])}}
{{ Form::hidden('novembergas', 'kBTU', $attributes = ['id' => 'novembergas'])}}
{{ Form::hidden('novembergascost', 'kBTU', $attributes = ['id' => 'novembergascost'])}}
{{ Form::hidden('decemberpower', 'kBTU', $attributes = ['id' => 'decemberpower'])}}
{{ Form::hidden('decemberpowercost', 'kBTU', $attributes = ['id' => 'decemberpowercost'])}}
{{ Form::hidden('decembergas', 'kBTU', $attributes = ['id' => 'decembergas'])}}
{{ Form::hidden('decembergascost', 'kBTU', $attributes = ['id' => 'decembergascost'])}}
</div>
>>>>>>> eda21f1ff9bd7f187ac63ba38a94e4a158d70f98

<div class="sideformbody font3">
	<div id="accrating" class=" fontcolor1 fontlarge">Accuracy Rating:<div><span id="accnumber">100</span>%</div></div>
	<div class="seperator"></div>
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
	
	<div id="dachart" class="fontcolor1 fontright">
	</div>
</div>
{{ Form::open(array(
		'action' => 'RunsController@result',
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
{{ Form::hidden('feburarypower', 0, $attributes = ['id' => 'feburarypower'])}}
{{ Form::hidden('feburarypowercost', 0, $attributes = ['id' => 'feburarypowercost'])}}
{{ Form::hidden('feburarygas', 0, $attributes = ['id' => 'feburarygas'])}}
{{ Form::hidden('feburarygascost', 0, $attributes = ['id' => 'feburarygascost'])}}
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
	<div class="mainformbody">
	{{ Form::submit() }}
	{{ Form::close() }}
	</div>

@stop

@section('scripts')
<script type="text/javascript" src="/js/form.js"></script>
@stop