<?php
include 'ajax/dbh.php';
$mysqli = new mysqli("localhost", "root", "", "ajax");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
// php method to pring an array
// print_r($_POST);

foreach ($_POST as $key => $value) {
    echo $key . ": " . $value . "<br />";
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
    $checkBox = $_POST['checkBox'];
}

echo $userName;
echo '<br>';
echo $userPassword;
echo '<br>';
echo $checkBox;

$sql  = "INSERT INTO users ('userName', 'userPassword', 'checkBox')
    VALUES ($userName, $userPassword, $checkBox)";



// if ($_POST['submit'] != null) {
// }else{
//     echo $_POST['submit'];
// }
// echo '<p>';
// echo $userName;
// echo '<br>';
// echo $userpassword;
// echo '</p>';
