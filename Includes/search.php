<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../CSS/style.css">
        <title>Search</title>
    </head>

    <body>
        <nav style="margin-bottom: 5%;">
            <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>


        </nav>
        <div style="margin: 1rem;">
            <?php
            if (isset($_POST["submit"]))

                $search = $_POST['search'];

            require_once 'db.php';
            
            $sql = "SELECT * FROM hoteldata WHERE hotelName LIKE '%$search%'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="../HTML/indexHotelprofile.php"><h2>' . $row['hotelName'] . '</h2></a>';
                    echo '<a href="../HTML/indexHotelprofile.php"><img src="../assets/userprofilePic/' . $row['hotelPhoto'] .  '" class="img" name="images" width="100px" height="100px"></a>';
                }
            } else {
                echo "No results found.";
            }

            mysqli_close($conn);
            ?>
        </div>

    </body>

    </html>