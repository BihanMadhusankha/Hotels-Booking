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

        $_SESSION["username"] = $uidExists["userName"];
        if ($uidExists['userRoole'] == "admin") {
            header('Location:../HTML/indexAdminPanel.php');
        } else {
            header("Location:../HTML/index.php");
        }
        exit();
    }
}
