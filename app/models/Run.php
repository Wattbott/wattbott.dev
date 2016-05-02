<?php

class Run extends BaseModel
{
	public static $rules = array(
		//rules go here
	);

	public function getSystemCapacity($roof_area)
	{
		$systemCapacity = $roof_area * Ass::get('pv_usable_roof') * $somethingToBeDetermined;
		return $systemCapacity;
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

}