@extends('layouts.master')

@section('content')
<?php
$testRun = new Run();
$testRun->getExampleData();
var_dump($testRun->example);
?>
