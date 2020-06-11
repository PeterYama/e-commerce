<?php
    require_once 'navBar.php';
    require_once '../ajax/db_controller.php';
    $db = new db_Controller;
    $conn = $db->getConnection();
    $stmt = $conn->prepare("select * from users where Email = ?");
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0){
            //user already exist 
            echo '
            <div class="container d-flex justify-content-center text-center mt-5">
                <div class="row">
                    <div class="col mt-5">
                            <h1>User already exist<br></h1>
                            <h2 class="mt-5">Try again <br></h2>
                            <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                            style="color:black;">refresh</i>
                    </div>
                </div>
            </div>';
        }else{
            //user don't exist, create a new record
            //create statment
            try {
                $db = new db_Controller;
                $conn = $db->getConnection();
                $stmt = $conn->prepare("INSERT INTO `users`(`Email`, `FirstName`, `LastName`, 
                `Password`, `Gender`, `Phone`, `SecretQuestionID`, `SecretQuestionAnswer`) 
                VALUES (?,?,?,?,?,?,?,?)");
                $stmt->bind_param("ssssssss", $email, $firstName, $lastName,
                $hash, $gender, $phone, $secretQuestionID, $secretQuestionAnswer);
                // bind params
                $firstName = $_POST['firstName'];
                $lastName = $_POST['lastName'];
                $password = $_POST['password'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $secretQuestionID = $_POST['secretQuestion'];
                $secretQuestionAnswer = $_POST['secretQuestionAnswer'];
                // execute query
                $stmt->execute();
                echo '
                <div class="container d-flex justify-content-center text-center mt-5">
                    <div class="row">
                        <div class="col mt-5">
                                <h1>Success !<br></h1>
                                <h2 class="mt-5">You are now registered in our database<br></h2>
                                <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                                style="color:black;">refresh</i>
                        </div>
                    </div>
                </div>';
                $stmt->close();
            } catch (\Throwable $e) {
                echo "error: " . $e->getMessage();
            }
            
        }
