<?php
// grab the product_id that was posted
// add to Session
// get the product ID that the user has clicked 
//  run a query where product number = user selection
session_start();
// $value = $_POST['product_id'];
require_once '../ajax/db_controller.php';
$_SESSION['product_id'] =$_POST['product_id'];
// require_once '/xampp/htdocs/e-commerce/ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();
$product_sql  = "SELECT * FROM `tabproduct` where P_ID = " . $_SESSION['product_id'];
$product_result = $conn->query($product_sql);
if ($product_result->num_rows > 0) {
  // output data of each row
  while ($row = $product_result->fetch_assoc()) {
    // Display the selected product
    echo '
              <div class="container" id="result">
                <div class="card mt-4">
                  <img class="img-responsive mx-auto mt-5"  src="./../images/'.$row['P_Image'].'.jpg" alt="">
                  <div class="card-body my-4 ml-5">
                  <div class="row mt-5">
                    <div class="col-md-6 col-sm-12">
                      <h3 class="card-title">' . $row['P_Name'] . '</h3>
                      <h4>$' . $row['P_Price'] . '.00</h4>
                      <p class="card-text pr-5">' . $row['P_Description'] . '</p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="row ml-3">
                        <div class="col-md-6 mt-3">
                          <p>Price</p>
                          <p>Stock</p>
                          <p>Click and Collect</p>
                        </div>
                        <div class="col-md-6 mt-3 ">
                          <p>$' . $row['P_Price'] . '.00</p>
                          <p style="color: orange;">In Stock</p>
                          <p style="color: blue;">Not Available</p>
                        </div>
                        <br>
                        <div class="container d-flex justify-content-center mt-3">
                        <button class="btn btn-info btn-lg" id="cart-btn">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
                        </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            ';

    $review_sql  = "SELECT * FROM `tabreview` where P_ID = " . $_SESSION['product_id'];
    $review_result = $conn->query($review_sql);
    //Display Product review
    echo '
        <div class="card card-outline-secondary my-4">
        <div class="card-header">
          Product Reviews
          <br>
          <br>
        ';
    // require __DIR__ . "/divider.php";
    while ($review_row = $review_result->fetch_assoc()) {
      echo '
          </div>
          <div class="card-body">
     
            <p>' . $review_row['R_Text'] . '</p>
            <small class="text-muted">' . $review_row['R_UserName'] . '</small>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
            <hr>
          ';
    };
    echo '
            <a href="#" class="btn btn-success">Leave a Review</a>
            </div>
          </div>
        ';
  };
} else {
  echo "0 results";
}
?>