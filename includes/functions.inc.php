<?php

    function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
        
        $result = true;
        
        if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat))
            $result = true;
        else
            $result = false;

        return $result;
    }

    function invalidUid($username) {
        
        $result = true;
        
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username))
            $result = true;
        else
            $result = false;
        
        return $result;
    }

    function invalidEmail($email) {
        
        $result = true;
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $result = true;
        else
            $result = false;
    
        return $result;
    }

    function pwdMatch($pwd, $pwdRepeat) {
        
        $result = true;

        if ($pwd == $pwdRepeat)
            $result = true;
        else
            $result = false;
    
        return $result;
    }

    function uidEXists($conn, $username, $email) {
        
        $sql = "SELECT * FROM users WHERE userUid = ? OR userEmail = ?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        } else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function createUser($conn, $name, $email, $usersname, $pwd) {
        
        $sql = "INSERT INTO users (userName, userEmail, userUid, userPwd) VALUE (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $usersname, $hashedPwd);
        mysqli_stmt_execute($stmt);
        header("location: ../signup.php?error=none");
        
        exit();
    }

    function emptyInputLogin($username, $pwd) {
        
        $result = true;

        if (empty($username) || empty($pwd)) 
            $result = true;
        else 
            $result = false;
        
        return $result;
    }

    function loginUser($conn, $username, $pwd) {
        
        $uidEXists = uidEXists($conn, $username, $username);
        
        if ($uidEXists == false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }

        $pwdHashed = $uidEXists["userPwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        } else if ($checkPwd === true) {
            session_start();
            $_SESSION["userId"] = $uidEXists["userId"];
            $_SESSION["userUid"] = $uidEXists["userUid"];
            header("location: ../index.php");
            exit();
        }
    }

?>