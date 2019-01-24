<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_names']) && !isset($_SESSION['user_type'])){
	header("Location: login");
}else{
	unset($_SESSION['user_id']);
	unset($_SESSION['user_names']);
	unset($_SESSION['user_type']);
	session_destroy();
	header("Location: login");
}
?>