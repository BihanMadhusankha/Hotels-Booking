<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROOM PROFILE</title>
    <link rel="stylesheet" href="../CSS/styleRoomProfil.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>
        .side-bar {
            background-color: #e3ebf4;

            width: 250px;
            left: -250px;
            height: 100vh;
            position: fixed;
            top: 0;
            overflow-y: auto;
            transition: 0.6s ease;
            transition-property: left;
        }

        header {
            background-color: #bdcee3;

        }

        .close-btn {
            position: absolute;
            color: #fff;
            font-size: 23px;
            right: 0px;
            margin: 15px;
            cursor: pointer;
        }

        header h1 {
            text-align: center;
            font-weight: 500;
            font-size: 35px;
            padding: 20px;
            font-family: sans-serif;
            letter-spacing: 2px;
            color: #010101;
        }

        .menu {
            width: 100%;
            margin-top: 30px;
        }

        .menu .item {
            position: relative;
            cursor: pointer;
        }

        .menu .item a {
            color: #008e45;
            font-size: 16px;
            text-decoration: none;
            display: block;
            padding: 5px 30px;
            line-height: 60px;
        }

        .item i {
            margin-right: 15px;
        }

        .menu-btn {
            position: absolute;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            margin: 30px 10px;
        }

        .side-bar.active {
            left: 0;
        }

        .roomdetails {
            width: 1200px;
            margin: auto;
        }

        .roomimg {
            margin-left: 135px;
        }

        .hotelname {
            margin-left: 135px;
        }

        .tharu{
            margin-left: 135px;
        }
    </style>
</head>

<body>

    <!-- menu-btn -->
    <div class="menu-btn">
        <i class="fas fa-bars"></i>
    </div>

    <div class="side-bar">
        <!-- header section -->
        <header>
            <!-- close button -->
            <div class="close-btn">
                <i class="fas fa-times"></i>
            </div>
            <h1>MENU</h1>
        </header>
        <!-- menu item -->

        <div class="menu">

            <div class="item"><a href="../HTML/index.php"><i class="fas fa-home"></i>Home</a></div>
            <div class="item"><a href="#"><i class="fas fa-th"></i>Analytics</a></div>
            <div class="item"><a href="../HTML/indexUserProfile.php"><i class="fas fa-user"></i>Profile</a></div>
            <div class="item"><a href="../HTML/indexHelp.php"><i class="fas fa-hands-helping"></i>Help</a></div>
            <div class="item"><a href="../HTML/indexAboutUs.html"><i class="fas fa-info-circle"></i>About</a></div>
            <div class="item"><a href="../Includes/loginout.php"><i class="fas fa-sign-out">Log Out</i></a></div>

        </div>

    </div>

    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

    </nav>

    <div class="fullbody">

        <div class="roomimg">
            <?php
            include_once '../Includes/db.php';
            $sqlR = "SELECT * FROM roomsdelails";
            $resultR = mysqli_query($conn, $sqlR);
            if ($resultR) {
                $rowR = mysqli_fetch_assoc($resultR);
                $roomPhoto = $rowR['roomPhoto'];
                echo '
            <div class="bigonephoto">
                <img class="bigonephoto" src="../assets/userprofilePic/' . $roomPhoto . '" alt="">
            </div>

            <div class="photos4">

                <div class="photos21">
                    <img class="photos21 " src="../assets/userprofilePic/' . $roomPhoto . '" alt="">
                    <img class="photos21 " src="../assets/userprofilePic/' . $roomPhoto . '" alt="">
                </div>

                <div class="photos2-2">
                    <img class="photos2-2 two1" src="../assets/userprofilePic/' . $roomPhoto . '" alt="">
                    <img class="photos2-2 two1" src="../assets/userprofilePic/' . $roomPhoto . '" alt="">
                </div>


            </div>
                ';
            }
            ?>
        </div>

        <!-- ------------------------------------------------------------------------------------------- -->
        <br>
        <label class="hotelname " for="">ROYAL HOTEL</label> <br>

        <div class="tharu">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>

        </div>
        <br><br>


        <div class="roomdetails">

            <div class="amenitiesbox">


                <label class="amenities" for="">Popular amenities</label> <br> <br>

                <div class="allicon">

                    <div class="icontwo">

                        <i class="fa-solid fa-paw"></i>
                        <label for="">Pet-friendly</label> <br><br>

                        <i class="fa-solid fa-square-parking"></i>
                        <label for="">Free parking</label> <br><br>

                    </div>

                    <div class="iconnexttwo">

                        <i class="fa-solid fa-wifi"></i>
                        <label for="">Free WiFi</label> <br><br>

                        <span class="material-symbols-outlined">
                            local_laundry_service
                        </span>
                        <label for="">Laundry facilities</label> <br><br>



                    </div>

                </div>

            </div>


            <div class="facilitise">

                <label class="Facility" for="">Facility</label> <br> <br>

                <label for="">1 queen size bed,bathroom and</label> <br>
                <label for="">some living places.</label> <br>

                <label for="">Offers light breakfast.</label> <br>

                <label for="">Bed Type:</label> <br>
                <label for="">Queen Size Bed Comfy</label> <br>
                <label for="">fit for 2 people.</label> <br>

                <a href="../HTML/indexBooking.php"><input type="submit" class="Reserve" name="Reserve" id="Reserve" value="Reserve"></a>

            </div>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.menu-btn').click(function() {
                $('.side-bar').addClass('active');
                $('.menu-btn').css("visibility", "hidden");
            });

            //close button

            $('.close-btn').click(function() {
                $('.side-bar').removeClass('active');
                $('.menu-btn').css("visibility", "visible");
            });
        })
    </script>


</body>

</html>