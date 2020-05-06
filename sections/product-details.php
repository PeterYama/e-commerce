<?php
// grab the product_id that was posted
// add to Session
// get the product ID that the user has clicked 
//  run a query where product number = user selection
session_start();
$value = $_POST['product_id'];
$_SESSION["product_id"] = $value;
require_once '/xampp/htdocs/e-commerce/ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();

$product_sql  = "SELECT * FROM `tabproduct` where P_ID = " . $_SESSION["product_id"];
$product_result = $conn->query($product_sql);
if ($product_result->num_rows > 0) {
  // output data of each row
  while ($row = $product_result->fetch_assoc()) {
    // Display the selected product
    echo '
              <div class="container ">
                <div class="card mt-4">
                  <img class="img-responsive mx-auto"  src="' . $row['P_Image'] . '" alt="">
                  <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 col-sm-12">
                      <h3 class="card-title">' . $row['P_Name'] . '</h3>
                      <h4>$' . $row['P_Price'] . '.00</h4>
                      <p class="card-text pr-5">' . $row['P_Description'] . '</p>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="row">
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
                        <a href="#" class="btn btn-info btn-lg">
                          <span class="glyphicon glyphicon-shopping-cart"></span> Add to Cart
                        </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            ';

    $review_sql  = "SELECT * FROM `tabreview` where P_ID = " . $_SESSION["product_id"];
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
<!-- Product review -->
<!-- <div class="card card-outline-secondary my-4">
    <div class="card-header">
      Product Reviews
    </div>
    <div class="card-body">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
      <small class="text-muted">Posted by Anonymous on 3/1/17</small>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
      <small class="text-muted">Posted by Anonymous on 3/1/17</small>
      <hr>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
      <small class="text-muted">Posted by Anonymous on 3/1/17</small>
      <hr>
      <a href="#" class="btn btn-success">Leave a Review</a>
    </div>
  </div> -->
<!-- /.card -->

</div>
<!-- /.col-md-lg-9 -->

</div>