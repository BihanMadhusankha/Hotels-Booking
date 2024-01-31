<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Registration Form</title>
    <link href="../CSS/styleHotelRegistation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../Script/scriptInsertTable.js"></script>
</head>

<body>

    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
    </nav>

    <?php
    include_once "../Includes/db.php";
    $query = "SELECT * FROM hoteldata"; 
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        $hotelName = $row['hotelName'];
        $email = $row['hotelEmail'];
        $phone = $row['hotelPhoneNo'];
        $location = $row['hotelLocation'];
        $category = $row['hotelCategory'];
        $photo = $row['hotelPhoto'];
        $comment = $row['additionalComment'];

    }
    ?>


    <form method="POST" action="../Includes/updateHotel.php" onsubmit="addData(); return false;">
        <fieldset>


            <h2 style="text-align: center; margin: 1rem 0; color:#fff;">Hotel Profile</h2><br>
            <div class="formin">
                <label><b>Hotel Name:</b></label>
                <input type="text" name="hotelname" id="nameInput" placeholder="Hotel Name" value="<?php echo $hotelName; ?>"><br></br>

                <label><b>Email:</b></label>
                <input type="email" name="email" id="emailInput" placeholder="Email" value="<?php echo $email; ?>"><br></br>

                <label><b>Phone Number:</b></label>
                <input type="tel" name="phone" id="numberInput" placeholder="Phone Number" value="<?php echo $phone; ?>"><br></br>

                <label><b>Location:</b></label>
                <input type="text" name="location" id="addressInput" placeholder="Location" value="<?php echo $location; ?>"><br></br>


                <div class="form-group">
                    <label><b>Category:<b></label>
                    <select class="form-control" name="category" id="room_number">
                        <option value="1" <?php if ($category == 1) echo 'selected'; ?>>One Star</option>
                        <option value="2" <?php if ($category == 2) echo 'selected'; ?>>Two Star</option>
                        <option value="3" <?php if ($category == 3) echo 'selected'; ?>>Three Star</option>
                        <option value="4" <?php if ($category == 4) echo 'selected'; ?>>Four Star</option>
                        <option value="5" <?php if ($category == 5) echo 'selected'; ?>>Five Star</option>
                        <option value="6" <?php if ($category == 6) echo 'selected'; ?>>Six Star</option>
                        <option value="7" <?php if ($category == 7) echo 'selected'; ?>>Seven Star</option>
                    </select><br>
                </div><br>

                <div class="photo-upload">
                    <label for="photo"><b>Upload Hotel Photo:</label><b>
                    <input type="file" id="photoInput" name="photo" accept="image/*">
                    
                </div>


                <br>

                <label for="Name">Additional Comments:</label><br>
                <textarea id="comment" name="comment"><?php echo $comment; ?></textarea><br>

                <button type="submit" name="submit">Update Hotel</button>

        </fieldset>
    </form>


</body>

</html>