<?php
  require_once __DIR__ .'\navBar.php';
  session_start();
  require_once '../ajax/db_controller.php';
  $db = new db_Controller;
  $conn = $db->getConnection();
  $sql = "SELECT * FROM `tabproduct`";
?>
<!-- /.category search button -->

<div class="container">
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <!-- <input class="form-control" id="myInput" type="text" placeholder="Search.."> -->
      <li><a href="#" id="Adventure">Adventure</a></li>
      <li><a href="#" id="FPS">FPS</a></li>
      <li><a href="#" id="Horror">Horror</a></li>
      <li><a href="#" id="RPG">RPG</a></li>
      <li><a href="#" id="Sport">Sport</a></li>
      <li><a href="#" id="Strategy">Strategy</a></li>
    </ul>
  </div>
</div>
<div class="container">
  <div class="row">
  <?php
  if (isset($_POST['sql'])){
    $sql = $_POST['sql'];
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4 productCard" id="'.$row['P_ID'].'">';
                    echo '  <div class="card h-100">';
                    echo '        <a href="#"><img class="card-img-top" src="./../images/'.$row['P_Image'].'.jpg" alt=""></a>';
                    echo '        <div class="card-body">';
                    echo '          <h4 class="card-title">';
                    echo '            <a href="#">'.$row['P_Name'].'</a>';
                    echo '          </h4>';
                    echo '          <h5>$'.$row['P_Price'].' AUD</h5>';
                    echo '          <p class="card-text">'.$row['P_Description'].'</p>';
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
  }else{
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-4 col-md-6 mb-4 productCard" id="'.$row['P_ID'].'">';
                    echo '  <div class="card h-100">';
                    echo '        <a href="#"><img class="card-img-top" src="./../images/'.$row['P_Image'].'.jpg" alt=""></a>';
                    echo '        <div class="card-body">';
                    echo '          <h4 class="card-title">';
                    echo '            <a href="#">'.$row['P_Name'].'</a>';
                    echo '          </h4>';
                    echo '          <h5>$'.$row['P_Price'].' AUD</h5>';
                    echo '          <p class="card-text">'.$row['P_Description'].'</p>';
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
  };
  ?>
  </div>
  </div>
<?php
  require_once './footer.php';
?>
