<?php
    include_once 'heard.php'
?>

<form action="includes/signup.inc.php" method="post" class="form_logoin" style="margin:50px;">
  <div class="mb-3">
    <label for="exampleInputname" class="form-label">Full name</label>
    <input type="name" class="form-control" id="exampleInputPassword1" name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputUsername" class="form-label">Username</label>
    <input type="uid" class="form-control" id="exampleInputPassword1" name="uid">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="exampleInputRepeatPassword1" class="form-label">Repeat Password</label>
    <input type="password" class="form-control" id="exampleInputRepeatPassword1" name="Repeatpassword">
  </div>

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
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

<?php
    include_once 'footer.php'
?>