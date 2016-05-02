<?php 
class Ass extends Eloquent 
{
	public static $const = array();
	public static function get($index)
	{
		require public_path() . "/assumptions.php";

		foreach ($assumptions as $key => $ass) {
			self::$const[$key] = $ass[0];
		}

		return self::$const[$index];
	}
}
