
<?php

if(isset($_GET['categoryId'])){
    $sql = "SELECT *,`vacancies`.`id` as 'resumeid'
        FROM `vacancies` 
        INNER JOIN `user` ON `user`.`id` = `vacancies`.`user_id`
        INNER JOIN `categories` ON `categories`.`id` = `vacancies`.`category_id`
        WHERE `vacancies`.`category_id` = ?
        ORDER BY `date` DESC
        LIMIT 10";
    $categoryId = $_GET['categoryId'];
    $stmt = $mysqli -> prepare($sql);
    $stmt -> bind_param("i",$categoryId);
}else{
    $sql = "SELECT *,`vacancies`.`id` as 'resumeid'
        FROM `vacancies` 
        INNER JOIN `user` ON `user`.`id` = `vacancies`.`user_id`
        INNER JOIN `categories` ON `categories`.`id` = `vacancies`.`category_id`
        ORDER BY `date` DESC
        LIMIT 10";
    $stmt = $mysqli -> prepare($sql);
}


$stmt -> execute();
$result = $stmt -> get_result();
$vacancies = $result -> fetch_all(MYSQLI_ASSOC);


$stmt = $mysqli -> prepare("SELECT * FROM `categories`");
$stmt -> execute();
$result = $stmt -> get_result();
$categories = $result -> fetch_all(MYSQLI_ASSOC);


?>
<link rel="stylesheet" type="text/css" href="pages/styles/main.css">
<? require_once "pages/public/header.php"?>
<style>
    body header .vacancies_a{color:#8c92f7;}
</style>
<div class="content">
    <div class="container">
        <?if(count($vacancies) > 0):?>
        <div class="content__value">
            <div class="vacancies">
                <?foreach($vacancies as $index => $key):?>
                    <div class="vacancie">
                        <div class="vacancie__author">
                            <h4><? echo $key['name'] . ' ' .$key['surname'];?></h4>
                        </div>
                        <div class="vacancie__stats">
                            <div class="vacancie__stats__views">
                                <p style="color:#3e598a;font-weight: 900;"><?=$key['company_name']?></p>
                            </div>
                            <div class="vacancie__stats__time">
                                <p style="color:#3e598a;"><?=$key['phone']?></p>
                            </div>
                        </div>
                        <div class="vacancie__theme">
                            <h4><?=$key['topic']?></h4>
                        </div>
                        <div class="vacancie__text">
                            <p><?=substr($key['desc'],0,350 )?></p>
                        </div>
                        <div class="vacancie__category">
                            <h4><?=$key['category']?></h4>
                        </div>
                        <div class="vacancie__more_inf">
                            <a href="/specificil_vacancie?id=<?=$key['resumeid']?>">Читать Далее</a>
                            <p><?=$key['date']?></p>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
            <?else:?>
                <div class="donot_have">
                    <h3>Donot have</h3>
                </div>
            <?endif;?>
            <div class="func_user">
                <? foreach($categories as $key => $category): ?>
                    <a href="/vacancies?categoryId=<?=$category["id"]?>"><?=$category["category"]?></a>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?if(count($vacancies) > 0):?>
    <div class="container">
        <div class="pagination">
            <div class="pagination__links">
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">&#8594;</a>
            </div>
        </div>
    </div>
<?php endif;?>
<?php require_once "pages/public/footer.php"?>



