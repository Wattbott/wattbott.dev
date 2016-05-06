@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/hello.css">
@stop

@section('content')
<h1 id="title" class="font3">WATTBOTT</h1>
<div class="falsemargin"></div>
<div id="magicplace">
	<div id="ground" class="circle"></div>
	<div id="tree1" class="tree">
		<div class="happyface">
			<div class="eye eyeone"></div>
			<div class="eye eyetwo"></div>
			<div class="smiley"><div class="smileyoverlay"></div></div>
		</div>
		<div class="treefoliage1">
			<div class="treefoliage1part1"><div class="treefoliage1part2"></div><div class="treefoliage1part3"></div></div>
		</div>
		<div class="treetrunk"></div>
	</div>
	<div id="tree2" class="tree">
		<div class="happyface">
			<div class="eye eyeone"></div>
			<div class="eye eyetwo"></div>
			<div class="smiley"><div class="smileyoverlay"></div></div>
		</div>
		<div class="treefoliage2">
			<div class="treefoliage2part1 circle"></div><div class="treefoliage2part2 circle"></div><div class="treefoliage2part3 circle"></div><div class="treefoliage2part4 circle"></div><div class="treefoliage2part5 circle"></div>
		</div>
		<div class="treetrunk"></div>
	</div>
	<div class="sun">
		<div class="happyface">
				<div class="eye eyeone"></div>
				<div class="eye eyetwo"></div>
				<div class="smiley"><div class="smileyoverlay"></div></div>
			</div>
		<div class="suncorona"><div class="coronapart lazycorona1"></div><div class="coronapart lazycorona2"></div></div>
		<div class="sunbody">
			
		</div>
	</div>
	<div id="school" class="building">
		<div id="schoolbody" class="building">
			<div id="schwindow1" class="window">
				<div class="windowhorpane"></div>
				<div class="windowvertpane"></div>
				<div class="windowglare">
					<div class="innerglare"></div>
				</div>
			</div>
			<div id="schwindow2" class="window">
				<div class="windowhorpane"></div>
				<div class="windowvertpane"></div>
				<div class="windowglare">
					<div class="innerglare"></div>
				</div>
			</div>
			<div id="schdoor" class="door building">
				<div class="knob circle"></div>
			</div>
		</div>
		<div id="schoolroof" class="building"><div id="schooltop"></div></div>
	</div>
</div>
<main>
	<div class="cooltextcontainer font3 fontcolor2">
		<p class="fontcenter fontlarge">The One Place to Find Your Engery Usage</p>
		<p class="fontmid"> Hiya! We here at Wattbott are dedicated to making sure that your best laid plans are up to snuff when it comes to possible energy usage. We offer a convinient and easy form that:</p>
		<ul class="fontmidsmall">
			<li>
				<p>Measures your annual energy usage and costs.</p>
				<div class="fakebargraph">
					<div class="barone"></div>
					<div class="bartwo"></div>
				</div>
			</li>
			<li>Compares those costs to other similar buildings.</li>
			<li>And finds a way to save you money through environmentally friendly solutions!</li>
		</ul>
	</div>
</main>
<a href="{{{action('HomeController@testForm')}}}"><div class="buttonlink font3"><p>Start Your Journey Here</p></div></a>
@stop

@section('scripts')
<script type="text/javascript" src="/js/hello.js"></script>
@stop