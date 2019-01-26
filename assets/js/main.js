$(document).ready(function(){
	var url="log_user";
	var time_slot=[];
	var end_time=[];
	loadTime();
	//checkActiveSlot("16:05");
	setInterval(function(){ loadTime(); }, 1000);
	$("#frmLogin").submit(function(e){
		e.preventDefault();
		var email=$("#username").val();
		var password=$("#password").val();
		loginRequest(email,password);
	});
	//upload banner
	$("#uploadFile").on("change",function(){
		var file=document.getElementById("uploadFile").files[0];
		var name = document.getElementById("uploadFile").files[0].name;
		var ext = name.split('.').pop().toLowerCase();
	  if(jQuery.inArray(ext, ['csv']) == -1) 
	  {
      $("#uploadFile").val("");
	   alert("Invalid CSV File");
	  }else{
	  	$("#btnUpload").show();
	  }
	});
	$("#frm_upload_file").submit(function(e){
		e.preventDefault();
           $.ajax({  
                url: "upload_file",  
                type: "POST",  
                data: new FormData(this),  
                contentType: false,  
                processData:false,  
                success: function(data)  
                {  
                	alert(data);
                }  
           }); 
	});

	$("a.btn_approve").click(function(){
		var names=$(this).attr("name");
		var number=$(this).attr("number");
		$("#modal123").modal();
		$("#p_trainee").html("You are assigning Time slot to "+names+" with Id number: "+number);
		$("#trainee_info").val(number);
	});

	$("#frm_approve").submit(function(e){
		e.preventDefault();
		var trainee_info=$("#trainee_info").val();
		var slot_time=$("#sel_slot").val();
		var input=[];
		input[0]='approve_user';
		input[1]=trainee_info;
		input[2]=slot_time;
		saveData(input,"data?training=123");
	});

	$("#frm_save_table").submit(function(e){
		e.preventDefault();
		var Tablename=$("#Tablename").val();
		var Tablenumber=$("#Tablenumber").val();
		var input=[];
		input[0]='save_table';
		input[1]=Tablename;
		input[2]=Tablenumber;
		saveData(input,"tables?training=123");
	});

});

function loadTime(){
	var dt = new Date();
	var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	var timeout="15:42";
	if(time.match(timeout)){
		$("#divTime").html("time is up");
	}else{
		$("#divTime").html(time);
	}
	
}
function checkActiveSlot(currentTime){
	var input=[];
	input[0]="check_slot";
	input[1]=currentTime;
	$.post("request_handler",{
		input:input
	},function(response){
		alert(response);
	});
}
function saveData(input,redirectUrl){
	var url="request_handler";
	$.post(url,{
		input:input
	},function(response){
		if(response.match("200")){
			//alert(response);
			window.location=redirectUrl;
		}else{
			alert(response);
		}
	});
}
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