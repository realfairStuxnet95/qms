<?php
$login_url="login";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type']) && !isset($_SESSION['user_names'])){
    	header("Location:$login_url");
    }
}else{
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_type']) && !isset($_SESSION['user_type'])){
    	header("Location:$login_url");
    }
}
?>