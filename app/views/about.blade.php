@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/hello.css">
@stop

@section('content')
<h1 id="title" class="font3">WATTBOTT</h1>
<h2 id="createdBy" class="font3">created by</h2>
<div id="aboutTable">
	<table>
		<tr>
			<td>
				<div class="headshotDiv">
					<img class="headshot" src="annaheadshot.jpg">
				</div>
			</td>
			<td>
				<div class="headshotDiv">
					<img class="headshot" src="margotheadshot.jpg">
				</div
			</td>
			<td>
				<div class="headshotDiv">
					<img class="headshot" src="annaheadshot.jpg">
				</div>
			</td>

		</tr>
		<tr>
			<td>
				<p>Anna Morton</p>
			</td>
			<td>
				<p>Margot McMahon</p>
			</td>
			<td>
				<p>Joseph Acevido</p>
			</td>

		</tr>
		<tr>
			<td>
				<p><a href="github.com/annajmorton"</a>annajmorton</p>
			</td>
			<td>
				<p><a href="http://margot.dog">margot.dog</a></p>
			</td>
			<td>
				<p>Joseph.corn</p>
			</td>

		</tr>
	</table>
</div>
<a href="{{{action('HomeController@intro')}}}"><div class="buttonlink font3"><p>Back to Wattbott</p></div></a>

@stop