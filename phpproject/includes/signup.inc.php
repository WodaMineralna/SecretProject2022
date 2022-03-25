<?php

if(isset($_POST["submit"])) {
    
    $login = $_POST["login"];
    $pwd = $_POST["password"];
    $pwdRepeat = $_POST["passwordrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($login, $pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=emptyinput"); 
        exit();
    }

    if(invalidLogin($login) !== false) {
        header("location: ../signup.php?error=invalidLogin"); 
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../signup.php?error=pwdunmatch"); 
        exit();
    }

    if(usernameExists($conn, $login) !== false) {
        header("location: ../signup.php?error=usernametaken"); 
        exit();
    }

    createUser($conn, $login, $pwd);

}
else {
    header("location: ../panel.php"); 
    exit();
}