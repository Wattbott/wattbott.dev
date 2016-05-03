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
		dd(Input::all());
		$run = new Run();

		dd(Input::all());
		//these are set by us no matter what; move these to the Run class itself??
		$run->module_type = $default_module_type;
		$run->losses = $default_losses;
		$run->array_type = $default_array_type;
		$run->tilt = $default_tilt;
		$run->azimuth = $default_azimuth;
		$run->inv_eff = $default_inv_eff;
		$run->measurementSystem = $default_measurementSystem;
		//and now the required Input::'s
		$run->postal_code = Input::get('postal_code');
		$run->lat = Geocode::getLat($run->postal_code);
		$run->lon = Geocode::getLon($run->postal_code);
		$run->state = Geocode::getState($this->postal_code);
		$run->country = Geocode::getCountry($run->postal_code);
		$run->primaryFunction = Input::get('primaryFunction');
		$run->grossFloorArea = Input::get('grossFloorArea');
		$run->system_capacity = Run::getSystemCapacity($this->grossFloorArea);
		//tying inputs to run class
		$run->run['user_input']['run_name'] = Input::get('calcname');
		$run->run['user_input']['email'] = Input::get('email');
		$run->run['user_input']['zipcode'] = Input::get('zipcode');
		$run->run['user_input']['bldg_type'] = Input::get('buildtype');
		$run->run['user_input']['gross_flr_area'] = Input::get('grossfloorarea');
		$run->run['user_input']['gross_roof_area'] = Input::get('grossroofarea');
		$run->run['user_input']['energy data']['elec']['cost']['total'] = Input::get('annualpower');
		$run->run['user_input']['energy data']['energy']['jan'] = Input::get('januarypower');
		$run->run['user_input']['energy data']['energy']['feb'] = Input::get('februarypower');
		$run->run['user_input']['energy data']['energy']['mar'] = Input::get('marchpower');
		$run->run['user_input']['energy data']['energy']['apr'] = Input::get('aprilpower');
		$run->run['user_input']['energy data']['energy']['may'] = Input::get('maypower');
		$run->run['user_input']['energy data']['energy']['jun'] = Input::get('junepower');
		$run->run['user_input']['energy data']['energy']['jul'] = Input::get('julypower');
		$run->run['user_input']['energy data']['energy']['aug'] = Input::get('augustpower');
		$run->run['user_input']['energy data']['energy']['sep'] = Input::get('septemberpower');
		$run->run['user_input']['energy data']['energy']['oct'] = Input::get('octoberpower');
		$run->run['user_input']['energy data']['energy']['nov'] = Input::get('novemberpower');
		$run->run['user_input']['energy data']['energy']['dec'] = Input::get('decemberpower');
		$run->run['user_input']['energy data']['energy']['units'] = Input::get(TBD);

		$run->run['user_input'][''] = Input::get('');
		$run->run['user_input'][''] = Input::get('');
		$run->run[''][''] = Input::get('');
		$run->run[''][''] = Input::get('');
		$run->run[''][''] = Input::get('');
		$run->run[''][''] = Input::get('');

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
		$runarr = unserialize($run->run);
		return View::make('result')->with('run',$run);

	}


}