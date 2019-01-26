<?php 
require $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
$success="200";
$error="403";
if(isset($_POST['input'])){
	if(is_array($_POST['input'])){
		$input=$_POST['input'];
		//get action
		$action=$function->sanitize($input[0]);
		if($action=='approve_user'){
			$number=$function->sanitize($input[1]);
			$slot_id=$names=$function->sanitize($input[2]);
			if($slot_id!=''){
				$state=$upload->approveTrainee($number,$slot_id);
				if($state){
					echo $success;
				}else{
					echo $error;
				}
			}else{
				echo "Select slot please";
			}
		}elseif($action=='save_table'){
			$tableName=$function->sanitize($input[1]);
			$tableNumber=$function->sanitize($input[2]);
			$state=$upload->saveTable($tableName,$tableNumber);
			if($state){
				echo $success;
			}else{
				echo $error;
			}
		}
		elseif($action=='check_slot'){
			$currentTime=$input[1];
			$result=$upload->getActiveSlot($currentTime);
			var_dump($result);
		}
	}	
}else{

}
?>