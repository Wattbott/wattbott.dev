<?php
class RunsController extends BaseController {
	
	public function create()
	{
		return View::make('create');
		//this redirects from intro page to form page
	}

	public function show($id) 
	{
		// we need to create the find function on our runs class
		// $run = $this->find($id); 
		$run = "test it like a like a - heck yes!";
		return View::make('create')->with('run',$run);
	}

	public function store() {
		$run = new Run();
		$run->run = [];
		//these are set by us no matter what; move these to the Run class itself??
		// $run->module_type = $default_module_type;
		// $run->losses = $default_losses;
		// $run->array_type = $default_array_type;
		// $run->tilt = $default_tilt;
		// $run->azimuth = $default_azimuth;
		// $run->inv_eff = $default_inv_eff;
		// $run->measurementSystem = $default_measurementSystem;
		// //and now the required Input::'s
		// $run->postal_code = Input::get('postal_code');
		// $run->lat = Geocode::getLat($run->postal_code);
		// $run->lon = Geocode::getLon($run->postal_code);
		// $run->state = Geocode::getState($this->postal_code);
		// $run->country = Geocode::getCountry($run->postal_code);
		// $run->primaryFunction = Input::get('primaryFunction');
		// $run->grossFloorArea = Input::get('grossFloorArea');
		// $run->system_capacity = Run::getSystemCapacity($this->grossFloorArea);
		//tying inputs to run class
		$run->run['user_input']['run_name'] = Input::get('calcname');
		$run->run['user_input']['email'] = Input::get('email');
		$run->run['user_input']['zipcode'] = Input::get('zipcode');
		$run->run['user_input']['bldg_type'] = Input::get('buildtype');
		$run->run['user_input']['gross_flr_area'] = Input::get('grossfloorarea');
		$run->run['user_input']['gross_roof_area'] = Input::get('grossroofarea');
		$run->run['user_input']['energy data']['elec']['elec']['cost']['total'] = Input::get('annualpower');
		$run->run['user_input']['energy data']['elec']['energy']['jan'] = Input::get('januarypower');
		$run->run['user_input']['energy data']['elec']['energy']['feb'] = Input::get('februarypower');
		$run->run['user_input']['energy data']['elec']['energy']['mar'] = Input::get('marchpower');
		$run->run['user_input']['energy data']['elec']['energy']['apr'] = Input::get('aprilpower');
		$run->run['user_input']['energy data']['elec']['energy']['may'] = Input::get('maypower');
		$run->run['user_input']['energy data']['elec']['energy']['jun'] = Input::get('junepower');
		$run->run['user_input']['energy data']['elec']['energy']['jul'] = Input::get('julypower');
		$run->run['user_input']['energy data']['elec']['energy']['aug'] = Input::get('augustpower');
		$run->run['user_input']['energy data']['elec']['energy']['sep'] = Input::get('septemberpower');
		$run->run['user_input']['energy data']['elec']['energy']['oct'] = Input::get('octoberpower');
		$run->run['user_input']['energy data']['elec']['energy']['nov'] = Input::get('novemberpower');
		$run->run['user_input']['energy data']['elec']['energy']['dec'] = Input::get('decemberpower');
		$run->run['user_input']['energy data']['elec']['energy']['units'] = 'kWh';

		$run->run['user_input']['energy data']['gas']['cost']['total'] = Input::get('annualgascost');
		$run->run['user_input']['energy data']['gas']['energy']['total'] = Input::get('annualgas');
		$run->run['user_input']['energy data']['gas']['energy']['jan'] = Input::get('januarygas');
		$run->run['user_input']['energy data']['gas']['energy']['feb'] = Input::get('februarygas');
		$run->run['user_input']['energy data']['gas']['energy']['mar'] = Input::get('marchgas');
		$run->run['user_input']['energy data']['gas']['energy']['apr'] = Input::get('aprilgas');
		$run->run['user_input']['energy data']['gas']['energy']['may'] = Input::get('maygas');
		$run->run['user_input']['energy data']['gas']['energy']['jun'] = Input::get('junegas');
		$run->run['user_input']['energy data']['gas']['energy']['jul'] = Input::get('julygas');
		$run->run['user_input']['energy data']['gas']['energy']['aug'] = Input::get('augustgas');
		$run->run['user_input']['energy data']['gas']['energy']['sep'] = Input::get('septembergas');
		$run->run['user_input']['energy data']['gas']['energy']['oct'] = Input::get('octobergas');
		$run->run['user_input']['energy data']['gas']['energy']['nov'] = Input::get('novembergas');
		$run->run['user_input']['energy data']['gas']['energy']['dec'] = Input::get('decembergas');
		$run->run['user_input']['energy data']['gas']['energy']['units'] = Input::get('gastype');
		dd($run);
		//optional properties autofilled if left blank:
		if (Input::get() == false) {
			$this->path4();
		} else if (Input::get() == false) {
			$this->path3();
		} else if (Input::get() == false ) {
			$this->path2();
		} else if (Input::get() == false ) {
			$this->path1();
		} else {
			return "Did not satisfy any path requirements";
		}
	}

	public function result() 
	{
		$run = Run::find(1); 
		$temp = $run->run;
		$temp['pv']['ac_annual'] = Api::pv();
		$run->run = $temp;
		return View::make('result')->with('run',$run);
	}


}