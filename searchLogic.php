<?php
require_once __DIR__ . '/ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();
$sql = $_POST["sql"];
$result = $conn->query($sql);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST["sql"])){
        echo '<div class="row" id="products-row">';
            if ($result->num_rows > 0) {
            // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4 productCard" id="' . $row['P_ID'] . '">';
                    echo '  <div class="card h-100">';
                    echo '        <a href="#"><img class="card-img-top" src="./../images/' . $row['P_Image'] . '.jpg" alt=""></a>';
                    echo '        <div class="card-body">';
                    echo '          <h4 class="card-title">';
                    echo '            <a href="#">' . $row['P_Name'] . '</a>';
                    echo '          </h4>';
                    echo '          <h5>$' . $row['P_Price'] . ' AUD</h5>';
                    echo '          <p class="card-text">' . $row['P_Description'] . '</p>';
                    echo '        </div>';
                    echo '        <div class="card-footer">';
                    echo '          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
                    echo '        </div>';
                    echo '      </div>';
                    echo '    </div>';
                };
            } 
            else 
            {
                echo '
                    <div class="container d-flex justify-content-center text-center mt-5">
                        <div class="row">
                            <div class="col mt-5">
                                    <h1>Did not mach any product in our database<br></h1>
                                    <h2 class="mt-5">Try looking for another product<br></h2>
                                        <span class="material-icons" style="color:black;">
                                            sentiment_satisfied_alt
                                        </span>
                                    <i class="w3-xxxlarge material-icons w3-spin mt-5" 
                                    style="color:black;"></i>
                            </div>
                        </div>
                    </div>';
            };

        echo '
            </div>
        ';
    }
};
