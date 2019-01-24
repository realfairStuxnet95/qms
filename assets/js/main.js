$(document).ready(function(){
	var url="log_user";
	$("#frmLogin").submit(function(e){
		e.preventDefault();
		var email=$("#username").val();
		var password=$("#password").val();
		loginRequest(email,password);
	});

});
function loginRequest(email,password){
	showLoader();
	var url="log_user";
	$.post(url,{
		email:email,
		password:password
	},function(response){
		hideLoader();
		if(response.match("200")){
			window.location="dashboard";
			showError(response);
		}else{
			showError(response);
		}
	});
}

function showLoader(loader){
	$("#divLoader").show();
	$("#btnSubmit").hide();
	$("#divError").hide();
}

function showError(msg){
	hideLoader();
	$("#divError").show();
	$("#divError").html(msg);
	$("#btnSubmit").show();
}

function hideLoader(loader){
	$("#divLoader").hide();
	$("#btnSubmit").show();
}