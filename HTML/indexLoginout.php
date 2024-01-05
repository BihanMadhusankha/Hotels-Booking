<?php
session_start();
unset($_SESSION['username']);
header('Location:../HTML/indexLogin.php');
exit();
?>
