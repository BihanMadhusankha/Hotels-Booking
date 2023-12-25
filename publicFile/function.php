<?php

function emptyInputsSignup($fName,$sName,$Email,$BirthDay,$fPassword,$sPassword,$Country){
    $result=false;
    if(empty($fName) ||empty($sName) ||empty($Email) ||empty($BirthDay) ||empty($fPassword) ||empty($sPassword) ||empty($Country)  ){
        $result=true;
    }
   
    return $result;
}

function invalidUserID($fName){
    $result=false;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$fName)){
        $result=true;
    }
   
    return $result;
}

function invalidEmail($Email){
    $result=false;
    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
   
    return $result;
}

function invalidBirthDay($BirthDay){
    $result=false;
    if(empty($BirthDay)){
        $result=true;
    }
   
    return $result;
}

function invalidPassword($fPassword,$sPassword){
    $result=false;
    if($fPassword !== $sPassword){
        $result=true;
    }
   
    return $result;
}

function invalidCountry($Country){
    $result=false;
    if(empty($Country)){
        $result=true;
    }
   
    return $result;
}

function UseIdExists($conn,$fName,$Email){
    $sql = "SELECT * FROM registerform WHERE firstName= ? OR email = ? ;";
    
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../HTML/indexRegester.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$fName,$Email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    $result=false;
    if($row = mysqli_fetch_assoc($resultData)){
        $result= $row;
    }
    

    mysqli_stmt_close($stmt);
    return $result;
    mysqli_close($conn);
}

function  createUser($conn,$fName,$sName,$Email,$BirthDay,$fPassword,$sPassword,$Country){
    $sql = "INSERT INTO registerform(firstName,LastName,email,birthday,createPassword,conformPassword,country) VALUES (?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location:../HTML/indexRegester.php?error=stmtfailed");
        exit();
    }

    $hashedUserFirstPassword = password_hash($fPassword, PASSWORD_DEFAULT); 
    $hashedUserConformPassword = password_hash($sPassword, PASSWORD_DEFAULT); 

    mysqli_stmt_bind_param($stmt,"sssssss",$fName,$sName,$Email,$BirthDay,$hashedUserFirstPassword,$hashedUserConformPassword,$Country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location:../HTML/indexLogin.php?error=none");
    exit();
}

function emptyInputsLogin($userName,$userPassword){
    $result=false;
    if(empty($userName) ||empty($userPassword) ){
        $result=true;
    }
   
    return $result;
}

function loginUser($conn,$userName,$userPassword){
   $uidExists = UseIdExists($conn, $userName,$userName);
    if($uidExists===false){
        header("Location:../HTML/indexRegester.php");
        exit();
    }

    $hashuserPassword=$uidExists["conformPassword"];
    $checkuserPassword = password_verify($userPassword,$hashuserPassword);

    if($checkuserPassword===false){
        header("Location:../HTML/indexRegester.php");
        exit();
    }

    else if($checkuserPassword=== true){
        session_start();
        $_SESSION["userid"]=$uidExists["userId"];
        $_SESSION["username"]=$uidExists["firstName"];
    }

}
?>