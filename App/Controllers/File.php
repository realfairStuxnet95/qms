<?php 

class File extends Execute{

	public function insertTrainee($training_id,$trainee_names,$trainee_number,$train_date,$train_time){
		$array=array("training_id"=>$training_id,"trainee_names"=>$trainee_names,"trainee_number"=>$trainee_number,"train_date"=>$train_date,"train_time"=>$train_time,"status"=>'UNAPPROVED');
		return $this->multi_insert(Tables::file_upload(),$array);
	}

	public function loadTrainees($status){
		$credentials=array("status"=>$status);
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		return $this->select_multi_clause(Tables::file_upload(),$credentials);
	}
	public function loadTimeslot(){
		return $this->select_all_order_by(Tables::time_slot(),"name",true);
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
	public function approveTrainee($number,$slot_id,$table_id){
		$where=array("trainee_number"=>$number);
		$array=array("slot_id"=>$slot_id,"table_id"=>$table_id,"status"=>'APPROVED');
		$new_slot=array("table_id"=>$table_id);
		$new_value=array("status"=>'TAKEN');
		$update=$this->query_update(Tables::system_tables(),$new_slot,$new_value);
		if($update){
			return $this->query_update(Tables::file_upload(),$where,$array);
		}else{
			return false;
		}
				
	}

	//get system tables
	public function getTables($status){
		$credentials=array("status"=>$status);
		//return $this->select_all_order_by(Tables::time_slot(),"name",true);
		return $this->select_multi_clause(Tables::system_tables(),$credentials);
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
	public function saveTable($name,$capacity){
		$array=array("name"=>$name,"capacity"=>$capacity,"status"=>'AVAILABLE');
		return $this->multi_insert(Tables::system_tables(),$array);
	}
	public function removeTable($tableId){
		$data=array("status"=>'DELETED');
		$where=array("table_id"=>$tableId);
		return $this->query_update(Tables::system_tables(),$where,$data);
	}
	//save timeslot
	public function saveSlot($startTime,$endTime){
		$array=array("name"=>"Today TimeSlot","time_range"=>$startTime,"end_time"=>$endTime,"status"=>'AVAILABLE');
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
		$where=array("slot_id"=>$slotId);
		return $this->query_update(Tables::time_slot(),$where,$data);
	}

	//Manage Tables
	public function getFreeTables(){
		$query="SELECT * FROM ".Tables::system_tables()." WHERE status='AVAILABLE'";
		return $this->querying($query);
	}

	public function getFreeTable(){
		$query="SELECT * FROM ".Tables::system_tables()." WHERE status='AVAILABLE'";
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
}
$upload=new File();
?>