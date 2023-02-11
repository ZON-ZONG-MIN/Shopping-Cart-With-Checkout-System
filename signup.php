<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/cart.png" type="image/x-icon">
    <link rel="stylesheet" href="css/signup.css" />
  </head>
  <body>
    <div class="container">
      <h1 class="form-title">Registration</h1>
      <form action="includes/signup.inc.php" method="post">
        <div class="main-user-info">
          <div class="user-input-box">
            <label for="fullName">Full Name</label>
            <input type="text"
                    id="fullName"
                    name="name"
                    placeholder="Enter Full Name"/>
          </div>
          <div class="user-input-box">
            <label for="username">Username</label>
            <input type="text"
                    id="username"
                    name="uid"
                    placeholder="Enter Username"/>
          </div>
          <div class="user-input-box">
            <label for="email">Email</label>
            <input type="email"
                    id="email"
                    name="email"
                    placeholder="Enter Email"/>
          </div>
          <div class="user-input-box">
            <label for="password">Password</label>
            <input type="password"
                    id="password"
                    name="password"
                    placeholder="Enter Password"/>
          </div>
          <div class="user-input-box">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password"
                    id="confirmPassword"
                    name="Repeatpassword"
                    placeholder="Confirm Password"/>
          </div>
        </div>
        <p class="login-register-text">Already have an account? <a href="login.php">Login</a></p>
        <div class="form-submit-btn">
          <input type="submit" value="Register" name="submit">
        </div>
      </form>
      
      <?php
        if (isset($_GET["error"])) {
          if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields!</p>";
          }
          else if ($_GET["error"] == "invaliduid") {
            echo "<p>Choose a proper username!</p>";
          }
          else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
          }
          else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Password doesn't match!</p>";
          }
          else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong, try again!</p>";
          }
          else if ($_GET["error"] == "usernametaken") {
            echo "<p>Username already taken!</p>";
          }
          else if ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
          }
        }
      ?>

    </div>
  </body>
</html>
