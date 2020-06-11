<?php
session_start();
require_once '../ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();
$user = $_POST['userName'];
$password = $_POST['userPassword'];

$stmt = $conn->prepare("select * from users where Email = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // check user credentialscartArray
    if (password_verify($password, $row['Password'])) {
        echo "Welcome " . $row['Email'];
        header("Location: /sections/products.php");
        exit();
    } else {
        echo '
        <div class="container d-flex justify-content-center text-center mt-5">
                <div class="row">
                    <div class="col mt-5">
                            <h1>User Exist but...<br></h1>
                            <h2 class="mt-5">Password is incorrect<br></h2>
                            <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                            style="color:black;">refresh</i>
                    </div>
                </div>
            </div>';
        header("Refresh: 3; /index.php");
    }
    $stmt->close();
} else {
    echo '
        <div class="container d-flex justify-content-center text-center mt-5">
                <div class="row">
                    <div class="col mt-5">
                            <h1>Error: User dont exist<br></h1>
                            <h2 class="mt-5">Create a new account<br></h2>
                                <span class="material-icons" style="color:black;">
                                    sentiment_satisfied_alt
                                </span>
                            <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                            style="color:black;"></i>
                    </div>
                </div>
            </div>';
    header("Refresh: 3; /index.php");
}
