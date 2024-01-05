<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My WebSite</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../Script/script.js"></script>
</head>

<body>
    <!-- navigation  -->

    <nav>

        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">


            <div class="login_regester" id="login_regester">

                <?php
                if (isset($_SESSION["username"])) {
                    echo '<li><a id="RegisterdUser" href="#">Hello ' . $_SESSION["username"] . ' !</a></li>';
                    echo '<li><a id="RegisterdUser" href="../Includes/loginout.php">Logout</a></li>';
                } else {
                    echo '<li><button id="regester" class="regester" href="registerPage()" onclick="registerPage( )">Regester</button></li>
                                  <li><button id="Login" class="Login" onclick="loginPage()">Log in</button></li> ';
                }
                ?>


                <div class="nav_list_tem">
                    <li id="analys"><a href="#">Analys</a></li>
                </div>


            </div>

        </ul>
    </nav>
    <!-- about -->

    <section class="About">
        <h1>ROYAL HOTEL GROUP</h1>

        <p>Norem ipsum dolor sit amet, consectetur adipiscing elit.
            Etiam eu turpis molestie, dictum est a, mattis tellus.
            Sed dignissim, metus nec fringilla accumsan, risus sem sollicitudin lacus, ut interdum tellus elit sed risus.
            Maecenas eget condimentum velit, sit amet feugiat lectus.
            Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
            Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex.
            Suspendisse ac rhoncus nisl, eu tempor urna.
            Curabitur vel bibendum lorem. Morbi convallis convallis diam sit amet lacinia.
            Aliquam in elementum tellus. </p>
    </section>

    <!-- search Bar -->
    <div class="container">
        <form action="php file ek liyn thana" method="post" class="search-bar">
            <input type="text" placeholder="Search Hotel or Cuntry" name="q">
            <button type="submit"><img src="/assets/search.png" alt=""></button>
        </form>
    </div>


    <!-- select category-->

    <div class="select_star">
        <h1>SELECT CATEGORY</h1>

        <div class="star_row">
            <div class="star_rate">

                <img src="../assets/onestar.png" alt="Leader images">
                <h1><a href="#"><samp>★</samp>★★★★★★</a></h1>
                <button type="menu" id="star_button">Continue</button>

            </div>
            <div class="star_rate">

                <img src="../assets/2star.jpg" alt="Leader images">
                <h1><a href="#"><samp>★★</samp>★★★★★</a></h1>
                <button type="menu" id="star_button">Continue</button>
            </div>
            <div class="star_rate">

                <img src="../assets/threestar.png" alt="Leader images">
                <h1><a href="#"><samp>★★★</samp>★★★★</a></h1>
                <button type="menu" id="star_button">Continue</button>

            </div>

            <div class="star_rate">

                <img src="../assets/fourstar.png" alt="Leader images">
                <h1><a href="#"><samp>★★★★</samp>★★★</a></h1>
                <button type="menu" id="star_button">Continue</button>

            </div>
            <div class="star_rate">

                <img src="../assets/fivestar.jpg" alt="Leader images">
                <h1><a href="#"><samp>★★★★★</samp>★★</a></h1>
                <button type="menu" id="star_button">Continue</button>

            </div>
            <div class="star_rate">

                <img src="../assets/sixstasr.png" alt="Leader images">
                <h1><a href="#"><samp>★★★★★★</samp>★</a></h1>
                <button type="menu" id="star_button">Continue</button>

            </div>
            <div class="star_rate">

                <img src="../assets/sevenstar.jpg" alt="Leader images">
                <h1><a href="#"><samp>★★★★★★★</samp></a></h1>
                <button type="menu" id="star_button">Continue</button>

            </div>


        </div>

    </div>


    <!-- Trending destination -->
    <section class="trending_destination">
        <h1>Trending Destination</h1>

        <div class="leader-image-data">
            <div class="leader-image">

                <a href="../HTML/indexHotelprofile.php" onclick="lookingHotel()"><img src="../assets/Trending1.jpg" alt="Leader images"></a>
                <div class="treanding_hotel_delais">
                    <h2><a href="../HTML/indexHotelprofile.php" onclick="lookingHotel()">ROYAL COLOMBO</a></h2>
                    <h2 id="status">Available</2>
                        <h2 id="star"><samp>★★★★★★★</samp></h2>
                </div>

            </div>
            <div class="leader-image">

                <a href="../HTML/indexHotelprofile.php" onclick="lookingHotel()"><img src="../assets/trendind2.jpg" alt="Leader images" href="lookingHotel()" onclick="lookingHotel()"></a>
                <div class="treanding_hotel_delais">
                    <h2><a href="../HTML/indexHotelprofile.php" onclick="lookingHotel()">ROYAL GALLE</a></h2>
                    <h2 id="status">Available</2>
                        <h2 id="star"><samp>★★★★★★★</samp></h2>
                </div>

            </div>
            <div class="leader-image">

                <a href="../HTML/indexHotelprofile.php" onclick="lookingHotel()"><img src="../assets/trending3.jpg" alt="Leader images" href="lookingHotel()" onclick="lookingHotel()"></a>
                <div class="treanding_hotel_delais">
                    <h2><a href="../HTML/indexHotelprofile.php" onclick="lookingHotel()">ROYAL NEGOMBO</a></h2>
                    <h2 id="status">Available</2>
                        <h2 id="star"><samp>★★★★★★★</samp></h2>

                </div>

            </div>


        </div>
    </section>

    <!-- fotter -->
    <footer>
        <div class="footer_button">
            <hr>
            <button type="menu" id="footer_button_list" name="footer_button_list"><b>List Your Property</b></button>
        </div>
        <div class="footer_option">
            <div class="option_one">
                <a href="#">Countries</a>
                <a href="#">Distric</a>
                <a href="#">Home</a>
            </div>
            <div class="option_two">

                <a href="#">Hotels</a>
                <a href="#">Villas</a>
                <a href="#">Resorts</a>
            </div>

            <div class="option_three">
                <a href="#">Reviews</a>
                <a href="#">Safty Resourse Center</a>
                <a href="#">About RoyalGroup.com</a>
            </div>

        </div>
    </footer>

</body>

</html>














































<!-- <?php

        // if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //     if (isset($_POST['username']) && isset($_POST['conformpassword'])) {
        //         $username == 'kasun20';
        //         $conformpassword == '20201206';
        //         $_SESSION['user_role'] = 'Admin';
        //         echo '<li style="display:none;"><button class="regester" href="registerPage()" onclick="registerPage( )">Regester</button></li>';
        //         echo '<li style="display:none;" ><button class="Login" onclick="loginPage()">Log in</button></li>';
        //         echo '<div class="nav_list_tem">
        //     <li id="list_property"><a href="#">Dash Bord</a></li>
        //     <li id="analys" ><a href="#">Analys</a></li>
        //     <li id="logout"><a href="#">Logout</a></li>
        //     </div>';
        //     } else {
        //         $_SESSION['user_role'] = 'User';
        //         echo '<div class="nav_list_tem">
        //     <li id="analys" ><a href="#">Analys</a></li>
        //     <li id="logout"><a href="#">Logout</a></li>
        //     </div>';
        //     }
        // }
        // 
        ?> -->