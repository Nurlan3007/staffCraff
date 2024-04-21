<?php
$id = $_GET['id'];
$sql = "SELECT * FROM `resumes`
    INNER JOIN `user` ON `user`.`id` = `resumes`.`resume_user_id`
    INNER JOIN `categories` ON `categories`.`id` = `resumes`.`resume_category_id`
    WHERE `resumes`.`id` = ?
    ";
$stmt = $mysqli -> prepare($sql);
$stmt -> bind_param("i", $id);
$stmt -> execute();
$result = $stmt -> get_result();
$resume = $result -> fetch_assoc();

$sql = "SELECT * FROM `comments` 
         INNER JOIN `user` ON `user`.`id` = `comments`.`user_id`
         WHERE `resume_id` = ?";
$stmt = $mysqli -> prepare($sql);
$stmt -> bind_param("i", $id);
$stmt -> execute();
$result = $stmt -> get_result();
$comments = $result -> fetch_all(MYSQLI_ASSOC);

$count = $resume['count_views'] + 1;

$count_views = $mysqli -> prepare("UPDATE `resumes` SET `count_views` = ? WHERE `id` = ?");
$count_views -> bind_param("ii", $count,$id);
$count_views -> execute();

?>
<link rel="stylesheet" href="pages/styles/specificil_summary.css">
<?php require_once "header.php";?>
<div class="content">
    <div class="container">
        <div class="content__value">
            <div class="vacancie_info">
                <h3>Inf about worker</h3>
                <div class="vacancie__author">
                    <h4><span>Name:</span> <?= $resume['name'] . ' ' .$resume['surname'];?></h4>
                    <h4><span>Phone:</span> <?=$resume['phone']?></h4>
                    <h4><span>Email:</span> <?=$resume['email']?></h4>
                    <h4><span>Category:</span> <?=$resume['category']?></h4>
                    <h4><span>Date create:</span> <?=$resume['date']?></h4>
                </div>
            </div>
            <div class="vacancie">
                <h3>Resume</h3>
                <div class="vacancie__theme">
                    <h4><?=$resume['topic']?></h4>
                </div>
                <div class="vacancie__text">
                    <p><?=substr($resume['description'],0,350 )?></p>
                </div>
                <div class="vacancie__img">
                    <p><img src="pages/imgs/<?=$resume['path_img']?>" alt=""></p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="comments" id="comments">
                <h3>Comments</h3>
                <div class="form">
                    <? if(isset($_SESSION['user'])): ?>
                    <form action="/add_comment" method="post">
                        <input type="hidden" value="<?=$id?>" name="id">
                        <input type="hidden" value="summary" name="type">
                        <input type="text" placeholder="Comment" name="comment">
                        <input type="submit" value="send">
                    </form>
                    <?else:?>
                        <h3>To add a comment you must be logged in</h3>
                    <?endif;?>
                </div>
                <? if(count($comments) > 0): ?>
                <? foreach ($comments as $key => $comment): ?>
                    <div class="comment_values">
                        <h4><?=$comment['email']?></h4>
                        <p><?=$comment['comment']?></p>
                    </div>
                <? endforeach; ?>
                <?endif;?>
            </div>
        </div>
    </div>
</div>

<?php require_once "pages/public/footer.php"?>

