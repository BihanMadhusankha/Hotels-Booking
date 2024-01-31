<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/styleLogin.css">

</head>

<body>
    <!-- navigation  -->

    <nav>

        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
       
    </nav>
    <div class="Login_screan">

        <form action="../Includes/login.php" class="login_form" method="POST">
            <fieldset class="login_form_fieldset">
                <h2>Login</h2><br></br>
                <div class="login_form_fieldset_input">

                    <input type="text" placeholder="User Name / Email" name="username"><br></br>
                    <input type="password" placeholder=Password name="loginpassword"><br><br>
                </div>

                <a href="../HTML/indexForgot.html">Forget Password?</a>

                <input type="submit" id="button-login" name="submit" value="Log in" button-align="center" onclick="comeHome()"><br>

                <h4>Don't have an account? <a href="../HTML/indexRegester.php">Register</a></h4>

                <div class="icon_logo">
                    <a href="#"><img src="../assets/facebook.png" alt="Description" width="30" height="30"></a>
                    <a href="#"><img src="../assets/google.png" alt="Description" width="30" height="30"> </a>
                    <a href="#"><img src="../assets/apple.png" alt="Description" width="30" height="30"></a>
                </div>

                <div>
                    <hr><br>
                    <p><b>By signing in or creating an account, you agree with our Terms & conditions and privacy statement</b></p>

                    <hr>
                    <p1>All rights reserved.</p1><br>
                    <p2>Copyright (2006-2023)-Next.com<sup>TM</sup></p2>

                </div>


            </fieldset>


        </form>

    </div>



</body>

</html>