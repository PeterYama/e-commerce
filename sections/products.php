<?php
if(!isset($_SERVER['HTTP_REFERER'])){
  // redirect them to your desired location
  header('location:../index.php');
  exit;
}
require_once __DIR__ . '\navBar.php';
require_once '../ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();
//display all products to the client
$sql = "SELECT * FROM `tabproduct`";

//category search button 
  echo '
  <div class="container">
    <div class="row  mb-5">
      <div class="col text-left">
        <div class="dropdown">
          <button class="btn btn-default text-dark dropdown-toggle" type="button" data-toggle="dropdown"><b>Categories</b>
            <span class="caret"></span></button>
            <ul class="dropdown-menu">
            <li><a href="" id="Adventure">Adventure</a></li>
            <li><a href="" id="FPS">FPS</a></li>
            <li><a href="" id="Horror">Horror</a></li>
            <li><a href="" id="RPG">RPG</a></li>
            <li><a href="" id="Sport">Sport</a></li>
            <li><a href="" id="Strategy">Strategy</a></li>
          </ul>
        </div>
      </div>
      <div class="col text-center">
        <div>
          <button class="btn btn-default" id="Promotion" type="button">Promotion
          </button>
        </div>
      </div>
      <div class="col text-right">
        <div class="dropdown">
          <button class="btn btn-default text-dark border-black dropdown-toggle" type="button" data-toggle="dropdown">
          <span class="material-icons">
          sort
          </span></button>
            <ul class="dropdown-menu">
            <li><a href="" id="Cheaper">Price, low to high</a></li>
            <li><a href="" id="Expensive">Price, high to low</a></li>
            <li><a href="" id="Newer">Most recent</a></li>
            <li><a href="" id="Clasics">Oldest</a></li>
            <li><a href="" id="Name">Name</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row" id="products-row">
  ';
    $result = $conn->query($sql);
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
    } else {
      echo "0 results";
    };
  echo '
    </div>
  </div>
';
require_once './footer.php';
?>