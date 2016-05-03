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
		$tempArray = [];
		$tempArray['user_input']['run_name'] = Input::get('calcname');
		$tempArray['user_input']['email'] = Input::get('email');
		$tempArray['user_input']['zipcode'] = Input::get('zipcode');
		$tempArray['user_input']['bldg_type'] = Input::get('buildtype');
		$tempArray['user_input']['gross_flr_area'] = Input::get('grossfloorarea');
		//roof area
		if (Input::has('grossroofarea')) {
			$tempArray['user_input']['gross_roof_area'] = Input::get('grossroofarea');
		} else {
			$tempArray['user_input']['gross_roof_area'] = Input::get('grossfloorarea');
		}
		$tempArray['user_input']['energy data']['elec']['elec']['cost']['total'] = Input::get('annualpower');
		$tempArray['user_input']['energy data']['elec']['energy']['jan'] = Input::get('januarypower');
		$tempArray['user_input']['energy data']['elec']['energy']['feb'] = Input::get('februarypower');
		$tempArray['user_input']['energy data']['elec']['energy']['mar'] = Input::get('marchpower');
		$tempArray['user_input']['energy data']['elec']['energy']['apr'] = Input::get('aprilpower');
		$tempArray['user_input']['energy data']['elec']['energy']['may'] = Input::get('maypower');
		$tempArray['user_input']['energy data']['elec']['energy']['jun'] = Input::get('junepower');
		$tempArray['user_input']['energy data']['elec']['energy']['jul'] = Input::get('julypower');
		$tempArray['user_input']['energy data']['elec']['energy']['aug'] = Input::get('augustpower');
		$tempArray['user_input']['energy data']['elec']['energy']['sep'] = Input::get('septemberpower');
		$tempArray['user_input']['energy data']['elec']['energy']['oct'] = Input::get('octoberpower');
		$tempArray['user_input']['energy data']['elec']['energy']['nov'] = Input::get('novemberpower');
		$tempArray['user_input']['energy data']['elec']['energy']['dec'] = Input::get('decemberpower');
		$tempArray['user_input']['energy data']['elec']['energy']['units'] = 'kWh';

		$tempArray['user_input']['energy data']['gas']['cost']['total'] = Input::get('annualgascost');
		$tempArray['user_input']['energy data']['gas']['energy']['total'] = Input::get('annualgas');
		$tempArray['user_input']['energy data']['gas']['energy']['jan'] = Input::get('januarygas');
		$tempArray['user_input']['energy data']['gas']['energy']['feb'] = Input::get('februarygas');
		$tempArray['user_input']['energy data']['gas']['energy']['mar'] = Input::get('marchgas');
		$tempArray['user_input']['energy data']['gas']['energy']['apr'] = Input::get('aprilgas');
		$tempArray['user_input']['energy data']['gas']['energy']['may'] = Input::get('maygas');
		$tempArray['user_input']['energy data']['gas']['energy']['jun'] = Input::get('junegas');
		$tempArray['user_input']['energy data']['gas']['energy']['jul'] = Input::get('julygas');
		$tempArray['user_input']['energy data']['gas']['energy']['aug'] = Input::get('augustgas');
		$tempArray['user_input']['energy data']['gas']['energy']['sep'] = Input::get('septembergas');
		$tempArray['user_input']['energy data']['gas']['energy']['oct'] = Input::get('octobergas');
		$tempArray['user_input']['energy data']['gas']['energy']['nov'] = Input::get('novembergas');
		$tempArray['user_input']['energy data']['gas']['energy']['dec'] = Input::get('decembergas');
		$tempArray['user_input']['energy data']['gas']['energy']['units'] = Input::get('gastype');
		$run->run = $tempArray;
		$run->pvApiLoad();
		$run->save();
		dd($run->run['api_input']);
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
		Run::find($run->id);
		$temp = $run->run;
		$temp['pv']['ac_annual'] = Api::pv();
		$run->run = $temp;
		return View::make('result')->with('run',$run);
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