<?php 
use Carbon\Carbon;

class BaseModel extends Eloquent 
{
	public function getUpdatedAtAttribute($value)
	{
	    $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
	    return $utc->format('Y-m-d H:i:s');
	}

	public function getCreatedAtAttribute($value)
	{
	    $utc = Carbon::createFromFormat($this->getDateFormat(), $value);
	    return $utc->format('Y-m-d H:i:s');
	}

}