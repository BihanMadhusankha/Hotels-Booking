<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
.table{
    text-align: center;
    margin: auto;
    border-color: blue;
    border-style:solid;
    border-radius: 7px;
     

}
.hed{
    background-color: green;
    color: white;
    width: 180px;
    height: 40px;
    

}

    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    session_start();
    include_once '../Includes/function.php';
    include_once '../Includes/db.php';

    if (isset($_SESSION['user_id'])) {
        
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $cart = &$_SESSION['cart'];
    } else {
       
        $cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : array();
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if ($id === 'remove_all') {
            $cart = array(); 
            echo 'All items removed from favorites.<br>';
        } else {
            
            if (isset($cart[$id])) {
                
                unset($cart[$id]);
                echo 'Room removed from favorites.<br>';
            } else {
               
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

    if (!empty($cart)) {
        echo '<table border="5" class="table">';
        echo '<tr>';
        echo '<th class="hed" >ID</th>';
        echo '<th class="hed">Room Price</th>';
        echo '<th class="hed">Offers</th>';
        echo '<th class="hed">Action</th>';
        echo '</tr>';

        foreach ($cart as $id => $item) {
            echo '<tr>';
            echo '<td>' . $item['id'] . '</td>';
            echo '<td>' . $item['roomPrice'] . '</td>';
            echo '<td>' . $item['offers'] . '</td>';
            echo '<td><a href="?id=' . $item['id'] . '">Toggle favorite</a></td>';
            echo '</tr>';
        }

        echo '</table>';
        echo '<br><a  href="?id=remove_all" >Remove All Favorites</a>';
    } else {
        echo 'No rooms in favorites.';
    }

    if (!isset($_SESSION['user_id'])) {
        setcookie('cart', json_encode($cart), time() + (30 * 24 * 60 * 60), '/'); 
    }
    ?>
</body>

</html>