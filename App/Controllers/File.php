<?php 

class File extends Execute{

	public function insertTrainee($training_id,$trainee_names,$lnames,$trainee_number,$reg_id,$train_date,$train_time){
		$array=array("training_id"=>$training_id,"trainee_names"=>$trainee_names,"lnames"=>$lnames,"trainee_number"=>$trainee_number,"reg_id"=>$reg_id,"train_date"=>$train_date,"train_time"=>$train_time,"status"=>'UNAPPROVED');
		return $this->multi_insert(Tables::file_upload(),$array);
	}

	public function loadTrainees($status,$station_id){
		$credentials=array("status"=>$status,"training_id"=>$station_id);
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		return $this->select_multi_clause(Tables::file_upload(),$credentials);
	}
	public function loadTimeslot(){
		return $this->select_all_order_by(Tables::time_slot(),"name",true);
	}
	public function releaseComputers(){
		$sql="UPDATE ".Tables::system_tables()." SET status='AVAILABLE'";
		return $this->updating($sql);
	}
	public function loadSystemUsers(){
		$query="SELECT * FROM ".Tables::users()." WHERE status!='DELETED' ORDER BY names DESC";
		return $this->querying($query);
	}
	public function loadStations(){
		$query="SELECT * FROM training";
		return $this->querying($query);
	}
	public function saveStation($station_name){
		$array=array("station"=>$station_name,"status"=>'ACTIVE');
		return $this->multi_insert(Tables::training(),$array);
	}
	public function checkTraining($station_id){
		$credentials=array("training_id"=>$station_id);
		$resultSet=$this->select_multi_clause(Tables::training(),$credentials);
		if(count($resultSet)>0){
			return true;
		}else{
			return false;
		}
	}
	public function getActiveSlot($currentTime){
		$sql="SELECT * FROM `time_slot` WHERE time_range<=\"$currentTime\" AND end_time>=\"$currentTime\"";
		return $this->querying($sql);
	}
	public function getSlotTime($slotId){
		$credentials=array("slot_id"=>$slotId,'status'=>'AVAILABLE');
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		$resultSet=$this->select_multi_clause(Tables::time_slot(),$credentials);
		$return_set='';
		foreach ($resultSet as $key => $value) {
			$return_set=$this->changeTimeToString($value['time_range']).' - '.$this->changeTimeToString($value['end_time']);
		}
		return $return_set;
	}
    public function changeTimeToString($timed){
        $discount_start_date = '1548662400';    
        $start_date = date('H:i:s',$timed);
        return $start_date;
    }
	public function approveTrainee($number,$table_id){
		$where=array("trainee_number"=>$number);
		$array=array("table_id"=>$table_id,"status"=>'APPROVED','train_date'=>date("d/m/Y"));
		$new_slot=array("table_id"=>$table_id);
		$new_value=array("status"=>'TAKEN');
		$new_status=$this->query_update(Tables::system_tables(),$new_slot,$new_value);
		return $this->query_update(Tables::file_upload(),$where,$array);
				
	}
	public function getFreeSystemTables(){

	}

