<?php
class RunsController extends BaseController {
	
	public function create($id=1)
	{
		$run = Run::find($id); 
		return View::make('testcase')->with('user_input',$run->run['user_input']);
	}

	public function show($id) 
	{
		// we need to create the find function on our runs class
		$run = Run::find($id); 
		$data = [
			'user_input' => $run->run['user_input'],
			'id' => $id
		];
		return View::make('testcase')->with($data);
	}

	public function store() 
	{
		$run = new Run();
		// validate email, zipcode and general run info
		$validator = Validator::make(Input::all(), Run::$rules);
		if ($validator->fails()) {
			Session::flash('errorMessage', "Unable to save post.");
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
					
			// load data from form - unspcified values load as null or empty strings
			$tempArray['user_input']= Input::get('user_input');
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
			if ($tempArray['user_input']['gross_flr_area'] < 0) {
				$tempArray['user_input']['gross_flr_area'] = $tempArray['user_input']['gross_flr_area'] * -1;
			}
			if ($tempArray['user_input']['gross_roof_area'] < 0) {
				$tempArray['user_input']['gross_roof_area'] = $tempArray['user_input']['gross_roof_area'] * -1;
			}
			$run->run = $tempArray;

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
				$run->temp_energy_totals['elec']['energy'] = 1;
				$run->temp_energy_totals['elec']['cost'] = 1;
			}

			// build API input
			$run->apiInputPart1();
			$run->save();

			return Redirect::action('RunsController@result',['id'=>$run->id]);

		} //this curly closes the consequent of the validator conditional
	}
	public function result($id) 
	{

		// change code to read this value in if run preset
		$run = Run::find($id);	

		$run->apiInputPart2();
	
		// need to check if we should re-run this code or just show results... or maybe this is another route?
		// API calls, results are set to api_output on $run->run
		
		// Build API output through api calls
		$tempArray = $run->run;
		$api = new Api();
		$api->input = $tempArray['api_input'];
		$tempArray['api_output']['pv']['ac_annual'] = $api->pv();
		$tempArray['api_output']['eui'] = $api->eui();
		$run->run = $tempArray;
		// create user output here
		$run->userOuput();

		$run->save();
		//MAYBE CALL THE EMAIL/PDF METHOD HERE! ALL PROPERTIES ON THE RUN OBJECT SHOULD BE AVAILABLE!
		$run->sendEmailTo($run->run['user_input']['email'], $run);
	
		$data = [
			'run' => $run,
			'id' => $id
		];

		return View::make('result')->with($data);
		
	}
}