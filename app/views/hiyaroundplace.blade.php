@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/hiya.css">
@stop

@section('content')
<h1 id="title" class="font3">WATTBOTT</h1>
<div id="magicplace">
	<div id="ground" class="circle"></div>
	<div class="tree">
		<div class="treefoliage1">
			<div class="treefoliage1part1"><div class="treefoliage1part2"></div><div class="treefoliage1part3"></div></div>
		</div>
		<div class="treetrunk"></div>
	</div>
	<div class="tree">
		<div class="treefoliage2">
			<div class="treefoliage2part1"><div class="treefoliage2part2"></div><div class="treefoliage2part3"></div><div class="treefoliage2part4"></div><div class="treefoliage2part5"></div></div>
		</div>
		<div class="treetrunk"></div>
	</div>
</div>
@stop

@section('scripts')
<script type="text/javascript" src="/js/hiya.js"></script>