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

        <div class="nav_list_tem">
            <li id="list_property"><a href="#">List your property</a></li>
        <li id="analys"><a href="#">Analys</a></li>
        </div>
       
    </ul>
</nav>
    <div class="Login_screan">
        
            <form action="../publicFile/registerHandle.php" class="login_form" method="POST" id="registrationForm">
                <fieldset class="login_form_fieldset">
                    <h2>Regester</h2><br></br>
                        <div class="login_form_fieldset_input">
                            <div class="fullName">
                                <input type="text" id="firstName" placeholder="First Name" name="firstname" >
                                <input type="text" id="lastName"placeholder="Last Name" name="lastname">
                            </div>
                            
                            <div class="anyData">
                                <input type="email" placeholder="Enter your email" name="email">
                                <input type="date" placeholder="Birthday" name="date">
                               
                                <input type="password" placeholder=Create_Password name="creatpassword">
                                <input type="password" placeholder= Conform_Password name="conformpassword">
                            
                                <input type="text" placeholder="Country" name="country">
                            </div>
                            
                        </div>
                    
                    <input type="submit" id="button-login" name="submit" value="Regester" button-align="center" ><br>
                    <h3>You have account?<a href="../HTML/indexLogin.php">Log in</a></h3>
                    <div>
                        <hr><br>
                                <p><b>By signing in or creating an account, you agree with out Terms & conditions and privacy statement</b></p>
                
                                <hr>
                                <p1>All rights reserved.</p1><br>
                                <p2>Copyright (2006-2023)-Royal Hotel<sup>TM</sup></p2>
                
                    </div>
                </fieldset>

                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"]=="EmptyInput"){
                            echo '<div class="error">Somthing went wrong</div>';
                        }

                        else if($_GET["error"]=="InvalidUserId"){
                            echo '<div class="error">Invalid user name</div>';
                        }
                        else if($_GET["error"]=="InvalidUserId"){
                            echo '<div class="error">Invalid user name</div>';
                        }
                        else if($_GET["error"]=="InvalidEmail"){
                            echo '<div class="error">Invalid user Email</div>';
                        }
                        else if($_GET["error"]=="InvalidBirthDay"){
                            echo '<div class="error">Invalid user Birth Day</div>';
                        }
                        else if($_GET["error"]=="PasswordDontMatch"){
                            echo '<div class="error">Invalid user Password Do not match</div>';
                        }
                        else if($_GET["error"]=="InvalidCountry"){
                            echo '<div class="error">Invalid user Country</div>';
                        }
                        else if($_GET["error"]=="UserNameTaken"){
                            echo '<div class="error"> User Name or Email already have </div>';
                        }
                        else if($_GET["error"]=="none"){
                            echo '<div class="error">Account Created!</div>';
                        }
                    }
                ?>

            </form>

    </div>

    

</body>
</html>