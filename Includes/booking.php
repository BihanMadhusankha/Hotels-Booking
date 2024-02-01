<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST['submit'])) {
        
        $email = $_POST["email"];
        $nic = $_POST["nic"];
        $cardname = $_POST["cardname"];
        $cardnumber = $_POST["cardnumber"];
        $expireon = $_POST["expireon"];
        $year = $_POST["year"];
        $CVC = $_POST["CVC"];

        
        if (empty($email) || empty($nic) || empty($cardname) || empty($cardnumber) || empty($expireon) || empty($year) || empty($CVC)) {
            echo "Please fill in all the fields.";
            exit;
        }

        
        require_once 'db.php';
        require_once 'function.php';

        
        $success = createPaymentDetails($conn, $email, $cardname, $cardnumber, $expireon, $year, $CVC, $nic);

        if ($success) {
            echo "Booking Successful! Thank you for choosing Royal Hotels.";
        } else {
            echo "Error storing data in the database.";
        }
    } else {
        echo "Invalid form submission.";
    }
} else {
    header('Location: ../HTML/indexLogin.php?error=404');
}

?>
