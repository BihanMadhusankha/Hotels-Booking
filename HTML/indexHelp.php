<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../CSS/styleHelp.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Help</title>
    <style>
        nav i {
            font-size: 40px;
            color: #fff;
            margin-right: 10px;
        }

        @media only screen and (max-width: 768px) {
            .container {
                width: 90%;
                margin: auto;
            }

            .card {
                width: 100%;
                margin-bottom: 20px;
            }

            h2 {
                font-size: 24px;
            }

            .subtext {
                font-size: 14px;
            }

            form label {
                font-size: 14px;
            }

            form input {
                font-size: 14px;
                padding: 8px;
            }

            button {
                font-size: 16px;
                padding: 10px;
            }

            .switch-link {
                font-size: 14px;
            }
        }

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
                    echo '<li><h1>Hello ' . $_SESSION["username"] . ' !</h1></li>
                    <a href="../HTML/indexAddToCart.php"><i class="fa-solid fa-cart-shopping"></i></a>';
                }
                ?>

            </div>

        </ul>
    </nav>
    <h1 style="margin-top: 1rem;color: #fff;">
        <marquee behavior="scroll" direction="left">Help Center...</marquee>

        <p>
        <h4>Stay safe online
            Protect your security by never sharing your personal or credit card information
            over the phone, by email, or chat.</h4>
        </p>
        <p>
        <h2>Welcome to the Help Center</h2>
        </p>
        <p>
        <h4>Sign in to contact Customer Service we're available 24 hours a day</h4>
        </p>
        </div> <br>
        <form action="../Includes/help.php" method="post">
            <div class="wrapper centered">
                <article class="letter">
                    <div class="side">
                        <h2>Contact us</h2>
                        <p>
                            <textarea name="massage" placeholder="Your message" required></textarea>
                        </p>
                    </div>
                    <div class="side">
                        <p>
                            <label for="">Your Name:</label>
                            <input type="text" name="name" placeholder="Your name " required>
                        </p>
                        <p>
                            <label for="">Your Email:</label>
                            <input type="email" name="email" placeholder="Your email">
                        </p>
                        <p>
                            <button id="sendLetter" name="send">Send</button>
                        </p>
                    </div>
                    <div class="link" style="margin-top: 20px;">
                        <a href="Security and awareness.html">Security and awareness</a>
                        <a href="Link">Payment</a>
                        <a href="Room Types.html">Room Types</a>
                        <a href="Pricing.html">Pricing</a>
                        <a href="Property Policies.html">Property Policies</a>
                        <a href="Communication.html">Communication</a>
                        <a href="Extra Facilities.html">Extra Facilities</a>
                    </div>
                </article>

            </div>

        </form>
        <p class="result-message centered">Thank you for your message</p>

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