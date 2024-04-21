<?php
session_start();
require_once "../../db/connect_db.php";
$email = trim($_REQUEST['email']);

$stmt = $mysqli -> prepare("SELECT * FROM `user` WHERE `email` = ?");
$stmt -> bind_param("s",$email);
$stmt -> execute();
$result = $stmt -> get_result();
$user = $result -> fetch_assoc();


if(count($user) > 0){
    echo "<h3 style='text-align: center'>Check your email</h3><br>";
    echo "<h3 style='text-align: center'><a href='/'>RETURN</a></h3>";
    // call function
}else{
    $_SESSION['errors']['email'] = "User doesnot exist";
    header("Location:../../pages/public/auth/forgot_pass.php");
}









