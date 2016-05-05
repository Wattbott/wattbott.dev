<?php 

// this file lists all the assumptions used
// access is through a static method on the Ass model
// all variables are defined as an array of the following format:
// [value,'units','additional comments']

$assumptions = [

	// energy conversion factors
	'unit_kwh_mmbtu' => [0.003412, 'mmBtu/kWh'],
	'unit_kbtu_mmbtu' => [0.001, 'mmBtu/kWh'],
	'unit_therm_mmbtu' => [0.100, 'mmBtu/therm'],
	'unit_cff_mmbtu' => [0.1027, 'mmBtu/cff','assumes typical natural gas'],

	// used for pv ROI 
	'pv_installed_cost' => [5, '$/kWatt','cost for pv materials and installation'],
	'pv_usable_roof' => [0.15, 'na','ratio of roof area where pv can be mounted'],	
	'pv_sys_intensity' => [11, 'Watts/ft^2','power output per pv panel area'],
	

];
