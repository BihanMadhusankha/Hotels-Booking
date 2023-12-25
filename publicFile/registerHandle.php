<?php
    if(isset($_POST["submit"])){
        $fName = $_POST["firstname"];
        $sName = $_POST["lastname"];
        $Email = $_POST["email"];
        $BirthDay =$_POST["date"];
        $fPassword = $_POST["creatpassword"];
        $sPassword = $_POST["conformpassword"];
        $Country = $_POST["country"];
        require_once 'db.php'; //require_once eken kiynne adal de on kiyn ek loginHandl kiyn folder ekem db.php kiyn ek tiyn nis location denn one nh thawada it pahalin $conn ek use krann puluwn
        require_once 'function.php';
        //input field wl data chek krnw

        $emptyInputs = emptyInputsSignup($fName,$sName,$Email,$BirthDay,$fPassword,$sPassword,$Country);
        $invalidUserId = invalidUserID($fName);
        $invalidEmail = invalidEmail($Email);
        $invalidBirthday = invalidBirthDay($BirthDay);
        $invalidPassword = invalidPassword($fPassword,$sPassword);
        $invalidCountry = invalidCountry($Country);
        $UseIdExists = UseIdExists($conn,$fName,$Email);
        

        if($emptyInputs !== false){
            header("Location:../HTML/indexRegester.php?error=EmptyInput");
            exit();
        }
        if($invalidUserId !== false){
            header("Location:../HTML/indexRegester.php?error=InvalidUserId");
            exit();
        }
        if($invalidEmail !== false){
            header("Location:../HTML/indexRegester.php?error=InvalidEmail");
            exit();
        }
        if($invalidBirthday !== false){
            header("Location:../HTML/indexRegester.php?error=InvalidBirthDay");
            exit();
        }
        if($invalidPassword !== false){
            header("Location:../HTML/indexRegester.php?error=PasswordDontMatch");
            exit();
        }
        if($invalidCountry !== false){
            header("Location:../HTML/indexRegester.php?error=InvalidCountry");
            exit();
        }
        if($UseIdExists !== false){
            header("Location:../HTML/indexRegester.php?error=UserNameTaken");
            exit();
        }

       createUser($conn,$fName,$sName,$Email,$BirthDay,$fPassword,$sPassword,$Country); 
    }
    else{
        header(('Location:../HTML/indexLogin.php' ));
    }
?>