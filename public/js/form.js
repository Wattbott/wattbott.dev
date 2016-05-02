"use strict";

(function (){

	var buildlisttri = $('#buildlisttri');
	var listheight = $('#fakeselect li').height();
	var listoptions = $('#fakeselect li').length;
	var listheight2 = $('#fakeselectC li').height();
	var listoptions2 = $('#fakeselectC li').length;
	var faketrue = false;
	var faketrue1 = false;
	var faketrue2 = false;
	var upAlready = [false,false];
	var checkBool = [];
	var checkBoolRad = [];
	var monthsData = [];
	var maxlength = 0;

	var checkBoolRadInserts = ['<div id="anntotalseg"><div class="formsegment font3 fontmidlarge" id="annformseg1"><label for="kwhannual" class="labeltext">kW/h</label><input name="kwhannual" id="kwhannual" class="coolformtext font3 fontmidlarge" type="text"></div><div class="formsegment font3 fontmidlarge" id="annformseg2"><label for="costannual" class="labeltext">Cost</label><input name="costannual" id="costannual" class="coolformtext font3 fontmidlarge" type="text"></div></div>','<div id="totalseg"><div class="formsegment font3 fontmidlarge" id="monthselectseg"><ul id="fakeselectB"><div id="fsnumtwo" class="fakeselectitem"></div><li>January</li><li>Feburary</li><li>March</li><li>April</li><li>May</li><li>June</li><li>July</li><li>August</li><li>September</li><li>October</li><li>November</li><li>December</li><span id="buildlisttri2" class="triangledown"></span></ul></div><div class="formsegment font3 fontmidlarge" id="monthitemseg"><label for="kwhmonth" class="labeltext">kW/h</label><input class="coolformtext font3 fontmidlarge" id="kwhmonth" name="kwhmonth" type="text"></div><div class="formsegment font3 fontmidlarge" id="monthcostseg"><label for="costmonth" class="labeltext">Cost</label><input class="coolformtext font3 fontmidlarge" id="costmonth" name="costmonth" type="text"></div><div id="enter">Submit Month</button></div>'];
	var checkTwoInserts = ['<div class="formsegment font3 fontmidlarge" id="gasmonthseg"><label for="kBTUmonth" class="labeltext">kBTU</label><input class="coolformtext font3 fontmidlarge" id="kBTUmonth" name="kBTUmonth" type="text"></div>','<div class="formsegment font3 fontmidlarge" id="gasmonthcostseg"><label for="gascostmonth" class="labeltext">Cost</label><input class="coolformtext font3 fontmidlarge" id="gascostmonth" name="gascostmonth" type="text"></div>']
	var cbrid = ["#anntotalseg","#totalseg"];
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
	function lazyCheck(i)
	{
		$('#radioselectoptions1 span').each(function(index){
			if (i == index)
			{
				$('#moavalue').val($(this).text());
			}
		});
	}
	function charted(data)
	{	

		for (var i = data.length -1; i >= 0; i--)
		{
			for (var key in data[i])
			{
				if (data[i][key] > maxlength && key !== 'month')
				{
					maxlength = data[i][key];
				}
			}
			console.log(maxlength);
			console.log(Object.keys(data).length,data.length);
			console.log(data[i].kwh,data[i].kwhcost,data[i].kwh/maxlength * 100);
			var monthgraph = data[i].month.toLowerCase();
			var newwidth = (data[i].kwh/maxlength * 100);
			var width2 = (data[i].kwhcost/maxlength * 100);
			console.log(newwidth,width2);
			if ($('#'+monthgraph+'graph').length < 1)
			{
				console.log("HERE DUDE!");
				$('#dachart').append('<div class=graphbarpart id='+monthgraph+'graph></div>');
				$('#'+monthgraph+'graph').css({
					'height':(100/data.length)+"%",
					'width':'100%'
				});
			}
			else
			{
				$('#'+monthgraph+'graph').css({
					'height':(100/data.length)+"%",
					'width':'100%'
				});
			}
			if ($('#'+monthgraph+'graph .bargraphkwh').length < 1)
			{
				console.log(monthgraph,$('#'+monthgraph+'graph .bargraphkwh').length,newwidth);
				$('#'+monthgraph+'graph').append('<div class="bargraphkwh">'+data[i].kwh+'</div>');
				$('#'+monthgraph+'graph .bargraphkwh').css({
					"height": (100/(Object.keys(data[i]).length-1))+"%",
					"width": 0
				}).animate({
					"width": newwidth+'%'
				},500);
			}
			else
			{
				console.log("No! I'm Broken here!",monthgraph,$('#'+monthgraph+'graph .bargraphkwh').length);
				$('#'+monthgraph+'graph .bargraphkwh').animate({
					"width":newwidth+"%"
				});
			}
			if ($('#'+monthgraph+'graph .bargraphkwhcost').length < 1)
			{
				$('#'+monthgraph+'graph').append('<div class="bargraphkwhcost">'+data[i].kwhcost+'</div>');
				$('#'+monthgraph+'graph .bargraphkwhcost').css({
					"height": (100/(Object.keys(data[i]).length-1))+"%",
					"width": 0
				}).animate({
					"width": width2+'%'
				},500);
			}
			else
			{
				$('#'+monthgraph+'graph .bargraphkwhcost').animate({
					"width":width2+"%"
				});
			}
		}
	}
	function parseMonthsValue(data)
	{
		console.log(data.month,data);
		$('#'+data.month.toLowerCase()+'power').val(data.kwh);
		$('#'+data.month.toLowerCase()+'powercost').val(data.kwhcost);
		if (data.gas !== '')
		{
			$('#'+data.month.toLowerCase()+'gas').val(data.kBTU);
		}
		else
		{
			$('#'+data.month.toLowerCase()+'gas').val(0);	
		}
		if (data.gascost !== '')
		{
			$('#'+data.month.toLowerCase()+'gascost').val(data.gascost);
		}
		else
		{
			$('#'+data.month.toLowerCase()+'gascost').val(0);
		}
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
					lazyCheck(index);
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
	function commitStuff()
	{
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
					$('#fsnumtwo').text(newval);
					dataCheck(newval);
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
			$("#enter").click(function(){

				var i = monthsData.length;
				var truestuffs = true;
				if (checkBool[2] == true)
				{
					if ($('#kwhmonth').val() !== '' && $('#costmonth').val() !== '' && $('#fsnumtwo').text() !== '' && $('#kBTUmonth').val() !== '' && $('#gascostmonth').val() !== '')
					{
						for (var j = 0; j < i; j++)
						{
							if ($('#fsnumtwo').text() == monthsData[j].month)
							{
								truestuffs = false;
								monthsData[j] = {"month":$('#fsnumtwo').text(),"kwh":$('#kwhmonth').val(),"kwhcost":$('#costmonth').val(),"kBTU":$('#kBTUmonth').val(),"gascost":$('#gascostmonth').val()};
								parseMonthsValue(monthsData[j]);
								break;
							}
							else
							{
								truestuffs = true;
							}
						}
						if (truestuffs == true)
						{
							monthsData[i] = {"month":$('#fsnumtwo').text(),"kwh":$('#kwhmonth').val(),"kwhcost":$('#costmonth').val(),"kBTU":$('#kBTUmonth').val(),"gascost":$('#gascostmonth').val()};
							parseMonthsValue(monthsData[i]);
							$('#fsnumtwo').text('');
							$('#kwhmonth').val('');
							$('#costmonth').val('');
							$('#gascostmonth').val('');
							$('#kBTUmonth').val('');
							console.log(monthsData);
						}
					}
				}
				else
				{
					if ($('#kwhmonth').val() !== '' && $('#costmonth').val() !== '' && $('#fsnumtwo').text() !== '')
					{
						for (var j = 0; j < i; j++)
						{
							if ($('#fsnumtwo').text() == monthsData[j].month)
							{
								truestuffs = false;
								monthsData[j] = {"month":$('#fsnumtwo').text(),"kwh":$('#kwhmonth').val(),"kwhcost":$('#costmonth').val()};
								parseMonthsValue(monthsData[j]);
								break;
							}
							else
							{
								truestuffs = true;
							}
						}
						if (truestuffs == true)
						{
							monthsData[i] = {"month":$('#fsnumtwo').text(),"kwh":$('#kwhmonth').val(),"kwhcost":$('#costmonth').val()};
							parseMonthsValue(monthsData[i]);
							$('#fsnumtwo').text('');
							$('#kwhmonth').val('');
							$('#costmonth').val('');
							console.log(monthsData);
						}
					}
				}
				hiddenInputs(monthsData);
				graphPlot(monthsData);
				charted(monthsData);
			});
		});
	}
	function dataCheck(month)
	{
		for (var i = 0; i < monthsData.length; i++) {
			if (month == monthsData[i].month)
			{
				$("#kwhmonth").val(monthsData[i].kwh);
				$('#costmonth').val(monthsData[i].kwhcost);
				if (monthsData[i].month !== null)
				{
					$('#kBTUmonth').val(monthsData[i].gas);
				}
				if (monthsData[i].gascost !== null)
				{
					$('#gascostmonth').val(monthsData[i].gascost);
				}
				break;
			}
			else
			{
				$("#kwhmonth").val('');
				$('#costmonth').val('');
			}
		};
	}
	function hiddenInputs(data)
	{

	}
	function graphPlot(data)
	{
		var baseline = 100;
		var test = monthsData.length;
		var newbase = Math.round((baseline/12)*test);
		var coolnum = $('#accnumber').text();
		var coolAnimation = setInterval(function(){
			if (coolnum > newbase)
			{
				coolnum--;
				$('#accnumber').text(coolnum);
			}
			else if (coolnum < newbase)
			{
				coolnum++;
				$('#accnumber').text(coolnum);
			}
			else
			{
				$('#accnumber').text(coolnum);
				clearInterval(coolAnimation);
			}
		},100-(newbase-coolnum));
	}
	function formCheck1(index)
	{
		var len = $('.fakeradio').length;
		for (var i = 0; i < len; i++)
		{
			if (i == index && upAlready[index] !== true)
			{
				upAlready[i] = true;
				console.log(checkBoolRadInserts[index]);
				$(checkBoolRadInserts[index]).insertAfter("#annualormonthseg");
			}
			else
			{
				upAlready[i] = false;
				console.log(i);
				console.log(cbrid[i]);
				$(cbrid[i]).remove();
			}
		}
		commitStuff();
	}
	function anotherWasted(name)
	{
		var coolTimer = setInterval(function(){
			if($('#gasmonthseg').length > 0 && $('#gasmonthseg label').text() !== name)
			{
				$('#gasmonthseg label').text(name);
				clearInterval(coolTimer);
			}
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
				$('#formbody2').append('<div class="formsegment font3 fontmidlarge" id="annualormonthseg"><div class="fontcolor1 fontmidlarge easymargin centertextdiv">Annual or Monthly Bills?</div><div id="radioselectoptions1" class="fontcolor1"><div><div id="rad1-0" class="fakeradio"><div class="radioback"></div></div><span>Annual</span></div><div><div id="rad1-1" class="fakeradio"><div class="radioback"></div></div><span>Monthly</span></div><input type="hidden" name="moavalue" id="moavalue"></div>');
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
		else if (index == 2)
		{
			if (bool == true)
			{

				var waitingSet = setInterval(function(){
					if ($("#totalseg").length > 0)
					{
						if ($('#gasmonthseg').length > 0 && $("#gasmonthcostseg").length > 0)
						{
							console.log("DONE!!");
							clearInterval(waitingSet);
						}
						else
						{
							console.log("HERE!!");
							$(checkTwoInserts[0]).insertAfter('#monthcostseg');
							$(checkTwoInserts[1]).insertAfter('#gasmonthseg');
						}
					}
					else if($("#annformseg2").length > 0)
					{
						if ($('#gasmonthseg').length > 0 && $("#gasmonthcostseg").length > 0)
						{
							console.log("DONE!!");
							clearInterval(waitingSet);
						}
						else
						{
							console.log("HERE!!");
							$(checkTwoInserts[0]).insertAfter('#annformseg2');
							$(checkTwoInserts[1]).insertAfter('#gasmonthseg');
						}
					}
				},500);
			}
			else
			{
				$('#gasmonthcostseg').remove();
				$('#gasmonthseg').remove();
			}
		}
	}
	$("#fakeselect").click(function(){
		if (faketrue == false && ($(this).height() < listheight*1.5))
		{
			faketrue = true;
			$("#fakeselect").animate({
				"height": (listheight*(listoptions+1))+12+"px"
			},500);
		}
	});
	$("#fakeselectC").click(function(){
		if (faketrue2 == false && ($(this).height() < listheight*1.5))
		{
			faketrue2 = true;
			$("#fakeselectC").animate({
				"height": (listheight2*(listoptions2+1))+12+"px"
			},500);
		}
	});
	$('#fakeselectC li').click(function(){
		var indexli = $(this).index();
		var newval = $(this).text();
		if (indexli !== 0 && faketrue2 == true)
		{
			$('#hiddenstuff3').val(newval);
			faketrue2 = false;
			$('#fsnumtres').text(newval);
			anotherWasted(newval);
			$(this).css({
				"top": "10px"
			});
			$("#fakeselectC").animate({
				"height": "48px"
			},500);
			console.log(faketrue);
		}
	});
	$('#fakeselect li').click(function(){
		var indexli = $(this).index();
		var newval = $(this).text();
		if (indexli !== 0 && faketrue == true)
		{
			$('#hiddenstuff').val(newval);
			faketrue = false;
			$('#fsnumone').text(newval);
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