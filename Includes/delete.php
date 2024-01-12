<?php
    include_once 'db.php';

    if(isset($_POST['deletename'])){
        $nic = mysqli_real_escape_string($conn, $_POST['deletename']);

        // Check if the NIC value is not empty before proceeding
        if (!empty($nic)) {
            $sql = "DELETE FROM userregistation WHERE NIC = '$nic'";
            $result = mysqli_query($conn, $sql);

            if($result){
                echo 'Deleted Successfully!!';
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