<?php

class Run extends BaseModel
{
	protected $table = 'runs';
	public $temp_energy_totals;
	public $is_energy_data;

	public static $rules = array(
		'calcname' => 'required|max:200',
		'email' => 'required|email|max:60',
		'zipcode' => 'required|regex:/^[0-9]{5}(\-[0-9]{4})?$/',
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

	public function energyDataSort()
	{
		// 1- get api data and assign to temp total
			// this will be done later

		// 2- check if total provided, if so assign to temp total api input
		// 3- fill in suplimental data where missing
			// this will be done later

		// 4- total all months if provided
	}

	public function hasEnergyData($type)
	{
		$tempArray = $this->is_energy_data;
		$check = false;
		foreach ($this->run['user_input']['energy_data'][$type]['energy'] as $value) {
			if (!empty($value)) {
				$check = true;
				break;
			}
		}
		$tempArray[$type] = $check;
		$this->is_energy_data = $tempArray;
	}

	public function totalMonths()
	{
		$totals=[];
		foreach ($this->run['user_input']['energy_data'] as $skey => $source) {
			$source_total=0;
			foreach ($source['energy'] as $key => $value) {
				if ($key == 'units'||$key == 'total') {
					continue;
				}
				$source_total += $value;
			}	
			$totals[$skey] = $source_total;
		}

		$this->temp_energy_totals = $totals;
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
		
		// set total energy and calc utility rates
		if (!empty($this->run['user_input']['energy_data']['elec']['energy'])) {
			// we should checkinputs and change units likely some functions here... 
			$tempArray['api_input']['energy']['elec'] = $this->run['user_input']['energy_data']['elec']['energy']['total'] * Ass::get('unit_kwh_mmbtu');
			$tempArray['api_input']['utility_rate']['elec'] = $this->run['user_input']['energy_data']['elec']['cost']['total'] / $tempArray['api_input']['energy']['elec'];

			if($this->is_energy_data['gas']){
				$gas_unit = $this->run['user_input']['energy_data']['gas']['energy']['units'];
				$gas_total = $this->run['user_input']['energy_data']['gas']['energy']['total'];
				// change gas units
				switch($gas_unit){

					case "kBTU's":
						$gas_total = $gas_total * Ass::get('unit_kbtu_mmbtu');
					break;
					case "Therms":
						$gas_total = $gas_total * Ass::get('unit_therm_mmbtu');
					break;
					case "cff":
						$gas_total = $gas_total * Ass::get('unit_cff_mmbtu');
					break;	
				}

				$tempArray['api_input']['energy']['gas'] = $gas_total;
				$tempArray['api_input']['utility_rate']['gas'] = $this->run['user_input']['energy_data']['gas']['cost']['total'] / $gas_total;
			}

		} else {

			dd('set this to get the median building');
		}
		
		$this->run = $tempArray;	
	}

	public function apiOutput()
	{
		$tempArray = $this->run;
		
		// EUI
		$gas = '';
		if ($this->is_energy_data['gas']) {
			$gas = $this->run['api_input']['energy']['gas'];
		}
		$dsi = ($this->run['api_input']['energy']['elec'] + $gas)/$this->run['user_input']['gross_flr_area']*1000;
		$dec = $this->run['user_input']['energy_data']['elec']['cost']['total'] + $this->run['user_input']['energy_data']['gas']['cost']['total'];
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
		$pv_cost = $this->run['api_input']['system_capacity'] * Ass::get('pv_installed_cost')*1000;
		$pv_save = $this->run['api_output']['pv']['ac_annual'] * Ass::get('unit_kwh_mmbtu') * $this->run['api_input']['utility_rate']['elec'];
		$tempArray['user_output']['pv']['roi'] = $pv_cost / $pv_save;
		$tempArray['user_output']['pv']['percent_savings'] =$pv_save / $tempArray['user_output']['eui']['design_energy_cost'];
		
		$this->run = $tempArray;
	}

		// saved sample for margot later
	// public function path4()
	// {
	// 	Run::sendEmailTo($run->email);
	// }

	public function sendEmailTo($email, $results){
			Mail::send('emails.runresults', array('results'=>$results), function($message){
				$message->to(Input::get('email'))->subject('Your Wattbott Results');
			});
	}
}