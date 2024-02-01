<?php
    include_once 'db.php';

    if(isset($_POST['deletename'])){
        $id = mysqli_real_escape_string($conn, $_POST['deletename']);

        if (!empty($id)) {
            $sql = "DELETE FROM roomsdelails WHERE  roomID= '$id'";
            $result = mysqli_query($conn, $sql);

            if($result){
               header('Location:../HTML/indexRoomList.php');
            } else {
                echo 'Error deleting user: ' . mysqli_error($conn);
            }
        } else {
            echo 'Invalid NIC value.';
        }
    } else {
        echo 'NIC value not set.';
    }
?>