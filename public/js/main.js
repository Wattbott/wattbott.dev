"use strict";

(function (){

	$(document).bind("mobileinit", function() {
  		$.mobile.ajaxEnabled = false;
	});
	var hiddenTimeout;
	var navOn = false;
	function callnav()
	{
		hiddenTimeout = setTimeout(function (){
			console.log("READY!");
			$('footer').stop(true,true);
			$('footer').animate({
				"bottom":"0px"
			},500);
		},1000);
		navOn = false;
	}
	function hidenav()
	{
		$('footer').stop(true,true);
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
				console.log("REMOVING!");
				clearTimeout(hiddenTimeout);
			}
				console.log("CALLING!");
				callnav();
		});
	}
	navswap();
})();