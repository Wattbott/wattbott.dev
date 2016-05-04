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
		
		// assign energy data we need to build the following checks
		//optional properties autofilled if left blank:
		// if (Input::get() == false) {
		// 	$this->path4();
		// } else if (Input::get() == false) {
		// 	$this->path3();
		// } else if (Input::get() == false ) {
		// 	$this->path2();
		// } else if (Input::get() == false ) {
		// 	$this->path1();
		// } else {
		// 	return "Did not satisfy any path requirements";
		// }
		$tempArray['user_input']['energy_data']['elec']['cost']['total'] = Input::get('costannual');
		$tempArray['user_input']['energy_data']['elec']['energy']['total'] = Input::get('kwhannual');
		$tempArray['user_input']['energy_data']['elec']['energy']['jan'] = Input::get('januarypower');
		$tempArray['user_input']['energy_data']['elec']['energy']['feb'] = Input::get('februarypower');
		$tempArray['user_input']['energy_data']['elec']['energy']['mar'] = Input::get('marchpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['apr'] = Input::get('aprilpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['may'] = Input::get('maypower');
		$tempArray['user_input']['energy_data']['elec']['energy']['jun'] = Input::get('junepower');
		$tempArray['user_input']['energy_data']['elec']['energy']['jul'] = Input::get('julypower');
		$tempArray['user_input']['energy_data']['elec']['energy']['aug'] = Input::get('augustpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['sep'] = Input::get('septemberpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['oct'] = Input::get('octoberpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['nov'] = Input::get('novemberpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['dec'] = Input::get('decemberpower');
		$tempArray['user_input']['energy_data']['elec']['energy']['units'] = 'kWh';
		$tempArray['user_input']['energy_data']['gas']['cost']['total'] = Input::get('gascostmonth');
		$tempArray['user_input']['energy_data']['gas']['energy']['total'] = Input::get('kBTUmonth');
		$tempArray['user_input']['energy_data']['gas']['energy']['jan'] = Input::get('januarygas');
		$tempArray['user_input']['energy_data']['gas']['energy']['feb'] = Input::get('februarygas');
		$tempArray['user_input']['energy_data']['gas']['energy']['mar'] = Input::get('marchgas');
		$tempArray['user_input']['energy_data']['gas']['energy']['apr'] = Input::get('aprilgas');
		$tempArray['user_input']['energy_data']['gas']['energy']['may'] = Input::get('maygas');
		$tempArray['user_input']['energy_data']['gas']['energy']['jun'] = Input::get('junegas');
		$tempArray['user_input']['energy_data']['gas']['energy']['jul'] = Input::get('julygas');
		$tempArray['user_input']['energy_data']['gas']['energy']['aug'] = Input::get('augustgas');
		$tempArray['user_input']['energy_data']['gas']['energy']['sep'] = Input::get('septembergas');
		$tempArray['user_input']['energy_data']['gas']['energy']['oct'] = Input::get('octobergas');
		$tempArray['user_input']['energy_data']['gas']['energy']['nov'] = Input::get('novembergas');
		$tempArray['user_input']['energy_data']['gas']['energy']['dec'] = Input::get('decembergas');
		$tempArray['user_input']['energy_data']['gas']['energy']['units'] = Input::get('gastype');
		$run->run = $tempArray;

		// build API input
		$run->apiInput();

		// maybe we don't want this here...?
		$run->save();

		// dd($run->id);
		return Redirect::action('RunsController@result',['id'=>$run->id]);
	}

	public function result($id) 
	{
		// change code to read this value in if run preset
		if(true){
			$run = Run::find($id);	
		} 


		// need to check if we should re-run this code or just show results... or maybe this is another route?
		// API calls, results are set to api_output on $run->run
		$tempArray = $run->run;
		$api = new Api();
		$api->input = $tempArray['api_input'];
		$tempArray['api_output']['pv']['ac_annual'] = $api->pv();
		$tempArray['api_output']['eui'] = $api->eui();
		$run->run = $tempArray;

		// process API ouput
		$run->apiOutput();

		$run->save();

		return View::make('result')->with('run',$run);
	}
}