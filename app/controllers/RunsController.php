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
		dd(Input::all());
		dd($run->run['user_input']['energy data']['elec']['energy']);
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
		$tempArray = $run->run;
		$api = new Api();
		$api->input = $tempArray['api_input'];
		$api->setGeo();
		$tempArray['api_output']['pv']['ac_annual'] = $api->pv();
		$run->run = $tempArray;
		return View::make('result')->with('run',$run);
	}


}