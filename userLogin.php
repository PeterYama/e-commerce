<?php
require_once 'ajax/db_controller.php';

$sqlString = $userName = $userPassword = $checkBox = $key = $value = '';
$db;
// Grab the data from the login form and pass to the local variables;
foreach ($_POST as $key => $value) {
    echo $key . ": " . $value . "<br />";
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    // $checkBox = $_POST['checkBox'];  
}

checkUser($userName, $userPassword);

// check if user exist in the database, if Yes & credentialls are correct user login
function checkUser($userName, $userPassword)
{
    $db = new db_Controller;
    $sqlString = "select * FROM Users WHERE Email = " . "'" . $userName . "'";
    echo $sqlString . "<br>";
    $result = $db->read($sqlString);
    $rows = $result->fetch_assoc();
    print_r($rows);
    if ($rows > 0) {
        //if user exist check their credentials
        echo "user exist <br>";
        if ($userPassword == $rows["Password"] && $rows["Email"] == $userName) {
            echo "Password and userName is correct <br>";
        } else {
            echo "Password or UserName is incorrect <br>";
        }
    } else {
        // if no, register as a new user
        echo "user don't exist <br>"; //create a new user
        $sqlString = "insert into 'users'(
                'Email', 
                'Password', 
                ) values (UsersID.nextval,'$userName','$userPassword')";
        echo $sqlString . "<br>";
        $db->write($sqlString);
    }
}

    // if no, register as a new user
