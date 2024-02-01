<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    include_once '../Includes/function.php'; 
    include_once '../Includes/db.php';

    // Initialize cart from session or cookies
    if (isset($_SESSION['user_id'])) {
        // If user is logged in, use session
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $cart = &$_SESSION['cart'];
    } else {
        // If user is not logged in, use cookies
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Check if the action is to remove all items
        if ($id === 'remove_all') {
            $cart = array(); // Empty the cart
            echo 'All items removed from favorites.<br>';
        } else {
            // Check if the room is already in the cart
            if (isset($cart[$id])) {
                // Room is in the cart, remove it
                unset($cart[$id]);
                echo 'Room removed from favorites.<br>';
            } else {
                // Room is not in the cart, add it
                $roomDetails = getRoomDetailsById($conn, $id);

                if ($roomDetails) {
                    $cart[$id] = array(
                        'id' => $id,
                        'roomPhoto' => $roomDetails['roomPhoto'],
                        'roomPrice' => $roomDetails['price'],
                        'offers' => $roomDetails['offers']
                    );
                    echo 'Room added to favorites.<br>';
                } else {
                    echo 'Room details not found.';
                }
            }
        }
    }

    // Display the cart contents in a table
    if (!empty($cart)) {
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>Room Photo</th>';
        echo '<th>Room Price</th>';
        echo '<th>Offers</th>';
        echo '<th>Action</th>';
        echo '</tr>';

        foreach ($cart as $id => $item) {
            echo '<tr>';
            echo '<td>' . $item['id'] . '</td>';
            echo '<td>' . $item['roomPhoto'] . '</td>';
            echo '<td>' . $item['roomPrice'] . '</td>';
            echo '<td>' . $item['offers'] . '</td>';
            echo '<td><a href="?id=' . $item['id'] . '">Toggle favorite</a></td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '<br><a href="?id=remove_all">Remove All Favorites</a>';
    } else {
        echo 'No rooms in favorites.';
    }

    // Update or set cookies if user is not logged in
    if (!isset($_SESSION['user_id'])) {
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/'); // 30 days expiration
    }
    ?>
</body>
</html>
