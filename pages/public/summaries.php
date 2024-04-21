<?php



$stmt = $mysqli -> prepare("SELECT * FROM `categories`");
$stmt -> execute();
$result = $stmt -> get_result();
$categories = $result -> fetch_all(MYSQLI_ASSOC);



if(isset($_GET['page'])){
    if(isset($_GET['categoryId'])){
        $sql = "SELECT *,`resumes`.`id` as 'resumeid'
            FROM `resumes` 
            INNER JOIN `user` ON `user`.`id` = `resumes`.`resume_user_id`
            INNER JOIN `categories` ON `categories`.`id` = `resumes`.`resume_category_id`
            WHERE `resumes`.`resume_category_id` = ?
            ORDER BY `date` DESC LIMIT 10";
            $stmt = $mysqli -> prepare($sql);
            $stmt -> bind_param("i", $_GET['categoryId']);
            $stmt -> execute();
            $result = $stmt -> get_result();
            $resumes = $result -> fetch_all(MYSQLI_ASSOC);
    }else {
        $num_page = $_GET['page'] - 1;
        $offset = $num_page * 10;
        $count = 10;
        $sql = "SELECT *,`resumes`.`id` as 'resumeid'
        FROM `resumes` 
        INNER JOIN `user` ON `user`.`id` = `resumes`.`resume_user_id`
        INNER JOIN `categories` ON `categories`.`id` = `resumes`.`resume_category_id`
        ORDER BY `date` DESC
        LIMIT ? OFFSET ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ii", $count, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        $resumes = $result->fetch_all(MYSQLI_ASSOC);
    }
}


?>
<? require_once "pages/public/header.php"?>
<link rel="stylesheet" type="text/css" href="pages/styles/main.css">
<div class="content">
    <div class="container">
        <?if(count($resumes) > 0):?>
        <div class="content__value">
            <div class="vacancies">
                <?foreach($resumes as $index => $key):?>
                    <div class="vacancie">
                        <div class="vacancie__author">
                            <h4><? echo $key['name'] . ' ' .$key['surname'];?></h4>
                        </div>
                        <div class="vacancie__stats">
                            <div class="vacancie__stats__views">
                                <img src="pages/imgs/icons8-время-30.png">
                                <p><?=$key['date']?></p>
                            </div>
                            <div class="vacancie__stats__time">
                                <img src="pages/imgs/icons8-показать-24.png">
                                <p><?=$key['count_views']?></p>
                            </div>
                        </div>
                        <div class="vacancie__theme">
                            <h4><?=$key['topic']?></h4>
                        </div>
                        <div class="vacancie__text">
                            <p><?=substr($key['description'],0,350 )?></p>
                        </div>
                        <div class="vacancie__category">
                            <h4><?=$key['category']?></h4>
                        </div>
                        <div class="vacancie__more_inf">
                            <a href="/specificil_summary?id=<?=$key['resumeid']?>">Читать Далее</a>
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
                    <a href="/summaries?categoryId=<?=$category["id"]?>&page=<?=$_GET['page']?>"><?=$category["category"]?></a>
                <? endforeach; ?>
            </div>
        </div>


    </div>
</div>
<?if(count($resumes) > 0):?>
<div class="container">
    <div class="pagination">
        <div class="pagination__links">
            <? for($i = 1; $i <= 5; $i++): ?>
                <?if($_GET['page'] == $i):?>
                    <a href="/summaries?page=<?=$i?>" <?="class=fillPag"?>><?=$i?></a>
                <?else:?>
                    <a href="/summaries?page=<?=$i?>"><?=$i?></a>
                <?endif;?>
            <?endfor;?>
            <a href="/summaries?page=1" <?="class='1'"?>>&#8594;</a>
        </div>
    </div>
</div>
<?php endif;?>
<?php require_once "pages/public/footer.php"?>
