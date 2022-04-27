<?php
session_start();
require_once 'connect.php';


$username = $_POST['username'];
$password = md5($_POST['password']);
$confirm_password = md5($_POST['confirm_password']);


if(mb_strlen($username) < 3 || mb_strlen($username) > 20)
{
	$_SESSION['message'] = 'Недопустимая длина логина (от 3 до 20 символов)';
	header('Location: ../registration.php');
	exit();
} else if(mb_strlen($password) < 8 || mb_strlen($password) > 100)
{
	$_SESSION['message'] = 'Недопустимая длина пароля (от 8 до 20 символов)';
	header('Location: ../registration.php');
	exit();
}

if ($password === $confirm_password)
{
	$mysql = mysqli_query($connect, "INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$username','$password')");
	$_SESSION['message'] = 'Регистрация прошла успешно';
	header('Location: ../list.php');
} else {
	$_SESSION['message'] = 'Пароли не совпадают';
	header('Location: ../registration.php');
}



?>
