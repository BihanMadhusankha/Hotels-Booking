<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $enterp = $_POST["enterp"];
    $comformp = $_POST["comformp"];

    require_once 'db.php';
    require_once 'function.php';

    resetPassword($conn, $enterp, $comformp,$email);
   exit();
}else {
    header('location: ../HTML/indexForgot.php');
}
?>