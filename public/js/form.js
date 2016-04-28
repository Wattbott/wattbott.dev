"use strict";

(function (){

	var buildlisttri = $('#buildlisttri');
	var listheight = $('#fakeselect li').height();
	var listoptions = $('#fakeselect li').length;
	var faketrue = false;
	var checkBool = [];
	console.log(listheight,listoptions,listheight*listoptions);
	function fakecheckVarPopulate()
	{
		console.log($('.fakecheck').length);
		for (var i = 0; i < $('.fakecheck').length; i++)
		{
			checkBool[i] = false;
		}
	}
	function doubleTake(index, bool)
	{
		if (index == 0 && bool == true)
		{
			$('#thisform').append('<div class="formsegment font3 fontmidlarge" id="grossroofseg"><label for="grossroof" class="labeltext">Gross Total Roof Area</label><input name="grossroof" class="coolformtext font3 fontmidlarge" id="grossroof"></div>');
			$("#grossroofseg").css({
				"visibility":"visible",
				"opacity":"0"
			}).animate({
				"opacity":"1"
			},300);
		}
		else
		{
			$("#grossroofseg").animate({
				"opacity":"0"
			},300);
			setTimeout(function(){
				$("#grossroofseg").remove();
			},300)
			
		}
	}
	$("#fakeselect").click(function(){
		if (faketrue == false && ($(this).height() < listheight*1.5))
		{
			faketrue = true;
			$("#fakeselect").animate({
				"height": (listheight*listoptions)+12+"px"
			},500);
		}
	});
	$('#fakeselect li').click(function(){
		var indexli = $(this).index();
		var newval = $(this).text();
		if (indexli !== 0 && faketrue == true)
		{
			$('#hiddenstuff').val(newval);
			faketrue = false;
			var that = $(this).detach();
			that.prependTo($('#fakeselect'));
			$(this).css({
				"top": "10px"
			});
			indexli = $(this).index();
			$("#fakeselect").animate({
				"height": "48px"
			},500);
			console.log(faketrue);
		}
	});
	$('.fakecheck').click(function (){
		var indexch = $("#thisform").children().index($(this));
		console.log($(this).length)
		if (checkBool[indexch] == false)
		{
			checkBool[indexch] = true;
			$(this).children().animate({
				"top":"5px",
				"left":"5px",
				"width":"30px",
				"height":"30px"
			});
			console.log(indexch,checkBool[indexch]);
			doubleTake(indexch,checkBool[indexch]);
		}
		else
		{
			checkBool[indexch] = false;
			$(this).children().animate({
				"top":"20px",
				"left":"20px",
				"width":"0px",
				"height":"0px"
			});
			console.log(indexch,checkBool[indexch]);
			doubleTake(indexch,checkBool[indexch]);
		}
	});
	fakecheckVarPopulate();
})();