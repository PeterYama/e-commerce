<?php
require_once '../ajax/db_controller.php';
require_once './head.php';
$db = new db_Controller;
$conn = $db->getConnection();
$sql = $_POST['sql'];
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
echo '<div class="row" id="products-row">';
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
echo '</div>';
}
?>