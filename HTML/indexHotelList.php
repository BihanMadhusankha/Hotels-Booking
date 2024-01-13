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
                <li name='hotelpanel'><a href="../HTML/indexHotelList.php">Hotel Panel</a></li>
            </div>

        </ul>
    </nav>


    <h1>1 Star Hotel</h1>
    <h2>Add Hotel Details</h2>

    <div class="container">
        <button onclick="addHotel()">Add Hotels</button>
    </div>

    <table id="outputTable">
        <thead>
            <tr>
                <th>Hotel ID</th>
                <th>Hotel Name</th>
                <th>Hotel Email</th>
                <th>Hotel Phone Number</th>
                <th>Hotel Location</th>
                <th>Additional Comment</th>
                <th>Action</th>
               
            </tr>
        </thead>

        <tbody>

            <?php

            session_start();
 
            include_once '../Includes/db.php'; 
            $sql = "SELECT * FROM hoteldata";
            $result = mysqli_query($conn, $sql);

            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $hotelId = $row['hotelID'];
                    $hotelName = $row['hotelName'];
                    $hotelEmail = $row['hotelEmail'];
                    $hotelPhoneNo = $row['hotelPhoneNo'];
                    $hotelLocation = $row['hotelLocation'];
                    $additionalComment = $row['additionalComment'];
                   

                    echo '  <tr>
                       
                       <td>' . $hotelId . '</td>
                       <td>' . $hotelName . '</td>
                       <td>' . $hotelEmail . '</td>
                       <td>' . $hotelPhoneNo . '</td>
                       <td>' . $hotelLocation . '</td>
                       <td>' . $additionalComment . '</td>
                       <td id="updateDelete">
                       
                            <form method="post" action="../Includes/deleteHotel.php">
                                <input type="hidden" name="deletename" value="' . $hotelId . '">
                                <button type="submit" style="background-color:red; color:white;">Delete</button>
                            </form>                    
                            <form method="post" action="../Includes/update.php">
                                <input type="hidden" name="deletename" value="' . $hotelId . '">
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