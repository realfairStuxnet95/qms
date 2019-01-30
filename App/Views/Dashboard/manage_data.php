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
			$slot_id=$function->sanitize($input[2]);
			// echo $slot_id;
			// die();
			if($slot_id!=''){
				$free_table=$upload->getFreeTable();
				// echo $free_table;
				// die();
				$state=$upload->approveTrainee($number,$slot_id,$free_table);
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
		}elseif($action=='remove_table'){
			$tableId=$function->sanitize($input[1]);
			$remove_status=$upload->removeTable($tableId);
			if($remove_status){
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
		}
	}	
}else{

}
?>