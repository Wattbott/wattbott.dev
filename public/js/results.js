"use strict";
//rgb(255, 0, 0),rgb(0, 128, 0)
(function (){

	var barvalue = [];
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
				$(this).children('.graphbar').each(function (index){
					var superlength = barvalue[index]/coolLength * 100;
					if (index == 0)
					{
						$(this).animate({
							"width": superlength+"%"
						},850);
					}
					else
					{
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
					console.log($(this),timeoutcount,that);
					that.animate({
						"top":"0px",
						"opacity":"1"
					},350);
				},timeoutcount);
			}
		});
		console.log(textArray);
	}
	doDad();
	textAppear();
})();