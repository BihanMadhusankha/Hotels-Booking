<DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/styleSelectCategory.css">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <title>Hotel Category</title>
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


        <nav style="margin-bottom: 3rem;">
            <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        </nav>



        <div class="row" style="margin-left: 4rem;">
            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>1 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>
            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>2 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>
            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>3 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>

            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>4 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>
            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>5 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>

            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>6 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>
            <div class="coloum">
                <a href="../HTML/indexHotelprofile.php">
                    <h2>7 Star Hotel</h2>
                    <div class="image">

                        <img src="../assets/room1.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room2.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room3.jpeg" width="270px" height="200px" ;>
                        <img src="../assets/room4.jpeg" width="270px" height="200px" ;>
                    </div>
                </a>
            </div>

        </div>

        <!-- fotter -->
        <footer style="margin-top: 5px;">

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