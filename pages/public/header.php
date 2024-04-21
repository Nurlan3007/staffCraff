<?php
    $uri = $_SERVER['REQUEST_URI'];
    if($uri == '/who_we_are'){
        $href = "#contact_us";
    }else{
        $href = "/who_we_are#contact_us";
    }



?>

<link rel="stylesheet" type="text/css" href="pages/styles/header.css">
<header>
	<div class="header__top">
		<div class="container">
			<div class="header__top_values">
				<div class="name__site">
                    <a href="/"><img src="pages/imgs/icons8-jira-48.png" alt=""></a>
				</div>
				<div class="header__seacrh">
					<form action="/search" method="post">
						<input type="text" name="text" placeholder="Search.">
                        <button type="submit" value=""></button>
                        <img src='pages/imgs/icons8-search-40.png'>
					</form>
				</div>
                <a href="#">Help</a>
                <a href="/who_we_are">Who we are</a>
                <a href="<?=$href?>">Contact us</a>
                <a href="#">+7 777 980 1818</a>
                <div class="countries">
                    <ul class="countries_menu">
                        <li class="KZ"><a href="/KZ"><img src="pages/imgs/countries/icons8-казахстан-48.png" alt=""></a>
                            <ul class="countries_menu_val">
                                <li><a href="/AS"><img src="pages/imgs/countries/icons8-австрия-48.png" alt="">AS</a></li>
                                <li><a href="/AZ"><img src="pages/imgs/countries/icons8-азербайджан-48.png" alt="">AZ</a></li>
                                <li><a href="/AR"><img src="pages/imgs/countries/icons8-аргентина-48.png" alt="">AR</a></li>
                                <li><a href="/ENG"><img src="pages/imgs/countries/icons8-великобритания-48.png" alt="">ENG</a></li>
                                <li><a href="/NL"><img src="pages/imgs/countries/icons8-нидерланды-48.png" alt=""> NL</a></li>
                                <li><a href="/RUS"><img src="pages/imgs/countries/icons8-российская-федерация-48.png" alt=""> RUS</a></li>
                                <li><a href="/KR"><img src="pages/imgs/countries/icons8-южная-корея-48.png" alt=""> KR </a></li>
                                <li><a href="/BY"><img src="pages/imgs/countries/icons8-беларусь-48.png" alt="">BY</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
			</div>
		</div>
	</div>
	<div class="header__bottom">
		<div class="container">
			<div class="header__bottom_values">
                <div class="header__bottom_right">
                    <a href="/summaries?page=1" class="summaries_a"> Summaries</a>
                    <a href="/vacancies" class="vacancies_a">Vacancies</a>
                    <?if(isset($_SESSION['user'])):?>
                        <a href="/create_resume" class="create_summary_a">Сreate Summary</a>
                        <a href="/create_vacancy" class="create_vacancy_a">Create vacancy</a>
                    <?endif;?>
                </div>
                <div class="login_profile">
                    <?if(isset($_SESSION['user'])):?>
                        <ul class="login_menu">
                            <?$login_name = explode("@",$_SESSION['user']['email'])[0];?>
                            <li><a class="header__login" href="#"><?=$login_name?></a>
                                <ul class="login_menu_val">
                                    <li><a href="pages/public/exit.php">Exit</a></li>
                                    <li><a href="/create_resume">Сreate Summary</a></li>
                                    <li><a href="/create_vacancy">Create vacancy</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?else:?>
                        <a class="header__login" href="/pages/public/auth/sign_in.php">Войти</a>
                    <?endif;?>
                </div>
			</div>
		</div>
	</div>
</header>
