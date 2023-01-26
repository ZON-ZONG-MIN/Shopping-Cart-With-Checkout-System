<?php

    if(isset($_POST["submit"])) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $usersname = $_POST["uid"];
        $pwd = $_POST["password"];
        $pwdRepeat = $_POST["Repeatpassword"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        if (emptyInputSignup($name, $email, $usersname, $pwd, $pwdRepeat) !== false) {
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        
        if (invalidEmail($email) !== false) {
            header("location: ../signup.php?error=invalidEmail");
            exit();
        }

        if (pwdMatch($pwd, $pwdRepeat) == false) {
            //echo $pwd . $pwdRepeat;
            header("location: ../signup.php?error=passwordsdontmatch");
            exit();
        }

        if (uidEXists($conn, $usersname, $email) !== false) {
            header("location: ../signup.php?error=usernametaken");
            exit();
        }

        createUser($conn, $name, $email, $usersname, $pwd);

    } else {

        header("location: ../signup.php");

    }

?>