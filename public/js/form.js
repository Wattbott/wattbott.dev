"use strict";

(function (){

	var buildlisttri = $('#buildlisttri');
	var listheight = $('#fakeselect li').height();
	var listoptions = $('#fakeselect li').length;
	var faketrue = false;
	var faketrue1 = false;
	var checkBool = [];
	var checkBoolRad = [];
	var checkBoolRadInserts = ['<div class="formsegment font3 fontmidlarge" id="annformseg1"><label for="kwhannual" class="labeltext">kW/h</label><input name="kwhannual" class="coolformtext font3 fontmidlarge" type="text"></div>','<div id="totalseg"><div class="formsegment font3 fontmidlarge" id="monthselectseg"><ul id="fakeselectB"><li>January</li><li>Feburary</li><li>March</li><li>April</li><li>May</li><li>June</li><li>July</li><span id="buildlisttri2" class="triangledown"></span></ul></div><div class="formsegment font3 fontmidlarge" id="monthitemseg"><label for="kwhannual" class="labeltext">kW/h</label><input class="coolformtext font3 fontmidlarge" name="kwhannual" type="text"></div></div></div>'];
	var cbrid = ["#annformseg1","#totalseg"];
	console.log(listheight,listoptions,listheight*listoptions);
	function fakecheckVarPopulate(arr)
	{
		console.log($('.fakecheck').length);
		for (var i = 0; i < $('.fakecheck').length; i++)
		{
			arr[i] = false;
		}
		console.log(arr);
	}
	function allowClick()
	{
		$('#radioselectoptions1 .fakeradio').click(function(){
			var indi = Number($(this).attr('id').substr(-1));
			console.log(indi);
			$('#radioselectoptions1 .fakeradio').each(function(index){
				if (indi == index)
				{
					console.log(index,indi);
					checkBoolRad[index] = true;
					$(this).children().animate({
						"top":"5px",
						"left":"5px",
						"width":"30px",
						"height":"30px"
					});
				}
				else
				{
					console.log("Not True");
					checkBoolRad[index] = false;
					$(this).children().animate({
						"top":"20px",
						"left":"20px",
						"width":"0px",
						"height":"0px"
					});
				}
			});
			console.log(checkBoolRad,indi);
			formCheck1(indi);
		});
	}
	function formCheck1(index)
	{
		var len = $('.fakeradio').length;
		for (var i = 0; i < len; i++)
		{
			if (i == index)
			{
				console.log(checkBoolRadInserts[index]);
				$(checkBoolRadInserts[index]).insertAfter("#annualormonthseg");
			}
			else
			{
				console.log(i);
				console.log(cbrid[i]);
				$(cbrid[i]).remove();
			}
		}
		$("#totalseg").ready(function(){
			var listheight1 = $('#fakeselectB li').height();
			var listoptions1 = $('#fakeselectB li').length;
			console.log("ready");
			$("#fakeselectB").click(function(){
					console.log(listheight1*1.5);
					console.log(listheight1);
				if ((faketrue1 == false) && ($(this).height() < listheight1*1.5))
				{
					console.log("HERE!");
					faketrue1 = true;
					$("#fakeselectB").animate({
						"height": (listheight1*listoptions1)+12+"px"
					},500);
				}
			});
			$('#fakeselectB li').click(function(){
				var indexli = $(this).index();
				var newval = $(this).text();
				if (indexli !== 0 && faketrue1 == true)
				{
					//$('#hiddenstuff2').val(newval);
					faketrue1 = false;
					var that = $(this).detach();
					that.prependTo($('#fakeselectB'));
					$(this).css({
						"top": "10px"
					});
					indexli = $(this).index();
					$("#fakeselectB").animate({
						"height": "48px"
					},500);
					console.log(faketrue1);
				}
			});
		});
	}
	function doubleTake(index, bool)
	{
		if (index == 0)
		{
			if (bool == true)
			{
				$('<div class="formsegment font3 fontmidlarge" id="grossroofseg"><label for="grossroof" class="labeltext">Gross Total Roof Area</label><input name="grossroof" class="coolformtext font3 fontmidlarge" id="grossroof"></div>').insertAfter('#grosscheckseg');
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
				},300);	
			}
		}
		else if (index == 1)
		{
			if (bool == true)
			{
				$("<div id='formbody2' class='mainformbody'></div>").insertAfter("#formbody1");
				$('#formbody2').append('<div class="formsegment font3 fontmidlarge" id="annualormonthseg"><div class="fontcolor1 fontmidlarge easymargin centertextdiv">Annual or Monthly Bills?</div><div id="radioselectoptions1" class="fontcolor1"><div><div id="rad1-0" class="fakeradio"><div class="radioback"></div></div><span>Annual</span></div><div><div id="rad1-1" class="fakeradio"><div class="radioback"></div></div><span>Monthly</span></div></div>');
				allowClick();
				var baseheight = $("#formbody2").height();
				$("#formbody2").css({
					"opacity":"0",
					"min-height":"0px"
				});
				$("#formbody2").children().css({
					"opacity":"0"
				}).animate({
					"opacity":"1"
				},300);
				$('#formbody2').animate({
					"opacity":"1",
				},300).animate({
					"min-height":baseheight+"px"
				}, 1000);
			}
			else
			{
				$('#formbody2').remove();
			}
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
		var indexch = $(this).attr('id').substr(-1);
		console.log(indexch);
		if (checkBool[indexch] == false)
		{
			checkBool[indexch] = true;
			$(this).children().animate({
				"top":"5px",
				"left":"5px",
				"width":"30px",
				"height":"30px"
			});
			console.log(indexch,checkBool);
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
			console.log(indexch,checkBool);
			doubleTake(indexch,checkBool[indexch]);
		}
	});	
	fakecheckVarPopulate(checkBool);
	fakecheckVarPopulate(checkBoolRad);
})();