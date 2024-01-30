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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../Script/script.js"></script>
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
    </style>
</head>

<body>
    <?php

    if (isset($_SESSION["username"])) {

        echo '
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
    ';
    }
    ?>
    <!-- navigation  -->
    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">

            <div class="login_regester" id="login_regester">

                <?php
                if (isset($_SESSION["username"])) {
                    echo '<li><a id="RegisterdUser" href="#"><h1>Hello ' . $_SESSION["username"] . ' !</h1></a></li>';
                } else {
                    echo '<li><button id="regester" class="regester" href="registerPage()" onclick="registerPage( )">Regester</button></li>
                                  <li><button id="Login" class="Login" onclick="loginPage()">Log in</button></li> ';
                }
                ?>
            </div>

        </ul>
    </nav>
<!-- navigation close -->

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
        <form action="../Includes/search.php" method="post" class="search-bar">
            <input type="text" placeholder="Search Hotel or Cuntry" name="search">
            <button type="submit" name="submit"><img src="/assets/search.png" alt=""></button>
        </form>
    </div>
<!-- over search bar -->

    <!-- select category-->

    <div class="select_star">
        <h1>SELECT CATEGORY</h1>

        <div class="star_row">
            <div class="star_rate">

                <img src="../assets/onestar.png" alt="Leader images">
                <h1><a href="#"><samp>★</samp>★★★★★★</a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>
                

            </div>
            <div class="star_rate">

                <img src="../assets/2star.jpg" alt="Leader images">
                <h1><a href="#"><samp>★★</samp>★★★★★</a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>
            </div>
            <div class="star_rate">

                <img src="../assets/threestar.png" alt="Leader images">
                <h1><a href="#"><samp>★★★</samp>★★★★</a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>

            </div>

            <div class="star_rate">

                <img src="../assets/fourstar.png" alt="Leader images">
                <h1><a href="#"><samp>★★★★</samp>★★★</a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>

            </div>
            <div class="star_rate">

                <img src="../assets/fivestar.jpg" alt="Leader images">
                <h1><a href="#"><samp>★★★★★</samp>★★</a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>

            </div>
            <div class="star_rate">

                <img src="../assets/sixstasr.png" alt="Leader images">
                <h1><a href="#"><samp>★★★★★★</samp>★</a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>

            </div>
            <div class="star_rate">

                <img src="../assets/sevenstar.jpg" alt="Leader images">
                <h1><a href="#"><samp>★★★★★★★</samp></a></h1>
                <a href="../HTML/indexSelectCategory.php"><button type="menu" name="menu" id="star_button">Continue</button></a>

            </div>


        </div>

    </div>


    <!-- Trending destination -->
    <section class="trending_destination">
        <h1>Trending Destination</h1>

        <div class="leader-image-data">
            <div class="leader-image">

                <a href="../HTML/indexHotelprofile.php" ><img src="../assets/Trending1.jpg" alt="Leader images"></a>
                <div class="treanding_hotel_delais">
                    <h2><a href="../HTML/indexHotelprofile.php" >ROYAL COLOMBO</a></h2>
                    <h2 id="status">Available</2>
                        <h2 id="star"><samp>★★★★★★★</samp></h2>
                </div>

            </div>
            <div class="leader-image">

                <a href="../HTML/indexHotelprofile.php"><img src="../assets/trendind2.jpg" alt="Leader images" ></a>
                <div class="treanding_hotel_delais">
                    <h2><a href="../HTML/indexHotelprofile.php">ROYAL GALLE</a></h2>
                    <h2 id="status">Available</2>
                        <h2 id="star"><samp>★★★★★★★</samp></h2>
                </div>

            </div>
            <div class="leader-image">

                <a href="../HTML/indexHotelprofile.php" ><img src="../assets/trending3.jpg" alt="Leader images" ></a>
                <div class="treanding_hotel_delais">
                    <h2><a href="../HTML/indexHotelprofile.php">ROYAL NEGOMBO</a></h2>
                    <h2 id="status">Available</2>
                        <h2 id="star"><samp>★★★★★★★</samp></h2>

                </div>

            </div>


        </div>
    </section>

    <!-- fotter -->
    <footer>

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