<?php 
class Execute extends Query{
	private $executeArray=array();
	private $allowedTable=array("system_users","patients","patient_info","medical_records","");
	private $id_fields=array("recordId","patientId","infoId","userId");
	private $field_names=array("userId","userCode","hospitalId","email","password","Names","type","isOnline","status","regDate","recordId","patientId","doctorId","hospitalId","title","diagnosized","consultation","medics","labTest","status","isArchived","regDate");
	private $allowedOptions=array("SELECT","UPDATE","INSERT","DELETE");
	//field query
	public function field_query($table,$id_field,$id_value,$field_name){
		$result="";
		$query="SELECT ".$field_name." FROM ".$table." WHERE ".$id_field."=".$id_value;
		$output=$this->select($query);
		foreach ($output as $key => $value) {
			$result=$value[$field_name];
		}

		return $result;
	}
	public function multi_insert($table,$array){
		$query='';
		if(is_array($array)){
			$query="INSERT INTO ".$table."(";
			$i=0;
			foreach ($array as $key => $value) {
				$query.=$key;
				if($i<(count($array)-1)){
					$query.=",";
				}
				$i++;
			}
			$query.=") VALUES(";
			$j=0;
			foreach ($array as $key => $value) {
				$query.="\"$value\"";
				if($j<(count($array)-1)){
					$query.=",";
				}
				$j++;
			}
			$query.=")";
		}
		$status=$this->insert($query);
		return $query;
	}
	public function query_update($table,$where,$array){
		$status=false;
		$query='';
		if(is_array($array)){
			$query="UPDATE ".$table." SET ";
			$i=0;
			foreach ($array as $key => $value) {
				$query.=$key;
				$query.="=\"$value\"";
				if($i<(count($array)-1)){
					$query.=",";
				}
				$i++;
			}
			$query.=" WHERE ";
			$j=0;
			foreach ($where as $key => $value) {
				$query.=$key;
				$query.="=\"$value\"";
				if($j<(count($where)-1)){
					$query.="AND";
				}
				$j++;
			}
		}else{

		}
		//return $query;
		return $this->update($query);
	}
	public function select_multi_clause($table,$credentials){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			
			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function querying($query){
		return $this->select($query);
	}
	public function select_or_clause($table,$credentials){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" OR ";
				}
				$j++;
			}
			
			$output=$query;
			//$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function search_all($table,$query_search,$order_by,$status){
		$query="SELECT * FROM ".$table." WHERE status='PUBLISHED' AND ";
		$j=0;
		foreach ($query_search as $key => $search) {
			$query.=$key.' LIKE "%'.$search.'%"';
			if($j<(count($query_search)-1)){
				$query.=" OR ";
			}
			$j++;
		}
		//$query.=" AND status='PUBLISHED'";
		$query.=" ORDER BY ".$order_by;
		if($status){
			$query.=" ASC";
		}else{
			$query.=" DESC";
		}
		return $this->select($query);
		//return $query;
	}
	public function select_all_order_by($table,$order_by,$status){
		$query="SELECT * FROM ".$table." ORDER BY ".$order_by;
		if($status){
			$query.=" ASC ";
		}else{
			$query.=" DESC ";
		}
		return $this->select($query);
	}
	public function table_rows($table){
		$query="SELECT * FROM ".$table;
		return $this->rows($query);
	}
	public function select_all($table){
		$query="SELECT * FROM ".$table;
		return $this->select($query);
	}
	public function select_not($table,$credentials){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'!='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			
			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function select_multi_not($table,$credentials,$not){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			$query.=" AND ";
			$k=0;
			foreach ($not as $key1 => $no) {
				$query.=$key1.'!='."\"".$no."\"";
				if($k<(count($not)-1)){
					$query.=" AND ";
				}
				$k++;
			}			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function select_all_not_order_by($table,$credentials,$not,$order_by,$status){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			$query.=" AND ";
			$k=0;
			foreach ($not as $key1 => $no) {
				$query.=$key1.'!='."\"".$no."\"";
				if($k<(count($not)-1)){
					$query.=" AND ";
				}
				$k++;
			}
			$query.=" ORDER BY ".$order_by;
			if($status){
				$query.=" ASC";
			}else{
				$query.=" DESC";
			}
			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function multi_select($table,$credentials){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT ";
			$i=0;
			foreach ($credentials as $key => $value) {
				$query.=$key;
				if($i<(count($credentials)-1)){
					$query.=",";
				}
				$i++;
			}
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			
			//$output=$query;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function select_clause_order_by($table,$credentials,$order_by,$status){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			$query.=" ORDER BY ".$order_by;
			if($status){
				$query.=" ASC";
			}else{
				$query.=" DESC";
			}
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function select_order_limit($table,$credentials,$order_by,$limit,$status){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			$query.=" ORDER BY ".$order_by;
			if($status){
				$query.=" ASC";
			}else{
				$query.=" DESC";
			}
			$query.=" LIMIT ".$limit;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function select_greater_less_than($table,$credentials,$compare,$less){
		$output=array();
		if(is_array($credentials)){
			$query="SELECT *";
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'>'."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			$k=0;
			$query.=" AND ";
			foreach ($compare as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($k<(count($compare)-1)){
					$query.=" AND ";
				}
				$k++;
			}
			$i=0;
			$query.=" AND ";
			foreach ($less as $key => $value) {
				$query.=$key.'<'."\"".$value."\"";
				if($i<(count($less)-1)){
					$query.=" AND ";
				}
				$i++;
			}
			// $query.=" ORDER BY ".$order_by;
			// if($status){
			// 	$query.=" ASC";
			// }else{
			// 	$query.=" DESC";
			// }
			//$query.=" LIMIT ".$limit;
			$output=$this->select($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}
	public function row_counter($table,$credentials){
		$output=0;
		if(is_array($credentials)){
			$query="SELECT ";
			$i=0;
			foreach ($credentials as $key => $value) {
				$query.=$key;
				if($i<(count($credentials)-1)){
					$query.=",";
				}
				$i++;
			}
			$query.=" FROM ".$table." WHERE ";
			$j=0;
			foreach ($credentials as $key => $value) {
				$query.=$key.'='."\"".$value."\"";
				if($j<(count($credentials)-1)){
					$query.=" AND ";
				}
				$j++;
			}
			
			//$output=$query;
			$output=$this->rows($query);
			return $output;
		}else{
			return "INVALID INPUTS";
		}
	}

}
?>