<?php
$comment = trim($_REQUEST['comment']);
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$userId = $_SESSION['user']['id'];

if($type == "vacancie" and strlen($comment) > 0){
    $sql = "INSERT INTO `comments`(`comment`,`vacancie_id`,`user_id`) VALUES(?,?,?)";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("sii",$comment,$id,$userId);
    $stmt -> execute();
    header("Location:specificil_vacancie?id=$id#comments");
}

if($type == "summary" and strlen($comment) > 0){
    $sql = "INSERT INTO `comments`(`comment`,`resume_id`,`user_id`) VALUES(?,?,?)";
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("sii",$comment,$id,$userId);
    $stmt -> execute();
    header("Location:specificil_summary?id=$id#comments");
}


