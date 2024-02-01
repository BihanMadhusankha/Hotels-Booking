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
    <link rel="stylesheet" href="../CSS/styleRegester.css">

</head>

<body>
    <!-- navigation  -->

    <nav>

        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>
        <ul class="nav_list">
        </ul>
    </nav>

    <div class="registation_screan">

        <form action="../Includes/registation.php" class="registation_form" method="POST" id="registrationForm">
            <fieldset class="registation_form_fieldset">
                <h2>Register</h2>
                <div class="registation_form_fieldset_input">
                    <div class="fullName">
                        <input type="text" id="fullname" placeholder="Full Name" required name="fullname">
                        <input type="text" id="username" placeholder="User Name" required name="username">
                    </div>

                    <div class="anyData">
                        <input type="email" placeholder="Enter your email" name="email" required>
                        <input type="text" id="nic" placeholder="NIC" name="nic" required>
                        <input type="date" placeholder="Birthday" name="date" required>
                        <input type="text" placeholder="Country" name="country" required>
                        <input type="text" placeholder="Contact Number" name="phonenum" required>
                        <input type="password" placeholder=Create_Password name="createpassword" required>
                        <input type="password" placeholder=Conform_Password name="conformpassword" required>


                    </div>

                </div>

                <input type="submit" id="button-login" name="submit" value="Register" button-align="center"><br>
                <h3>You have account?<a href="../HTML/indexLogin.php">Log in</a></h3>
                <div>
                    <hr>
                    <p><b>By signing in or creating an account, you agree with our Terms & conditions and privacy statement</b></p>

                    <hr>
                    <p1>All rights reserved.</p1>
                    <p2>Copyright (2006-2023)-Royal Hotel<sup>TM</sup></p2>

                </div>
            </fieldset>

        </form>

    </div>



</body>

</html>