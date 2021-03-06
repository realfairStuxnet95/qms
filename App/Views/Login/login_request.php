<?php
require $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
$request=array_merge($_GET,$_POST);
if((isset($request['email']) && $request['email']!="") && (isset($request['password']) && $request['password']!="" && isset($request['station']))){
	//sanitize user inputs
	$email=$function->sanitize($request['email']);
	$password=$function->sanitize($request['password']);
	$station=$function->sanitize($request['station']);
	$login_state=$login->validate_login($email, $password, $station);
	if($login_state){
		//get session data
		$sessionData=$login->session_data($email, $password);
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		foreach ($sessionData as $key => $value) {
			$_SESSION['user_id']=$value['user_id'];
			$_SESSION['user_names']=$value['names'];
			$_SESSION['user_type']=$value['user_type'];
			$_SESSION['station']=$station;
		}
		echo "200";
	}else{
		echo "Invalid credentials. Please Check Your email and Password";
	}
}else{
	echo "500";
}
?>