<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>user profile</title>
    <link rel="stylesheet" href="../CSS/styleUserProfile.css">
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

        form a {
            color: white;
            text-decoration: none;

        }

        form button {
            margin-top: 16px;
        }

        fieldset {
            margin: 1% 40%;
            height: 44rem;
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
            <div class="item"><a href=""><i class="fas fa-sign-out">Log Out</i></a></div>
        </div>

    </div>

    <!-- navigation  -->
    <nav>


        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">


            <div class="login_regester" id="login_regester">

                <?php
                if (isset($_SESSION["username"])) {
                    echo '<li><h1>Hello ' . $_SESSION["username"] . ' !</h1></li>';
                }
                ?>

            </div>

        </ul>
    </nav>

    <form action="../Includes/userProfile.php" class="user-edit-form" method="POST">

        <fieldset>

            <center>

                <img src="#" class="img"></image>
                <input type="file" id="file" name="file">
                <label class="editpic" for="file">Add Profile</label>
                <input type="text" id="fullname" placeholder="Full Name" name="fullname" value="<?php echo  $_SESSION["fullname"] ?>">
                <input type="text" id="username" placeholder="User Name" name="username" value="<?php echo  $_SESSION["username"] ?>">
                <input type="email" placeholder="Enter your email" name="email" value="<?php echo  $_SESSION["email"] ?>">
                <input type="text" id="nic" placeholder="NIC" name="nic" value="<?php echo  $_SESSION["nic"] ?>">
                <input type="date" placeholder="Birthday" name="date" value="<?php echo  $_SESSION["date"] ?>">
                <input type="text" placeholder="Country" name="country" value="<?php echo  $_SESSION["country"] ?>">
                <input type="text" placeholder="Contact Number" name="phonenum" value="<?php echo  $_SESSION["phonenum"] ?>">
                <input type="password" placeholder=Create_Password name="createpassword" value="<?php echo  $_SESSION["createpassword"] ?>">
                <input type="password" placeholder=Conform_Password name="conformpassword" value="<?php echo  $_SESSION["conformpassword"] ?>">
                <button type="submit" id="button-edit-profile" name="save">SAVE</button>

                </div>
            </center>
        </fieldset>
    </form>
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