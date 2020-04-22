<?php

require_once 'ajax/db_connection.php';

// Db controller inherits the connection
class db_Controller extends db_Connection{

    private $conn;
    //constructor call the parent constructor that has the connection
    function __construct(){
        parent::__construct();
        $this->conn = $this->getConnection();
    }

    public function read($sql){
        $result = $this->conn->query($sql);
        return $result;
    }
 
    public function write($sql){
        echo "sql statment inside write:" . $sql;
        if ($this->conn->query($sql)) {
            echo "New record created successfully";
         } else {
            echo "Error: " . $sql . "" . mysqli_error($this->conn);
         }
    }
    public function update(){
        echo "inside read <br>";
    }
    public function delete(){
        echo "inside read <br>";
    }
    
}
