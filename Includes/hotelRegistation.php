<?php
if (isset($_POST['submit'])) {
    $hotelname = $_POST["hotelname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $category = $_POST["category"];
    $photo = $_POST["photo"];
    $comment = $_POST["comment"];
    
    require_once 'db.php';
    require_once 'function.php';

    $emptyInput = emptyInputHotelSignup($hotelname, $email, $phone, $location, $category, $photo, $comment);
    $invalidEmail = invalidEmail($email); 
   
  
    if ($emptyInput !== false) {

        header("Location: ../HTML/indexHotelRegistation.php?error=emptyinput");

        exit();
    }
    if ($invalidEmail !== false) {
        header("Location: ../HTML/indexHotelRegistation.php?error=invalidemail");
        exit();
    }

    createHotel($conn,$hotelname, $email, $phone, $location, $comment,$photo,$category);
    
    
} else {
    header('Location: ../HTML/indexLogin.php');
}
?>