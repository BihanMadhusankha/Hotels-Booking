<?php
    $serverName="localhost";
    $dbUsername="Madhusankha02";
    $dbPassword="8@N8ySWMWoE7jVN5";
    $dbName= "hotel_reservation";

    $conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);
    if(!$conn){
        die("Connection failed : " .mysqli_connect_error());
    }
    else{
        echo "Its Working";
    }

?>