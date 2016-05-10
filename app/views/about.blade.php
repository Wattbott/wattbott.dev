@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/about.css">
@stop

@section('content')
<canvas id="myCanvas" width="500" height="500">
</canvas>
<div id="circlemodal">
		<img id="anna" src="/img/hampton1-16_0083.jpg">
		<img id="margot" src="/img/codeup_josh-0098.jpg">
		<img id="somerandomdude" src="/img/hampton1-16_0175.jpg">
</div>
<div id="infobox">
	<div id="annainfo" class="infopart fontcolor2">
		<h1 class="fontlarge">Anna Morton</h1>
		<p class="fontmid">This is Anna Morton!</p>
	</div>
	<div id="margotinfo" class="infopart fontcolor2">
		<h1 class="fontlarge">Margot McMannon</h1>
		<p class="fontmid">This is Margot McMannon!</p>
	</div>
	<div id="myinfo" class="infopart fontcolor2">
		<h1 class="fontlarge">Joseph Acevedo</h1>
		<p class="fontmid">This is Joseph Acevedo!</p>
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/about.js"></script>
@stop