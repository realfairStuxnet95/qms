<?php 
require $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
require $_SERVER['DOCUMENT_ROOT'].'/queue/authorization.php';
$success="200";
$error="403";
if(isset($_POST['input'])){
	if(is_array($_POST['input'])){
		$input=$_POST['input'];
		//get action
		$action=$function->sanitize($input[0]);
		if($action=='approve_user'){
			$number=$function->sanitize($input[1]);
			$slot_id=$function->sanitize($input[2]);

			$free_table=$upload->getFreeTable();
			//echo $free_table;
			//die();
			$state=$upload->approveTrainee($number,$free_table);
			if($state){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='save_table'){
			$tableName=$function->sanitize($input[1]);
			$tableNumber=$function->sanitize($input[2]);
			$state=$upload->saveTable($tableName,$tableNumber,$_SESSION['station']);
			if($state){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='remove_table'){
			$tableId=$function->sanitize($input[1]);
			$remove_status=$upload->removeTable($tableId);
			if($remove_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='remove_user'){
			$userId=$function->sanitize($input[1]);
			$remove_status=$upload->removeUser($userId);
			if($remove_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='disable_user'){
			$userId=$function->sanitize($input[1]);
			$remove_status=$upload->desactivateUser($userId);
			if($remove_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='activate_user'){
			$userId=$function->sanitize($input[1]);
			$remove_status=$upload->activateUser($userId);
			if($remove_status){
				echo $success;
			}else{
				echo $error;
			}
		}
		elseif($action=='desactivate_pc'){
			$tableId=$function->sanitize($input[1]);
			$status=$upload->desactivatePc($tableId);
			if($status){
				$success;
			}else{
				echo $error;
			}
		}elseif($action=='save_user'){
			$names=$function->sanitize($input[1]);
			$email=$function->sanitize($input[2]);
			$type=$function->sanitize($input[3]);
			$pwd=$function->sanitize($input[4]);
			$save_status=$upload->saveUser($names,$email,$type,$pwd);
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}
		elseif($action=='check_slot'){
			$currentTime=strtotime($input[1]);
			$result=$upload->getActiveSlot($currentTime);
			if(count($result)>0){
				$response='';
				foreach ($result as $key => $value) {
					$response=$function->changeTimeToString($value['time_range']).' - '.$function->changeTimeToString($value['end_time']);
				}
				echo $response;
			}else{
				echo "No Active Slot";
			}
			//echo $currentTime;
		}elseif($action=='save_slot'){
			$startTime=$input[1];
			$endTime=$input[2];
			$save_status=$upload->saveSlot($startTime,$endTime);
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='delete_slot'){
			$slotId=$function->sanitize($input[1]);
			$remove_status=$upload->removeSlot($slotId);
			if($remove_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='release_pc'){
			$release_status=$upload->releaseComputers();
			if($release_status){
				echo $success;
			}else{
				$error;
			}
		}elseif($action=='add_station'){
			$station_name=$function->sanitize($input[1]);
			$save_status=$upload->saveStation($station_name);
			if($save_status){
				echo $success;
			}else{
				echo $error;
			}
		}elseif($action=='edit_computer'){
			$computer_id=$function->sanitize($input[1]);
			$new_name=$function->sanitize($input[2]);
			$update_status=$upload->updateComputer($computer_id,$new_name);
			if($update_status){
				echo $success;
			}else{
				echo $error;
			}
		}
	}	
}else{

}
?>