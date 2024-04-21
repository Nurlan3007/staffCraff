<?php
$topic = trim($_POST['topic']);
$email = trim($_POST['email']);
$category_resume = trim($_POST['category_resume']);
$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);
$desc = trim($_POST['desc']);
$userid = $_SESSION['user']['id'];

if (strlen($topic) < 5) {
    $_SESSION['errors']['topic'] = "Too short topic";
}

if (strlen($surname) < 1) {
    $_SESSION['errors']['surname'] = "Too short surname";
}

if (strlen($name) < 1) {
    $_SESSION['errors']['name'] = "Too short name";
}

if (strlen($phone) < 11) {
    $_SESSION['errors']['phone'] = "Incorrect phone number";
}

if (strlen($desc) < 50) {
    $_SESSION['errors']['desc'] = "Too short description";
}

$_SESSION['last_inf']['desc'] = $desc;
$_SESSION['last_inf']['surname'] = $surname;
$_SESSION['last_inf']['name'] = $name;
$_SESSION['last_inf']['topic'] = $topic;
$_SESSION['last_inf']['categoryId'] = $category_resume;

if (!isset($_SESSION['errors'])) {
    $name_photo = $_FILES['document']['name'];

    $sql = "INSERT INTO `resumes`(`topic`, `description`, `resume_category_id`, `resume_user_id`, `path_img`) VALUES (?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssiis", $topic, $desc, $category_resume, $userid, $name_photo);
    $stmt->execute();

    $sql = "UPDATE `user` SET `name` = ?,`surname` = ?, `phone` = ? WHERE `id` = ? ";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssi", $name, $surname,  $phone, $userid);
    $stmt->execute();

    $tmp_name = $_FILES['document']['tmp_name'];
    move_uploaded_file($tmp_name, 'pages/imgs/' . $name_photo);
    unset($_SESSION['last_inf']);
    echo("<script>window.location.href='/summaries?page=1'</script>");
}else{
    echo("<script>window.location.href='/create_resume'</script>");
}









