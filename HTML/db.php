<?Php

    $HOSTNAME="localhost";
    $USERNAME="root";
    $PASSWORD="";
    $DATABASE="hotel_reservation";

    $con = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABASE);

    if(!$con){
        die(mysqli_connect_error());
    }
    
?>

