<?php
// signup
function emptyInputSignup($fullname, $username, $email, $nic, $dob, $country, $phonenum, $createpassword, $conformpassword)
{
    $result = false;
    if (empty($fullname) || empty($username) || empty($email) || empty($nic) || empty($dob) || empty($country) || empty($phonenum) || empty($createpassword) || empty($conformpassword)) {
        $result = true;
    }
    return $result;
}

function invalidUid($username)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    }
    return $result;
}

function invalidEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //preg_match ekk dann one email eke letter and symble check krnn
        $result = true;
    }
    return $result;
}

function pwdMatch($createpassword, $conformpassword)
{
    $result = false;
    if ($createpassword !== $conformpassword) {
        $result = true;
    }
    return $result;
}

function uidExists($conn, $username, $email)
{
    $sql = "SELECT * FROM userregistation WHERE 	userName = ? OR Email = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../HTML/indexLogin.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        return false;
    }
}

function createUser($conn, $fullname, $username, $email, $phonenum, $country, $dob, $nic, $createpassword, $conformpassword)
{
    $sql  = "INSERT INTO userregistation( fullName,userName, Email,contactNumber,homeTown,DOB,NIC,password,conformPassword) VALUES (?,?,?,?,?,?,?,?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../HTML/indexLogin.php?error=stmtfailed");
        exit();
    }

    $hashedpwd1 = password_hash($createpassword, PASSWORD_DEFAULT);
    $hashedpwd = password_hash($conformpassword, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "sssssssss", $fullname, $username, $email, $phonenum, $country, $dob, $nic, $hashedpwd1, $hashedpwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../HTML/indexLogin.php?error=none");
    exit();
}


// signup exit

//login


function emptyInputLogin($username, $conformpassword)
{
    $result = false;
    if (empty($username) || empty($conformpassword)) {
        $result = true;
    }

    return $result;
}

function loginUser($conn, $username, $conformpassword)
{
    $uidExists = uidExists($conn, $username, $username);
    if ($uidExists === false) {
        header("Location: ../HTML/indexLogin.php?error=wronglogin1");
        exit();
    }

    $pwdHashed = $uidExists["conformPassword"];
    $checkpwd = password_verify($conformpassword, $pwdHashed);

    if ($checkpwd === false) {
        header('Location: ../HTML/indexLogin.php?error=wronglogin');
        exit();
    } else if ($checkpwd === true) {
        session_start();

        $_SESSION["fullname"] = $uidExists["fullName"];
        $_SESSION["username"] = $uidExists["userName"];
        $_SESSION["email"] = $uidExists["Email"];
        $_SESSION["phonenum"] = $uidExists["contactNumber"];
        $_SESSION["country"] = $uidExists["homeTown"];
        $_SESSION["date"] = $uidExists["DOB"];
        $_SESSION["nic"] = $uidExists["NIC"];
        $_SESSION["createpassword"] = $uidExists["password"];
        $_SESSION["conformpassword"] = $uidExists["conformPassword"];


        if ($uidExists['userRoole'] == "admin") {
            header("Location:../HTML/indexAdminMain.php");
        } else {
            header("Location:../HTML/index.php");
        }
        exit();
    }
}
///forgetPassword

function checkMail($conn, $email)
{
    $uidExists = uidExists($conn, $email, $email);
    if ($uidExists === false) {
        header("Location: ../HTML/indexForgot.html?error=wrongEmail");
        exit();
    }
    $dEmail = $uidExists["Email"];
    $sql = "SELECT Email  FROM   userregistation   WHERE Email = '$dEmail'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../HTML/indexForgot.html?error=stmtfailed");
        exit();
    }
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    mysqli_stmt_close($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        header("Location:../HTML/indexResetPass.html?error=none");
    }
}
//////resetpassword
function resetPassword($conn, $enterp, $comformp)
{
    $sql = "UPDATE userregistation SET password=? conformPassword=? WHERE Email=?";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../HTML/indexLogin.php?error=stmtfailed");
        exit();
    }

    $hashedpwd1 = password_hash($enterp, PASSWORD_DEFAULT);
    $hashedpwd = password_hash($comformp, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "ss", $hashedpwd1, $hashedpwd);

    mysqli_stmt_execute($stmt);
    $rowsUserProfile = mysqli_stmt_affected_rows($stmt);

    mysqli_stmt_close($stmt);

    if ($rowsUserProfile > 0) {
        header("Location:../HTML/index.php?error=none");
        return true; // Update successful
    } else {
        return false; // No rows were updated
    }
}
////user

