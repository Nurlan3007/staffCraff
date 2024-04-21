<?php
$topic = trim($_POST['topic']);
$email = trim($_POST['email']);
$category_resume = trim($_POST['category_resume']);
$phone = trim($_POST['phone']);
$desc = trim($_POST['desc']);
$company = trim($_POST['Company']);
$userid = $_SESSION['user']['id'];
$salary = $_REQUEST['salary'];

if (strlen($topic) < 5) {
    $_SESSION['errors']['topic'] = "Too short topic";
}

if (strlen($salary) < 1) {
    $_SESSION['errors']['surname'] = "you need to add more salary";
}

if (strlen($company) < 1) {
    $_SESSION['errors']['name'] = "Too short name company";
}

if (strlen($phone) < 11) {
    $_SESSION['errors']['phone'] = "Incorrect phone number";
}

if (strlen($desc) < 50) {
    $_SESSION['errors']['desc'] = "Too short description";
}

$_SESSION['last_inf']['desc'] = $desc;
$_SESSION['last_inf']['salary'] = $salary;
$_SESSION['last_inf']['company'] = $company;
$_SESSION['last_inf']['topic'] = $topic;
$_SESSION['last_inf']['phone'] = $phone;
$_SESSION['last_inf']['categoryId'] = $category_resume;


if (!isset($_SESSION['errors'])) {
    $name_photo = $_FILES['document']['name'];

    $sql = "INSERT INTO `vacancies`(`company_name`, `topic`, `salary`, `phone`, `desc`, `img_path`,`category_id`, `user_id`) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssdsssii",$company,$topic,$salary,$phone,$desc,$name_photo,$category_resume,$userid );
    $stmt->execute();

    $tmp_name = $_FILES['document']['tmp_name'];
    move_uploaded_file($tmp_name, 'pages/imgs/' . $name_photo);
    unset($_SESSION['last_inf']);
    echo("<script>window.location.href='/vacancies'</script>");
}else{
    echo("<script>window.location.href='/create_vacancy'</script>");
}
?>








