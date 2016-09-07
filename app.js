/*

	Programmer name: Steven Burgess
	Date of Creation: Sept. 5th, 2016
	Date of last Maintenance: Sept 5th, 2016
	File: app.js
*/


function init(){

	getWindowWidth();
}

function getWindowWidth(){

	var width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
	var height = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
	document.getElementById('test').innerHTML = width + "x" + height;

}


onload = init;
