<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "shopping_cart";
/*
  $servername = "localhost";
  $username = "rufuscry_WPZRC";
  $password = "wowsc463111";
  $dbname = "rufuscry_php_shopping_cart";
 */

   $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

?>