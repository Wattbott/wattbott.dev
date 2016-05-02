<?php  
	
var_dump($run);
	
?>

@extends('layouts/master')
@section('content')
<h1>Here we are!</h1>

	{{ Form::model($run, ['action' => ['RunsController@store', $run->id] , 'method' => 'PUT', 'files' => true]) }}
	{{ Form::textarea('run[]', null ,['placeholder' =>"create your blog entry - yo!"]) }}
	{{ Form::submit('save') }}