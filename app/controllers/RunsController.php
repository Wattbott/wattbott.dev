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
		$validator = Validator::make(Input::all(), Run::$rules);
		if ($validator->fails()) {
			Session::flash('errorMessage', "Unable to save post.");
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
		
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
			// electric cost
			$tempArray['user_input']['energy_data']['elec']['cost']['total'] = Input::get('costannual');
			$tempArray['user_input']['energy_data']['elec']['cost']['jan'] = Input::get('januarypowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['feb'] = Input::get('februarypowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['mar'] = Input::get('marchpowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['apr'] = Input::get('aprilpowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['may'] = Input::get('maypowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['jun'] = Input::get('junepowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['jul'] = Input::get('julypowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['aug'] = Input::get('augustpowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['sep'] = Input::get('septemberpowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['oct'] = Input::get('octoberpowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['nov'] = Input::get('novemberpowercost');
			$tempArray['user_input']['energy_data']['elec']['cost']['dec'] = Input::get('decemberpowercost');
			// electric energy
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
			// gas cost
			$tempArray['user_input']['energy_data']['gas']['cost']['total'] = Input::get('gascostmonth');
			$tempArray['user_input']['energy_data']['gas']['cost']['jan'] = Input::get('januarygascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['feb'] = Input::get('februarygascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['mar'] = Input::get('marchgascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['apr'] = Input::get('aprilgascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['may'] = Input::get('maygascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['jun'] = Input::get('junegascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['jul'] = Input::get('julygascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['aug'] = Input::get('augustgascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['sep'] = Input::get('septembergascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['oct'] = Input::get('octobergascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['nov'] = Input::get('novembergascost');
			$tempArray['user_input']['energy_data']['gas']['cost']['dec'] = Input::get('decembergascost');
			// gas energy
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
			

			$run->sendEmailTo($run->run['user_input']['email'], $run);

			$run->run = $tempArray;	
			// $run = Run::find(4);

			// check to see if the input has gas data
			$run->hasEnergyData('elec');
			$run->hasEnergyData('gas');
			

			// suppliment missing data
			if (!empty($run->missing_months)) {
				$run->replaceMonths();
				$run->totalMonths();
			} else if (!empty($run->run['user_input']['energy_data']['elec']['energy']['total'])){
				$run->temp_energy_totals['elec']['energy'] = $run->run['user_input']['energy_data']['elec']['energy']['total'];
				$run->temp_energy_totals['elec']['cost'] = $run->run['user_input']['energy_data']['elec']['cost']['total'];
				$run->temp_energy_totals['gas']['energy'] = $run->run['user_input']['energy_data']['gas']['energy']['total'];
				$run->temp_energy_totals['gas']['cost'] = $run->run['user_input']['energy_data']['gas']['cost']['total'];
			} else {

				// get median value from target finder
				dd('get median values - this is broken, pre API');
			}

			// build API input
			$run->apiInput();

			// maybe we don't want this here...?
			$run->save();
		} //this curly closes the consequent of the validator conditional
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
		
		// Build API output through api calls
		$tempArray = $run->run;
		$api = new Api();
		$api->input = $tempArray['api_input'];
		$tempArray['api_output']['pv']['ac_annual'] = $api->pv();
		// $tempArray['api_output']['eui'] = $api->eui();
		$run->run = $tempArray;

		// create user output here
		$run->userOuput();

		$run->save();
		//MAYBE CALL THE EMAIL/PDF METHOD HERE! ALL PROPERTIES ON THE RUN OBJECT SHOULD BE AVAILABLE!
		// dd($run->run['user_output']['pv']['roi']);

		return View::make('result')->with('run',$run);
	}
}