
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Only</title>
    <link rel="stylesheet" href="../CSS/Admin.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
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
            <div class="item"><a href=""><i class="fas fa-sign-out">Log Out</i></a></div>
        </div>

    </div>
    ';}
    ?>
    <!-- navigation  -->
    <nav>


        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">


            <div class="login_regester" id="login_regester">

                <?php
                if (isset($_SESSION["username"])) {
                    echo '<li><a id="RegisterdUser" href="#">Hello ' . $_SESSION["username"] . ' !</a></li>';
                }
                    ?>


                    <div class="nav_list_tem">
                        <li id="analys"><a href="#">Analys</a></li>
                    </div>
    
    
                </div>
    
            </ul>
        </nav>

    <div class="bigcolumn">

        <div class="columnleft">

            <div class="adnew">
                <p class="dashboard leftone">dashboard1</p>
            </div>

            <div class="adnew">
                <p class="dashboard leftone">dashboard2</p>
            </div>

            <div class="adnew">
                <p class="dashboard leftone">dashboard3</p>
            </div>

            <div class="adnew">
                <p class="dashboard leftone">dashboard4</p>
            </div>

            <div class="adnew">
                <p class="dashboard leftone">dashboard5</p>
            </div>

        </div>

        <div class="columnright">

            <div class="adminpost">

                <button class="button ADD" onclick="hotelADD( )">+ADD NEW</button>
                <img class="hotelstar" src="../assets/admin1/1starhoteladd.jpg" alt="1starhotel">

            </div>

            <div class="adminpost">
                <button class="button ADD" onclick="hotelADD( )">+ADD NEW</button>
                <img class="hotelstar" src="../assets/admin1/2starhoteladd.jpg" alt="2starhotel">
            </div>

            <div class="adminpost">
                <button class="button ADD" onclick="hotelADD( )">+ADD NEW</button>
                <img class="hotelstar" src="../assets/admin1/1starhoteladd.jpg" alt="3starhotel">
            </div>

            <div class="adminpost">
                <button class="button ADD" onclick="hotelADD( )">+ADD NEW</button>
                <img class="hotelstar" src="../assets/admin1/1starhoteladd.jpg" alt="4starhotel">
            </div>

            <div class="adminpost">
                <button class="button ADD" onclick="hotelADD( )">+ADD NEW</button>
                <img class="hotelstar" src="../assets/admin1/1starhoteladd.jpg" alt="1starhotel">

            </div>
        </div>
    </div>


    <div class="bigcolumn">
        <div class="columnleft">
            <!-- <h2>Column 1</h2>
          <p>Some text..</p> -->
        </div>
        <div class="columnright">
            <!-- <h2>Column 2</h2>
          <p>Some text..</p> -->


            <div class="adminpost">
                <button class="button ADD">+ADD NEW</button>
            </div>

            <div class="adminpost">
                <button class="button ADD">+ADD NEW</button>
            </div>

            <div class="adminpost">
                <button class="button ADD">+ADD NEW</button>
            </div>

            <div class="adminpost">
                <button class="button ADD">+ADD NEW</button>
            </div>

            <div class="adminpost">
                <button class="button ADD">+ADD NEW</button>
            </div>

        </div>
    </div>

    <script src="../Script/script.js"></script>
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