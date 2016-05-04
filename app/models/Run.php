<?php

class Run extends BaseModel
{
	protected $table = 'runs';

	public static $rules = array(

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
		Run::sendEmailTo($run->email);
	}

	public function sendEmailTo($email){
			Mail::send('emails.runresults', array('username'=>Input::get('username')), function($message){
				$message->to(Input::get('email'))->subject('Your Wattbott Results');
			});
	}

	public function pvApiLoad()
	{
		$temp = $this->run;
		//caluclate system_capacity
		$temp['api_input']['system_capacity'] = $temp['user_input']['gross_roof_area'] * Ass::get('pv_usable_roof') * Ass::get('pv_sys_intensity');
		// foreach ($temp['user_input']['energy data']['elec']['energy'] as $value) {
		// 	if (!is_nan($value)) {
		// 		$value = $value * Ass::get('unit_kwh_mmbtu');
		// 	}
		// }

		$this->run = $temp;

	}


}