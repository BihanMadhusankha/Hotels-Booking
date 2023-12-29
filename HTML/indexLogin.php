<?php
    $login=0;
    $invalid=0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';
    
        if (isset($_POST['username']) && isset($_POST['loginpassword'])) {
            $username = $_POST["username"];
            $password = $_POST['loginpassword'];
    
            // Use prepared statements to prevent SQL injection
            $sql_check_existing = "SELECT * FROM `userregistation` WHERE username=? AND conformPassword=?";
            $stmt_check_existing = mysqli_prepare($con, $sql_check_existing);
            mysqli_stmt_bind_param($stmt_check_existing, "ss", $username,$password);
            mysqli_stmt_execute($stmt_check_existing);
            $result_check_existing = mysqli_stmt_get_result($stmt_check_existing);
    
            if ($result_check_existing) {
                $num = mysqli_num_rows($result_check_existing);
                if ($num > 0) {
                   
                    $login =1;
                    session_start();
                    $_SESSION['username']=$username;
                    header('location:index.php');
                }else {
                    $invalid =1;
                    
                }
            } else {
                echo "Error: " . mysqli_stmt_error($stmt_check_existing);
            }
    
            // Close the prepared statements
            mysqli_stmt_close($stmt_check_existing);
            
        } else {
            echo "Username and password are required.";
        }
    
        // Close the database connection when done
        mysqli_close($con);
    }
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
    <ul class="nav_list">

        <div class="nav_list_tem">
            <li id="list_property"><a href="#">List your property</a></li>
        <li id="analys"><a href="#">Analys</a></li>
        </div>
       
    </ul>
</nav>
    <div class="Login_screan">
        
            <form action="../HTML/indexLogin.php" class="login_form" method="POST">
                <fieldset class="login_form_fieldset">
                    <h2>Login</h2><br></br>
                        <div class="login_form_fieldset_input">
                            
                            <input type="text" placeholder="User Name / Email" name="username"><br></br>
                            <input type="password" placeholder=Password name="loginpassword"><br><br>
                        </div>
                    

                    <a  href="#">Forget Password?</a><br>

                    <input type="submit" id="button-login" name="submit" value="Log in" button-align="center" ><br>
                    
                    <h4>Don't have an account? <a href="../HTML/indexRegester.php">Regester</a></h4>

                    <div class="icon_logo">
                                <a href="#"><img src="../assets/facebook.png" alt="Description" width="30" height="30"></a>
                                <a href="#"><img src="../assets/google.png" alt="Description" width="30" height="30"> </a>
                                <a href="#"><img src="../assets/apple.png" alt="Description" width="30" height="30"></a>
                    </div>
                
                    <div>
                        <hr><br>
                                <p><b>By signing in or creating an account, you agree with out Terms & conditions and privacy statement</b></p>
                
                                <hr>
                                <p1>All rights reserved.</p1><br>
                                <p2>Copyright (2006-2023)-Next.com<sup>TM</sup></p2>
                
                    </div>

                   
                </fieldset>
                    

            </form>
           
        
          
    </div>

    

</body>
</html>