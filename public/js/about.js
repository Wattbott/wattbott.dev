"use strict";

(function(){

var imageTrue = [false,false,false]
$('#circlemodal div').click(function (){
	var index = $(this).index();
	console.log(index);
	if (imageTrue[index] == false)
	{
		$(this).css({
			"z-index":"2"
		}).animate({
			"top":"0px",
			"height":"100%"
		});
		$(this).children().animate({
			"top":"0%"
		});
		$('.infopart').eq(index).css({
			"visibility":"visible",
			"opacity":"0"
		}).animate({
			"opacity":"1"
		});
		imageTrue[index] = true;
	}
	else
	{
		$(this).css({
			"z-index":"1"
		}).animate({
			"top": (index*33.3)+"%",
			"height":"33.3%"
		});
		$(this).children().animate({
			"top":"-50%"
		});
		$('.infopart').eq(index).animate({
			"opacity":"0"
		});
		setTimeout(function(){
			$('.infopart').eq(index).css({
				"visibility":"hidden"
			});
		},400);
		imageTrue[index] = false;
	}
});
})();