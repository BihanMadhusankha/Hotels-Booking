<?php


if (isset($_POST['send'])) {
    $massage = $_POST["massage"];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $checkQuery = "SELECT userName FROM userregistation WHERE userName = ?";

    
    require_once 'db.php';
    require_once 'function.php';

    $emptyInput = emptyInputHelp($massage, $name, $email);
    $invalidUid = invalidHelpName($name);
    $invalidEmail = invalidHelpEmail($email);
   
    
    if ($emptyInput !== false) {

        header("Location: ../HTML/indexLogin.php?error=emptyinput");

        exit();
    }

    if ($invalidUid !== false) {
        header("Location: ../HTML/indexLogin.php?error=invaliduid");
        exit();
    }

    if ($invalidEmail !== false) {
        header("Location: ../HTML/indexLogin.php?error=invalidemail");
        exit();
    }
     createHelp($conn,$massage, $email, $name);
    
}  
else {
    
    header('Location: ../HTML/indexLogin.php');
}

?>