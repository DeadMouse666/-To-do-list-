<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="check.php">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>

<header class="header">

<div class="nav_link">
	<h1>Регистрация</h1>
	<a href="http://to-do-list"class="href1">Выход на главную</a>
</div>

</header>
<body>

<container class="container">
	<form action="check.php" method="post">
		<input type="text"  class="input" name="username" id="username" placeholder="Введите логин"></br>
		<input type="password" class="input" name="password" id="password" placeholder="Введите пароль"><br>
		<input type="password" class="input" name="confirm_password" id="confirm_password" placeholder="Введите пароль еще раз"><br>
		<a>Есть уже аккаунт ? <a class="login" href="login.php"> Войти</a></a> <br>
		<button class="btn-success" type="submit">Отправить</button>
<?php
	if ($_SESSION['message']){
		echo '<p class="msg">' . $_SESSION['message'] . '</p>';
		}
	unset($_SESSION['message']);
?>
	</form>
</container>

</body>
</html>