function emptyInputUser($fullname, $username, $email, $phonenum, $country, $dob, $nic, $createpassword, $conformpassword)
{
    $result = false;
    if (empty($username) || empty($email) || empty($fullname) || empty($phonenum) || empty($country) || empty($dob) || empty($nic) || empty($createpassword) || empty($conformpassword)) {
        $result = true;
    }

    return $result;
}

function editProfile($conn, $fullname, $username, $email, $phonenum, $country, $dob, $nic, $createpassword, $conformpassword, $userprofile)
{
    $sql = "UPDATE userregistation SET fullName=?,userName=?, Email=? , contactNumber=? , homeTown=? , DOB=? , NIC=? , password=? , conformPassword=? WHERE userName=?";
    $stmt = mysqli_stmt_init($conn);

    // $sqlUserProfile = "UPDATE userprofileid SET profilePhoto=?  WHERE NIC=?";
    // $stmtUserProfile = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../HTML/indexUserProfile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssssssss", $fullname, $username, $email, $phonenum, $country, $dob, $nic, $createpassword, $conformpassword, $userprofile);


    mysqli_stmt_execute($stmt);
    $Rows = mysqli_stmt_affected_rows($stmt);



    mysqli_stmt_close($stmt);

    if ($Rows > 0) {
        header("Location:../HTML/index.php?error=none");
        return true;  // Update successful
    } else {
        return false;  // No rows were updated
    }
}

function updateProfile($conn, $nic)
{
    $sqlUserProfile = "UPDATE userprofileid SET profilePhoto=? WHERE NIC=?";
    $stmtUserProfile = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmtUserProfile, $sqlUserProfile)) {
        header("Location:../HTML/indexLogin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmtUserProfile, "ss", $profilePhoto, $nic);

    mysqli_stmt_execute($stmtUserProfile);
    $rowsUserProfile = mysqli_stmt_affected_rows($stmtUserProfile);

    mysqli_stmt_close($stmtUserProfile);

    if ($rowsUserProfile > 0) {
        header("Location:../HTML/index.php?error=none");
        return true; // Update successful
    } else {
        return false; // No rows were updated
    }
}

////////////userprofile

function addProfilePhoto($conn, $username, $userprofile)
{
    $Name = $username;


    $selectQuery = "SELECT NIC FROM userregistation WHERE userName = ?";
    $selectStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($selectStmt, $selectQuery)) {
        header("Location:../HTML/indexUserProfile.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($selectStmt, "s", $Name);
    mysqli_stmt_execute($selectStmt);
    mysqli_stmt_bind_result($selectStmt, $nic);

    if (mysqli_stmt_fetch($selectStmt)) {
        // Check if NIC is not empty
        if (!empty($nic)) {
            mysqli_stmt_close($selectStmt);

            $checkQuery = "SELECT * FROM userprofileid WHERE NIC = ?";
            $checkStmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($checkStmt, $checkQuery)) {
                mysqli_stmt_bind_param($checkStmt, "s", $nic);
                mysqli_stmt_execute($checkStmt);
                mysqli_stmt_store_result($checkStmt);

                if (mysqli_stmt_num_rows($checkStmt) > 0) {

                    $updateQuery = "UPDATE userprofileid SET profilePhoto = ? WHERE NIC = ?";
                    $updateStmt = mysqli_stmt_init($conn);

                    if (mysqli_stmt_prepare($updateStmt, $updateQuery)) {
                        mysqli_stmt_bind_param($updateStmt, "ss", $userprofile, $nic);
                        mysqli_stmt_execute($updateStmt);
                        mysqli_stmt_close($updateStmt);
                    } else {

                        header("Location:../HTML/indexUserProfile.php?error=stmtfailed");
                        exit();
                    }
                } else {


                    $insertQuery = "INSERT INTO userprofileid (profilePhoto,NIC, userName) VALUES (?, ?, ?)";
                    $insertStmt = mysqli_stmt_init($conn);

                    if (mysqli_stmt_prepare($insertStmt, $insertQuery)) {
                        mysqli_stmt_bind_param($insertStmt, "sss", $userprofile, $nic, $Name);
                        mysqli_stmt_execute($insertStmt);
                        mysqli_stmt_close($insertStmt);
                    } else {
                        // Handle statement preparation failure for INSERT query
                        header("Location:../HTML/indexUserProfile.php?error=stmtfailed");
                        exit();
                    }
                }

                header("Location:../HTML/index.php?error=none");
                exit();
            } else {
                // Handle statement preparation failure for SELECT query
                header("Location:../HTML/indexUserProfile.php?error=stmtfailed");
                exit();
            }
        } else {
            // Handle the case where NIC is empty
            header("Location:../HTML/indexUserProfile.php?error=emptyNIC");
            exit();
        }
    } else {
        // Handle the case where userName is not found
        header("Location:../HTML/indexUserProfile.php?error=userNotFound");
        exit();
    }
}

////////////Help


function emptyInputHelp($massage, $name, $email)
{
    $result = false;
    if (empty($massage) || empty($name) || empty($email)) {
        $result = true;
    }
    return $result;
}

function invalidHelpName($name)
{
    $result = false;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    }
    return $result;
}

