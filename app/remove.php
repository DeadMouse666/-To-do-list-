<?php

if(isset($_POST['id'])){
    require '/OpenServer/domains/ToDoList/includes/db.php';

    $id = $_POST['id'];

    if(empty($id)){
       echo 0;
    }else {
        $stmt = $connect->prepare("DELETE FROM todolist WHERE id=?");
        $res = $stmt->execute([$id]);

        if($res){
            echo 1;
        }else {
            echo 0;
        }

        exit();
    }
}else {
    header("Location: ../php/to-do.php?mess=error");
}
?>