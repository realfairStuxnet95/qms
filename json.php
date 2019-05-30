<?php 
$server="localhost";
$user="root";
$pwd='Police@123!@';
$db='queue_store';
require $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
$con=mysqli_connect($server,$user,$pwd,$db);
if($con){
	if(isset($_GET['nid']) && $_GET['nid']!=''){
		$nid=$_GET['nid'];
		$response=$upload->validateNID($nid);
		if(count($response)>0){
			$pc_id=$upload->getFreeTable();
			$approved_time=$function->getCurrentTime();
			$approve=$upload->approveTrainee($nid,$pc_id,$approved_time);
			if($approve){
				$response=$upload->validateNID($nid);
				$response_array=array();
				foreach ($response as $key => $value) {
					$data[]=array("trainee_names"=>$value['trainee_names'].' '.$value['lnames'],"trainee_number"=>$value['trainee_number'],"reg_number"=>$value['reg_id'],"train_time"=>$value['train_time'],"training_date"=>$value['train_date'],"pc"=>$upload->getTable($pc_id));
				}
				//array_push($response,array("pc"=>$upload->getTable($pc_id)));
				echo json_encode($data);
			}else{
				echo "System Error.Contact System Administrators";
			}
		}else{
			$data[]=array("No Record Found");
			echo json_encode($data);
		}
		
	}else{
		echo "Please assign NId card Number";
	}
}else{
	echo "cannot connect to database";
}
?>