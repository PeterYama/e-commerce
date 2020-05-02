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

    // Products 
    public function getProducts()
    {
        $sql  = "SELECT * FROM `tabproduct`";
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                        echo '<div class="col-lg-4 col-md-6 mb-4 productCard" id="ProductID_'.$row['P_ID'].'">';
                        echo '  <div class="card h-100">';
                        echo '        <a href="#"><img class="card-img-top" src="'.$row['P_Image'].'" alt=""></a>';
                        echo '        <div class="card-body">';
                        echo '          <h4 class="card-title">';
                        echo '            <a href="#">'.$row['P_Name'].'</a>';
                        echo '          </h4>';
                        echo '          <h5>$'.$row['P_Price'].' AUD</h5>';
                        echo '          <p class="card-text">'.$row['P_Description'].'</p>';
                        echo '        </div>';
                        echo '        <div class="card-footer">';
                        echo '          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                        echo '        </div>';
                        echo '      </div>';
                        echo '    </div>';
                    };
            } else {
                echo "0 results";
        }
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
