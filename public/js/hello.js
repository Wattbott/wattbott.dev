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
function visionCreationNewsun()
{
	setInterval(function(){
		var elem = $(".suncorona");
		$({deg: 0}).animate({deg: -360}, {
			duration: 6000,
			easing: "linear",
			step: function(now){
           		elem.css({
            	     transform: "rotate(" + now + "deg)"
            	});
        	}
    	});
	},6000);
}
function getRotationDegrees(obj) {
    var matrix = obj.css("-webkit-transform") ||
    obj.css("-moz-transform")    ||
    obj.css("-ms-transform")     ||
    obj.css("-o-transform")      ||
    obj.css("transform");
    if(matrix !== 'none') {
        var values = matrix.split('(')[1].split(')')[0].split(',');
        var a = values[0];
        var b = values[1];
        var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
    } else { var angle = 0; }
    return (angle < 0) ? angle : angle;
}
function treeDance(tr1,tr2)
{
	var treesway = false;
	setInterval(function(){
		if (treesway == false)
		{
			var elem = $('.tree');
			elem.each(function (index){
				if (index == 0)
				{
					var rotate = tr1;
					var that = $(this);
					console.log($(this),rotate,index);
					$({deg: rotate}).animate({deg: tr2}, {
						duration: 2000,
						easing: "linear",
						step: function(now){
			           		that.css({
			            	     transform: "rotate(" + now + "deg)"
			            	});
			        	}
			    	});
				}
				else
				{
					var rotate = tr2;
					var that = $(this);
					console.log($(this),rotate,index);
					$({deg: rotate}).animate({deg: tr1}, {
						duration: 2000,
						easing: "linear",
						step: function(now){
			           		that.css({
			            	     transform: "rotate(" + now + "deg)"
			            	});
			        	}
			    	});
				}
			});
			treesway = true;
		}
		else
		{
			var elem = $('.tree');
			elem.each(function (index){
				if (index == 0)
				{
					var rotate = tr2;
					var that = $(this);
					console.log($(this),rotate,index);
					$({deg: rotate}).animate({deg: tr1}, {
						duration: 2000,
						easing: "linear",
						step: function(now){
			           		that.css({
			            	     transform: "rotate(" + now + "deg)"
			            	});
			        	}
			    	});
				}
				else
				{
					var rotate = tr1;
					var that = $(this);
					console.log($(this),rotate,index);
					$({deg: rotate}).animate({deg: tr2}, {
						duration: 2000,
						easing: "linear",
						step: function(now){
			           		that.css({
			            	     transform: "rotate(" + now + "deg)"
			            	});
			        	}
			    	});
				}
			});
			treesway = false;
		}
	},2000);
}
function cloudDefault()
{
	var cloudmove = setInterval(function(){
		$('.cloud').animate({
			"top":"+=20px"
		},600).animate({
			"top":"-=20px"
		},600);
	},1000);
}
titleAnimate();
visionCreationNewsun();
treeDance(-15,15);
cloudDefault();
})();