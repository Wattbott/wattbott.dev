<?php

class Run extends BaseModel
{
	protected $table = 'runs';

	public static $rules = array(
		'calcname' => 'required|max:200',
		'email' => 'required|email|max:60',
		'zipcode' => 'required|digits:5',
		'buildtype' => 'required',
		'grossfloorarea' => 'required',
		);

	public function getRunAttribute($value)
    {
        return unserialize($value);
    }

    public function setRunAttribute($value)
    {
        $this->attributes['run'] = serialize($value);
    }


	public function path1()
	{
		//DB submission logic particular to this path
		Run::sendEmailTo($run->email);
	}
	public function path2()
	{
		//DB submission logic particular to this path
		Run::sendEmailTo($run->email);
	}
	public function path3()
	{
		//DB submission logic particular to this path
		Run::sendEmailTo($run->email);
	}
	public function path4()
	{
		//DB submission logic particular to this path
		// this (totalizing monthly data) should go under path 4 and 3 - it only needs to run in those cases
		// foreach ($tempArray['user_input']['energy data']['elec']['energy'] as $value) {
		// 	if (!is_nan($value)) {
		// 		$value = $value * Ass::get('unit_kwh_mmbtu');
		// 	}
		// }

		Run::sendEmailTo($run->email);
	}


	public function apiInput()
	{
		$tempArray = $this->run;
		
		// set location data
		$zipcode = $this->run['user_input']['zipcode'];
		if (true) {
			// we need some conditional here to check if real zipcode
			$tempArray['api_input'] = Api::setLocation($zipcode);
			$tempArray['api_input']['zipcode'] = $zipcode;
		}

		//caluclate system_capacity
		$tempArray['api_input']['system_capacity'] = $this->run['user_input']['gross_roof_area'] * Ass::get('pv_usable_roof') * Ass::get('pv_sys_intensity')/1000;
		
		// calculate the utility rate
		$tempArray['api_input']['utility_rate']['elec'] = $this->run['user_input']['energy_data']['elec']['cost']['total'] / $this->run['user_input']['energy_data']['elec']['energy']['total'];
		$tempArray['api_input']['utility_rate']['gas'] = $this->run['user_input']['energy_data']['gas']['cost']['total'] / $this->run['user_input']['energy_data']['gas']['energy']['total'];

	
		// set total energy 
		if (true) {
			// we should checkinputs and change units likely some functions here... 
			$tempArray['api_input']['energy']['elec'] = $this->run['user_input']['energy_data']['elec']['energy']['total'] * Ass::get('unit_kwh_mmbtu');
			
			$gas_unit = $this->run['user_input']['energy_data']['gas']['energy']['units'];
			$gas_total = $this->run['user_input']['energy_data']['gas']['energy']['total'];
			if($gas_unit == 'therms'){
				$gas_total = $gas_total * Ass::get('unit_therm_mmbtu');
			}
			$tempArray['api_input']['energy']['gas'] = $gas_total;

		}
		
		$this->run = $tempArray;	
	}

	public function apiOutput()
	{
		$tempArray = $this->run;
		
		// EUI
		$dsi = ($this->run['api_input']['energy']['elec'] + $this->run['api_input']['energy']['elec'])/$this->run['user_input']['gross_flr_area']/1000;
		$dec = $this->run['user_input']['energy_data']['elec']['cost'] + $this->run['user_input']['energy_data']['gas']['cost'];
		$msi = $dsi;
		$msc = $dec;
		$tempArray['user_output']['eui'] = [
			'design_site_intensity' => $dsi,
			'design_energy_cost' => $dec,
			'median_site_intensity' => $msi,
			'median_energy_cost' => $msc
        ];
        foreach ($tempArray['user_output']['eui']  as &$value) {
        	settype($value, 'float');
        }

		// PV
		$pv_cost = $this->run['api_input']['system_capacity'] * Ass::get('pv_installed_cost');
		$pv_save = $this->run['api_output']['pv']['ac_annual'] * $this->run['api_input']['utility_rate']['elec'];
		$tempArray['user_output']['pv']['roi'] = $pv_cost / $pv_save;
		$tempArray['user_output']['pv']['percent_savings'] =$pv_save / $tempArray['user_output']['eui']['design_energy_cost'];
		
		$this->run = $tempArray;
	}

	public function sendEmailTo($email){
			Mail::send('emails.runresults', array('username'=>Input::get('username')), function($message){
				$message->to(Input::get('email'))->subject('Your Wattbott Results');
			});
	}

}