function invalidHelpEmail($email)
{
    $result = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //preg_match ekk dann one email eke letter and symble check krnn
        $result = true;
    }
    return $result;
}



function createHelp($conn, $massage, $email, $name)
{
    $userName = $name;

    // Select NIC from userregistration based on userName
    $selectQuery = "SELECT NIC FROM userregistation WHERE userName = ?";
    $selectStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($selectStmt, $selectQuery)) {
        header("Location:../HTML/indexHelp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($selectStmt, "s", $userName);
    mysqli_stmt_execute($selectStmt);
    mysqli_stmt_bind_result($selectStmt, $nic);

    if (mysqli_stmt_fetch($selectStmt)) {
        // Check if NIC is not empty
        if (!empty($nic)) {
            mysqli_stmt_close($selectStmt);

            // Insert data into userhelp table
            $insertQuery = "INSERT INTO userhelp (NIC, massages, email, userName) VALUES (?, ?, ?, ?)";
            $insertStmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($insertStmt, $insertQuery)) {
                mysqli_stmt_bind_param($insertStmt, "ssss", $nic, $massage, $email, $name);
                mysqli_stmt_execute($insertStmt);
                mysqli_stmt_close($insertStmt);

                header("Location:../HTML/index.php?error=none");
                exit();
            } else {
                // Handle statement preparation failure for INSERT query
                header("Location:../HTML/indexHelp.php?error=stmtfailed");
                exit();
            }
        } else {
            // Handle the case where NIC is empty
            header("Location:../HTML/indexHelp.php?error=emptyNIC");
            exit();
        }
    } else {
        // Handle the case where userName is not found
        header("Location:../HTML/indexHelp.php?error=userNotFound");
        exit();
    }
}


// hotel signup


function emptyInputHotelSignup($hotelname, $email, $phone, $location, $category, $photo, $comment)
{
    $result = false;
    if (empty($hotelname) || empty($email) || empty($phone) || empty($location) || empty($category)) {
        $result = true;
    }
    return $result;
}


function createHotel($conn, $hotelname, $email, $phone, $location, $comment, $photo, $category)
{
    $sql  = "INSERT INTO hoteldata( hotelName,hotelEmail, hotelPhoneNo,hotelLocation,additionalComment,hotelPhoto,hotelCategory) VALUES (?,?,?,?,?,?,?) ;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location:../HTML/indexLogin.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "sssssss", $hotelname, $email, $phone, $location, $comment, $photo, $category);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../HTML/indexHotelList.php?error=none");
    exit();
}


