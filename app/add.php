<?php

if(isset($_POST['title'])){
    require "/OpenServer/domains/ToDoList/includes/db.php";

    $title = $_POST['title'];

    if(empty($title)){
        header("Location: ../php/to-do.php?mess=error");
    }else {
        $stmt = $connect->prepare("INSERT INTO todolist(title) VALUE(?)");
        $res = $stmt->execute([$title]);

        if($res){
            header("Location: ../php/to-do.php?mess=success"); 
        }else {
            header("Location: ../php/to-do.php");
        }

        exit();
    }
}else {
    header("Location: ../php/to-do.php?mess=error");
}