<?php
session_start();
require_once 'connect.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' ");
if (mysqli_num_rows($check_user) > 0){
  header('Location: ../list.php');
} else {
  $_SESSION['message'] = 'Неверный логин или пароль';
  header('Location: ../login.php');
}



?>
