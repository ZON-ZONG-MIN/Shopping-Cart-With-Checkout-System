<?php
  require 'includes/dbh.inc.php';

  $grand_total = 0;
  $allItems = '';
  $items = array();

  $sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result();
  while($row = $result->fetch_assoc()){
    $grand_total += $row['total_price'];
    $items[] = $row['ItemQty'];
  }
  /*echo "$grand_total <br>";
  foreach ($items as $value) {
    echo "$value <br>";
  }*/
?>

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
    <title>Checkout</title>
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
          <a class="nav-link" aria-current="page" href="index.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Checkout</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>
          <span id="cart-item" class="badge bg-danger"></span></a>
        </li>
      <?php
        if (isset($_SESSION["userId"])) {
         //echo "<li class='nav-item'><a class='nav-link active' aria-current='page' href='profile.php'>Profile</a></li>";
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

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-6 px-4 pb-4" id="order">
      <h4 class="text-center text-info p-2">Complete your order!</h4>
      <div class="p-3 mb-2 bg-light border rounded-3 text-center">
      <!-- <div class="jumbotron p-3 mb-2 text-center"> -->
        <h6 class="lead"><b>Product(s) : </b><?= $allItems; ?></h6>
        <h6 class="lead"><b>Delivery Charge : </b>Free</h6>
        <h5><b>Total Amount Payable : </b><?= number_format($grand_total,2) ?>/-</h5>
      </div>
      <form action="" method="post" id="placeOrder">
        <input type="hidden" name="products" value="<?= $allItems; ?>">
        <input type="hidden" name="grand_total" value="<?= $grand_total; ?>">
        <div class="mb-2">
          <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
        </div>  
        <div class="mb-2">
          <input type="email" name="email" class="form-control" placeholder="Enter E-Mail" required>
        </div>  
        <div class="mb-2">
          <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
        </div>  
        <div class="mb-2">
          <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
        </div>  
        <div class="mb-2">
          <h6 class="text-center lead">Select Payment Mode</h6>
          <select name="pmode" class="form-control">
            <option value="" selected disabled>-Select Payment Mode-</option>
            <option value="cod">Cash On Delivery</option>
            <option value="netbanking">Net Banking</option>
            <option value="cards">Debit/Credit Card</option>
          </select>
        </div>  
        <div class="d-grid gap-2 mx-auto">
          <input type="submit" name="submit" value="Place Order" class="btn btn-danger btn-lg">
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $("#placeOrder").submit(function(e){
      e.preventDefault();
      $.ajax({
        url: 'action.php',
        method: 'post',
        data: $('form').serialize() + "&action=order",
        success: function(response){
          console.log(response);
          $("#order").html(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {cartItem:"cart_item"},
        success: function(response){
          $("#cart-item").html(response);
        }
      });
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" 
        crossorigin="anonymous">
</script>

<?php
    include_once 'footer.php'
?>