//////////Room

function createRoom($conn,$hotelname, $offers, $veiw, $overView, $price,$photo){
    
    $hotel = $hotelname;

    // Select NIC from userregistration based on userName
    $selectQuery = "SELECT hotelID FROM hoteldata WHERE hotelName = ?";
    $selectStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($selectStmt, $selectQuery)) {
        header("Location:../HTML/indexHelp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($selectStmt, "s", $hotel);
    mysqli_stmt_execute($selectStmt);
    mysqli_stmt_bind_result($selectStmt, $hotelID);

    if (mysqli_stmt_fetch($selectStmt)) {
        // Check if NIC is not empty
        if (!empty($hotelID)) {
            mysqli_stmt_close($selectStmt);

            // Insert data into userhelp table
            $insertQuery = "INSERT INTO roomsdelails (hotelName,offers,veiuPoint,overView,price,hotelID,roomPhoto) VALUES (?,?,?,?,?,?,?)";
            $insertStmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($insertStmt, $insertQuery)) {
                mysqli_stmt_bind_param($insertStmt, "sssssss", $hotelname, $offers, $veiw, $overView, $price,$hotelID,$photo);
                mysqli_stmt_execute($insertStmt);
                mysqli_stmt_close($insertStmt);

                header("Location:../HTML/indexRoomList.php?error=none");
                exit();
            } else {
                // Handle statement preparation failure for INSERT query
                header("Location:../HTML/indexRoomRegister.html?error=stmtfailed");
                exit();
            }
        } else {
            // Handle the case where NIC is empty
            header("Location:../HTML/indexRoomRegister.html?error=emptyNIC");
            exit();
        }
    } else {
        // Handle the case where userName is not found
        header("Location:../HTML/indexRoomRegister.html?error=userNotFound");
        exit();
    }
}

function getRoomDetailsById($conn, $id) {
    if ($conn) {
        $id = mysqli_real_escape_string($conn, $id);

        $sql = "SELECT * FROM roomsdelails WHERE roomID='$id'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    } else {
        // Handle the case where $conn is not valid
        return false;
    }
}

function createPaymentDetails($conn,$email, $cardname, $cardnumber, $expireon, $year, $CVC,$nic){
    $NIC = $nic;

    // Select NIC from userregistration based on userName
    $selectQuery = "SELECT NIC FROM userregistation WHERE NIC = ?";
    $selectStmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($selectStmt, $selectQuery)) {
        header("Location:../HTML/indexHelp.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($selectStmt, "s", $NIC);
    mysqli_stmt_execute($selectStmt);
    mysqli_stmt_bind_result($selectStmt, $nic);

    if (mysqli_stmt_fetch($selectStmt)) {
        // Check if NIC is not empty
        if (!empty($nic)) {
            mysqli_stmt_close($selectStmt);

            // Insert data into userhelp table
            $insertQuery = "INSERT INTO paymentdetails (email ,creditcardNumber,expireMonth ,year ,cvc ,NIC) VALUES (?,?,?,?,?,?,?)";
            $insertStmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($insertStmt, $insertQuery)) {
                mysqli_stmt_bind_param($insertStmt, "sssssss",$email, $cardname, $cardnumber, $expireon, $year, $CVC,$nic);
                mysqli_stmt_execute($insertStmt);
                mysqli_stmt_close($insertStmt);

                header("Location:../HTML/indexRoomList.php?error=none");
                exit();
            } else {
                // Handle statement preparation failure for INSERT query
                header("Location:../HTML/indexBooking.html?error=stmtfailed");
                exit();
            }
        } else {
            // Handle the case where NIC is empty
            header("Location:../HTML/indexBooking.html?error=emptyNIC");
            exit();
        }
    } else {
        // Handle the case where userName is not found
        header("Location:../HTML/indexBooking.html?error=userNotFound");
        exit();
    }

}