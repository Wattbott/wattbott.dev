<?php  
	// $filename = public_path() . "/xml/propertyuses/index.php";
	// $propuse = simplexml_load_file($filename);

	require public_path() . "/xml/propertyuses/index.php";
	var_dump($junk->propertyUses);
	$ah = 'get it girl';
	var_dump('bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb'.PHP_EOL);
	
	

	$var = "make my day!";

	// property Info code
	$junk->propertyInfo->address['address1'] = $var;
	$junk->propertyInfo->address['city'] = $var;
	$junk->propertyInfo->address['postalCode'] = $var;
	$junk->propertyInfo->address['state'] = $var;
	$junk->propertyInfo->address['country'] = $var;
	$junk->propertyInfo->primaryFunction = $var;
	$junk->propertyInfo->grossFloorArea->value = $var;
	// estimated enregy list code foreach needed - to set the energy data
	$junk->estimatedEnergyList->entries->designEntry->energyType = $var;
	$junk->estimatedEnergyList->entries->designEntry->estimatedAnnualEnergyUsage = $var;
	$junk->estimatedEnergyList->entries->designEntry->energyRateCost = $var;

	$type = $junk->propertyUses->k12School;
	$type->useDetails->totalGrossFloorArea->value = $var;
	$junk->propertyUses = "";
	$junk->propertyUses->addChild( $propertyuses[4][1] , $type);
	

	var_dump($junk->propertyUses);
	
?>

@extends('layouts.master')

@section('content')
{{{ $ah }}}
<br>
{{{ $junk->estimatedEnergyList->entries->designEntry->energyType }}}
