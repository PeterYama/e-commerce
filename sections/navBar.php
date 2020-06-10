<?php
require_once __DIR__ . '/head.php';
?>

<!-- Navigation -->
<nav class="navbar navbar-dark bg-dark static-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="/e-commerce">
      <img src="/e-commerce/icons/serra-de-vaivem.png" width="30" height="30" alt="">
    </a>

    <!-- Search form -->
    <div class="w-50">
      <input id="search-bar" class="form-control" name="userSelection" style="display:none;" type="text" placeholder="Search" aria-label="Search">
    </div>
    <div">
      <a id="cart-icon" href="#" style="color: white; display:none;" class="material-icons large">
        shopping_cart
      </a>
      <a href="#" id="profile-icon"class="material-icons large ml-2" style="color: white;">
        account_circle
      </a>
    </div>

  </div>
</nav>

<!-- main content start -->
<div id="result">

  <!-- Page Content -->
  <div class="container-fluid p-3 title text-center mb-5" style="background-color: #efefef">
    <h2 class="title">AG Store</h2>
  </div>