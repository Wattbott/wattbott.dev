@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/about.css">
<link rel="stylesheet" href="/css/octicons.css">
@stop

@section('content')
<h1 id="title">ABOUT</h1>
<div id="circlemodal" class="fontcolor2">
	<div class="persons" id="anna">
		<img src="/img/annaheadshot.jpg">
		<p class="fontlarge">Anna Morton</p>
	</div>
	<div class="persons" id="margot">
		<img src="/img/margotheadshot.jpg">
		<p class="fontlarge">Margot McMahon</p>
	</div>
	<div class="persons" id="somerandomdude">
		<img src="/img/hampton1-16_0175.jpg">
		<p class="fontlarge">Joseph Acevedo</p>
	</div>
	<div id="selectcontainer">
		<div class="selectcircle">
			<div class="checkback">
			</div>
		</div>
		<div class="selectcircle">
			<div class="checkback">
			</div>
		</div>
		<div class="selectcircle">
			<div class="checkback">
			</div>
		</div>
	</div>
</div>
<div id="infobox">
	<div id="annainfo" class="infopart fontcolor2">
		<div class="textbox">
			<h1 class="fontlarge">Anna Morton</h1>
			<p class="fontmid">Anna Morton is an engineer turned developer with several years of experience in the building industry. She is passionate about making the built enviroment more sustainable.</p>
		</div>
		<div class="links">
			<a href="https://github.com/annajmorton"><span class="mega-octicon octicon-mark-github"></span></a>
			<a href="https://www.linkedin.com/in/anna-morton-aa685b4a"><img class="linkedin" src="/img/linkedin-logo.png"></a>
		</div>
	</div>
	<div id="margotinfo" class="infopart fontcolor2">
		<h1 class="fontlarge">Margot McMahon</h1>
		<p class="fontmid">Margot is nuts about design theory, nonprofit development, and sociolinguistics. She is a UI/UX cat, but doesn't mind back-end challenges. She has strong aesthetic instincts and creates minimalist doodles.<br><br>Margot is looking for a job on the East Coast.</p>
		<div class="links">
			<a href="https://github.com/margoober"><span class="mega-octicon octicon-mark-github"></span></a>
			<a href="http://margot.dog"><img class = "linkedin" src="/img/margotlink.png"></a>
		</div>
	</div>
	<div id="myinfo" class="infopart fontcolor2">
		<h1 class="fontlarge">Joseph Acevedo</h1>
		<p class="fontmid">This is Joseph Acevedo!</p>
		<div class="links">
			<a href="https://github.com/Yeasayer"><span class="mega-octicon octicon-mark-github"></span></a>
		</div>
	</div>

</div>
<div class="fakemargin"></div>
<a href="{{{ action('HomeController@intro') }}}"><div class="buttonlink">Go Home</div></a>
<div class="fakesmallmargin"></div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/about.js"></script>
@stop