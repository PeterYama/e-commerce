<?php
require_once __DIR__ . '/db_connection.php';
// Db controller inherits the connection
class db_Controller extends db_Connection
{
    private $conn;
    //constructor call the parent constructor that has the connection
    function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }
}
