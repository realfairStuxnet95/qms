$(document).ready(function(){
	setInterval(function(){ loadCurrentTime();}, 1000);
});

function sendRequest(currentTime){
	$.post("query.php",{
		currentTime:currentTime
	},function(response){
		$("#divResponse").html(response);
	});
}

function loadCurrentTime(){
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	$("#divTime").html(time);
	sendRequest(time);
}

