"use strict";

(function(){

var imageTrue = [true,false,false];
$('.selectcircle').click(function (){
	var index = $(this).index();
	console.log(index);
	$('.persons').each(function (i){
		if (index == i)
		{
			$(this).css({
				"visibility":"visible",
				"opacity":"0"
			}).animate({
				"opacity":"1"
			});
			$('.selectcircle').eq(i).children().animate({
				"top":"5px",
				"left":"5px",
				"width":"30px",
				"height":"30px"
			});
			$('.infopart').eq(i).css({
				"visibility":"visible",
				"opacity":"0"
			}).animate({
				"opacity":"1"
			});
			imageTrue[index] = true;
		}
		else
		{
			var that = $(this);
			$(this).animate({
				"opacity":"0"
			});
			$('.selectcircle').eq(i).children().animate({
				"top":"20px",
				"left":"20px",
				"width":"0px",
				"height":"0px"
			});
			$('.infopart').eq(i).animate({
					"opacity":"0"
			});
			setTimeout(function (){
				that.css({
					"visibility":"hidden"
				},400);
				$('.infopart').eq(i).css({
					"visibility":"hidden"
				});
			});
			imageTrue[i] = false;
		}
	});
});
$(document).ready(function (){
	for (var i = 0; i < imageTrue.length; i++) {
		if (imageTrue[i] == true)
		{
			$('.persons').eq(i).css({
				"visibility":"visible",
				"opacity":"0"
			}).animate({
				"opacity":"1"
			});
			$('.infopart').eq(i).css({
				"visibility":"visible",
				"opacity":"0"
			}).animate({
				"opacity":"1"
			});
		}
	};
});
})();