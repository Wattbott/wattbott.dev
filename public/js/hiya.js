"use strict";

(function(){

function titleAnimate()
{

	var part1 = $('#title').text().substr(0,4);
	var part2 = $('#title').text().substr(-4,4);
	console.log(part1,part2);
	$('#title').empty();
	$('#title').append('<div class="textleft">'+part1+'</div><div class="textright">'+part2+'</div>');
	$('.textleft').css({
		"left":"0px",
		"top":"-250px"
	}).animate({
		"left":"24%",
		"top":"0px"
	},1500);
	$('.textright').css({
		"right":"0px",
		"top":"-250px"
	}).animate({
		"right":"24%",
		"top":"0px"
	},1500);


}
titleAnimate();
})();