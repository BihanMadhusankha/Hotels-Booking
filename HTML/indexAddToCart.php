<?php
    session_start();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Fetch room details from the database based on $id (you may need to modify this part)
        // For demonstration purposes, let's assume you have a function getRoomDetailsById
        $roomDetails = getRoomDetailsById($id);

        // Check if the room details are found
        if ($roomDetails) {
            // Add the room details to the cart session
            $_SESSION['cart'][$id] = array(
                'id' => $id,
                'roomPhoto' => $roomDetails['roomPhoto'],
                'roomPrice' => $roomDetails['price'],
                'offers' => $roomDetails['offers']
                // Add other details as needed
            );

            // Print the cart for debugging
            echo '<pre>';
            print_r($_SESSION['cart']);
            echo '</pre>';
        } else {
            echo 'Room details not found.';
        }
    }
    
    // Function to get room details from the database (replace this with your actual implementation)
    function getRoomDetailsById($id) {
        // Assume $conn is your database connection
        include_once '../Includes/db.php';

        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM roomsdelails WHERE roomID='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }
?>
