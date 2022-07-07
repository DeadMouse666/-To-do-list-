<?php
  require "rb.php";
  R::setup('mysql:host=localhost;dbname=to_do_list','root','');

  function showError($errors){
  return array_shift($errors);
}


$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "to_do_list";

  try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo "Connection failed : ". $e->getMessage();
  }

  session_start();

?>
