<?session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../styles/main.css">
	<link rel="stylesheet" type="text/css" href="../../styles/login.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
		<div class="singIn">
			<form action="../../../private/auth/login.php" method="post" class="form__singIn">
				<h2>Регистрация</h2>
				<div class="form__group">
					<input type="text" name="email" placeholder="E-mail" class="<?=$error1?>">
					<label for="" class="error"></label>
				</div>
				<div class="form__group">
					<input type="password" name="password" placeholder="Пароль" class="<?=$error2?>">
					<label for="" class="error"></label>
				</div>
				<div class="form__group">
					<input type="submit" value="зарегистрироваться">
				</div>
				<div class="form__group forgot__pass">
					<a href="sign_in.php">Уже есть аккаунта?</a>
				</div>
				<div class="errors">
					<?php 
						if(isset($_SESSION['errors'][0])) echo $_SESSION['errors'][0] . "</br>";
						if(isset($_SESSION['errors'][1])) echo $_SESSION['errors'][1] . "</br>";
						unset($_SESSION['errors']);
					?>
					
				</div>
			</form>
		</div>
	</div>
</div>	
</body>
</html>
