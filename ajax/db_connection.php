<?php
class db_Connection {

	private $dbhost = 'localhost';
	private $dbuser = 'root';
	private $dbpass = '';
	private $dbname = 'ag_games';

	protected function connect(){
		$conn = new mysqli($this->dbhost,$this->dbuser,$this->dbpass,$this->dbname);
		// $conn = new mysqli('localhost','root','','ag_games');
		return $conn;
	}
}

?>