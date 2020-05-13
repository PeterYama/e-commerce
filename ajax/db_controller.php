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

    public function writeStmt($email, $password)
    {
        $stmt = $this->conn->prepare("insert into users (Email, Password) VALUES (?, ?)");
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ss", $email, $hash);
        $result = $stmt->execute();
        if ($result) {
            echo 'user Saved';
        } else {
            echo 'fail to execute write statment';
        }
        $stmt->close();
    }

    public function readStmt($user, $password)
    {
        /**
         * Will return true if the user exist in the database
         */
        $stmt = $this->conn->prepare("select * from users where Email = ?");
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
           $row = $result->fetch_assoc();
                // check user credentials
                echo 'user input: <br>' . $password;
                echo 'pass from the data base <br>' . $row['Password'] ;
                if (password_verify($password,$row['Password'])) {
                    echo "Welcome " . $row['Email'];
                    header("Location: http://localhost/e-commerce/sections/products.php");
                    exit();
                } else {
                    echo "Password or UserName is incorrect <br>";
            }
        }
        else
        {
            // user don't exist, creating a new one
            $this->writeStmt($user,$password);
        }
        $stmt->close();
    }

    public function write($sql)
    {
        echo "sql statment inside write:" . $sql;
        if ($this->conn->query($sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "" . mysqli_error($this->conn);
        }
    }

    public function update()
    {
        echo "inside read <br>";
    }
    public function delete()
    {
        echo "inside read <br>";
    }
}
