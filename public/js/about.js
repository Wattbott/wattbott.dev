"use strict";

(function(){

function lazyCanvas()
{
	var canvas = document.getElementById('myCanvas');
	var ctx = canvas.getContext('2d');
	ctx.beginPath();
	ctx.arc(250,250,200,0,2*Math.PI);
	ctx.strokeStyle = "#000000";
	ctx.stroke();
	ctx.fillStyle = "#FFFFFF";
	ctx.fill();
	ctx.closePath();
	ctx.save();

	var test1 = canvas.getContext('2d');
	test1.beginPath();
	test1.arc(250,250,190,1.5*Math.PI,.75*Math.PI,true);
	test1.lineTo(250,250);
	test1.lineTo(250,60);
	test1.stroke();
	test1.clip();
	test1.closePath();
	test1.fillStyle = "#00FF00";
	test1.fill();
	console.log(test1);
	var img1 = document.getElementById("anna");
	test1.drawImage(img1,-10,50,350,350);
	ctx.restore();
	

	var test2 = canvas.getContext('2d');
	ctx.save();
	test2.beginPath();
	test2.arc(250,250,190,.75*Math.PI,.25*Math.PI,true);
	test2.lineTo(250,250);
	test2.lineTo(115,385);
	test2.strokeStyle = "#000000";
	test2.stroke();
	test2.closePath();
	test2.fillStyle = "#FF0000";
	test2.fill();
	test2.clip();
	console.log(test2);
	var img2 = document.getElementById("somerandomdude");
	test2.drawImage(img2,75,195,350,350);
	ctx.restore();
	test1.restore();
	test2.save();
	

	var test3 = canvas.getContext('2d');
	test3.beginPath();
	test3.arc(250,250,190,1.5*Math.PI,.25*Math.PI);
	test3.lineTo(250,250);
	test3.lineTo(250,60);
	test3.stroke();
	test3.closePath();
	test3.fillStyle = "#FF0000";
	test3.fill();
	test3.clip();
	console.log(test3);
	var img3 = document.getElementById("margot");
	test3.drawImage(img3,165,60,350,350);
	ultralazy(test1,test2,test3);
	

}
function ultralazy(path1,path2,path3)
{
	var pathArray = [path1,path2,path3];
	console.log(pathArray);
	var mouseposition = [];
	var coolInterval = setInterval(function(){
		$(document).mousemove(function(e){
			mouseposition[0] = e.pageX;
			mouseposition[1] = e.pageY;
		});
		console.log(mouseposition);
		for (var i = 0; i < pathArray.length; i++) {
			if (pathArray[i].isPointInPath(mouseposition[0],mouseposition[1]))
			{
				console.log("Success!",i);

			}
		}
	},100);
}
lazyCanvas();
})();