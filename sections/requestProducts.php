<?php
require_once '../ajax/db_controller.php';
$db = new db_Controller;
$conn = $db->getConnection();
$sql = $_POST['sql'];
$result = $conn->query($sql);
if (($result->num_rows > 0) || ($result)) {
  // output data of each row
echo '<div class="row" id="products-row">';
  while ($row = $result->fetch_assoc()) {
    echo '<div class="col-lg-4 col-md-6 mb-4 productCard" id="' . $row['P_ID'] . '">';
    echo '  <div class="card h-100">';
    echo '        <a href="#"><img class="card-img-top" src="./../images/' . $row['P_Image'] . '.jpg" alt=""></a>';
    echo '        <div class="card-body">';
    echo '          <h4 class="card-title">';
    echo '            <b><a href="#">' . $row['P_Name'] . '</a></b>';
    echo '          </h4>';
    if($row['P_DiscPrice'] > 0 ){
      //product has discount
      echo '<em>Todays Special: <strike><h5>$ '. $row['P_Price'] . ' .00 AUD</h5></strike></em>';
      echo '<h4><b>Now: $ '. $row['P_DiscPrice'] . ' AUD</b></h4>';
    }else{
      //do not have a discount
      echo '          <h5>$' . $row['P_Price'] . ' AUD</h5>';
    }
    echo '          <p class="card-text">' . $row['P_Description'] . '</p>';
    echo '        </div>';
    echo '        <div class="card-footer">';
    echo '          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>';
    echo '          <small class="text-muted ml-3">Release Date: '.$row['P_ReleaseDate'].'</small>';
    echo '        </div>';
    echo '      </div>';
    echo '    </div>';
  };
echo '</div>';
}
?>
