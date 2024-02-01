

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleHoProfile.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Royal Hotel</title>
    <style>
        .room-details a h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 10px;
            text-transform: uppercase;
            color: #000;
            letter-spacing: 1px;
            text-align: center;
            text-decoration: none;
        }

        nav i{
            font-size: 40px;
            color: #fff;
            margin-right: 10px;
        }
    </style>
</head>

<body>

    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
        <a href="../HTML/indexAddToCart.php"><i class="fa-solid fa-cart-shopping"></i></a>
    </nav>
    <div class="hotelProfile">
       <?php 
       include_once '../Includes/db.php';
      $sql = "SELECT * FROM hoteldata";
     

      $result = mysqli_query($conn, $sql);
     

      if ($result) {
       
            $row = mysqli_fetch_assoc($result);
            $hotelName = $row['hotelName'];
            $hotelPhoto = $row['hotelPhoto'];


       echo'
        <div class="hotelPhoto">
        
            <img src="../assets/userprofilePic/' . $hotelPhoto . '" alt="Hotel profile">

        </div>

        <div class="hotelDetails">

            <h1>' . $hotelName . '</h1>
        </div>
        <div class="hotelFasility">
            <h2>BOOK <br>YOUR ROOM</h2>

            <label for=""><b>Wi-Fi :</b> <i class="fas fa-wifi"></i></label>

            <label for=""><b>Pool Access :</b><i class="fa-solid fa-person-swimming"></i></label>
            <label for=""><b>Parking :</b><i class="fas fa-parking"></i></label>
            <label for=""><b>Restaurant :</b><i class="fas fa-utensils"></i></label>
            <label for=""><b>Bar :</b><i class="fa-solid fa-beer-mug-empty"></i></label>
            <label for=""><b>Cafe :</b><i class="fa-solid fa-mug-saucer"></i></label>
            <label for=""><b>Gym :</b><i class="fa-solid fa-dumbbell"></i></label>


            <label for=""><b>Number Of Rooms :</b><i class="fa-solid fa-5"></i></label>
            <a href="../HTML/indexBooking.html"><button type="submit">BOOK ROOM</button></a>
        </div>
        <div class="hotelRoomType">
        ';
    }

        ?>
            <h2>ROOM TYPES</h2>
            <?php 
    include_once '../Includes/db.php';
    $hotelName = mysqli_real_escape_string($conn, $hotelName);

    $sqlR = "SELECT * FROM roomsdelails WHERE hotelName='$hotelName'";
    $resultR = mysqli_query($conn, $sqlR);

    if ($resultR) {
        while ($rowR = mysqli_fetch_assoc($resultR)) {
            $roomPhoto = $rowR['roomPhoto'];
            $roomPrice = $rowR['price'];
            $offers = $rowR['offers'];
            $roomID = $rowR['roomID'];

            echo '
                <div class="rooms">
                    <div class="room-details">
                        <a href="../HTML/indexRoomFrofile.php">
                            <img src="../assets/userprofilePic/' . $roomPhoto . '" alt="">
                        </a>
                        <h3>Room Price: '.$roomPrice.'</h3>
                        <h3>Discount: '.$offers.'</h3>
                        <a href="../HTML/indexBooking.html"><button type="submit">BOOK ROOM</button></a>
                        <a href="../HTML/indexAddToCart.php?id='.$roomID.'"><button type="submit">Add to Cart</button></a>
                    </div>
                </div>
            ';
        }
    } else {
        echo "Error in the query: " . mysqli_error($conn);
    }
?>

        </div>
      
    
       ?>
    </div>

</body>


</html>