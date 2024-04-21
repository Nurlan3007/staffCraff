<?php 
session_start();
require_once "../../db/connect_db.php";

$email = trim($_REQUEST['email']);
$password = trim($_REQUEST['password']);

if(!preg_match("/(^[a-zA-Z]+)[a-zA-Z0-9_-]+@[a-zA-Z]+\.[a-z]{2,3}/",$email,$m)){
    $_SESSION['errors'][] = "Error email";
}

if(strlen($password) < 3){
    $_SESSION['errors'][] = "Error Password";
}

$stmt = $mysqli -> prepare("SELECT *  FROM `user` WHERE `email` = ?");
$stmt -> bind_param("s", $email);
$stmt -> execute();
$result = $stmt -> get_result();
$user = $result -> fetch_assoc();


if(isset($user['id'])){
    $_SESSION['errors'][] = "This user already exists";
}

if(isset($_SESSION['errors'])){
    header("Location:../../pages/public/auth/login.php");
    die();
}else{
    $role_id = 2;
    $sql = "INSERT INTO `user` (`email`, `password`,`role_id`) VALUES (?,?,?)";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("ssi", $email,$password,$role_id);
    $stmt -> execute();

    $sql = "SELECT * FROM`user` WHERE `email` = ?";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $result = $stmt -> get_result();
    $user = $result -> fetch_assoc();
    $_SESSION['user'] = $user;
    header("Location:/");
}

