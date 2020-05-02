<?php
  require_once './navBar.php';
  require_once '../ajax/db_controller.php';
  $db = new db_Controller;
?>

<div class="container ">
  <div id="result"></div>
  <div class="row">

  <?php
    $db->getProducts();
  ?>
</div>

</div>

<?php
  require_once './footer.php';
?>
