<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the submit button was specifically pressed
    if (isset($_POST['submit'])) {
        // Retrieve data from the form
        $email = $_POST["email"];
        $nic = $_POST["nic"];
        $cardname = $_POST["cardname"];
        $cardnumber = $_POST["cardnumber"];
        $expireon = $_POST["expireon"];
        $year = $_POST["year"];
        $CVC = $_POST["CVC"];

        // Validate the data (you should have more robust validation here)
        if (empty($email) || empty($nic) || empty($cardname) || empty($cardnumber) || empty($expireon) || empty($year) || empty($CVC)) {
            echo "Please fill in all the fields.";
            exit;
        }

        // Include your database connection and function file
        require_once 'db.php';
        require_once 'function.php';

        // Insert data into the database
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
