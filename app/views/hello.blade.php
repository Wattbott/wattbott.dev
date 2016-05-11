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
	<div class="cloud">
		<div class="cloudoff1 circle"></div>
		<div class="cloudoff2 circle"></div>
		<div class="cloudoff3 circle"></div>
		<div class="mutedface building">
			<div class="closedeye ceyeone"></div>
			<div class="closedeye ceyetwo"></div>
			<div class="mutedmouth building"></div>
		</div>
	</div>
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
<main id="lazy">
	<div class="cooltextcontainer font3 fontcolor2">
		<p class="fontcenter fontlarge">Make Your Building Greener</p>
		<p class="fontmid">Wattbott is a simple calculator designed to help you<br>save money with green technologies!</p>
		<ul class="fontmidsmall">
			<li>
				<p>Wattbott measures your building's energy usage, then compares it to national averages.</p>
				<div class="fakebargraph">
					<div class="bars barone">Your Usage</div>
					<div class="bars bartwo">Median Usage</div>
				</div>
			</li>
			<li><p>Wattbott does the same for cost...</p>
	<div class="fakecontainer">
	<div id="schoollione" class="buildingli">
		<div id="" class="building schoolbody">
			<div id="" class="window schwindow1">
				<div class="windowhorpane"></div>
				<div class="windowvertpane"></div>
				<div class="windowglare">
					<div class="innerglare"></div>
				</div>
			</div>
			<div id="" class="window schwindow2">
				<div class="windowhorpane"></div>
				<div class="windowvertpane"></div>
				<div class="windowglare">
					<div class="innerglare"></div>
				</div>
			</div>
			<div id="" class="door building schdoor">
				<div class="knob circle"></div>
			</div>
		</div>
		<div id="" class="building schoolroof"><div class="schooltop"></div></div>
	</div>
	<div id="schoollitwo" class="buildingli">
		<div id="" class="building schoolbody">
			<div id="" class="window schwindow1">
				<div class="windowhorpane"></div>
				<div class="windowvertpane"></div>
				<div class="windowglare">
					<div class="innerglare"></div>
				</div>
			</div>
			<div id="" class="window schwindow2">
				<div class="windowhorpane"></div>
				<div class="windowvertpane"></div>
				<div class="windowglare">
					<div class="innerglare"></div>
				</div>
			</div>
			<div id="" class="door building schdoor">
				<div class="knob circle"></div>
			</div>
		</div>
		<div id="" class="building schoolroof"><div class="schooltop"></div></div>
	</div>
</div>
<div class="fakecontainer">
	<div id="texttwo" class="textbuildli fontmidlarge">
			<p>Your Expenses</p>
			<p>$<span class="coolup">0</span></p>
	</div>
	<div id="textone" class="textbuildli fontmidlarge">
			<p>Median Expenses</p>
			<p>$<span class="coolup">0</span></p>
	</div>
</div>
<a href="{{{action('RunsController@create')}}}"><div class="buttonlink font3"><p>Get Started</p></div></a>
</main>
<div class="falsemargin"></div>

@stop

@section('scripts')
<script type="text/javascript" src="/js/hello.js"></script>
@stop