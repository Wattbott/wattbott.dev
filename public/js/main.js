"use strict";

(function (){

	var hiddenTimeout;
	var navOn = false;
	function callnav()
	{
		hiddenTimeout = setTimeout(function (){
			$('footer').animate({
				"bottom":"0px"
			},500);
		},1000);
		navOn = false;
	}
	function hidenav()
	{
		$('footer').animate({
			"bottom":"-80px"
		},500);
		
	}
	function navswap()
	{
		$(window).scroll(function (){
			if (navOn == false)
			{
				navOn = true;
				hidenav();
				clearTimeout(hiddenTimeout);
			}
				callnav();
		});
	}
	navswap();
})();