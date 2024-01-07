<?php
if (isset($_POST["save"])) {
   
    $userprofile=$_POST["file"];
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

    if (emptyInputUser($fullname, $username, $email, $phonenum, $country, $dob, $nic, $createpassword, $conformpassword) !== false) {
       
        header("Location: ../HTML/indexUserProfile.php?error=emptyinput");
        exit();
    }
     
    editProfile($conn,$fullname, $username, $email, $phonenum, $country, $dob, $nic, $createpassword, $conformpassword);
   
} else {
    header('location: ../HTML/index.php');
}