<?php

$text = trim($_POST['text']);

if(strlen($text) > 0) {
    $sql1 = "SELECT * FROM `vacancies` WHERE `topic` LIKE '%$text%'  LIMIT 5";
    $sql2 = "SELECT * FROM `resumes` WHERE `topic` LIKE '%$text%' LIMIT 5";

    $stmt = $mysqli->prepare($sql1);
    $stmt->execute();
    $result = $stmt->get_result();
    $resumes = $result->fetch_all(MYSQLI_ASSOC);


    $stmt = $mysqli->prepare($sql2);
    $stmt->execute();
    $result = $stmt->get_result();
    $vacancies = $result->fetch_all(MYSQLI_ASSOC);

    $result_search = [];
    foreach ($vacancies as $key => $value) {
        $result_search[] = $vacancies[$key];
    }

    foreach ($resumes as $key => $value) {
        $result_search[] = $resumes[$key];
    }

    shuffle($result_search);

    require_once "pages/public/result_search.php";

}else{
    $result_search = [];
    require_once "pages/public/result_search.php";
}
