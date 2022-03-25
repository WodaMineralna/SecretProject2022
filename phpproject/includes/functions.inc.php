<?php

function emptyInputSignup($login, $pwd, $pwdRepeat) {
    $result;
    if(empty($login) || empty($pwd) || empty($pwdRepeat)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function invalidLogin($login) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $login)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;
    if($pwd !== $pwdRepeat) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function usernameExists($conn, $login) {
    $sql = "SELECT * FROM users WHERE usersUid = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmterror"); 
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($conn, $login, $pwd) {
    $sql = "INSERT INTO users (usersUid, usersPwd) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=randomerror");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $login, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../signup.php?error=none");
    exit();
}

function emptyInputLogin($login, $pwd) {
    $result;
    if(empty($login) || empty($pwd)) {
        $result = true;
    }
    else {
        $result = false;
    }

    return $result;
}

function loginUser($conn, $login, $pwd) {
    $usernameExists = usernameExists($conn, $login);

    if($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $hashedPwdDB = $usernameExists["usersPwd"];
    $checkPwd = password_verify($pwd, $hashedPwdDB);

    if($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $usernameExists["usersId"];
        $_SESSION["useruid"] = $usernameExists["usersUid"];
        $_SESSION["loggedin"] = true;

        header("location: ../panel.php");
        exit();
    }
}