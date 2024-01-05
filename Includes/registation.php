<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $dob = $_POST["date"];
    $country = $_POST["country"];
    $phonenum = $_POST["phonenum"];
    $createpassword = $_POST["createpassword"];
    $conformpassword = $_POST["conformpassword"];

    require_once 'db.php';
    require_once 'function.php';

    $emptyInput = emptyInputSignup($fullname, $username, $email, $nic, $dob, $country, $phonenum, $createpassword, $conformpassword);
    $invalidUid = invalidUid($username);
    $invalidEmail = invalidEmail($email);           // check valid email
    $pwdMatch = pwdMatch($createpassword, $conformpassword);
    $uidExists = uidExists($conn, $username, $email);

    if ($emptyInput !== false) {

        header("Location: ../HTML/indexLogin.php?error=emptyinput");

        exit();
    }

    if ($invalidUid !== false) {
        header("Location: ../HTML/indexLogin.php?error=invaliduid");
        exit();
    }

    if ($invalidEmail !== false) {
        header("Location: ../HTML/indexLogin.php?error=invalidemail");
        exit();
    }

    if ($pwdMatch !== false) {
        header("Location: ../HTML/indexLogin.php?error=passwordNotMaching");
        exit();
    }

    if ($uidExists !== false) {
        header("Location:../HTML/indexLogin.php?error=uidalreadyExcist");
        exit();
    }

    createUser($conn, $fullname, $username, $email, $nic, $dob, $country, $phonenum, $createpassword, $conformpassword);
} else {
    header('Location: ../HTML/indexLogin.php');
}
