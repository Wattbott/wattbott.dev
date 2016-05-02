<?php 
class Ass extends Eloquent 
{
	public static function get($index)
	{
		require public_path() . "/assumptions.php";
		return $assumptions[$index][0];
	}
}
