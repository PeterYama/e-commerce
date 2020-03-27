<?php
include 'ajax/dbh.php';
$mysqli = new mysqli("localhost", "root", "", "ajax");

if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- load J-Query before use -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- JQuery comands here  -->
  <script src="myscripts.js"></script>

  

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="sections/landing.css" class="ref">
  <link rel="stylesheet" href="sections/login.css" class="ref">
  <link rel="stylesheet" href="sections/footer.css" class="ref">

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Gugi&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
  <title>AG Store</title>
</head>

<body>
  <?php
  require_once "sections/navBar.php";
  require_once "sections/landing.php";
  require "sections/divider.php";
  require_once "sections/login.php";
  require "sections/divider.php";
  require_once "sections/products.php";
  require "sections/divider.php";
  require_once "sections/product-details.php";
  require "sections/divider.php";
  require_once "sections/cart.php";
  require "sections/divider.php";
  require_once "sections/footer.php";
  ?>

  <div class="container" id="comments">
    <?php
    $sql  = "SELECT * FROM commments LIMIT 2";
    $result = mysqli_query($conn, $sql);
    // Check if there is a result from the database
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<p>';
        echo $row['author'];
        echo '<br>';
        echo $row['message'];
        echo '</p>';
      }
    } else {
      echo "there are no comments!";
    }
    ?>
  </div>
  <div class="container">
    <button class="btn btn-primary">Click here</button>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>