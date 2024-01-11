
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

    <form method="POST" action="../HTML/indexHotelList.php" onsubmit="addData(); return false;">
        <fieldset>
            <h2 style="text-align: center; margin: 1rem 0; color:#fff;">Hotel Registration Form</h2><br>
            <div class="formin">
            <label><b>Hotel Name:</b></label>
                <input type="text" name="hotelname" id="nameInput" placeholder="Hotel Name"><br></br>

                <label><b>Email:</b></label>
                <input type="email" name="email" id="emailInput" placeholder="Email"><br></br>

                <label><b>Phone Number:</b></label>
                <input type="tel" name="phone" id="numberInput" placeholder="Phone Number"><br></br>

                <label><b>Location:</b></label>
                <input type="text" name="location" id="addressInput" placeholder="Location"><br></br>


                <!-- <div class="form-group">
                    <label><b>Category:<b></label>
                    <select class="form-control" id="room_number">
                        <option value="1"> One Star </option>
                        <option value="2"> Two Star </option>
                        <option value="3"> Three Star </option>
                        <option value="4"> Four Star </option>
                        <option value="5"> Five Star </option>
                        <option value="6"> Six Star </option>
                        <option value="7"> Seven Star </option>
                    </select>
                </div><br> -->

                <div class="photo-upload">
                    <label for="photo"><b>Upload Hotel Photo:</label><b>
                        <input type="file" id="photoInput" name="photo" accept="image/*">
                        
                </div>

                <!-- <br>


                <div class="room-group">
                    <label><b>Additional Facility:</b></label><br><br>
                    
                    <input type="checkbox" name="session value" value="1"> Dining
                    Restaurant

                    <input type="checkbox" name="session value" value="2"> 24-hour front
                    desk service

                    <input type="checkbox" name="session value" value="1"> Pool


                    <input type="checkbox" name="session value" value="1">Bars


                    <input type="checkbox" name="session value" value="1">Spa


                    <input type="checkbox" name="session value" value="1">JYM


                </div> -->
                <br>

                <label for="Name">Additional Comments:</label><br>
                <textarea id="comment" name="comment"></textarea><br>

                <button type="button" onclick="addData()">Add New Room</button>    
        </fieldset>
    </form>

    
</body>

</html>
