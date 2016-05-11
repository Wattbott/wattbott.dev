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
	var fakenumkey = '';
	var fakerkey = '';
	var maxlength = 0;
	var monthArray = ['January','February','March','April','May','June','July','August','September','October','November','December'];
	var monthsChartArray = [];
	var inc = 0;

	var checkBoolRadInserts = ['<div id="anntotalseg"><div class="formsegment font3 fontmidlarge" id="annformseg1"><label for="kwhannual" class="labeltext">kW/h</label><input name="kwhannual" id="kwhannual" class="coolformtext font3 fontmidlarge" type="text"></div><div class="formsegment font3 fontmidlarge" id="annformseg2"><label for="costannual" class="labeltext">Cost ($)</label><input name="costannual" id="costannual" class="coolformtext font3 fontmidlarge" type="text"></div></div>','<div id="totalseg"><div class="formsegment font3 fontmidlarge" id="monthselectseg"><ul id="fakeselectB"><div id="fsnumtwo" class="fakeselectitem"></div><li>January</li><li>February</li><li>March</li><li>April</li><li>May</li><li>June</li><li>July</li><li>August</li><li>September</li><li>October</li><li>November</li><li>December</li><span id="buildlisttri2" class="triangledown"></span></ul></div><div class="formsegment font3 fontmidlarge" id="monthitemseg"><label for="kwhmonth" class="labeltext">kW/h</label><input class="coolformtext font3 fontmidlarge" id="kwhmonth" name="kwhmonth" type="text"></div><div class="formsegment font3 fontmidlarge" id="monthcostseg"><label for="costmonth" class="labeltext">Cost ($)</label><input class="coolformtext font3 fontmidlarge" id="costmonth" name="costmonth" type="text"></div><div id="enter" class="buttonlink">Submit Month</button></div>'];
	var checkTwoInserts = ['<div class="formsegment font3 fontmidlarge" id="gasmonthseg"><label for="kBTUmonth" class="labeltext">kBTU</label><input class="coolformtext font3 fontmidlarge" id="kBTUmonth" name="kBTUmonth" type="text"></div>','<div class="formsegment font3 fontmidlarge" id="gasmonthcostseg"><label for="gascostmonth" class="labeltext">Cost ($)</label><input class="coolformtext font3 fontmidlarge" id="gascostmonth" name="gascostmonth" type="text"></div>']
	var cbrid = ["#anntotalseg","#totalseg"];
	function fakecheckVarPopulate(arr)
	{
		console.log($('.fakecheck').length);
		for (var i = 0; i < $('.fakecheck').length; i++)
		{
			arr[i] = false;
		}
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
	function runrunrun()
	{
		$('.bargraphkwh').hover(function(){
			$(this).append('<div class="description">kW/h Amount</div>');
		},function(){
			$(this).children('.description').detach();
		});
		$('.bargraphkwhcost').hover(function(){
			$(this).append('<div class="description">kW/h Cost (USD)</div>');
		},function(){
			$(this).children('.description').detach();
		});
		$('.bargraphgas').hover(function(){
			$(this).append('<div class="description">Gas Amount</div>');
		},function(){
			$(this).children('.description').detach();
		});
		$('.bargraphgascost').hover(function(){
			$(this).append('<div class="description">Gas Cost (USD)</div>');
		},function(){
			$(this).children('.description').detach();
		});
	}
	function charted(data)
	{	
		if (fakerkey !== '' && fakenumkey !== '')
		{
			console.log(fakenumkey,fakerkey,data[fakenumkey][fakerkey]);
			maxlength = data[fakenumkey][fakerkey];
			console.log(maxlength);
		}
		if (data.length > 8)
		{
			$('#dachart').animate({
				"height": data.length*5.2+"%"
			});

		}
		for (var i = data.length -1; i >= 0; i--)
		{
			if (data.length > 8)
		{
			$('#dachart .graphbarpart').animate({
				"font-size": 16-(data.length/2)+"px"
			});
			
		}
		
			for (var key in data[i])
			{
				if ((data[i][key] > maxlength) && (key !== 'month'))
				{
					maxlength = Number(data[i][key]);
					fakenumkey = i;
					fakerkey = key;
				}
			}
			var monthgraph = data[i].month.toLowerCase();
			var newwidth = (data[i].kwh/maxlength * 100);
			var width2 = (data[i].kwhcost/maxlength * 100);
			var width3 = (data[i].gas/maxlength * 100);
			var width4 = (data[i].gascost/maxlength * 100);
			monthsChartArray[inc] = data[i].month;
			inc++;
			if ($('#'+monthgraph+'graph').length < 1)
			{
				console.log("HERE DUDE!");
				$('#dachart').append('<div class=graphbarpart id='+monthgraph+'graph></div>');
				$('#'+monthgraph+'graph').css({
					'height':(100/data.length)+"%",
					'width':'100%'
				});
				$('#'+monthgraph+'graph').append('<div class=graphpartlabel id='+monthgraph+'label>'+data[i].month+'</div>');
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
				$('#'+monthgraph+'graph .bargraphkwh').animate({
					"width":newwidth+"%"
				}).text(data[i].kwh);
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
				}).text(data[i].kwhcost);
			}
			if (('gas' in data[i]) && ('gascost' in data[i]))
			{
				if ($('#'+monthgraph+'graph .bargraphgas').length < 1)
				{
					$('#'+monthgraph+'graph').append('<div class="bargraphgas">'+data[i].gas+'</div>');
					$('#'+monthgraph+'graph .bargraphgas').css({
						"height": (100/(Object.keys(data[i]).length-1))+"%",
						"width": 0
					}).animate({
						"width": width3+'%'
					},500);
				}
				else
				{
					$('#'+monthgraph+'graph .bargraphgas').animate({
						"width": width3+"%"
					}).text(data[i].gas);
				}
				if ($('#'+monthgraph+'graph .bargraphgascost').length < 1)
				{
					$('#'+monthgraph+'graph').append('<div class="bargraphgascost">'+data[i].gascost+'</div>');
					$('#'+monthgraph+'graph .bargraphgascost').css({
						"height": (100/(Object.keys(data[i]).length-1))+"%",
						"width": 0
					}).animate({
						"width": width4+'%'
					},500);
				}
				else
				{
					$('#'+monthgraph+'graph .bargraphgascost').animate({
						"width":width4+"%"
					}).text(data[i].gascost);
				}
			}
		}
		runrunrun();
	}
	function parseMonthsValue(data)
	{
		console.log(data.month,data);
		$('#'+data.month.toLowerCase()+'power').val(data.kwh);
		$('#'+data.month.toLowerCase()+'powercost').val(data.kwhcost);
		if (data.gas !== '')
		{
			$('#'+data.month.toLowerCase()+'gas').val(data.gas);
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
			formCheck1(indi);
		});
	}
	function commitStuff()
	{
		$('#anntotalseg').ready(function(){

			$('#costannual').keyup(function (){
				$('#annualpowercost').val($(this).val());
			});
			$('#kwhannual').keyup(function (){
				console.log($(this).val(),"BLAH");
				$('#annualpower').val($(this).val());
			});
		});
		$("#totalseg").ready(function(){
			var listheight1 = $('#fakeselectB li').height();
			var listoptions1 = $('#fakeselectB li').length;
			$("#fakeselectB").click(function(){
					console.log(listheight1*1.5);
					console.log(listheight1);
				if ((faketrue1 == false) && ($(this).height() < listheight1*1.5))
				{
					faketrue1 = true;
					$("#fakeselectB").animate({
						"height": (listheight1*listoptions1)+48+"px"
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
								monthsData[j] = {"month":$('#fsnumtwo').text(),"kwh":Number($('#kwhmonth').val()),"kwhcost":Number($('#costmonth').val()),"gas":Number($('#kBTUmonth').val()),"gascost":Number($('#gascostmonth').val())};
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
							monthsData[i] = {"month":$('#fsnumtwo').text(),"kwh":Number($('#kwhmonth').val()),"kwhcost":Number($('#costmonth').val()),"gas":Number($('#kBTUmonth').val()),"gascost":Number($('#gascostmonth').val())};
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
								monthsData[j] = {"month":$('#fsnumtwo').text(),"kwh":Number($('#kwhmonth').val()),"kwhcost":Number($('#costmonth').val())};
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
							monthsData[i] = {"month":$('#fsnumtwo').text(),"kwh":Number($('#kwhmonth').val()),"kwhcost":Number($('#costmonth').val())};
							parseMonthsValue(monthsData[i]);
							$('#fsnumtwo').text('');
							$('#kwhmonth').val('');
							$('#costmonth').val('');
							console.log(monthsData);
						}
					}
				}
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
				$('#kwhannual').val($('#annualpower').val());
				$('#costannual').val($('#annualpowercost').val());
			}
			else
			{
				upAlready[i] = false;
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
				$('<div class="formsegment font3 fontmidlarge" id="grossroofseg"><label for="grossroof" class="labeltext">Gross Roof Area (sq ft)</label><input name="grossroof" class="coolformtext font3 fontmidlarge" id="grossroof"></div>').insertAfter('#grosscheckseg');
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
				$('#fakeselectC').css({
					"visibility":"visible",
					"opacity":"0"
				}).animate({
					"opacity":"1"
				});
				var waitingSet = setInterval(function(){
					if ($("#totalseg").length > 0)
					{
						if ($('#gasmonthseg').length > 0 && $("#gasmonthcostseg").length > 0)
						{
							clearInterval(waitingSet);
						}
						else
						{
							$(checkTwoInserts[0]).insertAfter('#monthcostseg');
							$(checkTwoInserts[1]).insertAfter('#gasmonthseg');
						}
					}
					else if($("#annformseg2").length > 0)
					{
						if ($('#gasmonthseg').length > 0 && $("#gasmonthcostseg").length > 0)
						{
							clearInterval(waitingSet);
						}
						else
						{
							$(checkTwoInserts[0]).insertAfter('#annformseg2');
							$('#kBTUmonth').attr('id','gasannualform');
							$(checkTwoInserts[1]).insertAfter('#gasmonthseg');
							$('#gasannualform').val($('#annualgas').val());
							$('#gascostmonth').attr('id','gasannualcostform');
							$('#gasannualcostform').val($('#annualgascost').val());
							
							$('#gasannualform').ready(function(){
								console.log("Let's do this!");
								$('#gasannualform').keyup(function (){
									console.log($(this).val(),"BLAH");
									$('#annualgas').val($(this).val());
								});
								$('#gasannualcostform').keyup(function (){
								 	$('#annualgascost').val($(this).val());
								});
							});
						}
					}
				},500);
			}
			else
			{
				$('#gasmonthcostseg').remove();
				$('#gasmonthseg').remove();
				$('#fakeselectC').animate({
					"opacity":"0",
				}).css({
					"visibility":"hidden"
				});
			}
		}
	}
	// js for sunrotation
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
	function visionCreationNewsun(){
		setInterval(function(){
			console.log
			var elem = $(".suncorona");
			$({deg: 0}).animate({deg: -360}, {
				duration: 60,
				easing: "linear",
				step: function(now){
	           		elem.css({
	            	     transform: "rotate(" + now + "deg)"
	            	});
	        	}
	    	});
		},800);
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
		}
	});
	$('.fakecheck').click(function (){
		var indexch = $(this).attr('id').substr(-1);
		if (checkBool[indexch] == false)
		{
			checkBool[indexch] = true;
			$(this).children().animate({
				"top":"5px",
				"left":"5px",
				"width":"30px",
				"height":"30px"
			});
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
			doubleTake(indexch,checkBool[indexch]);
		}
	});
	$(document).ready(function (){
		for (var i = 0; i < 12; i++)
		{
			monthsData[i] = {"month":monthArray[i],"kwh":$('#'+monthArray[i].toLowerCase()+"power").val(),"kwhcost":$('#'+monthArray[i].toLowerCase()+"powercost").val(),"gas":$('#'+monthArray[i].toLowerCase()+"gas").val(),"gascost":$('#'+monthArray[i].toLowerCase()+"gascost").val()}
			console.log(monthsData);
		}
		charted(monthsData);
	});
	fakecheckVarPopulate(checkBool);
	fakecheckVarPopulate(checkBoolRad);

	// waiting page click event
	$('#submitbuttonID').click(function (){
		$(this).hide();
		var happysun = '<div id="magicplace"><div class = "suntext">calculating...</div><div class="sun"><div class="happyface"><div class="eye eyeone"></div><div class="eye eyetwo"></div><div class="smiley"><div class="smileyoverlay"></div></div></div><div class="suncorona"><div class="coronapart lazycorona1"></div><div class="coronapart lazycorona2"></div></div><div class="sunbody"></div></div></div>';
		$(happysun).insertBefore($(this));
		visionCreationNewsun();
		$('#formbody1').hide();
		$('#formbody2').remove();
		$('#formbody3').remove();
	});


})();