	//get system tables
	public function getTables($status,$station_id){
		$credentials=array("status"=>$status,"training_id"=>$station_id);
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		return $this->select_multi_clause(Tables::system_tables(),$credentials);
	}
	public function getAllTables($station_id){
		$sql="SELECT * FROM ".Tables::system_tables()." WHERE status!='DELETED' AND training_id=\"$station_id\"  ORDER BY name ASC";
		return $this->querying($sql);
	}
	//get system tables
	public function getTable($table_id){
		$credentials=array("table_id"=>$table_id);
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		$resultSet=$this->select_multi_clause(Tables::system_tables(),$credentials);
		$table_number='';
		if(count($resultSet)>0){
			foreach ($resultSet as $key => $value) {
				$table_number=$value['name'];
			}
		}else{
			$table_number='No Table';
		}
		return $table_number;
	}
	public function saveTable($name,$capacity,$station_id){
		$array=array("name"=>$name,"capacity"=>$capacity,"status"=>'AVAILABLE',"training_id"=>$station_id);
		return $this->multi_insert(Tables::system_tables(),$array);
	}
	public function removeTable($tableId){
		$data=array("status"=>'DELETED');
		$where=array("table_id"=>$tableId);
		return $this->query_update(Tables::system_tables(),$where,$data);
	}
	public function updateComputer($computerId,$new_name){
		$data=array("name"=>$new_name);
		$where=array("table_id"=>$computerId);
		return $this->query_update(Tables::system_tables(),$where,$data);
	}
	public function verifyCandidate($candidate_id){
		$data=array("verified"=>'YES');
		$where=array("trainee_number"=>$candidate_id);
		return $this->query_update(Tables::file_upload(),$where,$data);
	}
	public function removeUser($userId){
		$data=array("status"=>'DELETED');
		$where=array("user_id"=>$userId);
		return $this->query_update(Tables::users(),$where,$data);
	}
	public function saveUser($names,$email,$type,$pwd){
		$array=array("names"=>$names,"email"=>$email,"user_type"=>$type,"password"=>$pwd,'status'=>'ACTIVE');
		return $this->multi_insert(Tables::users(),$array);
	}
	public function desactivateUser($userId){
		$data=array("status"=>'INACTIVE');
		$where=array("user_id"=>$userId);
		return $this->query_update(Tables::users(),$where,$data);
	}
	public function activateUser($userId){
		$data=array("status"=>'ACTIVE');
		$where=array("user_id"=>$userId);
		return $this->query_update(Tables::users(),$where,$data);
	}
	public function desactivatePc($tableId){
		$data=array("status"=>'DESACTIVATED');
		$where=array("table_id"=>$tableId);
		return $this->query_update(Tables::system_tables(),$where,$data);
	}
	//save timeslot
	public function saveSlot($startTime,$endTime){
		$array=array("start_time"=>$startTime,"end_time"=>$endTime,"status"=>'ACTIVE');
		return $this->multi_insert(Tables::time_slot(),$array);
	}
	//get time slot
	public function getTimeSlot($status){
		$credentials=array("status"=>$status);
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		return $this->select_multi_clause(Tables::time_slot(),$credentials);
	}
	public function removeSlot($slotId){
		$data=array("status"=>'DELETED');
		$where=array("id"=>$slotId);
		return $this->query_update(Tables::time_slot(),$where,$data);
	}

	//Manage Tables
	public function getFreeTables(){
		$query="SELECT system_tables.number FROM system_tables INNER JOIN uploaded_file ON system_tables.table_id!=uploaded_file.table_id";
		return $this->querying($query);
	}

	public function validateNID($nid){
		$query="SELECT * FROM uploaded_file WHERE trainee_number=\"$nid\"";
		$resultSet=$this->querying($query);
		return $resultSet;
	}
	public function getFreeTable(){
		$query="SELECT * FROM system_tables WHERE status='AVAILABLE'";
		$resultSet=$this->querying($query);
		$table_id=0;
		foreach ($resultSet as $key => $value) {
			$table_id=(int)$value['table_id'];
			break;
		}
		return $table_id;
	}
	public function checkTables($slot_id,$table_id){
		$query="SELECT * FROM system_tables";
		$resultSet=$this->querying($query);
		$query1="SELECT * FROM uploaded_file WHERE slot_id=11 AND table_id=8";
		$resultSet1=$this->querying($query1);

		$difference=array_diff($resultSet, $resultSet1);
		return $difference;
	}

	public function assignRandomTable($candidateId,$table_id){
		$data=array("table_id"=>$table_id);
		$where=array("trainee_number"=>$candidateId);
		return $this->query_update(Tables::users(),$where,$data);
	}

	public function checkUsersSlot($slot_id){
		$query="SELECT * FROM ".Tables::users()." WHERE slot_id=\"$slot_id\"";
		$counter=$this->rows_counting($query);
		$query1="SELECT * FROM ".Tables::system_tables();
		$counter2=$this->rows_counting($query1);

		if($counter>=$counter2){
			return false;
		}else{
			return true;
		}
	}
	public function checkUsersTables($table_id){
		$query="SELECT * FROM ".Tables::users()." WHERE table_id=\"$table_id\"";
		$nums=$this->rows_counting($query);
		if($nums>0){
			return false;
		}else{
			return true;
		}
	}
	public function checkTablesAgainstSlot(){
		$query="SELECT * FROM ".Tables::system_tables()." WHERE status='AVAILABLE'";
		$resultSet=$this->querying($query);
		if(count($resultSet)>0){
			return true;
		}else{
			return false;
		}
	}

	//MANAGE SYSTEM DISPAY
	public function systemDisplay($status,$compare_date){
		$sql="SELECT * FROM uploaded_file WHERE status=\"$status\" and savedDate LIKE \"%$compare_date%\"";
		return $this->querying($sql);
	}
	public function SystemOutput($compare_date){
		$sql="SELECT * FROM uploaded_file WHERE status='APPROVED' and savedDate LIKE \"%$compare_date%\"";
		return $this->querying($sql);
	}
}
$upload=new File();
?>