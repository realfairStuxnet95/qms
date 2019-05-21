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
		var station=$("#station").val();
		loginRequest(email,password,station);
	});
	$("#frm_add_station").submit(function(e){
		e.preventDefault();
		var station_name=$("#station_name").val();
		input[0]='add_station';
		input[1]=station_name;
		saveData(input,"dashboard?request=training_station");
	});
	$("#btnRelease").click(function(){
		input[0]='release_pc';
		if(confirm("Do you still want to release all these taken Computers")){
			saveData(input,"tables?training="+station_id);
		}
	});
	$("a.btn_pc_edit").click(function(){
		var table_id=$(this).attr("table_id");
		var computer_name=$(this).attr("computer_name");
		var computer = prompt("Computer name", computer_name);

		if (computer != null) {
			input[0]="edit_computer";
			input[1]=table_id;
			input[2]=computer;
			saveData(input,"tables?training="+station_id);
		}
	});
	$("a.btn_verify").click(function(){
		var candidate_id=$(this).attr("candidate_id");
		if(confirm("Are you Sure you want to Verify this user with NID: "+candidate_id)){
			input[0]="verify_candidate";
			input[1]=candidate_id;
			saveData(input,"data?training=1&action=approved");
		}
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
                	window.location='data?training='+station_id;
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
		$("#p_trainee").html("You are Approving Candidate "+names+" with Id number: "+number);
		$("#trainee_info").val(number);
	});
	$("a.deleteUser").click(function(){
		var user_id=$(this).attr("user_id");
		input[0]="remove_user";
		input[1]=user_id;
		if(confirm("Are you Sure you want to Delete this User With ID : "+user_id)){
			saveData(input,"dashboard?request=system_users");
		}
	});
	$("a.desactivateUser").click(function(){
		var user_id=$(this).attr("user_id");
		input[0]="disable_user";
		input[1]=user_id;
		if(confirm("Are you Sure you want to Desactivate this User With ID : "+user_id+" You can Activate Him/Her as you want")){
			saveData(input,"dashboard?request=system_users");
		}
	});
	$("a.activateUser").click(function(){
		var user_id=$(this).attr("user_id");
		input[0]="activate_user";
		input[1]=user_id;
		if(confirm("Are you Sure you want to Activate this User With ID : "+user_id)){
			saveData(input,"dashboard?request=system_users");
		}
	});
	$("a.tableDelete").click(function(){
		var table_id=$(this).attr("table_id");
		input[0]="remove_table";
		input[1]=table_id;
		if(confirm("Are you Sure you want to Delete this Table With ID : "+table_id)){
			saveData(input,"tables?training="+station_id);
		}
	});
	$("a.btnDesactivatePc").click(function(){
		var table_id=$(this).attr("table_id");
		input[0]="desactivate_pc";
		input[1]=table_id;
		if(confirm("Are you Sure you want to Desactivate this PC With ID : "+table_id)){
			saveData(input,"tables?training="+station_id);
		}
	});
	$("a.slotDelete").click(function(){
		var slot_id=$(this).attr("slot_id");
		input[0]="delete_slot";
		input[1]=slot_id;
		if(confirm("Are you Sure you want to Delete this Time Slot With ID : "+slot_id)){
			saveData(input,"tables?training="+station_id+"&action=time_slot");
		}
	});
	$("#frm_save_user").submit(function(e){
		e.preventDefault();
		var names=$("#names").val();
		var email=$("#email").val();
		var user_type=$("#select_type").val();
		var pwd=$("#pwd").val();
		var cpwd=$("#cpwd").val();

		if(pwd.length>=6){
			if(pwd.match(cpwd)){
				input[0]='save_user';
				input[1]=names;
				input[2]=email;
				input[3]=user_type;
				input[4]=pwd;
				saveData(input,"dashboard?request=system_users");
			}else{
				alert("Passwords Do not Match");
			}
		}else{
			alert("Password Must atleast 6 Characters");
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
		saveData(input,"data?training="+station_id);
	});

	$("#frm_save_table").submit(function(e){
		e.preventDefault();
		var Tablename=$("#Tablename").val();
		var Tablenumber=$("#Tablenumber").val();
		var input=[];
		input[0]='save_table';
		input[1]=Tablename;
		input[2]=Tablenumber;
		saveData(input,"tables?training="+station_id);
	});
	$("#frm_save_slot").submit(function(e){
		e.preventDefault();
		var startTime=$("#startTime").val();
		var endTime=$("#endTime").val();
		input[0]='save_slot';
		input[1]=startTime;
		input[2]=endTime;
		saveData(input,"tables?training="+station_id+"&action=time_slot");
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
		$("#displayTime").html("Isaha : "+time);
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
			window.location=redirectUrl;
		}
	});
}
function loginRequest(email,password,station){
	showLoader();
	var url="log_user";
	$.post(url,{
		email:email,
		password:password,
		station:station
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