<?php 
$server="localhost";
$user="root";
$pwd='';
$db='queue_store';
require $_SERVER['DOCUMENT_ROOT'].'/queue/classes_loader.php';
$con=mysqli_connect($server,$user,$pwd,$db);
if($con){
	if(isset($_GET['nid']) && $_GET['nid']!=''){
		$nid=$_GET['nid'];
		$response=$upload->validateNID($nid);
		if(count($response)>0){
			$pc_id=$upload->getFreeTable();
			$approve=$upload->approveTrainee($nid,$pc_id);
			if($approve){
				$response=$upload->validateNID($nid);
				$response_array=array();
				foreach ($response as $key => $value) {
					$data[]=array("trainee_names"=>$value['trainee_names'],"trainee_number"=>$value['trainee_number'],"reg_number"=>$value['reg_id'],"train_time"=>$value['train_time'],"pc"=>$upload->getTable($pc_id));
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