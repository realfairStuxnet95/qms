$(document).ready(function(){
	$('#timepicker').timepicker();
	$('#timepicker2').timepicker();
	setInterval(function(){ loadCurrentTime();}, 1000);
	$("#frm_search_data").submit(function(e){
		e.preventDefault();
		var start_time=$("#timepicker").val();
		var end_time=$("#timepicker2").val();
		var new_url="display?start_time="+start_time+"&end_time="+end_time;
		window.location=new_url;
	});
	$(".close-icon").click(function(){
		$("#apr_form").hide();
	});
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

