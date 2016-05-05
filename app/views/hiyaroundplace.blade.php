@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/hiya.css">
@stop

@section('content')
<h1 id="title" class="font3">WATTBOTT</h1>
<div class="falsemargin"></div>
<div id="magicplace">
	<div id="ground" class="circle"></div>
	<div id="tree1" class="tree">
		<div class="treefoliage1">
			<div class="treefoliage1part1"><div class="treefoliage1part2"></div><div class="treefoliage1part3"></div></div>
		</div>
		<div class="treetrunk"></div>
	</div>
	<div id="tree2" class="tree">
		<div class="treefoliage2">
			<div class="treefoliage2part1 circle"></div><div class="treefoliage2part2 circle"></div><div class="treefoliage2part3 circle"></div><div class="treefoliage2part4 circle"></div><div class="treefoliage2part5 circle"></div>
		</div>
		<div class="treetrunk"></div>
	</div>
</div>
<a href="{{{action('HomeController@testForm')}}}"><div class="buttonlink font3"><p>Start Your Journey Here</p></div></a>
@stop

@section('scripts')
<script type="text/javascript" src="/js/hiya.js"></script>
@stop