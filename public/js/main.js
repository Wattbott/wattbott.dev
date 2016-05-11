"use strict";

(function (){

	var hiddenTimeout;
	var navOn = true;
	function callnav()
	{
		$('footer').animate({
			"bottom":"0px"
		},500);
	}
	function hidenav()
	{
		hiddenTimeout = setTimeout(function(){
			$('footer').animate({
				"bottom":"-80px"
			},500);
			navOn = false;
		},8000);
	}
	function navswap()
	{
		$(window).scroll(function (){
			if (navOn == false)
			{
				navOn = true;
			}
				clearTimeout(hiddenTimeout);
				callnav();
				hidenav();
			
		});
	}
	navswap();
})();