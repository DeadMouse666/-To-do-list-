<?php

  if(isset($_POST['title'])){
      require 'db.php';
      $id = $GET['id'];
      $title = $_POST['title'];
      $date_time = $_POST['date_time'];
      $user_id = $_SESSION['users']['id'];
      if(empty($title)){
          header("Location: index.php?mess=error");
        }else {
          $stmt = $conn->query("INSERT INTO todos(`title`,`user_id`, `date_time`) VALUE('$title','$user_id','$date_time')");
          $res = $stmt->execute([$title], [$date_time]);

      if($res){
          header("Location: index.php?mess=success");
        }else {
          header("Location: index.php");
        }

        $conn = null;
        exit();
        }

}else {
    header("Location: index.php?mess=error");
}
