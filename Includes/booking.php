<?php
if (isset($_POST['book'])) {
    $email = $_POST["email"];
    $nic = $_POST["nic"];
    $cardname = $_POST["cardname"];
    $cardnumber = $_POST["cardnumber"];
    $expireon = $_POST["expireon"];
    $year = $_POST["year"];
    $CVC = $_POST["CVC"];
    

    require_once 'db.php';
    require_once 'function.php';

    
    createPaymentDetails($conn,$email, $cardname, $cardnumber, $expireon, $year, $CVC,$nic);
} else {
    header('Location: ../HTML/indexLogin.php');
}
?>