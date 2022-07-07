<?php
 require "db.php";
 $data = $_POST;

 $showError = False;

 if(isset($data['signup'])) {
   $errors = array();
   $showError = True;

   if(trim($data['login']) == ''){
     $errors[] = 'Укажите логин.';
   }
   if(trim($data['firstname']) == ''){
     $errors[] = 'Укажите имя.';
   }
   if(trim($data['lastname']) == ''){
     $errors[] = 'Укажите фамилию.';
   }
   if(trim($data['password']) == ''){
     $errors[] = 'Укажите пароль.';
   }
   if(trim($data['password']) != trim($data['password'])){
     $errors[] = 'Неверный пароль.';
   }

   if(R::count('users', 'login = ?', array($data['login'])) >0){
     $errors[] = 'Пользователь с таким Логином уже зарегистрирован !';
   }

   if(empty($errors)){
     $user = R::dispense('users');
     $user->login = $data['login'];
     $user->firstname = $data['firstname'];
     $user->lastname = $data['lastname'];
     $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
     R::store($user);
     $_SESSION['users'] = $user;
     header ("Location: ./index.php");
   }
 }

 ?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/buttons.css">
	<title>Registration</title>
</head>


<body bgcolor="#292C35">
  <div class="toggle-btn1" onclick="./index.php">
  <a href="./index.php"><span class="span1"></span>
  <span></span>
  <span class="span2"></span></a>
</div>
<div class="wrapper">
  <main class="main">
    <div class="sect" align="center">
      <h1>Регистрация</h1>
      <div class="container">
        <div class="center">
      <form action="./registration.php" method="post" class="auth_form">


        <input id="input" type="text" name="login" placeholder="Логин"><br>
        <input id="input" type="text" name="firstname" placeholder="Имя"><br>
        <input id="input" type="text" name="lastname" placeholder="Фамилия"><br>
        <input id="input" type="password" name="password" placeholder="Пароль"><br>
        <input id="input" type="password" name="password_2" placeholder="Подтвердить пароль"><br>
<p><?php if($showError) { echo showError($errors); } ?></p>
                <button type="submit" name="signup" class="btn">
                  <svg width="180px" height="60px" viewBox="0 0 180 60" class="border">
                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="bg-line" />
                    <polyline points="179,1 179,59 1,59 1,1 179,1" class="hl-line" />
                  </svg>
                  <span id="span">Зарегистрироваться</span>
                </button>

      </form>


</div>
</div>
    </div>
</main>

<footer class="footer">
</footer>
</div>




</body>
</html>
