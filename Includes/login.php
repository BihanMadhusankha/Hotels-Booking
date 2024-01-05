<?php
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["loginpassword"];

    require_once 'db.php';
    require_once 'function.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("Location: ../HTML/indexLogin.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
} else {
    header('location: ../HTML/indexLogin.php');
}
