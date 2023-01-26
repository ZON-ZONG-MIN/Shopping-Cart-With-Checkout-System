<?php
    include_once 'heard.php'
?>

<form action="includes/login.inc.php" method="post" class="form_logoin" style="margin:50px;">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email or Username</label>
    <input name="uid" type="username" class="form-control" id="exampleInputEmail1">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="pwd" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Log In</button>
</form>
<?php
  if (isset($_GET["error"])) {

    if($_GET["error"] == "emptyinput") {

      echo "<p>Fill in all fields!</p>";

    } else if ($_GET["error"] == "wronglogin") {

      echo "<p>Incorrect login information!</p>";

    }
  }
?>
<?php 
    include_once 'footer.php'
?>