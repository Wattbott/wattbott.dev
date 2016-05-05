"use strict";
//rgb(255, 0, 0),rgb(0, 128, 0)
(function (){

	var barvalue = [];
	function seaChange(bottomwidth,topwidth,bar)
	{
		var redValue = 255;
		var greenValue = 128;
		console.log(bar);
		for (var i = 0; i < topwidth; i++)
		{
			var newRedValue = Math.round(redValue/100*(100-i));
			var newGreenValue = Math.round(greenValue/100*i);
			bar.animate({
				"background-color":"rgb("+newRedValue+","+newGreenValue+",0)"
			},5);
		}
	}
	function doDad()
	{
		for (var i = 0; i < $('.dagraph').length; i++)
		{
			var heightbase = $('#graph'+i).children('.graphbar').length;
			console.log(heightbase);
			$('#graph'+i).css({
				"height": heightbase*50+"px"
			});
			$('#graph'+i).each(function (indi){
				var maxlength = $(this).width();
				var coolLength = 0;
				$(this).children('.graphbar').each(function (index){
					barvalue[index] = Number($(this).children('.bartext').text());
					console.log(barvalue[index],barvalue);
					if (barvalue[index] > coolLength)
					{
						coolLength = barvalue[index];
					}
					$(this).css({
						"height": "50px"
					})
				});
				console.log(coolLength);
				var pushVar;
				$(this).children('.graphbar').each(function (index){
					var superlength = barvalue[index]/coolLength * 100;
					if (index == 0)
					{
						$(this).animate({
							"width": superlength+"%"
						},850);
						pushVar = $(this);
						console.log(pushVar);

					}
					else
					{
						var lazychecking = $(this).width();
						console.log(pushVar);
						seaChange(lazychecking,superlength,pushVar);
						var that = $(this);
						var timeoutcount = 50 * (index+1);
						setTimeout(function (){
							console.log($(this),timeoutcount,that);
							that.animate({
								"width": superlength+"%"
							},850);
						},timeoutcount);
					}
					
				});
			});
		}
	}
	function textAppear()
	{
		var newtext = $('#resultstext').text().split('');
		var textArray = [];
		$('#resultstext').empty();
		for (var i = 0; i < newtext.length; i++) {
			textArray[i] = '<span class="sweepdown">'+newtext[i]+'</span>';
		};
		for (var i = 0; i < textArray.length; i++) {
			$('#resultstext').append(textArray[i]);
		};
		$('.sweepdown').each(function (index){
			if (index == 0)
			{
				$(this).animate({
					"top": "0px",
					"opacity":"1"
				},350);
			}
			else
			{
				var that = $(this);
				var timeoutcount = 25 * (index+1);
				setTimeout(function (){
					that.animate({
						"top":"0px",
						"opacity":"1"
					},350);
				},timeoutcount);
			}
		});
		console.log(textArray);
	}
	function lazyClick()
	{
		$(".selectobject").click(function(){
			var indi = $(this).index();
			for (var i = 0; i < $('.dagraph').length; i++)
			{
				if (i == indi)
				{
					$('.dagraph').eq(i).css({
						"visibility":"visible"
					}).animate({
						"opacity":"1"
					});
					$('.infocontainer').eq(i).css({
						"visibility":"visible"
					}).animate({
						"opacity":"1"
					});
				}
				else
				{
					$('.dagraph').eq(i).css({
						"visibility":"hidden"
					}).animate({
						"opacity":"0"
					});
					$('.infocontainer').eq(i).css({
						"visibility":"hidden"
					}).animate({
						"opacity":"0"
					});
				}
			};
		});
	}
	function selectSeeder()
	{
		for (var i = 0; i < $('.dagraph').length; i++)
		{	
			console.log($('.dagraph').eq(i).children('.graphlabel').text());
			$('#superselect').append('<span class="selectobject"><p>'+$('.dagraph').eq(i).children('.graphlabel').text()+'</p></span>');
			if (i == 0)
			{
				$('.dagraph').eq(i).css({
					"visibility":"visible",
					"opacity":"1"
				});
				$('.infocontainer').eq(i).css({
					"visibility":"visible",
					"opacity":"1"
				});
			}
			else
			{
				$('.dagraph').eq(i).css({
					"visibility":"hidden",
					"opacity":"0"
				});
				$('.infocontainer').eq(i).css({
					"visibility":"hidden",
					"opacity":"0"
				});
			}
		}
		lazyClick();
	}
	selectSeeder();
	doDad();
	textAppear();
})();