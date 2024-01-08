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
            header("Location:../HTML/index.php");
            
        } else {
            header("Location:../HTML/index.php");
            
        }
        exit();
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

    // Select NIC from userregistration based on userName
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
                    // Update the existing record
                    $updateQuery = "UPDATE userprofileid SET profilePhoto = ? WHERE NIC = ?";
                    $updateStmt = mysqli_stmt_init($conn);

                    if (mysqli_stmt_prepare($updateStmt, $updateQuery)) {
                        mysqli_stmt_bind_param($updateStmt, "ss", $userprofile, $nic);
                        mysqli_stmt_execute($updateStmt);
                        mysqli_stmt_close($updateStmt);
                    } else {
                        // Handle statement preparation failure for UPDATE query
                        header("Location:../HTML/indexUserProfile.php?error=stmtfailed");
                        exit();
                    }
                } else {

                    // Insert data into userhelp table
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
