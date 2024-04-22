<?php

session_start();
require_once "db/connect_db.php";

$stmt = $mysqli -> prepare("SELECT * FROM `categories`");
$stmt -> execute();
$result = $stmt -> get_result();
$categories = $result -> fetch_all(MYSQLI_ASSOC);

require_once "modules/route.php";
require_once "modules/router.php";

$uri = $_SERVER["REQUEST_URI"];
$router = new Router($uri, $mysqli);

$router -> post("/create_resume_post", function ($mysqli){
    require_once "private/create_resume_post.php";
    die;
});

$router -> post("/search", function ($mysqli){
    require_once "private/search.php";
    die;
});

$router -> post("/create_vacancy_post", function ($mysqli){
    require_once "private/create_vacancy_post.php";
    die;
});

$router -> post("/add_comment", function ($mysqli){
    require_once "private/add_comment.php";
    die;
});

$router -> post("/contact_post", function ($mysqli){
    require_once "private/contact_post.php";
    die;
});

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="pages/styles/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="pages/imgs/icons8-jira-48.png" />
    <title>StaffCrafters</title>
</head>

<?php
$router -> get("/create_resume", function ($mysqli){
    require_once "pages/public/create_resume.php";
    die;
});

$router -> get("/create_vacancy", function ($mysqli){
    require_once "pages/public/create_vacancy.php";
    die;
});

$router -> get("/who_we_are", function ($mysqli){
    require_once "pages/public/who_we_are.php";
    die;
});

$router -> get("/summaries", function ($mysqli){
    require_once "pages/public/summaries.php";
    die;
});

$router -> get("/specificil_summary", function ($mysqli){
    require_once "pages/public/specificil_summary.php";
    die;
});

$router -> get("/vacancies", function ($mysqli){
    require_once "pages/public/vacancies.php";
    die;
});

$router -> get("/specificil_vacancie", function ($mysqli){
    require_once "pages/public/specificil_vacancie.php";
    die;
});

$router -> run();

?>
<body>
	<? require_once "pages/public/who_we_are.php" ?>
    <h2>GIT yyy</h2>
</body>
</html>

