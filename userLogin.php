<?php
session_start();
require_once 'ajax/db_controller.php';


$stmt = $sqlString = $userName = $userPassword =
$db = $checkBox = $key = $value = '';
// Grab the data from the login form and pass to the local variables;
foreach ($_POST as $key => $value) {
    echo $key . ": " . $value . "<br />";
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $checkBox = $_POST['checkBox'];  
}

// check if user exist in the database, if Yes 
// & credentialls are correct user login
$db = new db_Controller;
$db->readStmt($userName,$userPassword);

// make the browser remember the user password if checkbox is true
if(!empty($checkBox)) {
    echo 'check box: ' . $checkBox . "<br>";
    setcookie ("member_login",$_POST[$userName],time()+ (10 * 365 * 24 * 60 * 60));
} else {
    if(isset($_COOKIE["member_login"])) {
        setcookie ("member_login","");
    }
}