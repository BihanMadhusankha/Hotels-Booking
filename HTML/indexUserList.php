
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleHotelList.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <title>User Admin</title>
</head>

<body>
    <!-- navigation  -->
    <nav>
        <label class="brand_name" for="Brand_name">ROYAL HOTELS</label>

        <ul class="nav_list">

            <li><a href="../HTML/indexUserList.php">User Panel</a></li>
            <li><a href="../HTML/indexHotelList.php">Hotel Panel</a></li>
        </ul>
    </nav>

    <div class="container">
        <button>Add User</button>
    </div>

    <table id="outputTable">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Comtact Number</th>
                <th>Country</th>
                <th>DOB</th>
                <th>NIC</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php

            session_start();

            // Include your database connection code here
            include_once '../Includes/db.php'; // Replace with your actual connection file

            // Rest of your code...

          
                $sql = "SELECT * FROM userregistation";
                $result = mysqli_query($conn, $sql);
        
                if($result){
                   
                    while($row = mysqli_fetch_assoc($result)){
                       $fullname = $row['fullName']; 
                       $username = $row['userName']; 
                       $email = $row['Email']; 
                       $contactnumber = $row['contactNumber']; 
                       $country = $row['homeTown']; 
                       $dob = $row['DOB']; 
                       $nic = $row['NIC']; 

                     echo'  <tr>
                       
                       <td>'.$fullname.'</td>
                       <td>'.$username.'</td>
                       <td>'.$email.'</td>
                       <td>'.$contactnumber.'</td>
                       <td>'.$country.'</td>
                       <td>'.$dob.'</td>
                       <td>'.$nic.'</td>
                       <td id="updateDelete">
                       <button style="background-color:#0A6EBD ;"><a style="color:white;  " href="">Update</a></button>
                       <form method="post" action="../Includes/indexUserList.php">
                       <input type="hidden" name="deletename" value="' . $nic . '">
                       <button type="submit" style="background-color:red; color:white;">Delete</button>
                   </form>                    </td>
                       </tr>';
                    }
                }
            ?>

           

        </tbody>

    </table>
</body>

</html>