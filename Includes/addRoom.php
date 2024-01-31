<?php
if (isset($_POST['submit'])) {
    $hotelname = $_POST["hotelname"];
    $offers = $_POST["offers"];
    $veiw = $_POST["veiw"];
    $overView = $_POST["overView"];
    $price = $_POST["price"];
    $photo = $_POST["photo"];
    
    
    require_once 'db.php';
    require_once 'function.php';

    createRoom($conn,$hotelname, $offers, $veiw, $overView, $price,$photo);
    
    
} else {
    header('Location: ../HTML/indexLogin.php');
}
?>