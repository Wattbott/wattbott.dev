@extends('layouts.master')

@section('style')
<link href='https://fonts.googleapis.com/css?family=Roboto:200,300,400,500,900' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/hello.css">
@stop

@section('content')
<h1 id="errorTitle" class="font3">404</h1>
<h2 id="errorSubtitle" class="font3">Page Not Found</h2>
<a href="{{{action('HomeController@intro')}}}"><div class="buttonlink font3"><p>Back to Wattbott</p></div></a>
@stop