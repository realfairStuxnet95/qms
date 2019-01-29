$(document).ready(function(){
	var url="log_user";
	var time_slot=[];
	var end_time=[];
	var input=[];
	var alarm = document.getElementById("alarmAudio");
	var playing=false;
	loadTime();
	checkActiveSlot("16:05");
	setInterval(function(){ loadTime("16:05");}, 1000);
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

	$("#btnSound").click(function(){
		if(playing==false){
			alarm.play();
			playing=true;
			$(this).text("STOP ALARM");
			$("#imgStop").show();
		}else{
			alarm.pause();
			playing=false;
			alarm.currentTime = 0;
			$(this).text("PLAY ALARM");
			$("#imgStop").hide();
		}
	});

	$("a.btn_approve").click(function(){
		var names=$(this).attr("name");
		var number=$(this).attr("number");
		$("#modal123").modal();
		$("#p_trainee").html("You are assigning Time slot to "+names+" with Id number: "+number);
		$("#trainee_info").val(number);
	});

	$("a.tableDelete").click(function(){
		var table_id=$(this).attr("table_id");
		input[0]="remove_table";
		input[1]=table_id;
		if(confirm("Are you Sure you want to Delete this Table With ID : "+table_id)){
			saveData(input,"tables?training=123");
		}
	});

	$("a.slotDelete").click(function(){
		var slot_id=$(this).attr("slot_id");
		input[0]="delete_slot";
		input[1]=slot_id;
		if(confirm("Are you Sure you want to Delete this Time Slot With ID : "+slot_id)){
			saveData(input,"tables?training=123&action=time_slot");
		}
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
	$("#frm_save_slot").submit(function(e){
		e.preventDefault();
		var startTime=$("#startTime").val();
		var endTime=$("#endTime").val();
		input[0]='save_slot';
		input[1]=startTime;
		input[2]=endTime;
		saveData(input,"tables?training=123&action=time_slot");
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
		$("#activeSlot").html(response);
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