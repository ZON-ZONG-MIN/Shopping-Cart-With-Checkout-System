<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="img/cart.png" type="image/x-icon">
    <title>Shopping Cart</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-md">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="font-family: 'Permanent Marker', cursive; font-size: 23px;">
        <img src="img/shopping-bag.png" alt="cart" width="34" height="34" class="rounded-pill">
        Shopping Cart
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>
          <span id="cart-item" class="badge bg-danger"></span></a>
        </li>
      <?php
        if (isset($_SESSION["userId"])) {
          echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='profile.php'>Profile</a></li>";
          echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='includes/logout.inc.php'>Log out</a></li>";
        } else {
          echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='signup.php'>Sign up</a></li>";
          echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='login.php'>Log in</a></li>";
        }
      ?>
      </ul>
    </div>
  </div>
</nav>