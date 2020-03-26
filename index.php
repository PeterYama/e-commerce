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

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Gugi&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="sections/landing.css" class="ref">
  <link rel="stylesheet" href="sections/login.css" class="ref">
  <link rel="stylesheet" href="sections/footer.css" class="ref">
  <title>AG Store</title>
</head>

<body>
  <?php
  require_once "sections/navBar.php";
  // require_once "sections/landing.php";
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
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>