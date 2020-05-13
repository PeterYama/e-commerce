<?php
    session_start();
    $_SESSION['product_id'] = $_POST['product_id'];
    header("Location: http://localhost/e-commerce/sections/product-details.php", true, 302);
    echo 'current session on test' . $_SESSION['product_id'];
    exit();
?>