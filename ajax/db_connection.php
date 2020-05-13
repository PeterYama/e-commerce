<?php

	class db_Connection {

	private $dbhost; 
	private $dbuser; 
	private $dbpass; 
	private $dbname; 
	private $conn;
	
		function __construct(){
			$this->dbhost = 'localhost';
			$this->dbuser = 'root';
			$this->dbpass = '';
			$this->dbname = 'e_commerce_db';
			$this->getConnection();
		}

		public function getConnection(){
			$this->conn = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
			return $this->conn;
		}

	}
?>