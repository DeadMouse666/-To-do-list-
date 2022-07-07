<?php

session_start();
require_once 'db_conn.php';


$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


	if(mb_strlen($username) < 3 || mb_strlen($username) > 20)
	{
		$_SESSION['message'] = 'Invalid login length (from 3 to 20 characters)';
		header('Location: ../registration.php');
		exit();

	} else if(mb_strlen($password) < 8 || mb_strlen($password) > 100)
		{
		$_SESSION['message'] = 'Invalid password length (8 to 20 characters)';
		header('Location: ../registration.php');
		exit();
}

	if ($password === $confirm_password)
	{
		$conn->query("INSERT INTO `users` (`id`, `username`, `password`) VALUES (NULL, '$username','$password')");
		$_SESSION['message'] = 'registration completed successfully';
		header('Location: ../list.php');
	} else {
		$_SESSION['message'] = 'Passwords do not match';
		header('Location: ../registration.php');
	}

$mysql->close();

?>
