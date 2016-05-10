@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/about.css">
<link rel="stylesheet" href="/css/octicons.css">
@stop

@section('content')
<h1 id="title">ABOUT</h1>
<div id="circlemodal">
	<div id="anna">
		<img src="/img/annaheadshot.jpg">
	</div>
	<div id="margot">
		<img src="/img/margotheadshot.jpg">
	</div>
	<div id="somerandomdude">
		<img src="/img/hampton1-16_0175.jpg">
	</div>
</div>
<div id="infobox">
	<div id="annainfo" class="infopart fontcolor2">
		<div class="textbox">
			<h1 class="fontlarge">Anna Morton</h1>
			<p class="fontmid">Anna Morton is a talented individual and graduate from Codeup. She is responsible for crafting the idea of the website proper and creating the backend.</p>
		</div>
		<div class="links">
			<a href="https://github.com/annajmorton"><span class="mega-octicon octicon-mark-github"></span></a>
			<a href="https://www.linkedin.com/in/anna-morton-aa685b4a"><img class="linkedin" src="/img/linkedin-logo.png"></a>
		</div>
	</div>
	<div id="margotinfo" class="infopart fontcolor2">
		<h1 class="fontlarge">Margot McMannon</h1>
		<p class="fontmid">This is Margot McMannon!</p>
		<div class="links">
			<a href="https://github.com/margoober"><span class="mega-octicon octicon-mark-github"></span></a>
			<a href="https://twitter.com/margoober"><img class="linkedin" src="/img/twit.png"></a>
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
@stop

@section('scripts')
<script type="text/javascript" src="/js/about.js"></script>
@stop