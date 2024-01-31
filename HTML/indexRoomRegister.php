<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <title>Room Registration Form</title>
    <link href="../CSS/styleHotelRegistation.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../CSS/style.css">



</head>

<body>

    <!-- navigation  -->
    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

    </nav>
    <!-- navigation close -->


    <form method="post" action="../Includes/addRoom.php">
        <fieldset>
            <h2 style="text-align: center; margin: 1rem 0; color:#fff;">Room Registration Form</h2><br>
            <div class="formin">
                <label><b>Hotel Name:</b></label>
                <input type="text" name="hotelname" placeholder="HotelName" required><br></br>

                <label><b>Offers:</b></label>
                <input type="text" name="offers" placeholder="Offers" required><br></br>

                <label><b>Veiw Points:</b></label>
                <input type="text" name="veiw" placeholder="View Points" required><br></br>

                <label><b>Over View:</b></label>
                <input type="text" name="overView" placeholder="Over View" required><br></br>

                <label><b>Price:</b></label>
                <input type="text" name="price" placeholder="Price" required><br></br>

                <div class="photo-upload">
                    <label for="photo"><b>Upload Room Photo:</label><b>
                        <input type="file" id="photo" name="photo" accept="image/*" required>
                        <img id="preview" src="#" alt="Preview" style="display:none;">
                </div>

                <br>

                <input type="submit" name="submit" value="Register">

            </div>

            </fieldsets>

    </form>


</body>

</html>