<link rel="stylesheet" type="text/css" href="pages/styles/main.css">
<link rel="stylesheet" type="text/css" href="pages/styles/create_resume.css">

<style>
    body header .create_vacancy_a{
        color:#8c92f7;
    }
</style>

<?php
require_once "header.php";
$stmt = $mysqli -> prepare("SELECT * FROM `categories`");
$stmt -> execute();
$result = $stmt -> get_result();
$categories = $result -> fetch_all(MYSQLI_ASSOC);

function printLI($name){
    if(isset($_SESSION['last_inf'][$name])) {
        $value = $_SESSION['last_inf'][$name];
        unset($_SESSION['last_inf'][$name]);
        return $value;
    }
    return "";
}

if(isset($_SESSION['last_inf']['categoryId'])) {
    $index = $_SESSION['last_inf']['categoryId'] - 1;
    $temp_categ = [$categories[$index]];
    unset($categories[$index]);
    foreach ($categories as $key => $category){
        $temp_categ[] = $categories[$key];
    }
    $categories = $temp_categ;
}

?>

<?php if(isset($_SESSION['user'])): ?>
    <div class="container">
        <div class="create_resume form__singIn">
            <h3>Create vacancy</h3>
            <div class="errors">
                <?php
                if(isset($_SESSION['errors'])){
                    foreach ($_SESSION['errors'] as $error) {
                        echo "<p>" . $error .  "</p>";
                    }
                }
                ?>
            </div>
            <form action="/create_vacancy_post" method="post" class="form" enctype="multipart/form-data">
                <div class="form__group">
                    <input type="text" name="email" value="<?=$_SESSION['user']['email']?>" readonly>
                </div>
                <div class="form__group">
                    <select name="category_resume" id="">
                        <? foreach($categories as $key => $category): ?>
                            <option value="<?=$category["id"]?>"><?=$category["category"]?></option>
                        <? endforeach; ?>
                    </select>
                </div>
                <div class="form__group">
                    <input type="text" name="topic" placeholder="Topic" value="<?=printLI("topic")?>">
                </div>
                <div class="form__group">
                    <input type="text" name="Company" placeholder="Company" value="<?=printLI("company")?>">
                </div>
                <div class="form__group">
                    <input type="text" name="salary" placeholder="Salary" value="<?=printLI("salary")?>">
                </div>
                <div class="form__group">
                    <?$phone = printLI("phone");?>
                    <input type="text" name="phone" placeholder="phone" value="+7<?=substr($phone,1 )?>">
                </div>
                <div class="form__group">
                    <textarea name="desc"><?=printLI("desc")?> </textarea>
                </div>
                <div class="form__group">
                    <input type="file"  name="document" accept="image/png, image/jpeg, application/pdf" />
                </div>
                <div class="form__singIn">
                    <input type="submit" >
                </div>
            </form>
        </div>
    </div>
<?php else:?>
    <div class="container">
        <h3>For create resume you need to login</h3>
    </div>
<?php endif; ?>
<?php unset($_SESSION['errors']); unset($_SESSION['last_inf']);  ?>




