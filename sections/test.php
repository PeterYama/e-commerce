<?php
    require_once 'ajax/db_controller.php';
    echo "this is a test <br>";
    //The object has connection and db_controller functions
    $db = new db_Controller();
    $sql = "select * FROM Users WHERE Email = 'asdsad'";
    $result = $db->read($sql);
    if($result==true){
        echo 'success <br>';
        print_r($result);
    }else{
        echo "fail<br>";
        print_r($result);
    }
    // $row = $result->fetch_assoc();
    // print_r($row['Email']);
?>