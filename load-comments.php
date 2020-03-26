<?php
    include 'ajax/dbh.php';
    $mysqli = new mysqli("localhost", "root", "", "ajax");
    
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }

    $newCount = $_POST['commentNewCount'];
    echo "current count: " . $newCount;

    $sql  = "SELECT * FROM commments LIMIT $newCount";
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
