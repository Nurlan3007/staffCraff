<?php session_start(); ?>

<link rel="stylesheet" type="text/css" href="../../styles/main.css">
<link rel="stylesheet" type="text/css" href="../../styles/login.css">
<title>Sign In</title>
<body>
	<div class="container">
		<div class="singIn">
			<form action="../../../private/auth/sign_in.php" method="post" class="form__singIn">
				<h2>Авторизация</h2>
				<div class="form__group">
					<input type="text" name="email" placeholder="E-mail">
					<label for="" class="error"></label>
				</div>
				<div class="form__group">
					<input type="password" name="password" placeholder="Пароль" >
					<label for="" class="error"></label>
				</div>
				<div class="form__group">
					<input type="submit" value="Авторизация">
				</div>
				<div class="form__group forgot__pass">
					<a href="login.php">Нет Аккаунта?</a>
                    <a href="forgot_pass.php">Забыл Пароль</a>
				</div>
			    <div class="errors">
                    <?php
                    if(isset($_SESSION['errors'])){
                        foreach ($_SESSION['errors'] as $error) {
                            echo "<p>" . $error .  "</p>";
                        }
                    }
                    ?>
                </div>
			</form>
		</div>
	</div>
</body>
</html>

<?php unset($_SESSION['errors'] );?>