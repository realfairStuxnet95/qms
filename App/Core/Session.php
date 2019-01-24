<?php 

class Session{
	protected $session_info=array();
	//check if session is setted
	public function is_session_not_started(){
		$status=false;
		if (session_status() == PHP_SESSION_NONE) {
		    $status=true;
		}else{
			$status=false;
		}
		return $status;
	}
	//set user session data
	public function set_userdata($data)
	{
		$status=false;
		if (is_array($data))
		{
			if($this->is_session_not_started()){
				session_start();
			}
			foreach ($data as $key => $value) {
				$_SESSION[$key] = $value;
			}

			$status=true;

		}else{
			$status=false;
		}
	}

	public function unset_userdata($key){
		$status=false;
		if(is_array($key)){
			foreach ($key as $k) {

				unset($_SESSION[$k]);

			}
			$status=true;
		}else{
			$status=false;
		}
	}
	public function check_key($key){
		$status=false;
		if(isset($_SESSION[$key])){
			$status=true;
		}else{
			$status=false;
		}
	}
	public function userdata($key){
		$output='';
		if(isset($_SESSION[$key])){
			$output=$_SESSION[$key];
		}else{
			$output="INVALID KEY";
		}
		return $output;
	}
	public function start_session(){
		session_start();
	}
	public function sess_destroy()
	{
		session_destroy();
	}
}
?>