<?php
require_once __DIR__ .'\navBar.php';
require_once '../ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();
session_start();


//avoid form resubmission on reload 
if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    $stmt = $conn->prepare("INSERT INTO `tabreview`(`P_ID`, `R_Stars`, `R_Text`, 
    `R_UserName`) 
    VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $P_ID, $R_Stars, $R_Text,$R_UserName);
    // bind params
    $P_ID = $_SESSION['product_id'];
    $R_Stars = $_POST['input-21e'];
    $R_Text = $_POST['message'];
    $R_UserName = $_POST['name'];
    $reponse = $stmt->execute();

    if($reponse == TRUE){
        echo '
        <div class="container d-flex justify-content-center text-center mt-5">
            <div class="row">
                <div class="col mt-5">
                        <h1>Success !<br></h1>
                        <h2 class="mt-5">Thanks for your review !<br></h2>
                </div>
            </div>
        </div>';
    }else{
        echo '
        <div class="container d-flex justify-content-center text-center mt-5">
            <div class="row">
                <div class="col mt-5">
                        <h1>Something went wrong<br></h1>
                        <h2 class="mt-5">Try again<br></h2>
                        <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                        style="color:black;">refresh</i>
                </div>
            </div>
        </div>';
    }
}else{
    echo '
        <div class="container d-flex justify-content-center text-center mt-5">
            <div class="row">
                <div class="col mt-5">
                        <h1>Thanks for your review<br></h1>
                        <h2 class="mt-5">There are more products for you to see<br></h2>
                        <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                        style="color:black;">refresh</i>
                </div>
            </div>
        </div>';
}


?>