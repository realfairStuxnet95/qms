<?php 


class Admin extends Execute{
	//check Member Field
	public function getFieldValue($table,$field_name,$id_name,$id_value){
		$sql="SELECT ".$field_name." FROM ".$table." WHERE ".$id_name."=\"$id_value\"";
		$result=$this->querying($sql);
		$field_value='';
		foreach ($result as $key => $value) {
			$field_value=$value[$field_name];
		}
		return $field_value;
	}

	public function getUserField($user_id,$field_name){
		$credentials=array("user_id"=>$user_id);
		$result_set=$this->select_multi_clause(Tables::users(),$credentials);
		$field_value='';
		// return $result_set;
		// die();
		foreach ($result_set as $key => $value) {
			$field_value=$value[$field_name];
		}
		return $field_value;
	}
	public function checkEmail($email){
		$sql="SELECT * FROM ".Tables::users()." WHERE email=\"$email\"";
		$result=$this->querying($sql);
		if(count($result)>0){
			return true;
		}else{
			return false;
		}
	}
	public function checkUserPassword($user_id,$password){

		$credentials=array("user_id"=>$user_id,"password"=>$password);
		$status=false;
		$resultSet=$this->multi_select("system_users",$credentials);
		if(is_array($resultSet)){
			if(count($resultSet)>0){
				foreach ($resultSet as $key => $value) {
					if($value['user_id']==$user_id && $value['password']==$password){
						$status=true;
					}
				}
			}else{
				$status=false;
			}
		}else{
			$status=false;
		}
		return $status;
	}
	public function saveSystemUser($names,$email,$type,$pwd,$station_id){
		$array=array("names"=>$names,"email"=>$email,"user_type"=>$type,"password"=>$pwd,'status'=>'ACTIVE',"station_id"=>$station_id,"verified"=>1);
		return $this->multi_insert(Tables::users(),$array);
	}
	public function updateUserPassword($user_id,$new_pwd){
		$array=array("password"=>$new_pwd);
		$where=array("user_id"=>$user_id);
		return $this->query_update(Tables::users(),$where,$array);
	}
	public function uploadedCandidates($status,$compare_date,$training_id){
		$sql="SELECT * FROM uploaded_file WHERE (status=\"$status\" AND training_id=\"$training_id\") and savedDate LIKE \"%$compare_date%\"";
		return $this->querying($sql);
	}
	public function computerReport($station_id,$status){
		$sql="SELECT * FROM ".Tables::system_tables()." WHERE training_id=\"$station_id\" AND status=\"$status\"  ORDER BY name ASC";
		return $this->querying($sql);
	}
	public function updateAbsenceStatus($compare_date){
		$sql="UPDATE uploaded_file SET status='ABSENCE' WHERE status='UNAPPROVED' savedDate LIKE \"%$compare_date%\"";
		return $this->updating($sql);
	}
}
$admin=new Admin();
?>