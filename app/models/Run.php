<?php

class Run extends BaseModel
{
	protected $table = 'runs';
	public $temp_energy_totals;
	public $is_energy_data;
	public $missing_months;

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


	public function hasEnergyData($type)
	{
		$temp_is_data = $this->is_energy_data;
		$check = false;
		foreach ($this->run['user_input']['energy_data'][$type]['energy'] as $key => $value) {
			if ($key == 'units') {
				continue;
			}
			if (!empty($value)) {
				$check = true;
				break;
			}
		}
		$temp_is_data[$type] = $check;
		$this->is_energy_data = $temp_is_data;

		if ($this->is_energy_data[$type]) {
			if (empty($this->run['user_input']['energy_data'][$type]['energy']['total'])) {
				$temp_months = $this->missing_months;
				foreach ($this->run['user_input']['energy_data'][$type] as $dkey => $data) {
					$temp_months[$type][$dkey]=[];
					foreach ($data as $key => $value) {
						if ($key == 'units'||$key == 'total') {
							continue;
						}
						if(empty($value)){
							$temp_months[$type][$dkey][$key] = '';
						}
					}	
				}
				$this->missing_months = $temp_months;
			}
		}
	}

	public function replaceMonths()
	{
		$this->totalMonths();
        $tempArray = $this->run;
		foreach ($this->missing_months as $skey => &$source) {   
            foreach ($source as $ce_key => &$c_or_e) {
				$avg = $this->temp_energy_totals[$skey][$ce_key]/(12-count($c_or_e));
                foreach ($c_or_e as $month => &$value) {
                   $value = $avg;
                }
                $level = $tempArray['user_input']['energy_data'][$skey][$ce_key];
                $tempArray['user_input']['energy_data'][$skey][$ce_key] = array_replace($level, $this->missing_months[$skey][$ce_key]);
            }
        }
        $this->run = $tempArray;


	}
	public function totalMonths()
	{
		$totals=[];
		foreach ($this->run['user_input']['energy_data'] as $skey => $source) {   
            foreach ($source as $ce_key => $c_or_e) {
                $total = 0;
                foreach ($c_or_e as $month => $value) {
	                if ($month == 'units'||$month == 'total') {
						continue;
					}
                     $total += $value;
                }
                $totals[$skey][$ce_key] = $total;
            }
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
		$tempArray['api_input']['gross_flr_area'] = $this->run['user_input']['gross_flr_area'];
		$tempArray['api_input']['bldg_type'] = $this->run['user_input']['bldg_type'];

		//caluclate system_capacity
		$tempArray['api_input']['system_capacity'] = $this->run['user_input']['gross_roof_area'] * Ass::get('pv_usable_roof') * Ass::get('pv_sys_intensity')/1000;
		
		// set total energy and calc utility rates
		if ($this->is_energy_data['elec']||$this->is_energy_data['gas']) {
			// we should checkinputs and change units likely some functions here... 
			$tempArray['api_input']['energy']['elec'] = $this->temp_energy_totals['elec']['energy'] * Ass::get('unit_kwh_mmbtu');
			$tempArray['api_input']['utility_rate']['elec'] = [$this->temp_energy_totals['elec']['cost'] / $tempArray['api_input']['energy']['elec'],'$/mmBtu'];

			if($this->is_energy_data['gas']){
				$gas_unit = $this->run['user_input']['energy_data']['gas']['energy']['units'];
				$gas_total = $this->temp_energy_totals['gas']['energy'];
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

				$tempArray['api_input']['energy']['gas'] = ($gas_total);
				$tempArray['api_input']['utility_rate']['gas'] = [$this->temp_energy_totals['gas']['cost'] / $gas_total, '$/mmBtu'];
			}

		} 
		else {

			$tempArray['api_input']['energy']['elec'] = $this->temp_energy_totals['elec']['energy'];
			$tempArray['api_input']['utility_rate']['elec'] = [Api::utilityRate($tempArray['api_input']['lat'], $tempArray['api_input']['lon']) / Ass::get('unit_kwh_mmbtu'),'$/mmBtu'];
		}
		
		$this->run = $tempArray;	
	}

	public function userOuput()
	{

		// EUI
		$tempArray = $this->run;
		if ($this->run['api_input']['energy']['elec']==1) {
			$tempArray['api_input']['energy']['elec'] = ($tempArray['api_output']['eui']['median_site_intensity']*$tempArray['api_input']['gross_flr_area'])/1000;
			$dsi = $this->run['api_output']['eui']['median_site_intensity'];
			$dec = $this->run['api_output']['eui']['median_energy_cost'];
		} else {

			// this needs to be updated with EUI output
			$e_gas = '';
			$c_gas = '';
			if (array_key_exists('gas', $this->run['api_input']['energy'])) {
				$e_gas = $this->run['api_input']['energy']['gas'];
				$c_gas = $e_gas * $this->run['api_input']['utility_rate']['gas'][0];
			}	
			$dsi = ($this->run['api_input']['energy']['elec'] + $e_gas)/$this->run['api_input']['gross_flr_area']*1000;
			$dec = $this->run['api_input']['energy']['elec']*$this->run['api_input']['utility_rate']['elec'][0] + $c_gas;
		}

		$msi = $dsi;
		$msc = $dec;
		if ($this->run['api_output']['eui']) {
			$msi = $this->run['api_output']['eui']['median_site_intensity'];
			$msc = $this->run['api_output']['eui']['median_energy_cost'];
		}

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
		$pv_save = $this->run['api_output']['pv']['ac_annual'] * Ass::get('unit_kwh_mmbtu') * $this->run['api_input']['utility_rate']['elec'][0];
		$tempArray['user_output']['pv']['roi'] = $pv_cost / $pv_save;
		$tempArray['user_output']['pv']['percent_savings'] =$pv_save / $tempArray['user_output']['eui']['design_energy_cost'];
		
		$this->run = $tempArray;
	}

	public function savePDF($pathName){
		$data = ['run' => $this];
		$pdf = PDF::loadView('pdf', $data);
		return $pdf->save($pathName);
	}

	public function sendEmailTo($email, $results){
		$pathName = storage_path().'/pdf/' . preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '', $this->run['user_input']['run_name'])) . time() . '.pdf';
		$this->savePDF($pathName);

		Mail::send('emails.runresults', array('results'=>$results), function($message) use ($pathName, $email) {
			$message->to($email)->subject('Your Wattbott Results');
			$message->attach($pathName);
		});
	}
}