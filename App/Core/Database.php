<?php 

class Database{

	//properties
	private $server;
	private $database;
	private $user;
	private $password;

	protected function connect(){
		$this->server="localhost";
		$this->user="root";
		$this->password="Police@123!@";
		$this->database="queue_store";

		$conn=new mysqli($this->server,$this->user,$this->password,$this->database);

		return $conn;
	}
}
?>