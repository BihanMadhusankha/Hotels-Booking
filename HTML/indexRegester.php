<?php

$succes=0;
$users=0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'db.php';
    
        if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['nic']) && isset($_POST['date']) && isset($_POST['country']) && isset($_POST['phonenum']) && isset($_POST['createpassword']) && isset($_POST['conformpassword']))  {
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $email = $_POST["email"];
            $nic = $_POST["nic"];
            $dob = $_POST["date"];
            $country = $_POST["country"];
            $phonenum = $_POST["phonenum"];
            $createpassword = $_POST["createpassword"];
            $conformpassword = $_POST["conformpassword"];
           

            if ($username == 'kasun20' && $conformpassword == '20201206') {
                $userroole ='Admin';
            }
            else{
                $userroole = 'User';
            }
    
           
            $sql_check_existing = "SELECT * FROM `userregistation` WHERE fullName=? AND userName=? AND Email=? AND contactNumber=? AND homeTown=? AND DOB=? AND NIC=? AND password=? AND conformPassword=? AND userRoole=?";
            $stmt_check_existing = mysqli_prepare($con, $sql_check_existing);
            mysqli_stmt_bind_param($stmt_check_existing, "ssssssssss",  $fullname,$username,$email,$nic,$dob,$country,$phonenum,$createpassword,$conformpassword,$userroole);
            mysqli_stmt_execute($stmt_check_existing);
            $result_check_existing = mysqli_stmt_get_result($stmt_check_existing);
    
            if ($result_check_existing) {
                $num = mysqli_num_rows($result_check_existing);
                if ($num > 0) {
                   
                    $users=1;
                } else {
                    
                    $sql_insert_user = "INSERT INTO `userregistation` (fullName,userName,Email,contactNumber,homeTown,DOB,NIC,password,conformPassword,userroole) VALUES (?,?,?,?,?,?,?,?,?,?)";
                    $stmt_insert_user = mysqli_prepare($con, $sql_insert_user);
                    mysqli_stmt_bind_param($stmt_insert_user, "ssssssssss", $fullname,$username,$email,$nic,$dob,$country,$phonenum,$createpassword,$conformpassword,$userroole);
                    $result_insert_user = mysqli_stmt_execute($stmt_insert_user);
    
                    if ($result_insert_user) {
                        
                        $succes=1;
                        header('Location:../HTML/indexLogin.php');
                        // echo"<script>
                        //     alert('User Register successfully....!');
                        // </script>";
                    } else {
                        echo "Error: " . mysqli_stmt_error($stmt_insert_user);
                        // echo"<script>
                        //     alert('pleace fill the all file....!');
                        // </script>";
                    }
                    mysqli_stmt_close($stmt_insert_user);
                }
            } else {
                echo "Error: " . mysqli_stmt_error($stmt_check_existing);
            }
    
                        mysqli_stmt_close($stmt_check_existing);
            
        } else {
            echo "Username and password are required.";
        }
    
        
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

    <div class="registation_screan">
        
            <form action="../HTML/indexRegester.php" class="registation_form" method="POST" id="registrationForm">
                <fieldset class="registation_form_fieldset">
                    <h2>Regester</h2>
                        <div class="registation_form_fieldset_input">
                            <div class="fullName">
                                <input type="text" id="fullname" placeholder="Full Name" name="fullname" >
                                <input type="text" id="username"placeholder="User Name" name="username">
                            </div>
                            
                            <div class="anyData">
                                <input type="email" placeholder="Enter your email" name="email">
                                <input type="text" id="nic"placeholder="NIC" name="nic">
                                <input type="date" placeholder="Birthday" name="date">
                                <input type="text" placeholder="Country" name="country">
                                <input type="text" placeholder="Contact Number" name="phonenum">
                                <input type="password" placeholder=Create_Password name="createpassword">
                                <input type="password" placeholder= Conform_Password name="conformpassword">
                                <input type="hidden" name="userRoole" value="Admin">
                                
                            </div>
                            
                        </div>
                    
                    <input type="submit" id="button-login" name="submit" value="Regester" button-align="center" ><br>
                    <h3>You have account?<a href="../HTML/indexLogin.php">Log in</a></h3>
                    <div>
                        <hr>
                                <p><b>By signing in or creating an account, you agree with out Terms & conditions and privacy statement</b></p>
                
                                <hr>
                                <p1>All rights reserved.</p1>
                                <p2>Copyright (2006-2023)-Royal Hotel<sup>TM</sup></p2>
                
                    </div>
                </fieldset>

            </form>

    </div>

    

</body>
</html>

