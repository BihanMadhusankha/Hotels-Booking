<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD HOTEL Details </title>
    <link rel="stylesheet" href="../CSS/admin2page.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="../Script/script.js"></script>
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


    <div class="hotelfulld">

        <div class="adminpost">
            <div class="hotelstar">
                <img class="hotelstar" src="5starhoteladd.jpg" alt="1starhotel">
            </div>
            <div class="uploadb">
                <input type="submit" value="upload">
            </div>
        </div>

        



        <div class="hotelform">

            <fieldset>

                <p> HOTEL NAME: <input type="text"> </p>
                <p>HOTEL STAR: <input type="text"></p>
                <p>DEPCRIPTION: <textarea class="textarea"> </textarea> </p>
                <p>HOTEL PRICE: <input type="text"> </p>
                <input class="button ADD" type="submit" value="add details">  

                


            </fieldset>


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