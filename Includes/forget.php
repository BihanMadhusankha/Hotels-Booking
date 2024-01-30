<?php
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    
    require_once 'db.php';
    require_once 'function.php';

    checkMail($conn,$email );
} else {
    header('location: ../HTML/indexForgot.php');
}
?>