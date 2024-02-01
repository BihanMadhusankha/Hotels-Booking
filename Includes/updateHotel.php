<?php
include_once 'db.php';

if (isset($_POST['submit'])) {
   
    $newHotelName = $_POST['hotelname'];
    $newEmail = $_POST['email'];
    $newPhone = $_POST['phone'];
    $newLocation = $_POST['location'];
    $newComment = $_POST['comment'];
    $newPhoto = $_POST['photo'];
    $newCategory = $_POST['category'];

    $sql = "UPDATE hoteldata SET 
                hotelName=?, 
                hotelEmail=?, 
                hotelPhoneNo=?, 
                hotelLocation=?, 
                additionalComment=?, 
                hotelPhoto=?, 
                hotelCategory=?
            WHERE hotelName=?";

    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, 'ssssssss', 
        $newHotelName, $newEmail, $newPhone, $newLocation, $newComment, $newPhoto, $newCategory, $newHotelName);

   
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header('Location:../HTML/indexHotelList.php');
    } else {
        echo 'Error updating hotel: ' . mysqli_error($conn);
    }

  
    mysqli_stmt_close($stmt);
} else {
    echo 'Invalid form submission.';
}
?>

