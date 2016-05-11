"use strict";

(function(){

var navmove = [false,false,false];
var navmove2 = [false,false,false];
var height = [$('li').eq(0).height(),$('li').eq(1).height(),$('li').eq(2).height()];
console.log(height);
$('li').each(function (index){
	$('li').css({
		"height":"0px"
	});
});
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
	
var scrollInterval = setInterval(function(){
		var neverreach = true;
		if (neverreach == true)
		{
			lazyanimate();
		}
}, 700);
function quickFix()
{
	var lazyArray = [1200,1560];
	$('.coolup').each(function (index){
		var that = $(this);
		var i = 0;
		var countInterval = setInterval(function (){
			
			if (i == lazyArray[index])
			{
						clearInterval(countInterval);
			}
			else
			{
				if(lazyArray[index]-i > 1000)
				{
					i += 69;
				}
				else if ((lazyArray[index]-i < 1000) && (lazyArray[index]-i > 60))
				{
					i += 23;
				}
				else
				{
					i++;
				}
				that.empty();
				that.append(i);
			}

		},40);
	});	
}
function liAnimation(i)
{
	if (i == 0)
	{
		console.log("HERE!",i);
		$('.bars').each(function (index){
			var width = $(this).width();
			console.log(width);
			$(this).css({
				"width":"0px"
			}).animate({
				"width":width+"px"
			});
		});
	}
	if (i == 1)
	{
		$('.buildingli').eq(0).css({
			"left":"-800px"
		}).animate({
			"left":"0px"
		},1000);
		$('.buildingli').eq(1).css({
			"right":"-800px"
		}).animate({
			"right":"60px"
		},1000);
		var buildingTime = setTimeout(function(){
			$('.textbuildli').css({
				"visibility":"visible",
				"opacity":"0"
			}).animate({
				"opacity":"1"
			},800);
			quickFix();
		},1000)
	}
	else
	{
		if ($('.horline').length <= 0)
		{
			$('.grid').append('<div class="horline"></div><div class="vertline"></div>');	
		}
		$('.horline').css({
			"width":"2px"
		}).animate({
			"height":"100%"
		},2000);
	}
}
function navanimate(move,move2,i)
{
	if (move == true && move2 == false)
	{
		console.log(height[i]);
		$("li").eq(i).stop(true,true);
		$("li").eq(i).animate({
			"height":height[i]+100+"px"
		},400);
		navmove2[i] = true;
		liAnimation(i);
	}
	else if (move == false)
	{
		$("li").eq(i).stop(true,true);
		$("li").eq(i).animate({
			"height":"0px"
		},400);
		navmove2[i] = false;
	}
}
function lazyanimate()
{
	var scroll = $(window).scrollTop();
	var bar = [$('li').eq(0).position(),$('li').eq(1).position()];
	for (var i = 0; i < bar.length; i++) {
		console.log(bar[i].top);
		if (scroll > bar[i].top-50)
		{
			navmove[i] = true;
			navanimate(navmove[i],navmove2[i],i);
		}
		else
		{
			navmove[i] = false;
			navanimate(navmove[i],navmove2[i],i);
		}
	};
}

console.log(height);

titleAnimate();
visionCreationNewsun();
treeDance(-15,15);
cloudDefault();
lazyanimate();
})();