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
    <title>Вход</title>
</head>
<header class="header">
	<div class="nav_link">
	<h1>Вход</h1>
	<a href="http://to-do-list/"class="href1">Выход на главную</a>
</div>
</header>
<body>
	<container class="container">
	<form action="signin.php" method="post" >
		<input type="text"  class="input" name="username" id="username" placeholder="Введите логин"></br>
		<input type="password" class="input" name="password" id="password" placeholder="Введите пароль"><br>
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
