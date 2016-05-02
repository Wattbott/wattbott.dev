<?php 
class Ass extends Eloquent 
{
	public static $con = array();
	public static function get($index)
	{
		require public_path() . "/assumptions.php";

		foreach ($assumptions as $key => $ass) {
			self::$con[$key] = $ass[0];
		}

		return self::$con[$index];
	}
}
