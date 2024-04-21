<link rel="stylesheet" href="pages/styles/result_search.css">
<?php
require_once "header.php";
if(count($result_search) == 0){
    echo "<h3>Not Found</h3>";
    die;
}
?>
<div class="container">
    <div class="result_search">
        <? foreach($result_search as $key => $value): ?>
        <div class="result_search__value">
            <div class="topic"><?=$value['topic']?></div>
            <? if(isset($value['resume_category_id'])): ?>
                <a href="/specificil_summary?id=<?=$value['id']?>" class="more_inf">Далее</a>
            <?else:?>
                <a href="/specificil_vacancie?id=<?=$value['id']?>" class="more_inf">Далее</a>
            <? endif;?>
        </div>
        <?endforeach;?>
    </div>
</div>
<?php require_once "pages/public/footer.php"?>