<?php
    if(isset($_POST["submit"])){
        $userName = $_POST["username"];
        $userPassword = $_POST["loginpassword"];

        require_once 'db.php'; //require_once eken kiynne adal de on kiyn ek loginHandl kiyn folder ekem db.php kiyn ek tiyn nis location denn one nh thawada it pahalin $conn ek use krann puluwn

        //input field wl data chek krnw

        if(function_exists('emptyInputsLogin')){
            if(emptyInputsLogin($userName,$userPassword) !== false){
                header("Location: ../HTML/indexLogin.php?error=emptyLogin");
                exit();
            }
            
            else {
                echo "Error: emptyInputsLogin function not defined.";
                exit();
        }

            loginUser($conn,$userName,$userPassword);
    }
    else{
        header(('Location:../HTML/index.php' ));
    }
}
?>