<?php

class db_Controller extends db_Connection{
    
    function getAllUsers(){
        $sql = "SELECT * FROM Users";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    function getUser($UserName){
        $sql = "SELECT * FROM `users` WHERE FirstName = '$UserName'";
        echo $sql;
        echo '<br>';
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return print_r($data);
            // $data;
        }else{
            echo 'user does not exist';
        }
    }
    
}

//SELECT * FROM `users` WHERE FirstName = "Peter"