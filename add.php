<?php
require_once 'connect.php';

$title = $_POST['title'];
$description = $_POST['description'];
$due_date = $_POST['due_date'];

if (empty($_POST['title']) || empty($_POST['description']) || empty($_POST['due_date']))
{
  $_SESSION['message'] = 'Заполните все поля !';
	header('Location: ../list.php');
} else {
  $mysql = mysqli_query($connect, "INSERT INTO `tasks` (`title`, `description`, `due_date`) VALUES (`title`, `description`, `due_date`)");
	$_SESSION['message'] = 'Задача создана !';
	header('Location: ../list.php');

}

 ?>
