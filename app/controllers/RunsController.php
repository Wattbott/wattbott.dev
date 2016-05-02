<?php
class RunsController extends BaseController {
	
	public function create(){
		return View::make('create');
		//this redirects from intro page to form page
	}

	public function store() {
		
		dd(Ass::get('pv_usable_roof'));
		$run = new Run();
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
		$run->primaryFunction = Input::get('primaryFunction');
		$run->grossFloorArea = Input::get('grossFloorArea');
		$run->system_capacity = Run::getSystemCapacity(Input::get('grossFloorArea'));
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

}