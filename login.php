<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/cart.png" type="image/x-icon">
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Login</h1>
      <form action="includes/login.inc.php" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="uid"
                    placeholder="Enter Username"/>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="pwd"
                    placeholder="Enter Password"/>
          </div>
          <p class="login-register-text">Don't have an account? <a href="signup.php">Register Here</a></p>
        </div>
        <div class="form-submit-btn">
          <input type="submit" value="Register" name="submit">
        </div>
      </form>
  </body> 

    <?php
      if (isset($_GET["error"])) {

        if($_GET["error"] == "emptyinput") {

          echo "<p>Fill in all fields!</p>";

        } else if ($_GET["error"] == "wronglogin") {

          echo "<p>Incorrect login information!</p>";

        }
      }
    ?>
</html>