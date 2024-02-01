<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Your existing head content -->

    <title>Hotel List</title>
    <link rel="stylesheet" href="../CSS/styleHotelList.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../Script/script.js"></script>
</head>

<body>

    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">

            <div class="login_regester" id="login_regester">
                <li><a href="../HTML/indexUserList.php">User Panel</a></li>
                <li name='hotelpanel'><a href="../HTML/indexAdminMain.php">Hotel Panel</a></li>
            </div>

        </ul>
    </nav>


    <h1>1 Star Hotel Rooms</h1>
    <h2>Add Room Details</h2>

    <div class="container">
       <a href="../HTML/indexRoomRegister.php"><button >Add Rooms</button></a> 
    </div>

    <table id="outputTable">
        <thead>
            <tr>
                <th>Room ID</th>
                <th>Hotel Name</th>
                <th>Offers</th>
                <th>Room Price</th>
                <th>Action</th>
                
               
            </tr>
        </thead>

        <tbody>

            <?php

 
            include_once '../Includes/db.php'; 
            $sql = "SELECT * FROM roomsdelails";
            $result = mysqli_query($conn, $sql);

            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $roomID = $row['roomID'];
                    $hotelName = $row['hotelName'];
                    $offers = $row['offers'];
                    $price = $row['price'];
                    

                    echo '  <tr>
                       
                       <td>' . $roomID . '</td>
                       <td>' . $hotelName . '</td>
                       <td>' . $offers . '</td>
                       <td>' . $price. '</td>
                       
                       <td id="updateDelete">
                       
                            <form method="post" action="../Includes/deleteRoom.php">
                                <input type="hidden" name="deletename" value="' .$roomID . '">
                                <button type="submit" style="background-color:red; color:white;">Delete</button>
                            </form>                    
                            <form method="post" action="../HTML/indexRoomRegister.php">
                                <input type="hidden" name="updatename" value="' .$roomID . '">
                                <button type="submit" style="background-color:blue; color:white;">Update</button>
                            </form> 
                            
                        </td>
                       </tr>';
                }
            }
            ?>

        </tbody>

    </table>
</body>

</html>